<?php

include_once ROOT.'/components/View.php';
include_once ROOT.'/components/Likes.php';
include_once ROOT.'/models/News.php';

class LikesController
{

    public function actionIndex($id)
    {

        View::ViewItemById($id);

        Likes::AddLikes($id);

        $referrer = $_SERVER['HTTP_REFERER'];
        header("Location: $referrer");


        return true;
    }
    public function actionAdd($id)
    {

        View::ViewItemById($id);
        Likes::AddLikes($id);
        $likes = Likes::showLike($id);
        $like = $likes['likes'];
        echo $like;


        return true;
    }

}