<?php 
	if(!defined('ifInclude')) header('Location: /404');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title><?=$viewTitle?></title>
	<link rel="stylesheet" href="/assets/css/font-awesome.min.css">
	<link rel="stylesheet" href="/assets/css/fonts.css">
	<link rel="stylesheet" href="/assets/css/bootstrap.reset.css">
	<link rel="stylesheet" href="/assets/css/animate.css">
	<link rel="stylesheet" href="/assets/css/main.css">
	<link rel="stylesheet" href="/assets/css/owl.carousel.min.css">
	<link rel="stylesheet" href="/assets/css/owl.theme.default.min.css">
	<script src="/assets/js/jquery-3.2.1.min.js"></script>
	<script src="/assets/js/owl.carousel.min.js"></script>
	<script src="/assets/js/common.js"></script>
</head>
<body>
	<header class="header">
		<div class="container">
			<div class="row">
				<div class="col">
					<nav class="header__menu">
						<a href="" class="header__menu--item">Лента</a>
						<a href="" class="header__menu--item">Чарт</a>
						<a href="" class="header__menu--item">Новинки</a>
						<a href="" class="header__menu--item">Помощь</a>
					</nav>
				</div>
				<div class="col-auto">
					<a href="/"><h3 class="header__logo"><?=$project['name']?></h3></a>
				</div>
				<div class="col">
					<nav class="header__navigation">
						<?php if(!logged()): ?>
						<a href="/login" class="header__navigation--item btn btn-primary">Войти</a>
						<?php endif;
							  if(logged()):?>
						<a href="" class="header__navigation--item btn btn-primary">Создать</a>
						<div class="header__avatar--wrapper">
							<img src="/img/profiles/<?=$user['avatar']?>" alt="<?=$user['username']?> avatar" class="header__avatar">
						</div>
						<?php endif; ?>
					</nav>
				</div>
			</div>
		</div>
	</header>
	<app class="application">
		<?php require_once('views/'.$view.'_view.php');?>
		<footer class="footer">
			<div class="container flex">
				<nav class="footer__navigation">
					<a href="/about" class="footer__navigation--item">О нас</a>
					<a href="/support" class="footer__navigation--item">Помощь</a>
					<a href="/terms" class="footer__navigation--item">Условия использования</a>
				</nav>
				<span class="footer__copyright">© 2018 <?=$project['name']?></span>
			</div>
		</footer>
	</app>
</body>
</html>