<?php include_once ROOT.'/views/header.php'; ?>

		<?php  foreach($newsList as $newsItem): ?>
		<div>

		  <h1><?php echo $newsItem['title']; ?></h1>
			<p><?php echo $newsItem['short_content'];?></p>
			<p><?php echo $newsItem['data'];?></p><a href="/news/<?php  ?>"><p><?php echo $newsItem['author_name'];?></p></a>
			<a href="/news/<?php echo $newsItem['id'];?>">Read More</a>



		</div>
        <?php endforeach ?>

<?php include_once ROOT.'/views/footer.php'; ?>