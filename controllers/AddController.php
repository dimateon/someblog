<?php
include_once ROOT.'/models/Addpost.php';
include_once ROOT.'/models/User.php';

class AddController {

    public function actionIndex()
    {
        $title = '';
        $short_content = '';
        $content = '';
        $errors = false;


        if (User::checkLogged()) {
            $id = $_SESSION['user'];
            $author_name = Add::getAuthorname($id);


            if (isset($_REQUEST['submit'])) {
                $title = $_REQUEST['title'];
                $content = $_REQUEST['content'];

                $short_content = Add::shortPost($content);

                $errors = false;

                if (!Add::checkTitle($title)) {

                    $errors[] = 'Заголовок отсутствует или меньше 2-х символов';
                }
                if (!Add::checkContent($content)) {

                    $errors[] = 'Текст слишком короткий';
                }
                if ($errors == false) {

                    $lastId = Add::sendPost($title, $short_content, $content, $author_name);

                    header("Location:/news/$lastId");


                }

            }


        }


        require_once (ROOT.'/views/addpost/index.php');
        return true;
        //redirect





    }

}