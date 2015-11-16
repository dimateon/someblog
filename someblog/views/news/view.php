<?php include_once ROOT.'/views/header.php'; ?>
<script type="text/javascript">
    window.onload = function()
    {
        window.scrollTo( 0, 550 );
    }
</script>
<div style="font-size: 14px">

    <h1 style="font-size: 14px"><?php echo $newsItem['title']; ?></h1>
    
    <p style="font-size: 14px"><?php echo $newsItem['date'];?></p><p style="font-size: 14px"><?php echo $newsItem['author_name'];?></p>
    <p style="font-size: 14px"><?php echo $newsItem['content'];?></p>
    <p style="font-size: 14px"> <?php echo $newsItem['likes']; ?></p>
    <a href="/news/">Back to Blog</a>



</div>



<?php include_once ROOT.'/views/footer.php'; ?>
