<?php include_once ROOT.'/views/header.php'; ?>


    <?php if (isset($errors) && is_array($errors)): ?>
        <ul>
            <?php foreach ($errors as $error): ?>
                <li>- <?php echo $error; ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <div class="signin_form"><!--sign in form-->
        <p>Sign in</p>
        <form action="#" method="post">
            <div class="email_form">
                <input type="email" name="email" placeholder="E-mail" value="<?php echo $email; ?>"/>
            </div>
            <div class="password_form">
                <input type="password" name="password" placeholder="Password" value="<?php echo $password; ?>"/>
            </div>
            <div class="sign_in_but">
                <input type="submit" name="submit" class="" value="Sign In" />
            </div>
        </form>
        <p>or</p>
            <div class="sign_up_but">
                <a href="/user/register">Sign up</a>
            </div>
    </div><!--/sign in form-->


<?php include_once ROOT.'/views/footer.php'; ?>

