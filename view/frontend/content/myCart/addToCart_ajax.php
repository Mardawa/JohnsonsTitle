<?php
session_start();

$root = $_SERVER['DOCUMENT_ROOT'];
require_once($root . "\model\ShopManager.php");
$shopManager = new ShopManager();

$productId = $_POST['productId'];
$userId = $_SESSION['id'];
// Qte not setup yet 

// check if productId already in userId cart ? addToCart : updateCartQte
if( $shopManager->isAlreadyInCart($userId,$productId) ){
    // get the old qte 
    $data = $shopManager->getCartProductQte($userId,$productId);
    $oldQte = $data['qte'];
    $newQte = $oldQte + 1; // changing 1 to default Qte set up by user
    $shopManager->updateCartQte($userId,$productId,$newQte);
    echo " qte updated ";

} else {
    $shopManager->addToCart($productId,$userId);
    echo "new product added";
}



//echo "userId : ".$userId;
//echo " productId : ".$productId;