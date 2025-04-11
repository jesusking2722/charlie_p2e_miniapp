<?php
session_start();
  include "includes/init_db.php";
  $mysqli = new init_db;
  $select_user_data = $mysqli->select("users" , "id='".$_SESSION['user']."'"," ORDER by id DESC") or die('Error DB');
  $result_mysqli = $select_user_data->fetch_object();     
  //echo round($result_mysqli->balance_chrle,0).".00";
  echo $result_mysqli->balance_chrle;
  #echo "refresh";
?>