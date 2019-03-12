<?php

require_once("./model/FormCheckerManager.php");
$formCheckerManager = new FormCheckerManager();

$pseudoErr = $passwordErr = $emailErr = "";

if (isset($_POST["pseudo"]) AND isset($_POST["password"]) AND isset($_POST["password2"]) AND isset($_POST["email"]))
{
	$pseudo = $formCheckerManager->test_input($_POST["pseudo"]);
	$password = $formCheckerManager->test_input($_POST["password"]);
	$password2 = $formCheckerManager->test_input($_POST["password2"]);
	$email = $formCheckerManager->test_input($_POST["email"]);

	$status = true;

	try {
		$formCheckerManager->checkUsername($pseudo);	
	} catch (Exception $e) {
		$status = false;
		$pseudoErr = $e->getMessage();
	}


	try {
		$formCheckerManager->pswdMatch($password,$password2);
	} catch (Exception $e) {
		$status = false;
		$passwordErr = $e->getMessage();
	}

	try {
		$formCheckerManager->usernameIsAlreadyUsed($pseudo);
	} catch (Exception $e) {
		$status = false;
		$pseudoErr = $e->getMessage();
	}

	try {
		$formCheckerManager->emailIsAlreadyUsed($email);
	} catch (Exception $e) {
		$status = false;
		$emailErr = $e->getMessage();
	}

	if ($status)
	{
		$formCheckerManager->addDataUsers($pseudo,$password,$email);
		echo "Registration succesfull, you may <a href=\"index.php?action=login\">login</a>";
	} else {
		require("./view/frontend/register_view.php");
		echo "Registration failed, please submit a new form";
	}

} else {
	require("./view/frontend/register_view.php"); 
}
