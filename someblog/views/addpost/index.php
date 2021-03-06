<?php include_once (ROOT.'/views/header.php'); ?>
 <?php if (isset($errors) && is_array($errors)): ?>
        <ul>
            <?php foreach ($errors as $error): ?>
                <li>- <?php echo $error; ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

<div class="content_add">
    <form method="post" action="#">
    	<div class="title_form">
    		<p>Title:</p>
    		<input type="text" name="title" maxlength="60">	
    	</div>
    	<div class="content_form">
    		<p>Content:</p>
    		<textarea name="content"></textarea>
    	</div>
    	<div class="send_button">
    		<input type="submit" name="submit" value="Send">
    	</div>
</form>
</div>

<?php include_once (ROOT.'/views/footer.php'); ?>
