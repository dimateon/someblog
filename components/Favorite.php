<?php
include_once ROOT.'/models/User.php';
include_once ROOT.'/components/Db.php';
include_once ROOT.'/components/List.php';



class Favorite
{
    const SHOW_BY_DEFAULT = 3;
    public static function addToFavorite($id)
    {
        if(isset($_SESSION['user'])) {
            $id = intval($id);
            $id_user = $_SESSION['user'];
            $id_post = $id;
            if (!self::checkFavorite($id_user, $id_post)) {

                $db = Db::getConnection();

                $sql = ('INSERT INTO favorite (id_user, id_post, checky) '
                    . 'VALUE(:id_user, :id_post, 1)');

                $result = $db->prepare($sql);
                $result->bindParam(':id_user', $id_user, PDO::PARAM_INT);
                $result->bindParam(':id_post', $id_post, PDO::PARAM_INT);
                $result->execute();
                return true;
            }
        }

    }
    public static function checkFavorite($id_user, $id_post)
    {
        $db = Db::getConnection();
        $sql = 'SELECT * FROM `favorite` WHERE (`id_user` = :id_user) AND (`id_post` = :id_post) AND (`checky` = 1)';


        $result= $db->prepare($sql);
        $result->bindParam(":id_user", $id_user, PDO::PARAM_INT);
        $result->bindParam(":id_post", $id_post, PDO::PARAM_INT);
        $result->execute();
        $item = $result->fetch();
        if($item > 0 ) {
            return true;
        } else {
            return false;

        }
    }

    public static function showFavorite($id_user, $page)
    {
        $id_user = intval($id_user);
        $limit = Favorite::SHOW_BY_DEFAULT;
        $page = intval($page);
        $offset = ($page - 1) * Favorite::SHOW_BY_DEFAULT;

        if($id_user){
            $db = Db::getConnection();
            $sql = ('SELECT id_post FROM favorite '
                  .'WHERE id_user = :id_user '
                  .'LIMIT :limit '
                  .' OFFSET :offset');
            $result= $db->prepare($sql);
            $result->bindParam(':id_user', $id_user, PDO::PARAM_INT);
            $result->bindParam(':limit', $limit, PDO::PARAM_INT);
            $result->bindParam(':offset', $offset, PDO::PARAM_INT);
            $result->execute();
            $postList = array();
            $i = 0;
            while ($row = $result->fetch()) {
                $postList[$i]['id_post'] = $row['id_post'];
                $i++;
            }
            return $postList;

        }
    }
    public static function printFavorite($postList)
    {

        $newsList = array();
        foreach ($postList as $key => $value) {


            $item = $value['id_post'];




        $db = Db::getConnection();

           $sql = ('SELECT * FROM posts '
                 .'WHERE id = :item');
            $result = $db->prepare($sql);
            $result->bindParam(':item', $item, PDO::PARAM_INT);
            $result->execute();
            $list = $result->fetch();
            $i = 0;

           while ($row = $result->fetch()) {
               $list[$i]['id'] = $row['id'];
               $list[$i]['title'] = $row['title'];
               $list[$i]['date'] = $row['date'];
               $list[$i]['short_content'] = $row['short_content'];
               $list[$i]['author_name'] = $row['author_name'];
               $list[$i]['likes'] = $row['likes'];
               $i++;
           }

            $newsList[] = $list;



       }
        return $newsList;


    }
    public static function getTotalPages($id_user)
    {
        $id_user = intval($id_user);

        if($id_user) {
            $db = Db::getConnection();
            $sql=('SELECT count(id_user) AS count FROM favorite WHERE id_user = :id_user ');
            $result = $db->prepare($sql);
            $result->bindParam(":id_user", $id_user, PDO::PARAM_INT);
            $result->execute();

            $row = $result->fetch();


            return $row['count'];

        }





    }

}