<?php
include "../config.php";
include_once "../functions.php";
include '../wordPHP.php';
if(!isset($_SESSION)){
    session_start();
}
$rt=new WordPHP();
$nId=$_GET["nId"];
$news= getNewsByNid($nId);
$pageNow=$_GET['pageNow'];//当前页数  
$pageSize=2;//每页记录数
$rowCount=getCommentsRowCountByNid($nId);//数据库总记录数
$pageCount=intval(($rowCount-1)/$pageSize)+1;//总页数取整
$newsComments=getNewsCommentsByNid($nId,$pageNow,$pageSize);
$newsContent=$rt->readDocument($news[0]["content"]);
if(key($news)){
    echo $news[1];
}else{
    $smarty->assign("news",$news[0]);
    $smarty->assign("newsContent",$newsContent);
    $smarty->assign("newsComments",$newsComments);
    $smarty->assign("pageCount",$pageCount);
    $smarty->display("about.php");
}
