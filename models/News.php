<?php



class News
{



    public static function getNewsList()
    {

        $db = Db::getConnection();

        $newsList = array();

        $result = $db->query('SELECT * FROM posts '
                  . 'ORDER BY date DESC '
                  . 'LIMIT 3');


        $i = 0;

        while($row = $result->fetch()) {
            $newsList[$i]['id'] = $row['id'];
            $newsList[$i]['title'] = $row['title'];
            $newsList[$i]['data'] = $row['date'];
            $newsList[$i]['short_content'] = $row['short_content'];
            $newsList[$i]['author_name'] = $row['author_name'];
            $newsList[$i]['like'] = $row['like'];
            $i++;
        }

        return $newsList;


    }
}