<div class="container-fluid">
	<h2 class="text-center"> My profile </h2>
	<div class="row">

		<div class="col">
			<h4> My informations </h4>
			<p>
			Id : <?= $id ?> <br>
			Pseudo : <?= $pseudo ?> <br>
			Email : <?= $email ?>
			</p>
			Password : 
			<button id="changePswd"> Change password </button>
			<form style="display: none;" id="changePswdForm">

				<label> Old password </label>
				<input type="password" name="password1" id="password" required=""> 
				<br>

				<label> New password </label>
				<input type="password" name="password2" id="password" required="">
				<br>

				<label> Repeat password </label>
				<input type="password" name="password2" id="password" required="">
				<br>

				<input type="submit" value="Confirm">
				
			</form>

		</div>

		<div class="col">
			<h4> My profile picture </h4>
			
			

			<?php require("./view/frontend/content/imagePP_form.php");?>

		</div>

		<div class="col">
			<?= "/public/img/users/${pseudo}{$id}/profile_picture.jpeg"?>
			<img src=<?= "/public/img/users/${pseudo}{$id}/profile_picture.jpeg" ?> class="img-thumbnail">
		</div>


	</div>
</div>
<script type="text/javascript">

$(document).ready(function(){

	$("#changePswd").on("click",showForm);

});

function showForm(){
	$("#changePswdForm").toggle();
	if ($("#changePswd").text() === "Cancel"){
		$("#changePswd").text("Change password");
	} else {
		$("#changePswd").text("Cancel");
	}
}

</script>

