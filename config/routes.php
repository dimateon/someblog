<?php
return array(

    'search/([a-z]+)/page-([0-9]+)'        => 'search/index/$1/$2',
    'search/([a-z0-9]+)'          =>  'search/index/$1',


    'favorite/add/([0-9]+)'  => 'favorite/add/$1',

    'likes/add/([0-9]+)' => 'likes/add/$1',
    'likes/([0-9]+)' => 'likes/index/$1',

    'random/page-([0-9]+)' => 'random/index/$1/',
    'random'        => 'random/index',

    'news/page-([0-9]+)' => 'news/index/$1/',

    'news/([0-9]+)' => 'news/view/$1',
    'news'          => 'news/index',

    'top/page-([0-9]+)' => 'top/index/$1/',
    'top/([0-9]+)'  => 'top/view/$1',
    'top'           => 'top/index',

    'add'          => 'add/index',


    'user/register' => 'user/register',
    'user/login'    => 'user/login',
    'user/logout'   => 'user/logout',

    'cabinet'       => 'cabinet/index',

    ''              => 'main/index',

);