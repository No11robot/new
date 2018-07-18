<?php
include "../functions.php";
$uId=$_SESSION['us']['uId'];;
$pageNow=$_GET['pageNow'];//当前页数  
$pageSize=2;//每页记录数
$rowCount=getCommentsRowCountByUid($uId);//数据库用户评论总记录数
$pageCount=intval(($rowCount-1)/$pageSize)+1;//总页数取整
$newsComments=getUserCommentsByUid($uId,$pageNow,$pageSize);
echo json_encode($newsComments);
