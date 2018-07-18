<?php
include_once "../functions.php";
include "../config2.php";
if(!isset($_SESSION)){
    session_start();
}
$sId=$_GET['sId'];
$pageNow=$_GET['pageNow'];//当前页数  
$pageSize=2;//每页记录数
$pageCount=0;//总页数
$rowCount=0;//数据库总记录数
$rowCount=getSectionRowCountBySid($sId);//数据库总记录数
$pageCount=intval(($rowCount-1)/$pageSize)+1;//取整
$sectionNews= getSectionBySid($sId,$pageNow,$pageSize);
$smarty->assign("sectionNews",$sectionNews);
$smarty->assign("pageCount",$pageCount);
$smarty->display("checkNews.php");