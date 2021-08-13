<?php
include_once("koneksi.php");

header('Content-Type: application/json');
$hasil = htmlspecialchars("2002-12-20 12:22:12", ENT_QUOTES);

echo $hasil;
