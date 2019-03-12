<?php

$root = $_SERVER['DOCUMENT_ROOT'];
require_once($root."\model\ShopManager.php");
$shopManager = new ShopManager();

$id = $_POST["id"];
$newTitle = $_POST["newTitle"];
$shopManager->editTitle($id,$newTitle);
echo $id." was updated to : ".$newTitle;