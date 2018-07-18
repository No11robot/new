<?php
include "../config2.php";
include_once "../functions.php";
if(!isset($_SESSION)){
    session_start();
}
session_destroy();//销毁session文件；
include "../view/login.php";//跳转到登陆页面