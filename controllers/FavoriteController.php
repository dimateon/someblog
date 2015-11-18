<?php
/*include_once ROOT.'/components/Favorite.php';
include_once ROOT.'/components/View.php';
include_once ROOT.'/components/List.php';
include_once ROOT.'/components/Likes.php';
include_once ROOT.'/components/Pagination.php';*/

class FavoriteController
{
    public function actionAdd($id)
    {
        View::ViewItemById($id);
        Favorite::addToFavorite($id);



        return true;

    }

    public function actionShowFavorite($page = 1)
    {
        $id_user=$_SESSION['user'];
        if($id_user){
            $postList=array();
            $postList = Favorite::showFavorite($id_user,$page);

            $newsList = array();
            $newsList = Favorite::printFavorite($postList);

            $total = Favorite::getTotalPages($id_user);

            $pagination = new Pagination($total, $page, Favorite::SHOW_BY_DEFAULT, 'page-');


            require_once ROOT.'/views/favorite/index.php';

        } else {
            header("Location:/user/login");
        }


        return true;
    }
    public function actionView($id)
    {
        if($id) {
            #$newsItem = News::getNewsItemById($id);
            $newsItem = View::ViewItemById($id);
            require_once(ROOT . '/views/favorite/view.php');
        }
        return true;
    }
}