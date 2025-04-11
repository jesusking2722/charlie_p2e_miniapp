<?php
session_start();
  include "includes/init_db.php";
  $mysqli = new init_db;

  // $imgs = ['1721', '1929', '2422', '3009', '3552', '3711', '3825', '4252', '5011', '5384', '5900', '6130',
  //  '6355', '6770', '7124', '7954', '8315', '9699'];
  // foreach ($imgs as $key => $value) {
  //   $data_ins['name']="Legendary #".(39 + $key);
  //   $data_ins['price']=200;
  //   $data_ins['price_chrlep']=360000;
  //   $data_ins['img']='/assets/LEGENDARY/'.$value.'.png';
  //   $data_ins['level']='Legendary';
  //   $data_ins['farming']= 650;
  //   $ins = $mysqli->_insert_db_data("nft" , $data_ins) or die('Error DB');
      
  // }

if(isset($_SESSION['user'])){
    $select_user_data = $mysqli->select("users" , "login='".$_POST['user_id']."'"," ORDER by id DESC") or die('Error DB');
    $result_mysqli = $select_user_data->fetch_object();
    if($result_mysqli->id>0){
        $_SESSION['user']=$result_mysqli->id;
        $select = $mysqli->update("users" , "username='".$_POST['user_username']."'","id='".$result_mysqli->id."'") or die('Error DB');
    }
  
   echo "0";
}else{
  $select_user_data = $mysqli->select("users" , "login='".$_POST['user_id']."'"," ORDER by id DESC") or die('Error DB');
  $result_mysqli = $select_user_data->fetch_object();       
  if($result_mysqli->id>0){
    $_SESSION['user']=$result_mysqli->id;
    $select = $mysqli->update("users" , "username='".$_POST['user_username']."'","id='".$result_mysqli->id."'") or die('Error DB');
  }else{
    $data_ins['login']=$_POST['user_id'];
    $data_ins['name']=$_POST['name'];
    $data_ins['surname']=$_POST['surname'];
    $data_ins['nickname']=$_POST['nickname'];
    $data_ins['username']=$_POST['user_username'];
    $data_ins['photo_url']=$_POST['photo_url'];
    $data_ins['date']=time();
    $data_ins['last_online']=time();
      if(isset($_SESSION['ref_id'])){
          $ref=$_SESSION['ref_id'];
      }else{
          $ref='1';
      }
    $ins = $mysqli->_insert_db_data("users" , $data_ins) or die('Error DB');
    $_SESSION['user']=$mysqli->last_insert_id();

      $select_user_ref = $mysqli->select("refferals" , "user_id='".$_POST['user_id']."'"," ORDER by id DESC") or die('Error DB');
      $result_ref = $select_user_ref->fetch_object();      
      if($result_ref->id>0){
        $no_action=1;
      }else{
        $data_ref["user_id"]=$_POST['user_id'];
        $data_ref["parrent_id"]=$ref;
        $data_ref["date"]=time();
        $inse = $mysqli->_insert_db_data("refferals" , $data_ref) or die('Error DB');


         $sel = $mysqli->select("users" , "login='".$ref."'"," ORDER by id DESC") or die('Error DB');
         $resu = $sel->fetch_object();       


         $bal=$resu->balance_points+500;
         $selectz = $mysqli->update("users" , "balance_points='".$bal."'","id='".$resu->id."'") or die('Error DB');
      }    
  }


  
  
  echo "1";
}
?>