<?php 
	if(!defined('ifInclude')) header('Location: /404');
	if(!isset($action)) header('Location: /404');
	$postId = explode('publicationId=', $action)[1];
	$query = $mysqli->query("SELECT * FROM posts WHERE id = '$postId'");
	if($query->num_rows == 0) header("Location: /404");
	$post = $query->fetch_assoc();
	$authorId = $post['author_id'];
	$authorQuery = $mysqli->query("SELECT * FROM accounts WHERE id = '$authorId'");
	$author = $authorQuery->fetch_assoc();
	$querySubscribers = $mysqli->query("SELECT id FROM subscribes WHERE to_id = '$authorId'");
	$subscribers = $querySubscribers->num_rows;
	$subscribersText = 'читателей';
	switch ($subscribers) {
		case 1:
			$subscribersText = 'читатель';
			break;
		
		case 2:
			$subscribersText = 'читателя';
			break;
	}
?>
<main class="page">
	<div class="container">
		<div class="flex-layout">
			<div class="col-3">
				<div class="card">
					<div class="publication-img--wrapper">
						<img src="/img/posts/<?=$post['img']?>" alt="<?=$post['title']?> обложка" class="publication-img">
					</div>
					<div class="publication-author flex">
						<div class="publication-author__img--wrapper">
							<img src="/img/profiles/<?=$author['avatar']?>" alt="" class="publication-author__img">
						</div>
						<div class="publication-author__data">
							<h3 class="publication-author__name"><?=$author['username']?></h3>
							<p class="publication-author__subscribers"><?=$subscribers.' '.$subscribersText?></p>
						</div>
					</div>
				</div>
				<aside class="card sidebar">
					<nav class="sidebar__control">
						<?php if(logged()):?>
						<a href="/" class="sidebar__control--link">Назад</a>
						<a href="/logout" class="sidebar__control--link">Выйти</a>
						<?php endif;
						if(!logged()):?>
						<a href="/" class="sidebar__control--link">Назад</a>
						<?php endif;?>
					</nav>
				</aside>
			</div>
			<div class="col">
				<div class="card publication">
					<h3 class="publication__title"><?=$post['title']?></h3>
					<span class="publication__type">Описание:</span>
					<p class="publication__description"><?=$post['description']?></p>
					<span class="publication__type">Контент:</span>
					<pre class="publication__content"><?=$post['content']?></pre>
				</div>
			</div>
		</div>
	</div>
</main>