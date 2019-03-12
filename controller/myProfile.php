<?php 
session_start();

require_once("./model/FormCheckerManager.php");
require_once("./model/ImageManager.php");

$formCheckerManager = new FormCheckerManager();
$imageManager = new ImageManager();

$_SESSION['pseudo'];
$pseudo = $_SESSION['pseudo'];
$email = $formCheckerManager->returnEmail($pseudo);
$id = $_SESSION['id'];

require("./controller/image_profile.php");

require("./view/frontend/myProfile_view.php");




