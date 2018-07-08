<?php if(logged()) header("Location: /");?>
<div class="page">
	<section class="section--login animated fadeInUp">
		<div class="container">
			<div class="login__text-block">
				<h1 class="login__title">Добро пожаловать</h1>
				<p class="login__description">Ваша будущая аудитория ожидает ваш звездный час. Напишите шедевр и станьте любимым писателем тысяч.</p>
			</div>
			<form id="registerForm" class="login__form">
				<div class="form__responser"></div>
				<input name="email" type="text" class="login__field" placeholder="Электронная почта">
				<input name="username" type="text" class="login__field" placeholder="Имя пользователя">
				<input name="password" type="password" class="login__field" placeholder="Пароль">
				<div class="login__buttons">
					<input id="registerButton" type="button" class="login__button btn-big btn-primary" value="Зарегистрироваться">
					<a href="#" onclick="animatedLink('.section--login', 'fadeInUp', 'slideOutDown', '/login')" class="link link-sublink">Войти</a>
				</div>
			</form>
		</div>
	</section>
</div>
<script>
	$('#registerButton').click(function(){
		$.ajax({
			url: 'modules/module_register.php',
			data: $('#registerForm').serialize(),
			type: 'POST',
			success: function(response){
				let responseText;
				switch(response){
					case 'error:empty_field':
						responseText = 'Заполните все поля';
						break;
					case 'error:exist_email':
						responseText = 'Пользователь с данной электронной почтой зарегистрирован';
						break;
					case 'error:exist_username':
						responseText = 'Пользователь с данным именем пользователя зарегистрирован';
						break;
					case 'error:not_email':
						responseText = 'Введите правильную электронную почту';
						break;
					case 'error:short_email':
						responseText = 'Введите правильную электронную почту';
						break;
					case 'error:short_username':
						responseText = 'Слишком короткое имя пользователя';
						break;
					case 'error:short_password':
						responseText = 'Пароль должен состоять минимум 6 символов';
						break;
					case 'error:not_username':
						responseText = 'Введите правильное имя пользователя';
						break;
					case 'success':
						responseText = 'Добро пожаловать';
						break;
				}
				let responseType = 'error';
				if(response == 'success') responseType = 'success';
				$('.form__responser').css('height','60px');
				$('.form__responser').html('<span class="form__response ' + responseType + ' animated fadeInDown">' + responseText + '</span>');
				if(response == 'success') location.href = '/';
			}
		});
	});
</script>