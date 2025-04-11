<?php
	class Controller_Lang extends Controller
	{
		function action_set(){
			if(isset($_GET['lang'])){
				$_SESSION['lang']=$_GET['lang'];
			}
			header("location: /");
		}
	}
?>