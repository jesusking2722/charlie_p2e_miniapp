<?php
  session_start();
  include "includes/init_db.php";
  $mysqli = new init_db;
  $select_user_data = $mysqli->select("users" , "id='".$_SESSION['user']."'"," ORDER by id DESC LIMIT 1") or die('Error DB');
  $result_mysqli = $select_user_data->fetch_object();
  $now_date=date("d/m/Y",time());
  $prev_day=date("d/m/Y",time()-86400);
  $award=array();

  $award[1]=100;
  $award[2]=200;
  $award[3]=400;
  $award[4]=550;
  $award[5]=800;
  $award[6]=1250;
  $award[7]=1700;
  $award[8]=1700;
  $award[9]=1700;

  if($result_mysqli->last_visit==$now_date){
    echo ''; 
  }else{

    if($result_mysqli->balance_ccoin>=15){
      if($result_mysqli->last_visit==$prev_day){
         $select = $mysqli->update("users" , "last_visit='".$now_date."'","id='".$_SESSION['user']."'") or die('Error DB');
         $select = $mysqli->update("users" , "repeat_visit=repeat_visit+1","id='".$_SESSION['user']."'") or die('Error DB');
         $select = $mysqli->update("users" , "balance_chrle=balance_chrle+".$award[$result_mysqli->repeat_visit+1],"id='".$_SESSION['user']."'") or die('Error DB');
         $select = $mysqli->update("users" , "balance_ccoin=balance_ccoin-15","id='".$_SESSION['user']."'") or die('Error DB');
          $seleczt_user_data = $mysqli->select("users" , "id='".$_SESSION['user']."'"," ORDER by id DESC LIMIT 1") or die('Error DB');
          $result_mysqliz = $seleczt_user_data->fetch_object();
        if($result_mysqliz->repeat_visit>=8){
         $select = $mysqli->update("users" , "repeat_visit=7","id='".$_SESSION['user']."'") or die('Error DB');
        }
        //echo $result_mysqli->repeat_visit+1;
      }else{
         $select = $mysqli->update("users" , "last_visit='".$now_date."'","id='".$_SESSION['user']."'") or die('Error DB');
         $select = $mysqli->update("users" , "repeat_visit=1","id='".$_SESSION['user']."'") or die('Error DB');
         $select = $mysqli->update("users" , "balance_chrle=balance_chrle+".$award[1],"id='".$_SESSION['user']."'") or die('Error DB');
         $select = $mysqli->update("users" , "balance_ccoin=balance_ccoin-15","id='".$_SESSION['user']."'") or die('Error DB');
        //echo 1;
      }
    }
  }
  header("location: /");
?>