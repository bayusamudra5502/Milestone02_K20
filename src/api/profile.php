<?php

/**
 * PROFILE
 */

require_once "koneksi.php";

function edit_profile($username, $new_data)
{
  /**
   * Fungsi ini akan mengedit profile sesuai dengan username yang dilewatkan.
   * Menghasilkan nilai true bila berhasil dna false bila gagal. 
   * 
   * Parameter $data adalah array asosiatif yang memiliki keys:
   * name, email, interest, education, bio, birthday, facebookUrl, 
   * instagramUrl, linkedinUrl, dan photo
   */

  return true;
}

function get_profile($username)
{
  /**
   * Fungsi ini akan mendapatkan profile user dengan nama username.
   * 
   * BIla berhasil, Fungsi ini harus menghasilkan array assosiatif dengan keys:
   * name, username, email, password, interest, education, bio, birthday,
   * facebook_url, instagram_url, linkedin_url, dan photo
   * 
   * bila gagal, kembalikan nilai null;
   */

  return array("username" => "Yay");
}

header('Content-Type: application/json');
$response;
$username = $_GET["username"];

if ($_SERVER["REQUEST_METHOD"] === "GET") {
  $result = get_profile($username);
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
} else if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $body = file_get_contents("php://input");
  $parsed_body = json_decode($body, true);

  if (edit_profile($username, $parsed_body)) {
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
