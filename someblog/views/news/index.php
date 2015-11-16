<?php include_once ROOT.'/views/header.php'; ?>


		<?php  foreach($newsList as $newsItem): ?>
	<div class="short_content">
		<div xmlns="http://www.w3.org/1999/html">
		
		  <h1><?php echo $newsItem['title']; ?></h1>




		  		<div class="some_content">
					<p><?php echo $newsItem['short_content'];?></p>
				</div>
				<div class="content_data">
					<p><?php echo $newsItem['data'];?></p>
				</div>
				<div class="author_name">
					<a href="/search/" name="fa"><p><?php echo $newsItem['author_name'];  ?></p></a>
				</div>
				<div class="read_more_but">
					<a href="/news/<?php echo $newsItem['id'];?>">Read more</a>
				</div>
				<div class="likes">
					<a href="#"><img src="../../template/images/like.png"></a><p><?php echo $newsItem['likes'];?></p>
				</div>

		</div>
	</div>
        <?php endforeach ?>



<?php include_once ROOT.'/views/footer.php'; ?>

