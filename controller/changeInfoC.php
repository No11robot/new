<?php
include "../config.php";
include_once "../functions.php";
error_reporting(0);
if(!isset($_SESSION)){
    session_start();
}
if(isset($_POST['changeInfo'])){
    $uId=$_SESSION['us']['uId'];
    $pwd0=$_SESSION['us']['pwd'];
    $uName = $_POST['uName'];
    $email = $_POST['Email'];
    $pwd = $_POST['pwd'];   //输入密码
    $pwd1 = $_POST['pwd1']; //新密码
    $pwd2 = $_POST['pwd2']; //确认新密码
    /* 原密码和新密码都相同查看用户名是否唯一     */
    if($pwd0==$pwd and $pwd1==$pwd2){
        if($uName==$_SESSION['us']['uName']){//判断是否改名
            $num=1;
        }else{
            $num=checkUserName($uName);
        }        
        if($num){
            if($pwd1==NULL){//判断用户是否改密码
                $pwd1=$pwd;
            }
            $str="uName= '$uName', email= '$email', pwd= '$pwd1'";
            $result=changeInfo($uId,$str);
            if($result){
                echo '修改数据库错误！！！';
            }else{
                $_SESSION['us']['uName']=$uName;
                $_SESSION['us']['pwd']=$pwd;
                echo "<script> alert('修改成功！');parent.location.href='../controller/spaceC.php?pageNow=1'; </script>";
            }
        } else {
            echo '用户名已被使用！！！';
        }
    }else{
         echo "<script> alert('密码有误！');parent.location.href='../controller/spaceC.php?uId=$uId&pageNow=1'; </script>";
    }
}
if(isset($_POST['muk'])){
    $uId=$_SESSION['us']['uId'];
        $hobby_arr = array();
        $hobby_arr = $_POST['hobby'];
        $hobby = implode('，', $hobby_arr);//把数组转换为字符串
        $str="loves= '$hobby'";
        $result=changeInfo($uId,$str);
        if($rasult){
                echo "<script> alert('修改数据库错误！！！！');parent.location.href='../controller/spaceC.php?pageNow=1'; </script>";
            }else{
                $_SESSION['lovesSection']=$hobby_arr;
                echo "<script> alert('修改成功！');parent.location.href='../controller/spaceC.php?pageNow=1'; </script>";
            }
}