<div class="container"> 

	<div class="row">
		<div class="col"> </div>
		<div class="col">
			
			<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]).'?action=login';?>">

				<fieldset> 
					<legend class="text-center"> Login </legend>

					<div class="form-group">
						<input class="form-control" type="text" name="pseudo" id="pseudo" placeholder="Username" required />
					</div>

					<div class="form-group">
						<input class="form-control" type="password" name="password" id="password" placeholder="Password" required />
					</div>

					<span class="text-center text-danger"> <?= $loginErr ?></span>

 					<div class="custom-control custom-checkbox"> 
 						<input type="checkbox" class="custom-control-input" name="autoconnect" id="autoconnect">
 						<label class="custom-control-label" for="autoconnect"> Stay login </label>
 					</div>

 					<br>

					<div class="g-recaptcha" data-sitekey="6LeIxAcTAAAAAJcZVRqyHh71UMIEGNQ_MXjiZKhI"></div>
					<br>
				

					<button type="submit" class="btn btn-light"> Login </button>
				</fieldset>		
			</form>
			<br>
		</div>
		<div class="col"> </div>
	</div>
</div>