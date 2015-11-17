<?php include_once ROOT.'/views/header.php'; ?>
<script type="text/javascript">
    window.onload = function()
    {
        window.scrollTo( 0, 550 );
    }
</script>

<div class="full_content">

    <h1><?php echo $newsItem['title']; ?></h1>
    
    
    <div class="big_content">
    	<p style="font-size: 14px"><?php echo $newsItem['content'];?></p>
    </div>
    <div class="content_data">
    	<p><?php echo $newsItem['date'];?></p>
    </div>
    <div class="author_name">
    	<p><?php echo $newsItem['author_name'];?></p>
    </div>
    <div class="likes">
    	<a href="#"><img src="../../template/images/like.png"></a><p><?php echo $newsItem['likes']; ?></p>
    </div>
    <div class="read_more_but">
    	<a href="/myposts/">Back to My</a>
    </div>
    



</div>



<?php include_once ROOT.'/views/footer.php'; ?>
