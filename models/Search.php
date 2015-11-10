<?php
include_once ROOT.'/models/News.php';
include_once ROOT.'/components/View.php';

class Search {

    public static function searchByAuthor($author_name)
    {
        $db = Db::getConnection();

        $sql = 'SELECT author_name'
              .'FROM posts '
              .'WHERE author_name = {$author_name}'
              .'ORDER BY date DESC'
              .'LIMIT 3';
        $result = $db->prepare($sql);
        $result->execute();





    }
    public static function viewByAuthor($author_name)
    {


        $db = Db::getConnection();

        $sql = 'SELECT * FROM posts'
              .'WHERE author_name = :author_name';

        $result = $db->prepare($sql);
        $result->bindParam("author_name", $author_name, PDO::PARAM_STR);
        $result->execute();
        $author_name = $result->fetch();
        if($author_name){
            return $author_name;
        }
    }



}