<?php
$root = $_SERVER['DOCUMENT_ROOT'];
require_once($root . "./model/FormCheckerManager.php");
$formCheckerManager = new FormCheckerManager();

// $pseudo = $formCheckerManager->test_input($_REQUEST["q"]);
$pseudo = $formCheckerManager->test_input($_POST['username']);

$pseudoErr = "Valid username";

try {
    $formCheckerManager->checkUsername($pseudo);
} catch (Exception $e) {
    $pseudoErr = $e->getMessage();
}

try {
    $formCheckerManager->usernameIsAlreadyUsed($pseudo);
} catch (Exception $e) {
    $pseudoErr = $e->getMessage();
}

echo $pseudoErr;
