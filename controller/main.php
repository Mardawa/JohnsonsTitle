<?php ob_start(); 
require('main_content.php');
$content = ob_get_clean();
require('template.php');