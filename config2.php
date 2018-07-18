<?php

include "smarty/Smarty.class.php";
$smarty=new Smarty;
$smarty->left_delimiter="<{";
$smarty->right_delimiter="}>";
$smarty->compile_dir="../view2_c";
$smarty->template_dir="../view2";

