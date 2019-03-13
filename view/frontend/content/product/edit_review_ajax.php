<?php

$root = $_SERVER['DOCUMENT_ROOT'];
require_once($root . "\model\ShopManager.php");
require_once($root . "\model\FormCheckerManager.php");
$shopManager = new ShopManager();
$formCheckerManager = new FormCheckerManager();

$id = $_POST['id'];
$newText = $_POST['newText'];
$newTitle = $_POST['newTitle'];

$shopManager->editReview($id,$newTitle,$newText);

// echo "Post: " . $id;
// echo " title: " . $newTitle;
// echo "text: " . $newText;
