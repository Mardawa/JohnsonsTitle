<div>
	<form  method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]).'?action=myProfile';?>">

		<div class="custom-file"> 
			<input type="file" class="custom-file-input" name="imagePP" id="fileToUpload">
		<label class="custom-file-label" for="fileToUpload">Choose file</label>
		</div>
		<button type="submit" class="btn btn-light">Change picture</button>

	</form>
</div>




    
