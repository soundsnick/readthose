<?php 
	// Проверка на XML
	if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){
		// Проверка на пустые поля
		if($_POST['email'] == null || $_POST['password'] == null){ echo 'error:empty_field'; exit;}
		$data = $_POST;
		$dataEmail = $data['email'];
		$dataPassword = md5($data['password']);
		require_once('connect.php');
		// Проверка наличия почты в базе данных
		$checkEmailQuery = $mysqli->query("SELECT * FROM accounts WHERE email = '$dataEmail'");
		$checkEmailRows = $checkEmailQuery->num_rows;
		if($checkEmailRows == 0){ echo 'error:false_email'; exit;}
		// Авторизация
		$checkEmail = $checkEmailQuery->fetch_assoc();
		if($dataPassword == $checkEmail['password']){
			session_start();
			$_SESSION['logged'] = $checkEmail['id'];
			echo 'success';
		}
		else echo 'error:false_password';
	}
	else header("Location: /404");