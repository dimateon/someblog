<?php

include_once ROOT.'/components/Db.php';


class View


{
    public  static function ViewItemById($id) {

        $id = intval($id);

        if($id) {

            $db = Db::getConnection();

            $sql = 'SELECT * FROM posts WHERE id= :id';

            $result = $db->prepare($sql);
            $result->bindParam(":id", $id, PDO::PARAM_INT);
            $result->setFetchMode(PDO::FETCH_ASSOC);
            $result->execute();

            $Item = $result->fetch();
            return $Item;

        }

    }

}