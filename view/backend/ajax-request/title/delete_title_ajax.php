<?php

$root = $_SERVER['DOCUMENT_ROOT'];
require_once($root."\model\ShopManager.php");
$shopManager = new ShopManager();

$id = $_POST["id"];
$shopManager->deleteTitle($id);
//echo $id." was deleted";