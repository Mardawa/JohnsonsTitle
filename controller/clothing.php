<?php
session_start();

require_once("./model/ShopManager.php");
$shopManager = new ShopManager();

require_once("./model/FormCheckerManager.php");
$formCheckerManager = new FormCheckerManager();

// Add a new review 
if (isset($_POST["reviewTitle"])){

  $userID = $_POST["userID"];
  $productID = $_POST["productID"];
  $title = $formCheckerManager->test_input($_POST["reviewTitle"]);
  $review = $formCheckerManager->test_input($_POST["reviewText"]);
  $star = $_POST["rating"];
  $star = $star*1;
  $shopManager->addNewProduct($userID,$productID,$title,$review,$star);
  Header('Location: '.$_SERVER['PHP_SELF'].'?action=clothing&productKey='.$productID);
}

// Generate the side menu
ob_start();
$req = $shopManager->getTypesCount();
?>
  <a class="text-decoration-none" href="index.php?action=clothing"> <h2 class="font-weight-bold text-body"> Clothing </h2> </a>  
    <div class="list-group">

<?php
while ($data = $req->fetch()){
  $cat = $data["type"];
  ?>
  <a href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]).'?action=clothing&cat='. $cat ;?>" class="list-group-item list-group-item-action"> 
    <?php echo "{$data["type"]}"; ?>
    <span class="text-secondary">
      (<?php echo "{$data["count"]}"; ?>)
    </span>
  </a>

 <?php 
}
      
?>
    </div><br>
<?php
$type_menu = ob_get_contents();
ob_clean();


// Display all the products
ob_start();
echo "<div class=\"card-deck\">";
if (isset($_GET['cat'])) {
  $req = $shopManager->getClothingsByCat($_GET['cat']);
} else {
  $req = $shopManager->getClothings();
}
while ($data = $req->fetch()) {
  $productKey = $data["id"];
?>
  
  
  <div class="col-md-3">

  	<div class="card" style="width:200px; height:450px">
    		<img class="card-img-top" src="http://placehold.it/200x300" width="200" height="300">
    		<div class="card-body">
     			<h4 class="card-title text-center">
     				<?php echo "{$data["name"]}"; ?>
     			</h4>
      		<p class="card-text text-center">
      			<?php echo "{$data["price"]}$"; ?>
      		</p>
          <a href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]).'?action=clothing&productKey='. $productKey ;?>" class="stretched-link"></a>
    		</div>
  	</div>
    <br>

  </div>
  

<?php
}
echo "</div>";
$products = ob_get_contents();
ob_clean();

if (isset($_GET['productKey'])) 
{
  require("./view/frontend/product_view.php");
} else {
  require("./view/frontend/clothing_view.php");
}



   