<?php
include "../functions.php";
$dId=$_GET['dId'];
$result=delDiscloseByDid($dId);
echo json_encode($result);