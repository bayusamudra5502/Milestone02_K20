<?php

/**
 * FRIENDS
 */

function get_all_friends($username)
{
    $array = run_query("SELECT userfriend FROM tb_friends WHERE username = '$username'");

  /**
   * Fungsi ini akan mengambil semua teman dari $username.
   *
   * Keluaran merupakan array username yang meurpakan teman dari $username
   */

  return array("Teman 1", "Teman 2");
}

function add_friend($username, $friend_username)
{
    $insert = run_query("INSERT $friend_username INTO tb_friends VALUES ('$userfriend') WHERE username = '$username'");
    if($insert){
        $bool = True;
    }else{
        $bool = False;
    }
    return True
  /**
   * Fungsi ini akan menjadikan $friends_username merupakan teman dari $username.
   * Prosesnya cukup tambahkan data pada tb_friends dengan kolom username bernilai
   * $username dan kolom userfriend adalah $friend_username
   * 
   * Kembalikan nilai True bila proses berhasil. Bila gagal keluarkan false
   */
}

function friend_recomendations($username, $page)
{   
    $bantu = 0
    $kesukaan = run_query("SELECT interest FROM tb_accounts WHERE username = '$username'");
    $kesukaan_teman = run_query("SELECT interest FROM tb_accounts WHERE userfriend = '$page'");
    for ($i=0; $i <=4; $i++) {
        if $kesukaan == $kesukaan_teman[i]{
            $bantu = $bantu + 1;
        } else{
            $bantu = $bantu + 0;
        }
    }
    if $bantu == 5{
        $bantu = 0;
        return array("A", "B");
    }
    else{
        $bantu = 0;
        return array("A", "B");
    }
  /**
   * Memberikan daftar rekomendasi teman. Prioritaskan orang-orang yang memiliki
   * minat yang sama.
   * 
   * Keluarkan hanya maksimal 5 username pada fungsi ini. Gunakan $page untuk mengatue
   * offset pada database
   */
}

header('Content-Type: application/json');
$response;
$username = $_GET["username"];

if ($_SERVER["REQUEST_METHOD"] === "GET") {
  if ($_GET["action"] === "recomendation") {
    $page = $_GET["page"];
    $result = friend_recomendations($username, $page);

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
  } else if ($_GET["action"] === "friends") {
    $result = get_all_friends($username);
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


  if (add_friend($username, $parsed_body["username"])) {
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
