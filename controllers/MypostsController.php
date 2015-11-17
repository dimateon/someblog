<?php
include_once ROOT.'/models/Myposts.php';
include_once ROOT.'/components/Favorite.php';

include_once ROOT.'/components/View.php';
include_once ROOT.'/components/List.php';
include_once ROOT.'/components/Likes.php';
include_once ROOT.'/components/Pagination.php';


class MypostsController
{
    public function actionIndex($page = 1)
    {
        $id_user = $_SESSION['user'];
        if ($id_user) {

            $author_name = Myposts::getNameById($id_user);


            $postList = Myposts::findMyPosts($author_name, $page);

            $newsList = array();
            $newsList = Myposts::showMyPosts($postList);


            $total = Myposts::getTotalPages($author_name);

            $pagination = new Pagination($total, $page, Favorite::SHOW_BY_DEFAULT, 'page-');


            require_once ROOT.'/views/mypost/index.php';

        }
        else {
            header("Location:/user/login");
        }

        return true;
    }
    public function actionView($id)
    {
        if($id) {
            #$newsItem = News::getNewsItemById($id);
            $newsItem = View::ViewItemById($id);
            require_once(ROOT . '/views/mypost/view.php');
        }
        return true;
    }


    public function actionDeletePost($id)
    {
        $id_user = $_SESSION['user'];
        if($id_user) {
            $author_name = Myposts::getNameById($id_user);
            Myposts::deletePostByAuthor($author_name, $id);


        }

        return true;
    }

}