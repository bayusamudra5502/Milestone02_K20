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

   if ($username_exists = run_query("SELECT username FROM tb_accounts
     WHERE EXISTS username=$username", false)) {
     $res = false;
   }
   elseif (strlen($new_data["nama"]) > 50
            || strlen($new_data["email"]) > 50
            || strlen($new_data["interest"]) > 50
            || strlen($new_data["education"]) > 100) {
    $res = false;
   }
   else {
    $new_nama = $new_data['nama'];
    $new_email = $new_data['email'];
    $new_interest = $new_data['interest'];
    $new_education = $new_data['education'];
    $new_bio = $new_data['bio'];
    $new_birthday = $new_data['birthday'];
    $new_facebook_url = $new_data['facebook_url'];
    $new_instagram_url = $new_data['instagram_url'];
    $new_linkedin_url = $new_data['linkedin_url'];
    $new_photo = $new_data['photo'];

    run_query("UPDATE tb_accounts SET nama='$new_nama',
    email='$new_email',
    interest='$new_interest',
    education='$new_education',
    bio='$new_bio',
    birthday='$new_birthday',
    facebook_url='$new_facebook_url',
    instagram_url='$new_instagram_url',
    linkedin_url='$new_linkedin_url',
    photo='$new_photo'
    WHERE username='$username'", false);

    $res = true;
    }
    return $res;
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
   if ($username_exists = run_query("SELECT username FROM tb_accounts
      WHERE EXISTS username=$username", false)){
     $res = null;
   }
   else {
     $res = run_query("SELECT nama, username, email, password
       , interest, education, bio, birthday, facebook_url, instagram_url
       , linkedin_url, photo FROM tb_accounts WHERE username='$username'");
   }
   return $res;
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
