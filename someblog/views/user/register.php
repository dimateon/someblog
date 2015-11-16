<?php include_once ROOT.'/views/header.php'; ?>

<?php if ($result): ?>
  <p>Вы зарегистрированны!</p>
<?php  else: ?>
<?php if (isset($errors) && is_array($errors)): ?>
   <ul>
       <?php foreach ($errors as $error): ?>
          <li>- <?php echo $error; ?></li>
       <?php endforeach; ?>
   </ul>
<?php endif; ?>

<div class="signup_form"><!--sign up form-->
    <p>Sign up</p>
    <form action="#" method="post">
        <div class="username_form">
            <input type="text" name="name" placeholder="Username" value="<?php echo $name;?>"/>
        </div>
        <div class="email_form">
            <input type="email" name="email" placeholder="Email" value="<?php echo $email; ?>"/>
        </div>
        <div class="password_form">
            <input type="password" name="password" placeholder="Password" value="<?php echo $password; ?>"/>
        </div>
        <div class="sign_in_but">
            <input type="submit" name="submit" class="" value="Sign up"/>
        </div>
    </form>
</div><!--/sign up form-->

<?php endif; ?>

<?php include_once ROOT.'/views/footer.php'; ?>

