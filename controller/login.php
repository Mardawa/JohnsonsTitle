<?php
require_once("./model/FormCheckerManager.php");
$formCheckerManager = new FormCheckerManager();

if (isset($_COOKIE['username']) && isset($_COOKIE['pswd']))
{
	$pseudo = $formCheckerManager->test_input($_COOKIE["username"]);
	$password = $formCheckerManager->test_input($_COOKIE["pswd"]);
	$loginErr ="";

	$resultat = $formCheckerManager->returnPswd($pseudo);
	$isPasswordCorrect = $formCheckerManager->pswdMatch($password,$resultat['pswd']);
	if ($isPasswordCorrect)
	{
		session_start();
		$_SESSION['id'] = $resultat['id'];
	 	$_SESSION['pseudo'] = $pseudo;
	 	header('Location: index.php?action=main');
	}

} else {

	if (isset($_POST["pseudo"]) AND isset($_POST["password"]))
	{
	$pseudo = $formCheckerManager->test_input($_POST["pseudo"]);
	$password = $formCheckerManager->test_input($_POST["password"]);

	$resultat = $formCheckerManager->returnPswd($pseudo);
	$isPasswordCorrect = password_verify($password,$resultat['pswd']);

	if (!$resultat)
	{
		$loginErr ='Mauvais identifiant ou mot de passe !';
		require("./view/frontend/login_view.php");
	}
	else {
		if ($isPasswordCorrect) 
		{
	  		session_start();
			$_SESSION['id'] = $resultat['id'];
	 		$_SESSION['pseudo'] = $pseudo;
	 		// echo $_SESSION['id'];
	 		// echo "<br>";
	 		// echo $_SESSION['pseudo'];
	 		// echo "<br>";
	 		if (isset($_POST["autoconnect"]) && $_POST["autoconnect"] =="on")
			{
				setcookie('username', $pseudo, time() + 7*24*3600, null, null, false, true);
				setcookie('pswd', $resultat['pswd'], time() + 365*24*3600, null, null, false, true);
				// echo "Cookie set";
			}
	 		header('Location: index.php?action=main');
	 	}
		else {
			$loginErr ='Mauvais identifiant ou mot de passe !';
			require("./view/frontend/login_view.php");
			}
		}
	} else {
		require("./view/frontend/login_view.php");
	}
}
