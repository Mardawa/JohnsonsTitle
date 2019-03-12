<?php ob_start(); 
require("./view/frontend/content/clothing_display.php");
$content = ob_get_clean();
require('./view/frontend/template2.php');