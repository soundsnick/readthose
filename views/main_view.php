<?php 
	if(!defined('ifInclude')) header('Location: /404');
?>
<main class="page">
	<div class="container">
		<div class="feed card">
			<div class="feed__recommended">
				<div class="owl-carousel">
					<?php
						$randomQuery = $mysqli->query("SELECT * FROM posts ORDER BY RAND() LIMIT 5");
						while($randomPost = $randomQuery->fetch_assoc()){
							publication($randomPost, true);
						}
					?>
				</div>
			</div>
		</div>
	</div>
</main>
<script>
	$('.owl-carousel').owlCarousel({
		items: 3,
		dots: true,
		margin: 60
	});
</script>
