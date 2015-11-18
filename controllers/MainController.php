<?php
/*include_once ROOT.'/models/User.php';*/

class MainController
{

    public function actionIndex()
    {
        if(isset($_POST['submit'])) {
            if(User::checkLogged()){
                header("Location:/add/");
            } else {
                header("Location:/user/login/");
            }
            return true;


        }


        require_once(ROOT . '/views/main/index.php');

        return true;
    }


}