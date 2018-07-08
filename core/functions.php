<?php 
	if(!defined('ifInclude')) header('Location: /404');
	else{
		session_start();
		function logged(){
			// Проверка авторизации пользователя
			if(isset($_SESSION['logged']) && $_SESSION['logged'] != null){
				return true;
			}
			else {
				return false;
			}
		}
		function user(){
			if(logged()){
				// Возвращаем массив с данными пользователя из базы данных
				global $mysqli;
				$userId = $_SESSION['logged'];
				$userQuery = $mysqli->query("SELECT * FROM accounts WHERE id = '$userId'");
				return $userQuery->fetch_assoc();
			}
			else return false;
		}
		// Объявляем переменную которую будем вызывать для получения данных пользователя
		$user = user();
	}
?>