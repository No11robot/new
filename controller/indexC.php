<?php
include_once  "../functions.php";
include "../config.php";
if(!isset($_SESSION)){
    session_start();
}
$news= getNews();
if(key($news)){
    echo $news[1];
    exit;
}
if(!isset($_SESSION)){
    session_start();
}
$smarty->assign("news",$news);
$smarty->display("index.php");

