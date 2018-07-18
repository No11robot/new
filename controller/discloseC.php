<?php
include "../functions.php";
if(!isset($_SESSION)){
    session_start();
}
include "../config.php";
$smarty->display("disclose.php");

