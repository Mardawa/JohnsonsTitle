<?php
session_start();

$root = $_SERVER['DOCUMENT_ROOT'];
require_once($root . "\model\ShopManager.php");
$shopManager = new ShopManager();

$id = $_POST['id'];
$userId = $_SESSION['id'];

$test = $shopManager->removeProductCart($id);
echo $id;
