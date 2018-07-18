<?php
include "../config.php";
include_once "../functions.php";
error_reporting(0);
if(!isset($_SESSION)){
    session_start();
}
if($_SESSION){
    $uId=$_SESSION['us']['uId'];
}else{
    $uId=0;
}
if($uId){
    $details= getDetails($uId);
    $pageNow=$_GET['pageNow'];//当前页数  
    $pageSize=4;//每页记录数
    $rowCount=getCommentsRowCountByUid($uId);//数据库用户评论总记录数
    $pageCount=intval(($rowCount-1)/$pageSize)+1;//总页数取整
    $newsComments=getUserCommentsByUid($uId,$pageNow,$pageSize);
    $smarty->assign("details",$details[0]);
    $smarty->assign("newsComments",$newsComments);
    $smarty->assign("pageCount",$pageCount);
    $smarty->display("space.php");
}else{
    echo "<script> alert('请先登陆！');parent.location.href='../view/login.php'; </script>";
}

