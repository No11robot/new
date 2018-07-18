<?php
include_once "../functions.php";
//include "../config.php";
if(!isset($_SESSION)){
    session_start();
}
if(isset($_POST['sm'])){
    $uName = $_POST['uName'];
    $pwd = $_POST['pwd'];
    $imgcode = strtolower($_POST['imgcode']);//接受从登陆输入框提交过来的验证码并转化为小写；
    $myimagecode  = strtolower($_COOKIE['checkkey']) ;//从session中取得验证码并转化为小写；
    if(strcmp($imgcode, $myimagecode)){
         echo '请输入正确的验证码';exit;
    }else{
        $check= checkUser($uName, $pwd);
        if(key($check)){
        echo $check[1];
        }else{
            $_SESSION['us']=$check[0];
            $str= getLoveSectionByUid($_SESSION['us']['uId']);
            if(key($str)){
                $_SESSION['lovesSection']=$str;
            }else{
                $lovesSestion=explode('，', $str[0]['loves']);//注意中文"，"号
                $_SESSION['lovesSection']=$lovesSestion;
            }
            include "../controller/indexC.php";
        }
    } 
}
 else {
    include "../view/login.php";
}

