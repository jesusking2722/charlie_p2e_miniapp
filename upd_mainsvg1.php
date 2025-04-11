<?php
session_start();
  include "includes/init_db.php";
  $mysqli = new init_db;
  $selectz = $mysqli->update("users" , "mainsvg='".$_POST['mainsvg']."'","id='".$_SESSION['user']."'") or die('Error DB');
 
?>