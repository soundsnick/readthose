<?php 
	// Проверка на XML
	if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){
		// Проверка на пустые поля
		if($_POST['email'] == null || $_POST['username'] == null || $_POST['password'] == null){ echo 'error:empty_field'; exit;}
		// Проверки длины и формата
		if(strlen($_POST['email']) < 6){ echo 'error:short_email'; exit;}
		if(!preg_match("/[0-9a-z_\.\-]+@[0-9a-z_\.\-]+\.[a-z]{2,4}/i", $_POST['email'])){
			echo 'error:not_email';
			exit;
		}
		if(strlen($_POST['username']) < 4){ echo 'error:short_username'; exit;}
		if(!preg_match("/^[a-zA-Zа-яА-Я]+$/ui", $_POST['username'])){
			echo 'error:not_username';
			exit;
		}
		if(strlen($_POST['password']) < 6){ echo 'error:short_password'; exit;}
		$data = $_POST;
		$dataEmail = $data['email'];
		$dataUsername = $data['username'];
		$dataPassword = md5($data['password']);
		require_once('connect.php');
		// Проверка наличия почты в базе данных
		$checkEmailQuery = $mysqli->query("SELECT id FROM accounts WHERE email = '$dataEmail'");
		$checkEmail = $checkEmailQuery->num_rows;
		if($checkEmail > 0){ echo 'error:exist_email'; exit;}
		// Проверка наличия имени пользователя в базе данных
		$checkUsernameQuery = $mysqli->query("SELECT id FROM accounts WHERE username = '$dataUsername'");
		$checkUsername = $checkUsernameQuery->num_rows;
		if($checkUsername > 0){ echo 'error:exist_username'; exit;}
		$accesskey = md5(rand());
		// Регистрация пользователя
		$registerQuery = $mysqli->query("INSERT `accounts`(`id`,`username`,`email`,`password`,`avatar`,`accesskey`) VALUES(NULL, '$dataUsername','$dataEmail','$dataPassword','default.png','$accesskey')");
		if($registerQuery){
			session_start();
			$_SESSION['logged'] = $mysqli->insert_id;
			echo 'success';
		}
	}
	else header("Location: /404");