<?php
include_once ROOT.'/models/News.php';
include_once ROOT.'/components/View.php';

class Search {

    public static function searchByAuthor()
    {
        $id = array();
        $id = News::getNewsList();
        $author_name = $id[$i]['author_name'];

        return $author_name;


    }
    public static function viewByAuthor()
    {
        $id = News::getNewsList();
        $author_name = $id[$i]['author_name'];

        $db = Db::getConnection();

        $sql = 'SELECT * FROM posts'
              .'WHERE author_name = :author_name';

        $result = $db->prepare($sql);
        $result->bindParam("author_name", $author_name, PDO::PARAM_STR);
    }



}