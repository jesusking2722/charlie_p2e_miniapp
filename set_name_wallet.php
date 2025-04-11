<?php
session_start();
  include "includes/init_db.php";
  $mysqli = new init_db;
  $selectz = $mysqli->update("users" , "name_wallet='".$_REQUEST['name']."'","id='".$_SESSION['user']."'") or die('Error DB');
 
?>