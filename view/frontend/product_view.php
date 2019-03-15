<?php ob_start(); 
require("./view/frontend/content/product/product_handler.php");
require("./view/frontend/content/product/product_display.php");
$content = ob_get_clean();
require('./view\frontend\template\template2.php');