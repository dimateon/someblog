<?php include_once ROOT.'/views/header.php'; ?>


<?php  foreach($newsList as $newsItem): ?>
    <div class="short_content">
        <div xmlns="http://www.w3.org/1999/html">

            <h1><?php echo $newsItem['title']; ?></h1>




            <div class="some_content">
                <p><?php echo $newsItem['short_content'];?></p>
            </div>
            <div class="content_data">
                <p><?php echo $newsItem['date'];?></p>
            </div>
            <div class="author_name">
                <a href="/search/<?php echo $newsItem['author_name'];  ?>"  name="fa"><p><?php echo $newsItem['author_name'];  ?></p></a>
            </div>
            <div class="read_more_but">
                <a href="/favorite/<?php echo $newsItem['id'];?>">Read more</a>
            </div>
            <div class="likes">
                <a href="javascript://" class="like"  data-id="<?php echo $newsItem['id'];?>">
                    <img src="../../template/images/like.png">
                </a>
                <p id="res_<?php echo $newsItem['id'];?>" data-id="<?php echo $newsItem['id'];?>" >
                    <?php echo $newsItem['likes'];?>
                </p>
            </div>
            <a href="javascript://" class="favorite" id="favorite_<?php echo $newsItem['id'];?>" data-id="<?php echo $newsItem['id'];?>">
                addToFavorite
            </a>


        </div>
    </div>
<?php endforeach ?>
<!-- Навигация -->
<?php echo $pagination->get(); ?>



<?php include_once ROOT.'/views/footer.php'; ?>

