<?php
include_once ROOT.'/models/Top.php';
include_once ROOT . '/components/View.php';

class TopController {
    public function actionIndex($page = 1)
    {

        
        $sql =('SELECT *, DATE_FORMAT(date,"%d.%m.%y") as date FROM posts '
            . 'ORDER BY likes DESC '
            . 'LIMIT :limit '
            . ' OFFSET :offset');



        $newsList = array();
        $newsList = NewsList::getNewsList($page, $sql);


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