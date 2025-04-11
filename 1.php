<?php
session_start();
  include "includes/init_db.php";
  $mysqli = new init_db;
  $select_user_data = $mysqli->select("users" , "id > 0","ORDER by id DESC") or die('Error DB');
  while ($user = $select_user_data->fetch_object()) {
  echo "<br>";
  echo "<br>";
  echo "<br>";
  echo "<img src='".$user->photo_url."'>"; 
  }
?>