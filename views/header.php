<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Some Blog.</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<link href="/template/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css">
<link href="/template/css/main.css" rel="stylesheet" type="text/css">
<script src="/template/js/jquery-1.6.2.js" type="text/javascript"></script>

</head>
<body>
<div class="main_page">
    <div class="banner">
        <div class="name">
            <a href="/">Some<br>blog.</a>
        </div>
        <!--<?php $author_name = User::getName(); ?>
        <?php echo User::getNavBar($author_name); ?>-->

        <!--       PROFILE               -->
        <div id="wrapper-dropdown-1">
        <span><a href="#">$author_name</a></span>
        <ul class="hide">
        <li class="dropdown"><a href="favorite">Bookmarks</a></li>
        <li class="dropdown"><a href="myposts">My posts</a></li>
        <li class="dropdown"><a href="user/logout">Exit</a></li>
        </ul>
        </div>
    </div>
    <div class="header">
        <div class="new">
            <a href="/news">New</a>
        </div>
        <div class="top">
            <a href="/top">Top</a>
        </div>
        <div class="random">
            <a href="/random">Random</a>
        </div>
        <div class="categories">
            <a href="/top">Categories</a>
        </div>
        <div class="site_rules">
            <a href="/top">Site rules</a>
        </div>
        <div class="search_bg">
            <!--Ниже нужно указать вид передачи данных какойто, думаю тебе виднее какой нужен-->
            <form method="post"  action="/word">
                <div class="search">
                    <input type="text" name="search" placeholder="Search something?">
                </div>
            </form>
        </div>
    </div>
    <div class="content">
        <div class="top_sep"></div>