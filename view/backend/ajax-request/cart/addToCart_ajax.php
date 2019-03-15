<?php
session_start();

$root = $_SERVER['DOCUMENT_ROOT'];
require_once($root . "\model\ShopManager.php");
$shopManager = new ShopManager();

$productId = $_POST['productId'];
$userId = $_SESSION['id'];
// To add qte choosen by a user

// check if productId already in userId cart ? addToCart : updateCartQte
if ($shopManager->isAlreadyInCart($userId, $productId)) {
    $data = $shopManager->getCartProductQte($userId, $productId);
    $oldQte = $data['qte']; // get the old qte (qte in the databse)
    $newQte = $oldQte + 1; // adding 1 the qte --> will update the qte selected by user in the futur 
    $shopManager->updateCartQte($userId, $productId, $newQte);
    echo " qte updated ";
} else {
    $shopManager->addToCart($productId, $userId);
    echo "new product added";
}