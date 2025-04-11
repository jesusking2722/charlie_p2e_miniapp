<?php
session_start();
  include "includes/init_db.php";
  $mysqli = new init_db;
  $selectz = $mysqli->update("users" , "mainsvg='".$_POST['mainsvg']."'","id='".$_SESSION['user']."'") or die('Error DB');
  $selectz = $mysqli->update("users" , "balance_chrle=balance_chrle+5000","id='".$_SESSION['user']."'") or die('Error DB');
 
?>