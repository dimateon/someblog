<?php
/*include_once ROOT.'/components/List.php';
include_once ROOT.'/components/View.php';
include_once ROOT.'/components/Pagination.php';
include_once ROOT.'/models/Search.php';*/

class SearchController
{
    public function actionIndex($author_name, $page=1)
    {
        $author_name = strval($author_name);



        $newsList = array();
        $newsList = Search::viewByAuthor($author_name, $page);

        $total = Search::getTotalPages($author_name);



        $pagination = new Pagination($total, $page, NewsList::SHOW_BY_DEFAULT, 'page-');


        require_once ROOT.'/views/search/index.php';
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