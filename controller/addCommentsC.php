<?php
include_once "../functions.php";
if(!isset($_SESSION)){
    session_start();
}
if(isset($_POST['addComments'])){
    $uId=$_SESSION['us']['uId'];
    $nId=$_GET["nId"];
    $Ccontent = $_POST['comment'];
    $str="NULL,$uId,'$Ccontent',CURRENT_TIMESTAMP,$nId";
    $result= addComments($str);
    if($result==1){
        echo "<script> alert('发表评论成功！');parent.location.href='../controller/aboutC.php?nId=<{$row['nId']}>&pageNow=1'; </script>";
    }else{
        echo "<script> alert('不好，发表失败了！');parent.location.href='../controller/aboutC.php?nId=<{$row['nId']}>&pageNow=1'; </script>";
    }
    
}

