<?php

class Random
{



    public static function getRandList()
    {

        $db = Db::getConnection();

        $newsList = array();

        $result = $db->query('SELECT *, DATE_FORMAT(date,"%d.%m.%y") as date FROM posts '
            . 'ORDER BY RAND() '
            . 'LIMIT 3');


        $i = 0;

        while($row = $result->fetch()) {
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