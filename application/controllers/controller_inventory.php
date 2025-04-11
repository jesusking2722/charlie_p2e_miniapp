<?php
	class Controller_Inventory extends Controller
	{
		function action_index(){
			$data['time']=time();
			$this->view->generate('inventory_view.php', 'template_view.php',$data);
		}
	}
?>