<?php include_once ROOT.'/views/header.php'; ?>


		<?php  foreach($newsList as $newsItem): ?>
	<div xmlns="http://www.w3.org/1999/html">

		  <h1><?php echo $newsItem['title']; ?></h1>
			<p><?php echo $newsItem['short_content'];?></p>
			<p><?php echo $newsItem['data'];?>
			<form method="post">
			<input type="hidden" name="<?php $newsItem['author_name']; ?>" />
			</p><a href="/search/" name="fa"><p><?php echo $newsItem['author_name'];  ?></a></p>
		<a href="№"><p>Like:</a><br>
		<div class="like" data-id="<?php echo $newsItem['id']; ?>">
		<p class="counter"></p>
		</div>
			<a href="/news/<?php echo $newsItem['id'];?>">Read More</a>
			</form>



		</div>
        <?php endforeach ?>


<?php include_once ROOT.'/views/footer.php'; ?>