<?php

/*include_once ROOT.'/models/User.php';
include_once ROOT.'/components/Db.php';
include_once ROOT.'/components/List.php';*/

class Myposts
{
    const SHOW_BY_DEFAULT = 3;

    public static function getNameById($id_user)
    {
        $id_user = intval($id_user);
        $id_user = $_SESSION['user'];
        if ($id_user) {

            $db = Db::getConnection();
            $sql = ('SELECT name FROM user '
                . 'WHERE id = :id_user');
            $result = $db->prepare($sql);
            $result->bindParam(':id_user', $id_user, PDO::PARAM_STR);
            $result->execute();
            $name = $result->fetch();
            $author_name = $name['name'];
            return $author_name;
        }
    }


    public static function findMyPosts($author_name, $page)
    {
        $limit = Myposts::SHOW_BY_DEFAULT;
        $page = intval($page);
        $offset = ($page - 1) * Myposts::SHOW_BY_DEFAULT;
        $db = Db::getConnection();
        $sql = ('SELECT id FROM posts '
                   .'WHERE author_name = :author_name '
                   .'LIMIT :limit '
                   .'OFFSET :offset ');

        $result =$db->prepare($sql);
        $result->bindParam(':author_name', $author_name, PDO::PARAM_STR);
        $result->bindParam(':limit', $limit, PDO::PARAM_INT);
        $result->bindParam(':offset', $offset, PDO::PARAM_INT);
        $result->execute();
        $postList = array();
        $i = 0;
        while ($row = $result->fetch()) {
            $postList[$i]['id'] = $row['id'];
            $i++;
        }

        return $postList;

    }


    public static function showMyPosts($postList)
    {



        if($postList)
        {
             $newsList = array();
             foreach($postList as $key => $value)
             {
                 $id = $value['id'];


                 $db= Db::getConnection();
                 $sql = ('SELECT * FROM posts '
                     .'WHERE id = :id');
                 $result = $db->prepare($sql);

                 $result->bindParam(':id', $id, PDO::PARAM_INT);
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


    }

    public static function getTotalPages($author_name)
    {
        $id_user = strval($author_name);

        if($id_user) {
            $db = Db::getConnection();
            $sql=('SELECT count(author_name) AS count FROM posts WHERE author_name = :id_user ');
            $result = $db->prepare($sql);
            $result->bindParam(":id_user", $id_user, PDO::PARAM_STR);
            $result->execute();

            $row = $result->fetch();


            return $row['count'];

        }





    }
    public static function deletePostByAuthor($author_name, $id)
    {
        $author_name = strval($author_name);
        $id = intval($id);
        if($id) {
            $db = Db::getConnection();

            $sql = ('DELETE FROM posts WHERE author_name = :author_name AND id = :id');
            $result = $db->prepare($sql);
            $result->bindParam(':author_name', $author_name, PDO::PARAM_STR);
            $result->bindParam(':id', $id, PDO::PARAM_INT);
            $result->execute();

        }

    }


}