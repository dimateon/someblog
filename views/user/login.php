<?php include_once ROOT.'/views/header.php'; ?>


    <?php if (isset($errors) && is_array($errors)): ?>
        <ul>
            <?php foreach ($errors as $error): ?>
                <li>- <?php echo $error; ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <div class="signup-form"><!--sign up form-->
        <h2>Вход на сайт</h2>
        <form action="#" method="post">

            <input type="email" name="email" placeholder="E-mail" value="<?php echo $email; ?>"/>
            <input type="password" name="password" placeholder="Пароль" value="<?php echo $password; ?>"/>
            <input type="submit" name="submit" class="btn btn-default" value="Sign In" />
        </form>
    </div><!--/sign up form-->


<?php include_once ROOT.'/views/footer.php'; ?>

