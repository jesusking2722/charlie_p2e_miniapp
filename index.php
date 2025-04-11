<?php
  header("Cache-Control: max-age=2592000"); //30days (60sec * 60min * 24hours * 30days)
  session_start();  

  // if($_REQUEST['tgWebAppStartParam']=="clear"){
  //   session_destroy();
  //   echo "CLEAR CHACHE"; exit();
  // }
  if(isset($_REQUEST['tgWebAppStartParam'])){
    $_SESSION['ref_id']=$_REQUEST['tgWebAppStartParam'];
    unset($_REQUEST);
    header("Location: /");
    exit();
  }
    ini_set('display_errors', 0);
//    include 'global.php';
    require_once 'application/bootstrap.php';
?>