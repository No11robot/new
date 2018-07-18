<?php
include "../config.php";
include_once "../functions.php";
if(!isset($_SESSION)){
    session_start();
}
header("Content-Type:text/html;charset=utf-8");
// 附件的存储位置、附件的名字
$path = "../images/headShot/";

$username =$_SESSION['us']['uName'];
$uId=$_SESSION['us']['uId'];
// 拼接成该文件在服务器上的名称
$server_name = $path.$username.".jpg";


if($_FILES['photo']['error']>0) {
    die("出错了！".$_FILES['photo']['error']); 
}
if(move_uploaded_file($_FILES['photo']['tmp_name'],$server_name)){
    //成功
    echo "恭喜您，上传成功！"."<br />3秒后将自动跳转到个人主页！";    
    header("refresh:3;url=../controller/spaceC.php?uId=$uId&pageNow=1");
}else{
    //失败  
    echo "对不起，上传头像失败了！";
    header("refresh:2;url=../controller/spaceC.php");
}
?>