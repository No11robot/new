<?php
include_once "../functions.php";
if(!isset($_SESSION)){
    session_start();
}
if(isset($_POST['sm'])){
    $uName = $_POST['uName'];
    $email = $_POST['Email'];
    $pwd = $_POST['pwd'];
    $pwd2 = $_POST['pwd2'];
    $imgcode = strtolower($_POST['imgcode']);//接受从登陆输入框提交过来的验证码并转化为小写；
    $myimagecode  = strtolower($_COOKIE['checkkey']) ;//从session中取得验证码并转化为小写；
    if(strcmp($imgcode, $myimagecode)){
         echo '请输入正确的验证码';exit;
    }else{
        if($pwd2==$pwd){
        $num=checkUserName($uName);
        if($num){
            $str="'$uName', '$email', '$pwd'";
            $rasult=addUsers($str);
            if($rasult){
                echo '插入数据库错误！！！';
            }else{
                echo "<script> alert('注册成功！马上登陆？');parent.location.href='../view/login.php?pageNow=1'; </script>";
            }
        }else{
            echo '用户名已被使用！！！';
        }
    }else{
         echo "<script> alert('密码有误！');parent.location.href='../controller/spaceC.php?uId=$uId&pageNow=1'; </script>";
    }
    } 
}
 else {
    include "../view/register.php";
}

