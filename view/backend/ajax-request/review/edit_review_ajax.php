<?php

$root = $_SERVER['DOCUMENT_ROOT'];
require_once($root . "\model\ShopManager.php");
require_once($root . "\model\FormCheckerManager.php");
$shopManager = new ShopManager();
$formCheckerManager = new FormCheckerManager();

$id = $_POST['id'];
$newText = $formCheckerManager->test_input($_POST['newText']);
$newTitle = $formCheckerManager->test_input($_POST['newTitle']);
$star = $_POST['star'];

$shopManager->editReview($id,$newTitle,$newText,$star);

// echo "Post: " . $id;
// echo " title: " . $newTitle;
// echo "text: " . $newText;
// echo "Star :". $star;
