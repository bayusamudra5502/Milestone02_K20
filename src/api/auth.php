<?php
include_once "koneksi.php";

function login(string $username, string $password)
{
  $save_uname = htmlspecialchars($username, ENT_QUOTES);

  $query = "SELECT password FROM `tb_accounts` WHERE username='$save_uname';";
  $data = run_query($query);

  if (count($data) > 0) {
    $db_pass = $data[0]["password"];
    if (password_verify($password, $db_pass)) {
      return build_token($username);
    } else {
      return false;
    }
  } else {
    return false;
  }
}

function build_token(string $username)
{
  $token = bin2hex(random_bytes(64));
  $exp = date("Y-m-d h:i:s", strtotime("+2 Days"));
  add_data("tb_logged", array(
    "username" => $username,
    "token" => $token,
    "expired" => $exp
  ));

  return $token;
}

function check_token(string $token)
{
  $save_token = htmlspecialchars($token, ENT_QUOTES);
  $current_time = date("Y-m-d h:i:s");
  $query = "SELECT * FROM `tb_logged` WHERE token='$save_token' AND expired > '$current_time';";

  $result = run_query($query);
  if (count($result) > 0) {
    return $result[0]["username"];
  } else {
    return false;
  }
}

function is_username_available(string $username)
{
  $save_uname = $username;
  $query = "SELECT * FROM `tb_accounts` WHERE username='$save_uname'";

  return count(run_query($query)) === 0;
}

function register($payload)
{
  [
    "name" => $name,
    "username" => $username,
    "password" => $password,
    "verify" => $password_verify,
    "interest" => $interest,
    "email" => $email,
    "birthday" => $birthday
  ] = $payload;

  if (is_username_available($username)) {
    $save_name = htmlspecialchars($name, ENT_QUOTES);
    $save_uname = htmlspecialchars($username, ENT_QUOTES);
    $salted_pass = password_hash($password, PASSWORD_DEFAULT);
    $save_email = htmlspecialchars($email, ENT_QUOTES);
    $save_interest = htmlspecialchars($interest, ENT_QUOTES);
    $save_birthday = htmlspecialchars($birthday, ENT_QUOTES);

    if ($password === $password_verify) {
      $data = array(
        "nama" => $save_name,
        "username" => $save_uname,
        "password" => $salted_pass,
        "interest" => $save_interest,
        "email" => $save_email,
        "birthday" => $save_birthday
      );

      if (add_data("tb_accounts", $data) !== null) {
        return true;
      } else {
        return false;
      }
    } else {
      return false;
    }
  } else {
    return false;
  }
}

function logout(string $token)
{
  $save_token = htmlspecialchars($token, ENT_QUOTES);

  delete_data("tb_logged", array(
    "token" => $save_token
  ));

  return true;
}

header('Access-Control-Allow-Origin: *', false);
header("Access-Control-Allow-Headers: *", false);

header('Content-Type: application/json');
$response;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $body = file_get_contents("php://input");
  $parsed_body = json_decode($body, true);

  switch ($_GET["action"]) {
    case "login":
      ["username" => $username, "password" => $password] = $parsed_body;
      $result = login($username, $password);
      if ($result) {
        $response = array(
          "status" => "success",
          "data" => array(
            "token" => $result
          )
        );
      } else {
        $response = array(
          "status" => "failed",
          "message" => "Username or Password Not Found"
        );
      }
      break;
    case "register":
      if (register($parsed_body)) {
        $response = array(
          "status" => "success"
        );
      } else {
        $response = array(
          "status" => "failed",
          "message" => "Username sudah ada"
        );
      }
      break;
    case "session":
      $result = check_token($parsed_body["token"]);
      if ($result) {
        $response = array(
          "status" => "success",
          "data" => array(
            "username" => $result
          )
        );
      } else {
        $response = array(
          "status" => "failed",
          "message" => "Token not found"
        );
      }
      break;
    case "logout":
      if (logout($parsed_body["token"])) {
        $response = array(
          "status" => "success"
        );
      }
      break;
    default:
      $response = array(
        "status" => "failed",
        "message" => "Endpoint not found"
      );
  }
} else {
  $response = array(
    "status" => "Failed",
    "message" => "HTTP Method is not allowed"
  );
}

echo json_encode($response);
