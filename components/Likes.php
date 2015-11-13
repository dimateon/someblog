<?php
class Likes
{
    public static function AddLikes($id) {

        $id = intval($id);

        if($id) {


            $db = Db::getConnection();
            $sql = 'UPDATE posts SET likes = likes +1 '
                  .'WHERE id = :id';

            $result = $db->prepare($sql);
            $result->bindParam(":id", $id, PDO::PARAM_INT);
            $result->execute();
            return true;


        }
        else {
            echo "Ошибка";
        }
    }

    public  static  function showLike($id) {
        $id = intval($id);
        if ($id) {

            $db = Db::getConnection();

            $sql = 'SELECT likes FROM posts WHERE id = :id';
            $result = $db->prepare($sql);
            $result->bindParam(":id", $id, PDO::PARAM_INT);
            $result->execute();
            $likes = $result->fetch();
            return $likes;
        }
    }

}