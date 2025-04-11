<?php
	class Controller_Global extends Controller
	{
		function action_index(){
			$data['time']=time();
			$this->view->generate('global_view.php', 'template_view.php',$data);
		}
	}
?>