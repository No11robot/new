<?php
include_once "../functions.php";
include "../config.php";
if(!isset($_SESSION)){
    session_start();
}
    $pageNow=$_GET['pageNow'];//当前页数  
    $pageSize=2;//每页记录数
    $pageCount=0;//总页数
    $rowCount=0;//数据库总记录数
    if(isset($_POST['getSearch'])){
        $keyWord = $_POST['keyWord'];
    }else{
        $keyWord =$_GET['hotWord'];
    }
    $rowCount=getSearchRowCountByKeyWord($keyWord);//数据库总记录数
    $rowCount=$rowCount[0];
    if($rowCount==0){
         echo "<script> alert('抱歉~无含 $keyWord 关键词类的新闻');parent.location.href='../controller/indexC.php'; </script>";
    }else{
        $pageCount=intval(($rowCount-1)/$pageSize)+1;//取整
        $sectionNews=getSearchNews($keyWord,$pageNow,$pageSize);
        $smarty->assign("sectionNews",$sectionNews);
        $smarty->assign("pageCount",$pageCount);
        $smarty->display("section.php");
    }

