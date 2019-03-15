<?php
class ImageManager
{

	public function printInfo($name)
	{
		echo "name : ";
		echo $_FILES[$name]['name'];
		echo "<br>";

		echo "size : ";
		echo $_FILES[$name]['size'];
		echo "<br>";

		echo "tmp_name : ";
		echo $_FILES[$name]['tmp_name'];
		echo "<br>";

		echo "error : ";
		echo $_FILES[$name]['error'];
	}

	public function upload($index,$destination,$extensions)
	{
	     if (!isset($_FILES[$index]) OR $_FILES[$index]['error'] > 0) return FALSE;
	     $ext = substr(strrchr($_FILES[$index]['name'],'.'),1);
	     if ($extensions !== FALSE AND !in_array($ext,$extensions)) return FALSE;
	   //Déplacement
	     return move_uploaded_file($_FILES[$index]['tmp_name'],$destination);
	}

	public function convert_to_jpeg($target, $newcopy, $ext) 
	{
		switch ($ext) {
	    case 'jpg':
	       $image = imagecreatefromjpeg($target);
	    break;
	    case 'gif':
	       $image = imagecreatefromgif($target);
	    break;
	    case 'png':
	       $image = imagecreatefrompng($target);
	    break;
		}

		imagejpeg($image,$newcopy);
	}

	public function cropImage($target,$s1,$s2)
	{
		$image = imagecreatefromjpeg($target);

		$thumb_width = $s1;
		$thumb_height = $s2;

		$width = imagesx($image);
		$height = imagesy($image);

		$original_aspect = $width / $height;
		$thumb_aspect = $thumb_width / $thumb_height;

		if ( $original_aspect >= $thumb_aspect )
		{
		   // If image is wider than thumbnail (in aspect ratio sense)
		   $new_height = $thumb_height;
		   $new_width = $width / ($height / $thumb_height);
		}
		else
		{
		   // If the thumbnail is wider than the image
		   $new_width = $thumb_width;
		   $new_height = $height / ($width / $thumb_width);
		}

		$thumb = imagecreatetruecolor( $thumb_width, $thumb_height );

		// Resize and crop
		imagecopyresampled($thumb, $image,
                   0 - ($new_width - $thumb_width) / 2, // Center the image horizontally
                   0 - ($new_height - $thumb_height) / 2, // Center the image vertically
                   0, 0,
                   $new_width, $new_height,
                   $width, $height);
		imagejpeg($thumb, $target, 100);
	}

	public function watermark($target)
	{
		$source = imagecreatefrompng("./img/favicon/android-icon-36x36.png");
		$destination = imagecreatefromjpeg($target);

		$largeur_source = imagesx($source);
		$hauteur_source = imagesy($source);
		$largeur_destination = imagesx($destination);
		$hauteur_destination = imagesy($destination);

		$destination_x = $largeur_destination - $largeur_source;
		$destination_y =  $hauteur_destination - $hauteur_source;

		imagecopymerge($destination, $source, $destination_x, $destination_y, 0, 0, $largeur_source, $hauteur_source, 60);

		imagejpeg($destination,$target,100);

	}
}