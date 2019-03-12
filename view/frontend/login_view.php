<?php ob_start(); 
require("./view/frontend/content/login_form.php");
$content = ob_get_clean();
require('./view/frontend/template.php');