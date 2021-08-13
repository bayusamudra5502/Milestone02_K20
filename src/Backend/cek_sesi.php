<!-- Mengecek apakah user sudah login atau belum -->
<?php 
  session_start();
  if($_SESSION['status_login'] != true){
    echo '<script>window.location="login.php"</script>';
    exit;
  }else{
    echo '<script>window.location="homepage.php"</script>';
  }
?>