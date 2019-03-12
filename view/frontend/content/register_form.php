<div class="container"> 
	<form class="" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]).'?action=register';?>"> 
		<fieldset>
			<legend> Registration </legend>

				<div class="form-group">
					<label for="pseudo"> Username* :</label>
					<input class="form-control" type="text" onkeyup="checkUsername(this.value)" name="pseudo" id="pseudo" autocomplete="off" 
					<?php if (isset($pseudo)) {
						echo "value=${pseudo}";
					} ?> required />
					<span id="usernameStatus"> <?php echo $pseudoErr;?></span>
				</div>


				<div class="form-group"> 
					<label for="password"> Password* :</label>
					<input class="form-control" type="password" name="password" id="password" required />
				</div>

				<div class="form-group"> 
					<label for="password"> Repeat your password* :</label>
					<input class="form-control" type="password" name="password2" id="password" required />
					<span> <?php echo $passwordErr;?></span>
				</div>

				<div class="form-group">
					<label for="email"> Email* :</label>
					<input class="form-control" type="email" name="email" id="email" autocomplete="off"
					<?php if (isset($email)) {
						echo "value=${email}";
					} ?> required />
					<span> <?php echo $emailErr;?></span>
				</div>

				<p>*Required fields</p>

				<div class="g-recaptcha" data-sitekey="6LeIxAcTAAAAAJcZVRqyHh71UMIEGNQ_MXjiZKhI"></div>
				<br>

				<button type="submit" class="btn btn-light"> Register </button>
			<br>
		</fieldset>
	</form>
	<br>
</div>




<script>

function checkUsername(str) {
    if (str.length == 0) { 
    	// document.getElementById("usernameStatus").innerHTML ="";
    	$("#usernameStatus").text("");
        return;
    } else {
    	$.get("checkUsername.php?q="+str,function(data,status){
    		$("#usernameStatus").text(data);
    	});
        // var xmlhttp = new XMLHttpRequest();
        // xmlhttp.onreadystatechange = function() {
        //     if (this.readyState == 4 && this.status == 200) {
        //         document.getElementById("usernameStatus").innerHTML = this.responseText;
        //     }
        // };
        // xmlhttp.open("GET", "checkUsername.php?q=" + str, true);
        // xmlhttp.send();
    }
}
</script>