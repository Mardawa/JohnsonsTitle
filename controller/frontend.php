<?php

function main()
{
	ob_start(); 
	require("./view/frontend/content/main_content.php");
	$content = ob_get_clean();
	require("./view/frontend/template.php");
}

function register()
{
    require('./controller/register.php');
}

function login()
{
	require('./controller/login.php');
}

function logout()
{
	session_start();
	$_SESSION = array();
	session_destroy();

	setcookie("username", "", time()-3600);
	setcookie("pswd", "", time()-3600);

	header("Location: index.php?action=main");
}

function myProfile()
{
	require("./controller/myProfile.php");	
}

function clothing()
{
	require('./controller/clothing.php');
}

function title()
{
	require('./controller/title.php');
}