<?php

/**
 * Feeds
 */

function add_feed($username, $data)
{
  /**
   * Menambahkan feeds ada database.
   * Parameter $data berisi keys:
   * posts dan media
   * 
   * Menghasilkan true bila berhasil ditambahkan
   */

  return true;
}

function add_comment($username, $post_id, $comment)
{
  /**
   * Menambahkan komentar
   * 
   * menghasilkan True bila berhasil
   */

  return true;
}

function add_like($username, $post_id)
{
  /**
   * Menambahkan like
   * 
   * Menghasilkan true bila berhasil
   */

  return true;
}

function get_feeds($username, $page)
{
  /**
   * Menghasilkan 5 feeds yang terbaru dari username
   */

  return array("A");
}


function get_comments($post_id)
{
  /**
   * Mendapatkan komentar berdasarkan id post
   * 
   * Return berupa array dari array komentar
   */

  return array();
}

function get_like_count($post_id)
{
  /**
   * Mendapatkan jumlah like seusai id post
   */

  return 0;
}

function delete_like($username, $post_id)
{
  /**
   * Menghapus like.
   * 
   * Menghasilkan true bila berhasil.
   */

  return true;
}

header('Content-Type: application/json');
$response;

if ($_SERVER["REQUEST_METHOD"] === "GET") {
  if ($_GET["action"] === "feed") {
    $body = file_get_contents("php://input");
    ["username" => $username, "page" => $page] = json_decode($body, true);
    $result = get_feeds($username, $page);

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
  } else if ($_GET["action"] === "comment") {
    $post_id = $_GET["id"];
    $result = get_comments($post_id);

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
  } else if ($_GET["action"] === "like") {
    $post_id = $_GET["id"];
    $result = get_like_count($post_id);

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
      "status" => "failed"
    );
  }
} else if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $body = file_get_contents("php://input");
  $parsed_body = json_decode($body, true);
  $username = $parsed_body["username"];

  if ($_GET["action"] === "feed") {
    if (add_feed($username, $parsed_body)) {
      $response = array(
        "status" => "success"
      );
    } else {
      $response = array(
        "status" => "failed"
      );
    }
  } else if ($_GET["action"] === "comment") {
    ["id" => $post_id, "comment" => $comment] = $parsed_body;
    if (add_comment($username, $post_id, $comment)) {
      $response = array(
        "status" => "success"
      );
    } else {
      $response = array(
        "status" => "failed"
      );
    }
  } else if ($_GET["action"] === "like") {
    $post_id = $parsed_body["id"];
    if (add_like($username, $post_id)) {
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
      "status" => "failed"
    );
  }
} else if ($_SERVER["REQUEST_METHOD"] === "DELETE") {
  $body = file_get_contents("php://input");
  ["username" => $username, "id" => $post_id] = json_decode($body, true);

  if (delete_like($username, $post_id)) {
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
