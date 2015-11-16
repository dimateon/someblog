<?php
include_once ROOT.'/models/News.php';
include_once ROOT.'/components/View.php';

class SearchController
{
    public function actionIndex()
    {
        print_r($_POST);


        require_once ROOT.'/views/search/index.php';
        return true;
    }


}