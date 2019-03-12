<!DOCTYPE html>
<html>
<head>
	<?php include("head.php"); ?>
</head>
<body>
	<div class="bloc_page">
		<?php include("header.php") ?>

		<?php

		if ($_POST["pswd"] == "lepire") {
			echo "Attaboy";
		} else {
			echo "Wrong Password";
		}

		?>
	</div>

</body>
</html>