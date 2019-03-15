<div class="container"> 
	<form class="" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]).'?action=register';?>"> 
		<fieldset>
			<legend> Registration </legend>

				<div class="form-group">
					<label for="pseudo"> Username* :</label>
					<input id="toCheck" class="form-control" type="text" name="pseudo" id="pseudo" autocomplete="off" 
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



<script src='view\frontend\content\register\register_js.js'></script>