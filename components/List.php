<?php
include_once ROOT.'/components/Db.php';

abstract class  NewsList
{
    const SHOW_BY_DEFAULT = 3;


    public static function getNewsList($page, $sql)
    {
        $limit = NewsList::SHOW_BY_DEFAULT;
        $page = intval($page);
        $offset = ($page - 1) * self::SHOW_BY_DEFAULT;




        $db = Db::getConnection();

        $result= $db->prepare($sql);
        $result->bindParam(':limit', $limit, PDO::PARAM_INT);
        $result->bindParam(':offset', $offset, PDO::PARAM_INT);
        $result->execute();

        $newsList = array();

        $i = 0;

        while ($row = $result->fetch()) {
            $newsList[$i]['id'] = $row['id'];
            $newsList[$i]['title'] = $row['title'];
            $newsList[$i]['date'] = $row['date'];
            $newsList[$i]['short_content'] = $row['short_content'];
            $newsList[$i]['author_name'] = $row['author_name'];
            $newsList[$i]['likes'] = $row['likes'];
            $i++;
        }

        return $newsList;


    }
    public static function getTotalPages()
    {
        $db = Db::getConnection();
        $result = $db->query('SELECT count(id) AS count FROM posts');
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $row = $result->fetch();

        return $row['count'];




    }
}