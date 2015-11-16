<?php
include_once ROOT.'/models/User.php';
include_once ROOT.'/components/Db.php';
class Favorite
{
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

}