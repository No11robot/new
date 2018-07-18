<?php
include "../functions.php";
$nId=$_GET['nId'];
$title=$_GET['title'];
$nDate=$_GET['nDate'];
$author=$_GET['author'];
$sketch=$_GET['sketch'];
$hotWord=$_GET['hotWord'];
$str="title= '$title', nDate='$nDate', author= '$author', sketch='$sketch', hotWords='$hotWord'";
$rasult=changeNews($nId,$str);
echo json_encode($result);