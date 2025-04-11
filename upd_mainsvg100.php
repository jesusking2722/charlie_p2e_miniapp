<?php
session_start();
  include "includes/init_db.php";
  $mysqli = new init_db;
  $selectz = $mysqli->update("users" , "balance_chrle=balance_chrle+100","id='".$_SESSION['user']."'") or die('Error DB');
 
?>