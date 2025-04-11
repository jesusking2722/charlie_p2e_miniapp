<?php
	class Controller_Marketplace extends Controller
	{
		function action_index(){
			$data['time']=time();
			$this->view->generate('marketplace_view.php', 'template_view.php',$data);
		}
	}
?>