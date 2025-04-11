<?php
	class Controller_Missions extends Controller
	{
		function action_index(){
			$data['time']=time();
			$this->view->generate('missions_view.php', 'template_view.php',$data);
		}
	}
?>