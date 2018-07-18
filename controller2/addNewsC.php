<?php
include_once  "../functions.php";
include "../config2.php";
if(!isset($_SESSION)){
    session_start();
}
$smarty->display("addNews.php");