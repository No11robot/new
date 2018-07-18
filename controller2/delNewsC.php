<?php
include "../functions.php";
$nId=$_GET['nId'];
$result=delNewsByNid($nId);
echo json_encode($result);
