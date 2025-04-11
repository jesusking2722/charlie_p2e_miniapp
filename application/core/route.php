<?php
	class Route
	{
		static function start()
		{

			// $message =   "test";
		    //   $headers  =   'MIME-Version: 1.0' . "\r\n";
		    //   $headers   .= 'Content-type: text/html; 
		    //               charset=iso-8859-1' . "\r\n";
		    //   $headers .= 
		    //         'From: <info@betspacemonkey.com>' . "\r\n";
		    //  mail("iboyour@gmail.com", "Проверка", $message, $headers);
			// контроллер и действие по умолчанию
			$controller_name = 'Main';
			$action_name = 'index';
			
			$routes = explode('/', $_SERVER['REQUEST_URI']);

			// получаем имя контроллера
			if ( !empty($routes[1]) )
			{	
				$controller_name = $routes[1];

			}
			if(explode('part1100',$controller_name)[0]==""){
				$controller_name="Main";
        		$_SESSION['partner_id']=$_GET['id'];
        		setcookie("partner_id", $_GET['id'], (time() + (3600*24*70)) , '/');
        		setcookie("url_id", $_GET['uniq'], (time() + (3600*24*70)) , '/');
        		setcookie("trafget", http_build_query($_GET), (time() + (3600*24*70)) , '/');
			}else{
			// получаем имя экшена
				if ( !empty($routes[2]) )
				{
					$action_name = $routes[2];
				}
			}
			if(!isset($_SESSION['partner_id'])){
				$_SESSION['partner_id']="1";
			}
			// добавляем префиксы
			$model_name = 'Model_'.$controller_name;
			$controller_name = 'Controller_'.$controller_name;
			$action_name = 'action_'.$action_name;

			// подцепляем файл с классом модели (файла модели может и не быть)

			$model_file = strtolower($model_name).'.php';
			$model_path = "application/models/".$model_file;
			if(file_exists($model_path))
			{
				include "application/models/".$model_file;
			}

			// подцепляем файл с классом контроллера
			$controller_file = strtolower($controller_name).'.php';
			$controller_path = "application/controllers/".$controller_file;
			if(file_exists($controller_path))
			{
				include "application/controllers/".$controller_file;
			}
			else
			{
				/*
				правильно было бы кинуть здесь исключение,
				но для упрощения сразу сделаем редирект на страницу 404
				*/
				Route::ErrorPage404();
			}
			
			// создаем контроллер
			$controller = new $controller_name;
			$action = $action_name;
			if(method_exists($controller, $action))
			{
				// вызываем действие контроллера
				$controller->$action();
			}
			else
			{
				// здесь также разумнее было бы кинуть исключение
				Route::ErrorPage404();
			}
		}
		
		function ErrorPage404()
		{
	        $host = 'https://'.$_SERVER['HTTP_HOST'].'/';
	        header('HTTP/1.1 404 Not Found');
			header("Status: 404 Not Found");
			header('Location:'.$host.'404');
	    }
	}
?>