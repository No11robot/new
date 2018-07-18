<?php
include "../functions.php";
$uId=$_GET['uId'];
$result=delUsersByUid($uId);
echo json_encode($result);