<?php if(logged()) header("Location: /");?>
<div class="page">
	<section class="section--login animated fadeInUp">
		<div class="container">
			<div class="login__text-block">
				<h1 class="login__title">Мы скучали</h1>
				<p class="login__description">Любовные романы, научная фантастика, фанфики и так далее. Ваш выбор не ограничен.</p>
			</div>
			<form id="loginForm" class="login__form">
				<div class="form__responser"></div>
				<input name="email" type="text" class="login__field" placeholder="Электронная почта">
				<input name="password" type="password" class="login__field" placeholder="Пароль">
				<div class="login__buttons">
					<input id="loginButton" type="button" class="login__button btn-big btn-primary" value="Войти">
					<a href="/register" class="link link-sublink">Зарегистрироваться</a>
				</div>
			</form>
		</div>
	</section>
</div>
<script>
	$('#loginButton').click(function(){
		$.ajax({
			url: 'modules/module_login.php',
			data: $('#loginForm').serialize(),
			type: 'POST',
			success: function(response){
				let responseText;
				console.log(response);
				switch(response){
					case 'error:empty_field':
						responseText = 'Заполните все поля';
						break;
					case 'error:false_email':
						responseText = 'Пользователь с данной электронной почтой не зарегистрирован';
						break;
					case 'error:false_password':
						responseText = 'Неправильный пароль';
						break;
					case 'success':
						responseText = 'Добро пожаловать';
						break;
				}
				let responseType = 'error';
				if(response == 'success') responseType = 'success';
				$('.form__responser').css('height','80px');
				$('.form__responser').html('<span class="form__response ' + responseType + ' animated fadeInDown">' + responseText + '</span>');
				if(response == 'success') location.href = '/';
			}
		});
	});
</script>