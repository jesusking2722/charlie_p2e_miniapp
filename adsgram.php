<?php
  session_start();
  include "includes/init_db.php";
  $mysqli = new init_db;
  $select_user_data = $mysqli->select("users" , "id='".$_REQUEST['user_id']."' AND task1='0'"," ORDER by id DESC LIMIT 1") or die('Error DB');
  $user_data = $select_user_data->fetch_object();       
  if($user_data->id>0){
        //$select = $mysqli->update("users" , "balance_chrle=balance_chrle+3000","id='".$_REQUEST['user_id']."'") or die('Error DB');
  }
?>