<?php
include_once("koneksi.php");

$hasil = run_query("SELECT * FROM `tb_akun`");

header('Content-Type: application/json');
echo json_encode($hasil);
