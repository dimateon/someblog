<?php

class User
{

    public static function register($name, $email, $password) {
        $db = Db::getConnection();

        $sql = 'INSERT INTO user (name, email, password) '
                 . 'VALUE (:name, :email, :password)';

        $result =$db->prepare($sql);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':password', $password, PDO::PARAM_STR);

        return $result->execute();

    }


    public static function checkName($name) {
        if (strlen($name) >=2) {
            return true;
        }
        return false;
    }




    public static  function checkPassword($password) {
        if (strlen($password) >= 6) {
            return true;
        }
        return false;
    }




    public static function checkEmail($email) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        }
        return false;
    }

    public  static function checkEmailExist($email) {
        $db = Db::getConnection();

        $sql ='SELECT COUNT(*) FROM user WHERE email = :email';

        $result = $db->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->execute();

        if($result->fetchColumn())
            return true;
        return false;
    }

    public static function checkUserData($email, $password) {

        $db = Db::getConnection();

        $sql = 'SELECT * FROM user WHERE email = :email AND password = :password';

        $result = $db->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_INT);
        $result->bindParam(':password', $password, PDO::PARAM_INT);
        $result->execute();

        $user = $result->fetch();
        if ($user) {
            return $user['id'];
        }

            return false;

    }

    public static function auth($userId){


        $_SESSION['user'] = $userId;
    }

    public static function checkLogged() {


        if (isset($_SESSION['user'])){
            return $_SESSION['user'];
        }
        header("Location: /user/login");
    }

    public static function logout() {

        unset($_SESSION['user']);


    }

    public static function getName() {
        if(isset($_SESSION['user'])){

            $id_user=$_SESSION['user'];
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

    public static function getNavBar($author_name) {

        if(isset($_SESSION['user']))

        {
            echo
            "
            <div id=\"dd\" class=\"wrapper-dropdown-1\">
            <span><a href=\"#\">$author_name</a></span>
            <ul id=\"dropdown\" class=\"\">
                <a href=\"/favorite/\"><li>Bookmarks</li></a>
                <a href=\"/myposts/\"><li>My posts</li></a>
                <a href=\"/user/logout\"><li>Exit</li></a>
            </ul>
        </div>
            ";

        } else {
            echo "<div class=sign>
            <a href=\"/user/login\"><p>Sign in or  <br>Sign up</p></a>
        </div>";
        }
    }


}