<?php

/**
 * COMMUNITIES
 */

require_once "koneksi.php";

// DONE
function community_recomendations($username) {
  // menerima username pengguna

  // menentukan sebanyak $total_communities_needed community dengan prioritas
  // yang memiliki interest sama, jika ada lebih atau sama banyak communities
  // dari $total_communities_needed

  // mengembalikan array id community yang memenuhi kriteria. Ex: [2, 1, 3]
  $total_communities_needed = 5;
  $user_interest = run_query("SELECT interest FROM tb_accounts WHERE username = '$username'");
  $user_interest = $user_interest[0]['interest'];
  $array_community_id = run_query("SELECT id FROM tb_communities ORDER BY FIELD(interest, '".$user_interest."') DESC LIMIT $total_communities_needed");

  $res = [];
  foreach ($array_community_id as $content) {
    array_push($res, intval($content['id']));
  }

  return $res;
}


function get_all_communities($username) {
  // menerima username pengguna

  // menentukan sebanyak $total_communities_needed community dengan prioritas
  // yang sudah dimasuki oleh pengguna, jika ada lebih atau sama banyak
  // communities dari $total_communities_needed

  // mengembalikan array id community yang memenuhi kriteria. Ex: [1, 3, 2]
  $communities_selected = [];
  $total_communities_needed = 5;

  $communities = run_query("SELECT * FROM tb_communities");
  foreach ($communities as $community) {
    $community_members = $community['members'];

    if ($community_members != null) {
      $community_members = unserialize($community_members);
    }
    else {
      $community_members = [];
    }

    if (in_array($username, $community_members)) {
      array_push($communities_selected, intval($community['id']));
    }

    if (count($communities_selected) >= $total_communities_needed) {
      break;
    }
  }

  foreach ($communities as $community) {

    if (!(in_array($community['id'], $communities_selected))) {
      array_push($communities_selected, intval($community['id']));
    }

    if (count($communities_selected) >= $total_communities_needed) {
      break;
    }
  }
  return $communities_selected;
}

// DONE
function get_community_info($community_id) {
  // menerima id dari suatu commmunity

  // mengembalikan associative array yang berisi info dari community tersebut
  $community_data = run_query("SELECT nama, description, photo, interest, members FROM tb_communities WHERE id='$community_id'");
  return $community_data;
}

// DONE
function join_community($username, $community_id) {
  // menerima username dan id community yang ingin dimasuki

  // memasukan data username ke kolom member komunitas yang bersangkutan

  // mengembalikan true jika username bersangkutan belum masuk komunitas tersebut
  // mengembalikan false jika sebaliknya
  $community_members_u = run_query("SELECT members FROM tb_communities WHERE id = '$community_id'");
  $community_members_u = $community_members_u[0]['members'];

  if ($community_members_u != null) {
    $community_members_u = unserialize($community_members_u);
  }
  else {
    $community_members_u = [];
  }

  if (in_array($username, $community_members_u)) {
    return false;
  }
  else {
    array_push($community_members_u, $username);
    $community_members_s = serialize($community_members_u);
    run_query("UPDATE tb_communities SET members = '$community_members_s' WHERE id = '$community_id'", false);
  }

  return true;
}




header('Access-Control-Allow-Origin: *', false);
header('Content-Type: application/json');
$response;
$username = $_GET["username"];

if ($_SERVER["REQUEST_METHOD"] === "GET") {
  if ($_GET["action"] === "recomendation") {
    //$page = $_GET["page"];
    $result = community_recomendations($username);

    if ($result) {
      $response = array(
        "status" => "success",
        "data" => $result
      );
    } else {
      $response = array(
        "status" => "failed"
      );
    }
  } else if ($_GET["action"] === "all_communities") {
    $result = get_all_communities($username);
    if ($result) {
      $response = array(
        "status" => "success",
        "data" => $result
      );
    } else {
      $response = array(
        "status" => "failed"
      );
    }
  } else if ($_GET["action"] === "community_info") {
    $body = file_get_contents("php://input");
    $parsed_body = json_decode($body, true);
    $result = get_community_info($parsed_body["community_id"]);
    if ($result) {
      $response = array(
        "status" => "success",
        "data" => $result
      );
    } else {
      $response = array(
        "status" => "failed"
      );
    }
  } else {
    $response = array(
      "status" => "failed",
      "message" => "Action Unknown"
    );
  }
} else if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $body = file_get_contents("php://input");
  $parsed_body = json_decode($body, true);


  if (join_community($username, $parsed_body['community_id'])) {
    $response = array(
      "status" => "success"
    );
  } else {
    $response = array(
      "status" => "failed"
    );
  }
} else {
  $response = array(
    "status" => "failed",
    "message" => "HTTP Method is not allowed"
  );
}

echo json_encode($response);

?>
