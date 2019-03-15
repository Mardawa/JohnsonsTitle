<?php ob_start(); 
require("./view/frontend/content/login/login_form.php");
$content = ob_get_clean();
require('./view/frontend/template/template.php');