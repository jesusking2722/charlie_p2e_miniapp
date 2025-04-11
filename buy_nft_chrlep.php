<?php
session_start();
  include "includes/init_db.php";
  $mysqli = new init_db;
  

  $select = $mysqli->select("users_nfts" , "user_id='".$_SESSION['user']."' AND nft_id='".$_REQUEST['id']."'"," ORDER by id DESC") or die('Error DB');
  $result_mysql = $select->fetch_object();
  if($result_mysql->id){
    echo '';
  }else{
    $select1 = $mysqli->select("users" , "id='".$_SESSION['user']."'"," ORDER by id DESC") or die('Error DB');
    $user = $select1->fetch_object();

    $select2 = $mysqli->select("nft" , "id='".$_REQUEST['id']."'"," ORDER by id DESC") or die('Error DB');
    $nft = $select2->fetch_object();

    if(floatval($user->balance_chrle)>=floatval($nft->price_chrlep)){
                //дарим 500 если первый буст куплен
          $select = $mysqli->select("users_nfts" , "user_id='".$_SESSION['user']."'"," ORDER by id DESC") or die('Error DB');
          $result_mysql = $select->fetch_object();
          if(!$result_mysql){
            $select = $mysqli->update("users" , "task8=1","id='".$_SESSION['user']."'") or die('Error DB');
            $select = $mysqli->update("users" , "balance_chrle=balance_chrle+500","id='".$_SESSION['user']."'") or die('Error DB');
          }
    
      $select_user_data = $mysqli->select("users_nfts" , "user_id='".$_SESSION['user']."'"," ORDER by id DESC LIMIT 1") or die('Error DB');
      $result_mysqli = $select_user_data->fetch_object();       
      if($result_mysqli->date!=date("d/m/Y",time())){
        $select = $mysqli->update("users" , "task9=1","id='".$_SESSION['user']."'") or die('Error DB');
        $select = $mysqli->update("users" , "balance_chrle=balance_chrle+1000","id='".$_SESSION['user']."'") or die('Error DB');
      }
      
        $wal=floatval($user->balance_chrle)-floatval($nft->price_chrlep);
        $select = $mysqli->update("users" , "balance_chrle=".$wal."","id='".$_SESSION['user']."'") or die('Error DB');
        $data_ins['user_id']=$_SESSION['user'];
        $data_ins['nft_id']=$_REQUEST['id'];
        $data_ins['date']=date('d/m/Y',time());
        $ins = $mysqli->_insert_db_data("users_nfts" , $data_ins) or die('Error DB'); 


      echo 1;
    }else{
      echo 0;
    }
  }
?>