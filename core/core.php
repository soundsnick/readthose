<?php 
	$url = explode('/', $_SERVER['REQUEST_URI']);
	$view = 'main';
	if(!logged()) $view = 'main-unlogin';
	if(isset($url[1]) && $url[1] != null){
		if(file_exists('views/'.$url[1].'_view.php')) $view = $url[1];
		else header("Location: /404");
	}
	$viewTitles = array(
		'404' => 'Такой страницы нет',
		'login' => 'Мы скучали',
		'register' => 'Добро пожаловать'
	);
	$viewTitle = $project['name'];
	if(isset($viewTitles[$view])){
		$viewTitle = $viewTitles[$view].' | '.$project['name'];
	}
	if(isset($url[2]) && $url[2] != null){
		$action = $url[2];
	}
	require_once('views/template_view.php');
 ?>