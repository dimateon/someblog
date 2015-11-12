<?php include_once ROOT.'/views/header.php'; ?>


		<?php  foreach($newsList as $newsItem): ?>
	<div class="short_content">
		<div xmlns="http://www.w3.org/1999/html">
		
		  <h1><?php echo $newsItem['title']; ?></h1>
<<<<<<< HEAD
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



=======
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
					<a href="#"><img src="../../template/images/like.png"></a><p>21</p>
				</div>
>>>>>>> 7951aabb3b7b5ba945cbf9b3cdfd0f66bbd01da5
		</div>
	</div>
        <?php endforeach ?>

<<<<<<< HEAD

<?php include_once ROOT.'/views/footer.php'; ?>
=======
<?php include_once ROOT.'/views/footer.php'; ?>
>>>>>>> 7951aabb3b7b5ba945cbf9b3cdfd0f66bbd01da5
