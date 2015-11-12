<?php
include_once ROOT.'/components/Db.php';


class Add
{
    public static function checkTitle($title) {
        if (strlen($title) >=2) {
            return true;
        }
        return false;
    }

    public static function  checkContent($content) {
        if (strlen($content) >=10){
            return true;
        }
        return false;
    }


    public static function shortPost($content) {

        $short_content=substr(htmlspecialchars($content), 0, 370);
        return $short_content;
    }
    public static function getAuthorname($id) {
        $db =Db::getConnection();

        $sql = 'SELECT * FROM user WHERE id= :id';

        $result = $db->prepare($sql);
        $result->bindParam(":id", $id, PDO::PARAM_INT);
        $result->execute();

        $user = $result->fetch();
        if($user) {
            return $user['name'];
        }
        return false;


    }

    public static function sendPost($title, $short_content, $content, $author_name) {
        $db = Db::getConnection();

        $sql ='INSERT INTO posts (title, short_content, content, author_name) '
              . 'VALUE(:title, :short_content, :content, :author_name)';

        $result = $db->prepare($sql);
        $result->bindParam(":title", $title, PDO::PARAM_STR);
        $result->bindParam(":short_content", $short_content, PDO::PARAM_STR);
        $result->bindParam(":content", $content, PDO::PARAM_STR);
        $result->bindParam(":author_name", $author_name, PDO::PARAM_STR);
        $result->execute();
        $lastId = $db->lastInsertId();
        return $lastId;





    }

}