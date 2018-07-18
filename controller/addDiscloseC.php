<?php
include_once "../functions.php";
if(!isset($_SESSION)){
    session_start();
}
if(isset($_POST['addDisclose'])){
    if($_SESSION){
        $uName=$_SESSION['us']['uName'];
    } else {
        $uName='游客';
    }
    $dName = $_POST['dName'];
    $dPhone = $_POST['dPhone'];
    $dEmail = $_POST['dEmail'];
    $dConnent = $_POST['dConnent'];
    if($dConnent==''){
         echo "<script> alert('内容不能为空！！！');parent.location.href='../controller/discloseC.php'; </script>";
    }else{
        $str="NULL,'$dName','$dPhone','$dEmail','$dConnent',CURRENT_TIMESTAMP,'$uName'";
        $result= addDisclose($str);
        if($result==1){
            echo "<script> alert('爆料成功！');parent.location.href='../controller/discloseC.php'; </script>";
        }else{
            echo "<script> alert('不好，爆料失败了！');parent.location.href='../controller/discloseC.php'; </script>";
        }
    }   
}

