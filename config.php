<?php
include "smarty/Smarty.class.php";
$smarty=new Smarty;
$smarty->left_delimiter="<{";
$smarty->right_delimiter="}>";
$smarty->compile_dir="../view_c";
$smarty->template_dir="../view";
//$smarty->compile_dir="../view2_c";
//$smarty->template_dir="../view2";
//开启缓存
//$smarty->caching=true;
//$smarty->cache_lifetime=999;
//$smarty->cache_dir="../data_cache";

