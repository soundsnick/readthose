<?php 
	if(!isset($action)) header("Location: /404");
	$tag = $action;
 ?>
<main class="page">
	<div class="container">
		<div class="flex-layout">
			<div class="col-3"></div>
			<div class="col">
				<div class="request-response--wrapper">
					<span class="request-response">Все публикации с тэгом <b>"<?=$tag?>"</b></span>
				</div>
				<div class="tag-responses">
					<?php 
						$tagPostQuery = $mysqli->query("SELECT * FROM posts WHERE tags LIKE '%$tag%'");
						while($tagPost = $tagPostQuery->fetch_assoc()){
							publication($tagPost, false);
						}
					 ?>
				</div>
			</div>
		</div>
	</div>
</main>