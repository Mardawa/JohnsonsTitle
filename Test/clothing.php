<!DOCTYPE html>
<html>
<head>
	<?php include("head.php"); ?>
</head>
<body>
	<div class="bloc_page">
		<?php include("header.php") ?>
		
		<form method="post" action="traitement_clothing.php">
			<fieldset>
				<legend> Master Password required </legend>
				<label for="pswd"> Password </label>
				<input type="Password" name="pswd" id="pswd" required="">
				<br>

				<input type="submit" name="submit">
			</fieldset>
			
		</form>
	</div>

</body>
</html>