 <?php
	class Model{

		public static function get_text($key){
			$lang='eng';
			if(isset($_SESSION['lang'])){
				$lang=$_SESSION['lang'];
			}
			include 'lang/'.$lang.".php";
			#print_r($rez_text);exit();
			return $rez_text[$key];
		}
		public static function get_user_info($id = "" ){
			if(!$id){ $id = $_SESSION['user']; }
  			$mysqli = new init_db;
  			$select = $mysqli->select("users" , "id='".$id."'"," ORDER by id DESC") or die('Error DB');
  			$result = $select->fetch_object();
  			return $result;
		}
		public static function count_ref($id = "" ){
			if(!$id){ $id = $_SESSION['user']; }
  			$mysqli = new init_db;

  			$select_us = $mysqli->select("users" , "id='".$id."'"," ORDER by id DESC") or die('Error DB');
  			$result_us = $select_us->fetch_object();

  			$colunt=0;
  			$select = $mysqli->select("refferals" , "parrent_id='".$result_us->login."'"," ORDER by id DESC") or die('Error DB');
  			while ($result_mysql = $select->fetch_object()) {
				$colunt++;
			}
  			return $colunt;
		}
		public static function get_user_boosters(){
  			$mysqli = new init_db;
  			$colunt=array();
  			$select = $mysqli->select("users_boosters" , "user_id='".$_SESSION['user']."'"," ORDER by id DESC") or die('Error DB');
  			while ($result_mysql = $select->fetch_object()) {
				$colunt[]=$result_mysql;
			}
  			return $colunt;
		}
		public static function get_user_nfts(){
  			$mysqli = new init_db;
  			$colunt=array();
  			$select = $mysqli->select("users_nfts" , "user_id='".$_SESSION['user']."'"," ORDER by id DESC") or die('Error DB');
  			while ($result_mysql = $select->fetch_object()) {
				$colunt[]=$result_mysql;
			}
  			return $colunt;
		}
		public static function get_all_ntf(){
  			$mysqli = new init_db;
  			$colunt=array();
  			$select = $mysqli->select("nft" , "id>0"," ORDER by id ASC") or die('Error DB');
			$count1 = [];
			$count2 = [];
			$count3 = [];
			$count4 = [];

  			while ($result_mysql = $select->fetch_object()) {
				if($result_mysql->level == 'Common') {
					$count1[]=$result_mysql;
				}
				else if($result_mysql->level == 'Rare')
					$count2[]=$result_mysql;
				else if($result_mysql->level == 'Epic')
					$count3[]=$result_mysql;
				else $count4[]=$result_mysql;
			}
			// return $count1;
			return array_merge($count1, $count2, $count3, $count4);
		}
		public static function get_all_boosters(){
  			$mysqli = new init_db;
  			$colunt=array();
  			$select = $mysqli->select("boosters" , "id>0"," ORDER by id ASC") or die('Error DB');
  			while ($result_mysql = $select->fetch_object()) {
				$colunt[]=$result_mysql;
			}
			return $colunt;
		}
		public static function update_online(){
  			$mysqli = new init_db;
  			$colunt=array();

  			$select = $mysqli->select("users" , "id='".$_SESSION['user']."'"," ORDER by id DESC") or die('Error DB');
  			$result_mysql = $select->fetch_object();
  			$last_online=time()-intVal($result_mysql->last_online);
  			$select = $mysqli->update("users" , "last_online='".time()."'","id='".$_SESSION['user']."'") or die('Error DB');
			return $last_online;
		}
		public static function get_profit_online($sec){
  			$mysqli = new init_db;
  			$colunt=array();
  			if($sec>14400){
  				$sec=14400;
  			}
  			$coef=$sec/3600;


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
		      $rate_users=$rate_users*$coef;

			return $rate_users;
		}
		public static function get_ntf_by_id($id){
  			$mysqli = new init_db;
  			$colunt=array();
  			$select = $mysqli->select("nft" , "id='".$id."'"," ORDER by id DESC") or die('Error DB');
  			$result_mysql = $select->fetch_object();
			return $result_mysql;
		}
		public static function get_img_ntf_by_id($id){
  			$mysqli = new init_db;
  			$colunt=array();
  			$select = $mysqli->select("nft" , "id='".$id."'"," ORDER by id DESC") or die('Error DB');
  			$result_mysql = $select->fetch_object();
			return $result_mysql->img;
		}
		public static function get_img_booster_by_id($id){
  			$mysqli = new init_db;
  			$colunt=array();
  			$select = $mysqli->select("boosters" , "id='".$id."'"," ORDER by id DESC") or die('Error DB');
  			$result_mysql = $select->fetch_object();
			return $result_mysql->img;
		}
		public static function check_booster_user_id($id){
  			$mysqli = new init_db;
  			$colunt=array();
  			$select = $mysqli->select("users_boosters" , "booster_id='".$id."' AND user_id='".$_SESSION['user']."'"," ORDER by id DESC") or die('Error DB');
  			$result_mysql = $select->fetch_object();
  			if($result_mysql->id){ 
  				return 1;
  			}else{
				return 0;
  			}
		}
		public static function check_nft_user_id($id){
  			$mysqli = new init_db;
  			$colunt=array();
  			$select = $mysqli->select("users_nfts" , "nft_id='".$id."' AND user_id='".$_SESSION['user']."'"," ORDER by id DESC") or die('Error DB');
  			$result_mysql = $select->fetch_object();
  			if($result_mysql->id){ 
  				return 1;
  			}else{
				return 0;
  			}
		}
		public static function get_booster_by_id($id){
  			$mysqli = new init_db;
  			$colunt=array();
  			$select = $mysqli->select("boosters" , "id='".$id."'"," ORDER by id DESC") or die('Error DB');
  			$result_mysql = $select->fetch_object();
			return $result_mysql;
		}
		public static function get_my_ref($id = "" ){
			if(!$id){ $id = $_SESSION['user']; }
  			$mysqli = new init_db;
  			$select_us = $mysqli->select("users" , "id='".$id."'"," ORDER by id DESC") or die('Error DB');
  			$result_us = $select_us->fetch_object();

  			$colunt=0;
  			$select = $mysqli->select("refferals" , "parrent_id='".$result_us->login."'"," ORDER by id DESC") or die('Error DB');
			
  			$result = array();
			while ($result_mysql = $select->fetch_object()) {
  			$res_temp=array();
  				$select_usz = $mysqli->select("users" , "login='".$result_mysql->user_id."'"," ORDER by id DESC") or die('Error DB');
	  			$result_usz = $select_usz->fetch_object();
	  			$res_temp['id']=$result_usz->id;
	  			if($result_usz->nickname){
	  				$res_temp['name']=$result_usz->name." ".$result_usz->surname;	  				
	  			}else{
	  				$res_temp['name']=$result_usz->name." ".$result_usz->surname;	  				
	  			}
	  			$res_temp['avatar']=$result_usz->photo_url;
	  			$res_temp['balance_chrle']=$result_usz->balance_chrle;
				$result[]=$res_temp;
			}
  			return $result;
		}

		public static function get_user_by_ranking(){
			$mysqli = new init_db;
			$colunt=array();
			$select = $mysqli->select("users" , "id>0"," ORDER by balance_chrle DESC LIMIT 100") or die('Error DB');
			while ($result_mysql = $select->fetch_object()) {
				$colunt[]=$result_mysql;
			}
			return $colunt;
		}
	}
    