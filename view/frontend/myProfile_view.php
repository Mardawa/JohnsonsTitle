<?php ob_start(); 
require("./view/frontend/content/myProfile/myProfile_content.php");
$content = ob_get_clean();
require('./view\frontend\template\template2.php');