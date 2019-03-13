<?php

$root = $_SERVER['DOCUMENT_ROOT'];
require_once($root."\model\ShopManager.php");
require_once($root."\model\FormCheckerManager.php");
$shopManager = new ShopManager();
$formCheckerManager = new FormCheckerManager();

$id = $_POST["id"];
$newTitle = $formCheckerManager->test_input($_POST["newTitle"]);
$shopManager->editTitle($id,$newTitle);
echo $id." was updated to : ".$newTitle;