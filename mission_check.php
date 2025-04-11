<?php
  session_start();
  include "includes/init_db.php";
  $mysqli = new init_db;
  $select_user_data = $mysqli->select("users" , "id='".$_SESSION['user']."'"," ORDER by id DESC LIMIT 1") or die('Error DB');
  $user_data = $select_user_data->fetch_object();       
  if($user_data->id>0){
      $sec = time()-$user_data->task5;
      if($sec > 300) return 'OK';
      else return 'Fail';
  }
?>