<?php ob_start(); 
require("./view/frontend/content/register/register_form.php");
$content = ob_get_clean();
$s_ajax = "register_ajax.js";
require("./view/frontend/template/template.php");