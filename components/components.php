<?php 
	function publication($post, $owl){
		$notOwl = '';
		if(!$owl) $notOwl = 'single';
		$tags = '';
		$tagsArray = explode(',', $post['tags']);
		$postId = $post['id'];
		$authorId = $post['author_id'];
		global $mysqli;
		$authorQuery = $mysqli->query("SELECT * FROM accounts WHERE id = '$authorId'");
		$author = $authorQuery->fetch_assoc();
		$ratingQuery = $mysqli->query("SELECT SUM(rate), COUNT(*) FROM rating WHERE post_id = '$postId'")->fetch_assoc();
		if($ratingQuery['COUNT(*)'] != 0){
			$rating = $ratingQuery['SUM(rate)']/$ratingQuery['COUNT(*)'];
			round($rating, 1);
		}
		else $rating = 0;
		if($tagsArray[0] != null){
			for ($i=0; $i < count($tagsArray); $i++) { 
				if($tags != '') $tags .= ', ';
				$tags .= '<a href="/tag/'.$tagsArray[$i].'"><div class="post__tag">'.$tagsArray[$i].'</div></a>';
			}
		}
		echo 
		'<div class="post post-recommended '.$notOwl.'">
			<div class="post__flex">
				<div class="col-auto">
					<img src="/img/posts/'.$post['img'].'" class="post__img">
				</div>
				<div class="col post__content">
					<div class="post__text">
						<a href="/publication/'.$post['title'].'&publicationId='.$post['id'].'"><h6 class="post__title">'.$post['title'].'</h6></a>
						<a href="/author/'.$author['username'].'&authorId='.$author['id'].'"><span class="post__author">'.$author['username'].'</span></a>
						<span class="post__rating"><i class="fa fa-star rating-star"></i>'.$rating.'</span>
						<a href="/publication/'.$post['title'].'&publicationId='.$post['id'].'" class="post__button">Читать</a>
					</div>
				</div>
			</div>
			<div class="post__description--wrapper">
				<span class="post__description--title">Описание:</span>
				<p class="post__description">'.$post['description'].'</p>
				<div class="post__tags">Тэги: '.$tags.'</div>
			</div>
		</div>';
	}
 ?>