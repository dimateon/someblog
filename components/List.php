<?php
include_once ROOT.'/components/Db.php';

abstract class  NewsList
{
    const SHOW_BY_DEFAULT = 3;


    public static function getNewsList( $sql)
    {




        $db = Db::getConnection();
        /*'SELECT *, DATE_FORMAT(date,"%d.%m.%y") as date FROM posts '
            . 'ORDER BY date DESC '
            . 'LIMIT 3 '
            . ' OFFSET 3 ' );*/
        $result= $db->prepare($sql);
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
}