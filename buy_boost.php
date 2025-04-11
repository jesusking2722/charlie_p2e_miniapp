<?php
session_start();
  include "includes/init_db.php";
  $mysqli = new init_db;

  $select = $mysqli->select("users_boosters" , "user_id='".$_SESSION['user']."' AND booster_id='".$_REQUEST['id']."'"," ORDER by id DESC") or die('Error DB');
  $result_mysql = $select->fetch_object();
  if($result_mysql->id){
    echo '';
  }else{
      $select1 = $mysqli->select("users" , "id='".$_SESSION['user']."'"," ORDER by id DESC") or die('Error DB');
      $user = $select1->fetch_object();

      $select2 = $mysqli->select("boosters" , "id='".$_REQUEST['id']."'"," ORDER by id DESC") or die('Error DB');
      $booster = $select2->fetch_object();
      if(floatval($user->balance_ccoin)>=floatval($booster->price)){
          //дарим 500 если первый буст куплен
          $select = $mysqli->select("users_boosters" , "user_id='".$_SESSION['user']."'"," ORDER by id DESC") or die('Error DB');
          $result_mysql = $select->fetch_object();
          if(!$result_mysql){
            $select = $mysqli->update("users" , "task7=1","id='".$_SESSION['user']."'") or die('Error DB');
            $select = $mysqli->update("users" , "balance_chrle=balance_chrle+500","id='".$_SESSION['user']."'") or die('Error DB');
          }


          $wal=floatval($user->balance_ccoin)-floatval($booster->price);
          $select = $mysqli->update("users" , "balance_ccoin=".$wal."","id='".$_SESSION['user']."'") or die('Error DB');
          $data_ins['user_id']=$_SESSION['user'];
          $data_ins['booster_id']=$_REQUEST['id'];
          $data_ins['date']=time();
          $ins = $mysqli->_insert_db_data("users_boosters" , $data_ins) or die('Error DB'); 
        echo 1;
      }else{
        echo 0;
      }
  }
  

?>