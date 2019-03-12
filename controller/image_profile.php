<?php

if (isset($_FILES['imagePP']['name']))
{
	$extension_upload = strtolower(substr(strrchr($_FILES['imagePP']['name'],'.'),1));
	$dir = "./public/img/users/{$pseudo}{$id}/";
	$nom = "profile_picture.{$extension_upload}";
	$path = $dir . $nom;
	if (!is_dir($dir)) {
	   	mkdir($dir,0700,true);
	}
	$valid_extensions = array('jpg' , 'jpeg' , 'gif' , 'png');

	$upload1 = $imageManager->upload('imagePP',$path,$valid_extensions);
	if($upload1) 
	{ 
		$end = "profile_picture.jpeg";
		if($extension_upload!='jpeg')
		{
		$imageManager->convert_to_jpeg($path,$dir.$end,$extension_upload);
		unlink($path);		
		}

		$imageManager->cropImage($dir.$end,200,200);
		$imageManager->watermark($dir.$end);
		echo "Operation succesfull ! ";

	} else {
		#upload failed
	}

	
}


