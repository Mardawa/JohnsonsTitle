<?php
class FormCheckerManager
{

// SECTION 1 LOGIN AND REGISTER

	// Function to secure the user input
	public function test_input($data) 
	{
		$data = trim($data);
 	 	$data = stripslashes($data);
  		$data = htmlspecialchars($data);
  		return $data;
	}

	// Function to check if the username only use letter and space
	public function checkUsername($username)
	{
		if (!preg_match("/^[a-zA-Z ]*$/",$username)) 
		{
			throw new Exception("Invalid username");
		} else {
			return true;
		}
	}

	// Function to check if pswd1 match pswd2
	public function pswdMatch($pswd1,$pswd2)
	{
		if ($pswd1 != $pswd2)
		{
			throw new Exception("Password doesn't match");
			
		} else {
			return true;
		}
	}

	// Return the id and hash pswd of a user 
	public function returnPswd($username)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('SELECT id,pswd FROM users WHERE pseudo =:pseudo');
		$req->execute(array('pseudo' => $username));
		return $req->fetch();
	}

	// Return the mail of a user
	public function returnEmail($username)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('SELECT email FROM users WHERE pseudo =:pseudo');
		$req->execute(array('pseudo' => $username));
		$resultat = $req->fetch();
		return $resultat['email'];		
	}

	// Check if the username is already taken
	public function usernameIsAlreadyUsed($username)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('SELECT id FROM users WHERE pseudo =:pseudo');
		$req->execute(array('pseudo' => $username));
		$bool = (bool) $req -> fetchColumn();
		if ($bool)
		{
		 	throw new Exception("Username already taken");
		} 
	}

	// Check if the email is already taken
	public function emailIsAlreadyUsed($var)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('SELECT id FROM users WHERE email =:email');
		$req->execute(array('email' => $var));
		$bool = (bool) $req -> fetchColumn();
		if ($bool) {
			throw new Exception("Email already taken");
		}
	}

	// Function to add all the data to the table users
	public function addDataUsers($username,$pswd,$email)
	{
		$db = $this->dbConnect();
		$pswd_hash = password_hash($pswd, PASSWORD_DEFAULT);
		$req = $db->prepare("INSERT INTO users(pseudo, pswd, email, date_inscription) 
			VALUES(:pseudo, :password, :email, CURDATE())");
		$req->execute(array(
	  		'pseudo'=> $username,
	  		'password' => $pswd_hash,
	  		'email' => $email ));
	}
	
// SECTION : GENERAL 

	// Function to connect to the db : jt_title
	private function dbConnect()
	{
		try
		{
			$db = new PDO('mysql:host=localhost;dbname=jt_title;charset=utf8', 'root', 'root',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
			return $db;
		}
		catch(Exception $e)
		{
			die('Erreur : '.$e->getMessage());
		}
	}




}