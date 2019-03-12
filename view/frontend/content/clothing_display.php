<div class="container-fluid">
	<div class="alert alert-info alert-dismissible">
		<button type="button" class="close" data-dismiss="alert">
			&times;
	    </button>

	    <strong> Info : </strong> This page only display product, aditionnal features will be added.
	</div>

	<div class="row">
	  <div class="col-md-3">

        <?= $type_menu ?>
        <br>

	  </div>

	  <div class="col-md-9">
	  	<?php require("./view/frontend/content/clothing/clothing_carousel.php")?>
		<br>

		<div class="container">
			<?= $products ?>
		</div>  

	  </div>

	</div>
	
</div>