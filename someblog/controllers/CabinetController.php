<?php
include_once ROOT. '/models/User.php';

class CabinetController
{
    public function actionIndex()
    {

        $userId = User::checkLogged();


        require_once(ROOT . '/views/cabinet/index.php');
    }
}