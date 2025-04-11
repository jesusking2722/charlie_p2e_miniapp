<?php
session_start();
  include "includes/init_db.php";
  $mysqli = new init_db;
  $select_user_data = $mysqli->select("users" , "id='".$_SESSION['user']."'"," ORDER by id DESC") or die('Error DB');
  $result_mysqli = $select_user_data->fetch_object();     
  $data_ins['user_id']=$_SESSION['user'];
  $data_ins['amount']=$_POST['amount'];
  if($_POST['amount']=="1"){
    $data_ins['ccoin']=100;
  }elseif($_POST['amount']=="5"){
    $data_ins['ccoin']=550;
  }elseif($_POST['amount']=="10"){
    $data_ins['ccoin']=1200;
  }elseif($_POST['amount']=="25"){
    $data_ins['ccoin']=3200;
  }elseif($_POST['amount']=="100"){
    $data_ins['ccoin']=13000;
  }else{
    $data_ins['ccoin']=floatval($_POST['amount'])*100;
  }
  $data_ins['date']=time();
  $data_ins['tx']=json_encode($_REQUEST);
  #if(strlen($data_ins['tx'])>200){
    $ins = $mysqli->_insert_db_data("transactions" , $data_ins) or die('Error DB');
    $select = $mysqli->update("users" , "balance_ccoin=balance_ccoin+".floatval($data_ins['ccoin'])."","id='".$result_mysqli->id."'") or die('Error DB');
  #}


//  1con=0.01TON



?>