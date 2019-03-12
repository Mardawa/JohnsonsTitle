<?php

require_once("./model/FormCheckerManager.php");
$formCheckerManager = new FormCheckerManager();

$pseudo = $formCheckerManager->test_input($_REQUEST["q"]);

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
