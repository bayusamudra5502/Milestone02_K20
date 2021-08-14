<?php

/**
 * ENDPOINT UPLOAD FILE
 * 
 * Url : /api/upload.php
 * 
 * Terbagi menjadi dua metode:
 * - Upload Profile Picture
 * - Upload Foto dan Video untuk feeds
 */

define("SERVER_DIR", "/milestone/src/static");

# Ganti sama PATH folder milestone kalian. Ini adalah letak
# dimana file-file hasil upload disimpan
define("UPLOAD_DIR", "/var/www/html/milestone/src/static");

function handle_profile_picture_upload()
{
  /**
   * Menghandle proses upload foto profile
   * 
   * Pastikan lakukan pemeriksaan tipe data yang diupload.
   * Bila proses berhasil kembalikan nama file. Bila gagal,
   * kembalikan nilai false
   * 
   * Endpoint : /api/upload.php?action=profile
   * 
   */

  return "URL_FOTO_PROFILE";
}

function handle_feeds_media_upload()
{
  /**
   * Menghandle proses upload media (foto/video) feeds
   * 
   * Pastikan lakukan pemeriksaan tipe data yang diupload.
   * Bila proses berhasil kembalikan nama file. Bila gagal,
   * kembalikan nilai false
   * 
   * Endpoint : /api/upload.php?action=feeds
   * 
   */

  return "URL_FEEDS_MEDIA";
}

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *', false);
$response;
$result = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  if ($_GET["action"] === "profile") {
    $result = handle_profile_picture_upload();
  } else if ($_GET["action"] === "feeds") {
    $result = handle_feeds_media_upload();
  } else {
    $response = array(
      "status" => "failed",
      "message" => "Action is unknown"
    );
  }
} else {
  $response = array(
    "status" => "failed",
    "message" => "HTTP Method is not allowed"
  );
}

if ($result) {
  $response = array(
    "status" => "success",
    "data" => array(
      "url" => $result
    )
  );
}

echo json_encode($response);
