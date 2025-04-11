<?php
  session_start();
  include "includes/init_db.php";
  $mysqli = new init_db;
  $select_user_data = $mysqli->select("users" , "id='".$_SESSION['user']."'"," ORDER by id DESC LIMIT 1") or die('Error DB');
  $result_mysqli = $select_user_data->fetch_object();       
  if($result_mysqli->id>0){
        $select = $mysqli->update("users" , "task5=".time(),"id='".$_SESSION['user']."'") or die('Error DB');
        $select = $mysqli->update("users" , "balance_points=balance_points+1","id='".$_SESSION['user']."'") or die('Error DB');
        $select = $mysqli->update("users" , "balance_chrle=balance_chrle+10000","id='".$_SESSION['user']."'") or die('Error DB');
        // echo '<meta http-equiv="refresh" content="0; url=/missions/">';
        // header("Location: https://charlietheunicoin.sale/");
        // echo '<script src="https://telegram.org/js/telegram-web-app.js"></script> <script>Telegram.WebApp.openLink("http://charlieunicornaimarketplace.eu/");</script>';
        // echo '<meta http-equiv="refresh" content="0; url=/missions/">';
  }else{ 
      header("location: /");
  }
 // header("location: /");
?>