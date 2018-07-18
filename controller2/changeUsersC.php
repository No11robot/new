<?php
include "../functions.php";
$uId=$_GET['uId'];
$uName=$_GET['uName'];
$pwd=$_GET['pwd'];
$email=$_GET['email'];
$grade=$_GET['grade'];
$str="uName= '$uName', pwd='$pwd', email= '$email', grade='$grade'";
$rasult=changeInfo($uId,$str);
echo json_encode($result);