<?php
include "../functions.php";
$nId=$_GET["nId"];
$pageNow=$_GET['pageNow'];//当前页数  
$pageSize=2;//每页记录数
$rowCount=getCommentsRowCountByNid($nId);//数据库总记录数
$pageCount=intval(($rowCount-1)/$pageSize)+1;//总页数取整
$newsComments=getNewsCommentsByNid($nId,$pageNow,$pageSize);
echo json_encode($newsComments);
