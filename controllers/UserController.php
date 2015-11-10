<?php
require_once(ROOT.'/models/User.php');

  class UserController
  {

      public function actionRegister()
      {
          $name = '';
          $email = '';
          $password = '';
          $result = false;
          if(isset($_POST['submit'])){
              $name = $_POST['name'];
              $email = $_POST['email'];
              $password = $_POST['password'];

              $errors = false;

              if (!User::checkName($name)) {
                  $errors[] = 'Имя не долно быть короче 2-х символов';
              }

              if (!User::checkEmail($email)){

                  $errors[] = 'Неправильный email';
               }

              if (!User::checkPassword($password)){

                  $errors[] = 'Пароль не должен быть короче 6-ти символов';
              }
              if (User::checkEmailExist($email)){
                  $errors[] = 'Такой email уже используется';
              }
              if ($errors == false) {
                  $result = User::register($name, $email, $password);

              }

          }


          require_once(ROOT. '/views/user/register.php');

          return true;
      }
      public function actionLogin()
      {
          $email = '';
          $password = '';

          if (isset($_POST['submit'])){
              $email = $_POST['email'];
              $password = $_POST['password'];

              $errors = false;

              //Валидация

              if (!User::checkEmail($email)) {
                  $errors[] = 'Неправельный email';
              }
              if (!User::checkPassword($password)) {
                  $errors[] = 'Пароль не должен быть короче 6-ти символов';
              }

              //Проверка пользователя

              $userId = User::checkUserData($email, $password);


              if ($userId == false) {
                  $errors[] = 'Неправильные данные для входа на сайт';
              } else {
                  User::auth($userId);

                  //redirect

                  header("Location:/");
              }


          }
          require_once(ROOT.'/views/user/login.php');

      }

      public function actionLogout() {

          User::logout();
          header("Location:/");
      }
  }