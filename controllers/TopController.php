<?php
include_once ROOT.'/models/Top.php';
include_once ROOT . '/components/View.php';

class TopController {
    public function actionIndex()
    {
        $sql =('SELECT *, DATE_FORMAT(date,"%d.%m.%y") as date FROM posts '
            . 'ORDER BY likes DESC '
            . 'LIMIT 3');



        $newsList = array();
        $newsList = NewsList::getNewsList($sql);

        require_once(ROOT . '/views/news/index.php');


        return true;
    }
    public function actionView($id)
    {
        if($id) {
            #$topItem = Top::getTopItemById($id);
            $topItem = View::ViewItemById($id);

            require_once(ROOT . '/views/news/view.php');


        }

        return true;

    }

}