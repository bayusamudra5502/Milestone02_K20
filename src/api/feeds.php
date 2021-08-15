<?php
include_once "koneksi.php";

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

  $post = htmlspecialchars($data['posts'], ENT_QUOTES);
  $media = htmlspecialchars($data['media']);
  $current_time = date("Y-m-d h:i:s");

  return add_data('tb_posts', array('username' => $username, 'posts' => $post, 'media' => $media, 'timepublish' => $current_time, 'timeupdated' => $current_time));
}

function add_comment($username, $post_id, $comment)
{
  /**
   * Menambahkan komentar
   * 
   * menghasilkan True bila berhasil
   * 
   * Format time: Y-m-d h:m:s
   */

  $current_time = date("Y-m-d h:i:s");

  return add_data('tb_comments', array('username' => $username, 'postid' => $post_id, 'comment' => $comment, 'timepublish' => $current_time, 'timeupdated' => $current_time));
}

function add_like($username, $post_id)
{
  /**
   * Menambahkan like
   * 
   * Menghasilkan true bila berhasil
   */

  $result = run_query("SELECT username from tb_likes where username = '$username' and posts = $post_id");

  if (count($result) > 0) {
    return False;
  } else {
    return add_data('tb_likes', array('username' => $username, 'posts' => $post_id));
  }
}

function get_feeds($username, $page)
{
  /**
   * Menghasilkan 5 feeds yang terbaru dari username
   */
  $queue = "SELECT tb_posts.* FROM tb_posts, tb_friends WHERE tb_friends.userfriend = tb_posts.username AND tb_friends.username='$username' ORDER BY tb_posts.timepublish DESC";
  $query = run_query($queue);

  return array($query);
}


function get_comments($post_id)
{
  /**
   * Mendapatkan komentar berdasarkan id post
   * 
   * Return berupa array dari array komentar
   */

  $query = "SELECT * from tb_comments where postid=$post_id";
  $result = run_query($query);

  return $result;
}

function get_like_count($post_id)
{
  /**
   * Mendapatkan jumlah like seusai id post
   */

  $likes = run_query("SELECT * from tb_likes where posts='$post_id'");
  $total = count($likes);

  return $total;
}

function delete_like($username, $post_id)
{
  /**
   * Menghapus like.
   * 
   * Menghasilkan true bila berhasil.
   */

  delete_data('tb_likes', array('username' => $username, 'posts' => $post_id));

  return true;
}

header('Access-Control-Allow-Origin: *', false);
header("Access-Control-Allow-Headers: *", false);

header('Content-Type: application/json');
$response;

if ($_SERVER["REQUEST_METHOD"] === "GET") {
  if ($_GET["action"] === "feed") {
    $username = $_GET["username"];
    $page = $_GET["page"];
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

    if (gettype($result) === "array") {
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

    if (gettype($result) === "integer") {
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
