<?php
include_once ROOT.'/models/User.php';

class Likes
{
    public static function AddLikes($id) {

        $id = intval($id);

        if (isset($_SESSION['user'])) {


            $id_user = $_SESSION['user'];
            $id_post = $id;


            if (!Likes::checkLikes($id_user, $id_post)) {
                if ($id) {


                    $db = Db::getConnection();
                    $sql = 'UPDATE posts SET likes = likes +1 '
                        . 'WHERE id = :id';

                    $result = $db->prepare($sql);
                    $result->bindParam(":id", $id, PDO::PARAM_INT);
                    $result->execute();

                    $sql = 'INSERT INTO likes (id_user, id_post, checky)'
                        . 'VALUE (:id_user, :id_post, 1)';

                    $result = $db->prepare($sql);
                    $result->bindParam(":id_user", $id_user, PDO::PARAM_INT);
                    $result->bindParam(":id_post", $id_post, PDO::PARAM_INT);
                    $result->execute();


                    return true;
                }
            } else {
                echo "Вы уже голосовали!";
                exit();
            }

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


    public static function checkLikes($id_user, $id_post)
    {
        $db = Db::getConnection();
        $sql = 'SELECT * FROM `likes` WHERE (`id_user` = :id_user) AND (`id_post` = :id_post) AND (`checky` = 1)';


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



}