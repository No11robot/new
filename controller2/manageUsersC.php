<?php
include_once  "../functions.php";
include "../config2.php";
if(!isset($_SESSION)){
    session_start();
}
$pageNow=$_GET['pageNow'];//当前页数  
$pageSize=2;//每页记录数
$rowCount=getUsersRowCount();//数据库用户数
$rowCount=$rowCount[0];
$pageCount=intval(($rowCount-1)/$pageSize)+1;//总页数取整
$pageNowUsers=getUsers($pageNow,$pageSize);
$smarty->assign("pageNowUsers",$pageNowUsers);
$smarty->assign("pageCount",$pageCount);
$smarty->display("manageUsers.php");