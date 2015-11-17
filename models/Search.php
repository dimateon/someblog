<?php
include_once ROOT.'/components/Db.php';
include_once ROOT.'/components/List.php';

class Search {
    const SHOW_BY_DEFAULT = 3;


    public static function viewByAuthor($author_name, $page)
    {
        $limit = Search::SHOW_BY_DEFAULT;
        $page = intval($page);
        $offset = ($page - 1) * self::SHOW_BY_DEFAULT;



        $db = Db::getConnection();

        $sql = ('SELECT *, DATE_FORMAT(date,"%d.%m.%y") as date '
        .'FROM posts WHERE author_name = :author_name '
        .'ORDER BY date DESC '
        .'LIMIT :limit OFFSET :offset');

        $result = $db->prepare($sql);

        $result->bindParam(":author_name", $author_name, PDO::PARAM_STR);
        $result->bindParam(':limit', $limit, PDO::PARAM_INT);
        $result->bindParam(':offset', $offset, PDO::PARAM_INT);
        $result->execute();



        $newsList = array();

        $i = 0;

        while ($row = $result->fetch()) {
            $newsList[$i]['id'] = $row['id'];
            $newsList[$i]['title'] = $row['title'];
            $newsList[$i]['data'] = $row['date'];
            $newsList[$i]['short_content'] = $row['short_content'];
            $newsList[$i]['author_name'] = $row['author_name'];
            $newsList[$i]['likes'] = $row['likes'];
            $i++;
        }

        return $newsList;
    }

    public static function getTotalPages($author_name)
    {
        $author_name = strval($author_name);

        if($author_name) {
             $db = Db::getConnection();
             $sql=('SELECT count(author_name) AS count FROM posts WHERE author_name = :author_name ');
             $result = $db->prepare($sql);
             $result->bindParam(":author_name", $author_name, PDO::PARAM_STR);
             $result->execute();

             $row = $result->fetch();


             return $row['count'];

            }





    }





}