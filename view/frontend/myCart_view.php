<?php ob_start(); 
require(".view/frontend/content/myCart/myCart_display.php");
$content = ob_get_clean();
require('./view/frontend/template.php');