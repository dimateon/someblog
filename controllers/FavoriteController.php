<?php
include_once ROOT.'/components/Favorite.php';
include_once ROOT.'/components/View.php';
include_once ROOT.'/components/List.php';

class FavoriteController
{
    public function actionAdd($id)
    {
        View::ViewItemById($id);
        Favorite::addToFavorite($id);



        return true;

    }
}