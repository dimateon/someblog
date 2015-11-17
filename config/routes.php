<?php
return array(

    'search/([a-z]+)/page-([0-9]+)'        => 'search/index/$1/$2',
    'search/([a-z0-9]+)'                   =>  'search/index/$1',

    'myposts/page-([0-9]+)' =>'myposts/index/$1',
    'myposts/([0-9]+)'      => 'myposts/view/$1',
    'myposts'               => 'myposts/index',

    'favorite/add/([0-9]+)'  => 'favorite/add/$1',
    'favorite/page-([0-9]+)' => 'favorite/showfavorite/$1',
    'favorite/([0-9]+)'      => 'favorite/view/$1',
    'favorite'               => 'favorite/showfavorite',


    'likes/add/([0-9]+)' => 'likes/add/$1',
    'likes/([0-9]+)'     => 'likes/index/$1',

    'random/page-([0-9]+)' => 'random/index/$1/',
    'random'               => 'random/index',

    'news/page-([0-9]+)' => 'news/index/$1/',
    'news/([0-9]+)'      => 'news/view/$1',
    'news'               => 'news/index',

    'top/page-([0-9]+)' => 'top/index/$1/',
    'top/([0-9]+)'      => 'top/view/$1',
    'top'               => 'top/index',

    'add'               => 'add/index',


    'user/register' => 'user/register',
    'user/login'    => 'user/login',
    'user/logout'   => 'user/logout',

    'cabinet'       => 'cabinet/index',

    ''              => 'main/index',

);