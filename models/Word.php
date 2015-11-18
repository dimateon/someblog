<?php
include_once ROOT.'/components/Db.php';
class Word
{
    const SHOW_BY_DEFAULT = 3;

    public static function searchByNews($word, $page)
    {
        $search = $word;
       $limit = Word::SHOW_BY_DEFAULT;
        $page = intval($page);
        $offset = ($page - 1) * Word::SHOW_BY_DEFAULT;



        if ($search) {
            $db = Db::getConnection();
            $sql = ("SELECT * FROM posts WHERE title OR content LIKE '%" . $search . "%' ORDER BY date DESC");
            $result = $db->prepare($sql);
           /* $result->bindParam(':limit', $limit, PDO::PARAM_INT);
            $result->bindParam(':offset', $offset, PDO::PARAM_INT);*/
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

    }
    public static function getTotalPages($word)
    {
        $word = strval($word);

        if($word) {
            $db = Db::getConnection();
            $sql=('SELECT count(*) AS count FROM posts WHERE title OR content LIKE "%' . $word .'"%');
            $result = $db->prepare($sql);
            $result->execute();

            $row = $result->fetch();


            return $row['count'];

        }





    }
}