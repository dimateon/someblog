<?php

/*include_once ROOT . '/models/Word.php';
include_once ROOT .'/components/Pagination.php';*/

class WordController
{
    public function actionSearch($page = 1)
    {
        $word ='';
        $word = trim($_POST['search']);


        if($word)
        {

            $newsList = Word::searchByNews($word, $page);

         $total = Word::getTotalPages($word);
            $pagination = new Pagination($total, $page, Word::SHOW_BY_DEFAULT, 'page-');


            require_once ROOT.'/views/news/index.php';

        }

        return true;

    }
}