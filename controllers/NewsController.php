<?php
include_once ROOT.'/components/Pagination.php';
include_once ROOT . '/components/View.php';
include_once ROOT. '/components/List.php';
include_once ROOT . '/components/Likes.php';
class NewsController
{
    public function actionIndex($page = 1)
    {
        $sql=('SELECT *, DATE_FORMAT(date,"%d.%m.%y") as date FROM posts '
            . 'ORDER BY date DESC '
            . 'LIMIT :limit '
            . ' OFFSET :offset ' );
        $newsList = array();
        $newsList = NewsList::getNewsList($page, $sql);

        $total = NewsList::getTotalPages();

        $pagination = new Pagination($total, $page, NewsList::SHOW_BY_DEFAULT, 'page-');


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