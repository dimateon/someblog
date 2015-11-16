<?php
include_once ROOT . '/components/View.php';
include_once ROOT. '/models/News.php';
include_once ROOT.'/components/Like.php';
include_once ROOT.'/models/Random.php';

class RandomController
{

    public function actionIndex()
    {
        $newsList = array();
        $newsList = Random::getRandList();


        require_once(ROOT . '/views/news/index.php');


        return true;
    }
    public function actionView($id)
    {
        if($id) {
            #$newsItem = News::getNewsItemById($id);
            $newsItem = View::ViewItemById($id);


            require_once(ROOT . '/views/news/view.php');


        }
        return true;

    }

}