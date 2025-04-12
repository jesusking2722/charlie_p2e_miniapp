<?php
session_start();
// if($_GET['s']=="1"){
//   $_SESSION['user']="82";
// }
  include "includes/init_db.php";
  $mysqli = new init_db;
      $rate_users=0;
      $n1 = $mysqli->select("users_nfts" , "user_id='".$_SESSION['user']."'"," ORDER by id ASC") or die('Error DB');
      while ($r1 = $n1->fetch_object()) {
          $select2 = $mysqli->select("nft" , "id='".$r1->nft_id."'"," ORDER by id DESC") or die('Error DB');
          $nft = $select2->fetch_object();
          $rate_users=$rate_users+$nft->farming;
      }
      $n1 = $mysqli->select("users_boosters" , "user_id='".$_SESSION['user']."'"," ORDER by id ASC") or die('Error DB');
      while ($r1 = $n1->fetch_object()) {
          $select2 = $mysqli->select("boosters" , "id='".$r1->booster_id."'"," ORDER by id DESC") or die('Error DB');
          $boost = $select2->fetch_object();
          $rate_users=$rate_users*$boost->farming;
      }
      echo $rate_users;



?>