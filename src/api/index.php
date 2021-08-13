<?php
include_once("koneksi.php");

$hasil = run_query("SELECT * FROM `tb_akun`");
echo json_encode($hasil);
