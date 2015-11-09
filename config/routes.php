<?php
return array(


    'news/([0-9]+)' => 'news/view/$1',
    'news'          => 'news/index',

    'top/([0-9]+)'  => 'top/view/$1',
    'top'           => 'top/index',

    'add'          => 'add/index',


    'user/register' => 'user/register',
    'user/login'    => 'user/login',
    'user/logout'   => 'user/logout',

    'cabinet'       => 'cabinet/index',

    ''              => 'main/index',

);