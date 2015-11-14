<?php

include_once ROOT . '/components/View.php';
include_once ROOT. '/components/List.php';
include_once ROOT . '/components/Likes.php';

class NewsController
{

    public function actionIndex()
    {
       # $sql = 'SELECT *, DATE_FORMAT(date,"%d.%m.%y") as date FROM posts ORDER BY date DESC LIMIT {parent::SHOW_BY_DEFAULT OFFSET}  {$offset} ';

       $sql=('SELECT *, DATE_FORMAT(date,"%d.%m.%y") as date FROM posts '
            . 'ORDER BY date DESC '
            . 'LIMIT 3 '
            . ' OFFSET 3 ' );
        $newsList = array();
        $newsList = NewsList::getNewsList($sql);



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