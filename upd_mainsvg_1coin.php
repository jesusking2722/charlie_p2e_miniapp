<?php
session_start();
  include "includes/init_db.php";
  $mysqli = new init_db;
  $selectz = $mysqli->update("users" , "balance_chrle=balance_chrle+1","id='".$_SESSION['user']."'") or die('Error DB');

  $select_user_data = $mysqli->select("users" , "id='".$_SESSION['user']."'"," ORDER by id DESC LIMIT 1") or die('Error DB');
  $user_data = $select_user_data->fetch_object();     
  echo round($user_data->balance_chrle,0);
 
?>