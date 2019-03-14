<?php

// Using this just to get the number of star of a product

$root = $_SERVER['DOCUMENT_ROOT'];
require_once($root . "\model\ShopManager.php");
$shopManager = new ShopManager();

$id = $_POST['id'];

$data = $shopManager->getReviewById($id);
$star = $data['Star'];

echo $star;