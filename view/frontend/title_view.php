<?php ob_start(); 
require("./view/frontend/content/title/title_display.php");
$content = ob_get_clean();
require('./view/frontend/template.php');