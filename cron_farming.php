<?php
  // этот крон будем запускать каждых 5минут, значит фарминг делим на 12 (60/5=12)
session_start();
  include "includes/init_db.php";
  $mysqli = new init_db;
  $rate_users=array();
  $select = $mysqli->select("users" , "id>0"," ORDER by id ASC") or die('Error DB');
  while ($result_mysql = $select->fetch_object()) {
      $rate_users[$result_mysql->id]=0;
      $n1 = $mysqli->select("users_nfts" , "user_id='".$result_mysql->id."'"," ORDER by id ASC") or die('Error DB');
      while ($r1 = $n1->fetch_object()) {
          $select2 = $mysqli->select("nft" , "id='".$r1->nft_id."'"," ORDER by id DESC") or die('Error DB');
          $nft = $select2->fetch_object();
          $rate_users[$result_mysql->id]=$rate_users[$result_mysql->id]+($nft->farming);
      }



      $bb1 = $mysqli->select("users_boosters" , "user_id='".$result_mysql->id."'"," ORDER by id ASC") or die('Error DB');
      while ($b1 = $bb1->fetch_object()) {
          $select2z = $mysqli->select("boosters" , "id='".$b1->booster_id."'"," ORDER by id DESC") or die('Error DB');
          $booster = $select2z->fetch_object();
          if($b1->date+$booster->duration_sec>time()){
            $rate_users[$result_mysql->id]=$rate_users[$result_mysql->id]*($booster->farming);            
          }else{
            $select2z = $mysqli->delete("users_boosters" , "id='".$b1->id."'") or die('Error DB');
          }
      }
  }

  foreach ($rate_users as $user_id => $add_crlep) {
    $add_crl=$add_crlep/12;
        $select = $mysqli->select("users" , "id='".$user_id."'"," ORDER by id DESC") or die('Error DB');
        $result_mysql = $select->fetch_object();
        $last_online=time()-intVal($result_mysql->last_online);
        if($last_online<14400){
          $select = $mysqli->update("users" , "balance_chrle=balance_chrle+".$add_crl."","id='".$user_id."'") or die('Error DB');
        }

  }
?>


