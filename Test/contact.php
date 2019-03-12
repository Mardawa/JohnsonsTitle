<!DOCTYPE html>
<html>
<head>
	<?php include("head.php"); ?>
</head>
<body>
	<div class="bloc_page">
		<?php include("header.php"); ?>

		<div id="contact_form"> 
			<form method="post" action="traitement_contact.php">
				<fieldset>
					<legend> Votre message </legend>

					<label for="pseudo"> Pseudo :</label>
					<input type="text" name="pseudo" id="pseudo" required />
					<br>

					<label for="message"> Message :</label>
					<input type="text" name="message" id="message" required />
					<br>

					<input type="submit" name="submit" />

				</fieldset>

				
			</form>
		</div>

		<div id="minichat">
			<?php
			try
			{
				$bdd = new PDO('mysql:host=localhost;dbname=jt_title;charset=utf8', 'root', 'root',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

			}
			catch(Exception $e)
			{
				die("Error : " .$e->getMessage());

			}

			$answer = $bdd->query("SELECT pseudo, message FROM minichat");

			while ($data = $answer->fetch())
			{
    		echo '<p><strong>' . htmlspecialchars($data['pseudo']) . '</strong> : ' . htmlspecialchars($data['message']) . '</p>';
			}


			$answer->closeCursor();

			?>
			
		</div>
		
	</div>

</body>
</html>