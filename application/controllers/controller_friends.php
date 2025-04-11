<?php
	class Controller_Friends extends Controller
	{
		function action_index(){
			$data['time']=time();
			$this->view->generate('friends_view.php', 'template_view.php',$data);
		}
	}
?>