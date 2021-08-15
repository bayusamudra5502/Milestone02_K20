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

define("SERVER_DIR", "/milestone/static/");

# Ganti sama PATH folder milestone kalian. Ini adalah letak
# dimana file-file hasil upload disimpan
define("UPLOAD_DIR", dirname(__DIR__, 2) . "/src/static/");

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
  $namefile = $_FILES['file']['name'];
  $tmpname = $_FILES['file']['tmp_name'];
  $cekektensi = array('png', 'jpg');
  $x = explode('.', $namefile);
  $ekstensi = strtolower(end($x));

  if (in_array($ekstensi, $cekektensi) === true) {
    $upload = move_uploaded_file($tmpname, UPLOAD_DIR . $namefile);
    if ($upload) {
      return SERVER_DIR . $namefile;
    } else {
      return false;
    }
  } else {
    return false;
  }
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
  $namefile = $_FILES['file']['name'];
  $tmpname = $_FILES['file']['tmp_name'];
  $cekektensi = array('png', 'jpg');
  $x = explode('.', $namefile);
  $ekstensi = strtolower(end($x));

  if (in_array($ekstensi, $cekektensi) === true) {
    $upload = move_uploaded_file($tmpname, UPLOAD_DIR . $namefile);
    if ($upload) {
      return SERVER_DIR . $namefile;
    } else {
      return false;
    }
  } else {
    return false;
  }
}

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: *");
$response = null;
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
