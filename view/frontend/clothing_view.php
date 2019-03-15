<?php ob_start(); 
require("./view/frontend/content/clothing/clothing_display.php");
$content = ob_get_clean();
require('./view\frontend\template\template2.php');