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

<div class="signup-form"><!--sign up form-->
    <h2>Регистрация на сайте</h2>
    <form action="#" method="post">
        <input type="text" name="name" placeholder="Имя" value="<?php echo $name;?>"/>
        <input type="email" name="email" placeholder="E-mail" value="<?php echo $email; ?>"/>
        <input type="password" name="password" placeholder="Пароль" value="<?php echo $password; ?>"/>
        <input type="submit" name="submit" class="btn btn-default" value="Регистрация" />
    </form>
</div><!--/sign up form-->

<?php endif; ?>

<?php include_once ROOT.'/views/footer.php'; ?>

