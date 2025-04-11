<?php
session_start();
  include "includes/init_db.php";
  $mysqli = new init_db;
  $select_user_data = $mysqli->select("users" , "id = '".$_SESSION['user']."'","ORDER by id DESC LIMIT 1") or die('Error DB');
  $user = $select_user_data->fetch_object();
  echo $user->wallet; 
?>