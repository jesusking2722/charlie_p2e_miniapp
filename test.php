<?php
  session_start();
  include "includes/init_db.php";
  $mysqli = new init_db;
  $select_user_data = $mysqli->select("users" , "balance<>''"," ORDER by id DESC") or die('Error DB');
  while($user_data = $select_user_data->fetch_object()){
  	echo "@".$user_data->nickname."<br>";
  }
  
?>