<?php
class ShopManager
{

	// Shopping cart Section

	// get the cart of an user given its id (userId)
	public function getCart($userID)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('SELECT shopping_cart.id as "cartId",
		products.name as "Productname", 
		products.price as "Ppu",
		shopping_cart.quantity as "Quantity",
		products.price * shopping_cart.quantity as "Totalprice"
		FROM shopping_cart, products
		WHERE fkProductsId = products.id
		AND fkUsersId= :userID');
		$req->execute(array('userID' => $userID));
		return $req;
	}

	// add the product (productId) to the user (userId) shopping cart
	public function addToCart($productId, $userId)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('INSERT INTO `shopping_cart` (`fkUsersId`, `fkProductsId`, `quantity`) VALUES (:userId, :productId, 1)');
		$req->execute(array(
			'userId' => $userId,
			'productId' => $productId
		));
		return $req;
	}

	// remove a product (line) from the cart id -> id of cart
	public function removeProductCart($id)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('DELETE FROM `shopping_cart` 
		WHERE `id` = :id');
		$req->execute(array(
			'id' => $id
		));
	}

	// update the Qte of a product in a user cart
	public function updateCartQte($userId,$productId,$qte)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('UPDATE `shopping_cart` 
		SET `quantity`= :qte
		WHERE `fkUsersId`= :userId
		AND `fkProductsId`= :productId');
		$req->execute(array(
			'userId' => $userId,
			'productId' => $productId,
			'qte' => $qte
		));
	}

	// get the Qte of a product in a user cart
	public function getCartProductQte($userId,$productId)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('SELECT `quantity` as "qte"
		FROM `shopping_cart` 
		WHERE `fkUsersId` = :userId
		AND `fkProductsId`= :productId');
		$req->execute(array(
			'userId' => $userId,
			'productId' => $productId
		));
		return $req->fetch();
	}

	// check if a product is already in a user cart
	public function isAlreadyInCart($userId, $productId)
	{
		$db = $this->dbConnect();
		$req = $db->prepare("SELECT * 
		FROM `shopping_cart` 
		WHERE `fkUsersId`= :userId
		AND `fkProductsId`= :productId");
		$req->execute(array(
			'userId' => $userId,
			'productId' => $productId
		));
		$bool = (bool)$req->fetchColumn();
		return $bool;
	}

	// Clothing Section

	// generate star 
	public function generateStar($star)
	{
		$star1 = "";
		if ($star * 2 % 2 == 0) {
			for ($i = 1; $i <= $star; $i++) {
				$star1 .= "<i value=\"{$i}\" class=\"material-icons\">star</i>";
			}
			for ($i = $star + 1; $i <= 5; $i++) {
				$star1 .= "<i value=\"{$i}\" class=\"material-icons\"> star_border</i>";
			}
			return $star1;
		} else {
			for ($i = 1; $i <= $star; $i++) {
				$star1 .= "<i value=\"{$i}\" class=\"material-icons\">star</i>";
			}
			$star1 .= "<i value=\"{$i}\" class=\"material-icons\">star_half</i>";
			for ($i = 1; $i <= 5 - $star; $i++) {
				$star1 .= "<i value=\"{$i}\" class=\"material-icons\">star_border</i>";
			}
			return $star1;
		}
	}
	// generate star button group
	public function generateStarButton($star)
	{
		$star1 = "<div class=\"btn-group\">";
		for ($i = 1; $i <= $star; $i++) {
			$star1 .= "<button value={$i} class=\"btn btn-sm star\" style=\"appearance: none\"><i value=\"{$i}\" class=\"material-icons\">star</i></button>";
		}
		for ($i = $star + 1; $i <= 5; $i++) {
			$star1 .= "<button value={$i} class=\"btn btn-sm star\" style=\"appearance: none\"><i value=\"{$i}\" class=\"material-icons\"> star_border</i></button>";
		}
		$star1 .= "</div>";
		return $star1;
	}

	// Add a product to the data base
	public function addNewProduct($userID, $productID, $title, $review, $star)
	{
		$db = $this->dbConnect();
		$sql = "INSERT INTO product_review(fkUsersId, fkProductsId, title, review, star)
			VALUES(:userID,:productID,:title,:review,:star)";
		$req = $db->prepare($sql);
		$req->execute(array(
			'userID' => $userID,
			'productID' => $productID,
			'title' => $title,
			'review' => $review,
			'star' => $star
		));
	}

	// get all the review of a product
	public function getReview($id)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('SELECT product_review.id as `ReviewID`, 
			users.pseudo as `Username`,
			users.id as `UserID`, 
			products.name as `ProductName`, 
			product_review.review as `Text`, 
			product_review.star as `Star`, 
			product_review.date as `Date`, 
			product_review.title as `Title`
			FROM `product_review`, users, products 
			WHERE fkUsersId = users.id 
			AND fkProductsId = products.id 
			AND products.id = :productID');
		$req->execute(array('productID' => $id));
		return $req;
	}

	// get Review by ID of the review
	public function getReviewById($id)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('SELECT product_review.id as `ReviewID`, 
			users.pseudo as `Username`,
			users.id as `UserID`, 
			products.name as `ProductName`, 
			product_review.review as `Text`, 
			product_review.star as `Star`, 
			product_review.date as `Date`, 
			product_review.title as `Title`
			FROM `product_review`, users, products 
			WHERE fkUsersId = users.id 
			AND fkProductsId = products.id
			AND product_review.id = :id');
		$req->execute(array('id' => $id));
		return $req->fetch();
	}

	// Edit a review 
	public function editReview($id, $newTitle, $newText, $star)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('UPDATE `product_review` 
		SET `title`= :newTitle,`review`= :newText, `star`= :star
		WHERE id=:id');
		$req->execute(array(
			'id' => $id,
			'newTitle' => $newTitle,
			'newText' => $newText,
			'star' => $star
		));
	}

	// get 1 product with its id 
	public function getProductById($id)
	{
		$db = $this->dbConnect();
		$req = $db->prepare("SELECT products.id, name, price, products.description ,stock, product_type.type, AVG(product_review.star) as `AVG_star`
			FROM products, product_type, product_review
			WHERE products.type = product_type.id 
			AND products.id = `fkProductsId`
			AND products.id = :productID");
		$req->execute(array('productID' => $id));
		return $req->fetch();
	}

	// get the different products types
	public function getProductsTypes()
	{
		$db = $this->dbConnect();
		$req = $db->query("SELECT type FROM product_type");
		return $req;
	}

	// get the number in each cat
	public function getTypesCount()
	{
		$db = $this->dbConnect();
		$req = $db->query("SELECT product_type.type, COUNT(products.id) as'count' FROM products, product_type WHERE products.type = product_type.id
		GROUP BY product_type.type");
		return $req;
	}

	// get all the clothing
	public function getClothings()
	{
		$db = $this->dbConnect();
		$req = $db->query("SELECT products.id, name, price, stock, product_type.type FROM products, product_type WHERE products.type = product_type.id");
		return $req;
	}

	// get Clothings, only 1 cat
	public function getClothingsByCat($cat)
	{
		$db = $this->dbConnect();
		$req = $db->query("SELECT products.id, name, price, stock, product_type.type FROM products, product_type WHERE products.type = product_type.id AND product_type.type = '{$cat}'");
		return $req;
	}

	// Title Section

	// Add a new title in the db
	public function addTitle($title)
	{
		$db = $this->dbConnect();
		$req = $db->prepare("INSERT INTO titles (title)
			VALUES(:title)");
		$req->execute(array(
			'title' => $title
		));
	}


	// Update the $id title
	public function editTitle($id, $newTitle)
	{
		$db = $this->dbConnect();
		$req = $db->prepare("UPDATE `titles`
			SET `title`= :newTitle
			WHERE `id`= :id");
		$req->execute(array(
			'id' => $id,
			'newTitle' => $newTitle
		));
	}

	// Delete a title with id $id
	public function deleteTitle($id)
	{
		$db = $this->dbConnect();
		$req = $db->prepare("DELETE
			FROM `titles`
			WHERE id=:id");
		$req->execute(array(
			'id' => $id
		));
	}

	// Check if title already in database 
	public function titleAlreadyIn($title)
	{
		$db = $this->dbConnect();
		$req = $db->prepare("SELECT id FROM titles WHERE title =:title");
		$req->execute(array('title' => $title));
		$bool = (bool)$req->fetchColumn();
		if ($bool) {
			throw new Exception(" Title already in the database");
		}
	}

	// Return all id & titles
	public function getTitles()
	{
		$db = $this->dbConnect();
		$req = $db->query("SELECT id,title FROM titles");
		return $req;
	}

	// General Section 
	// Connect to the db : jt_title
	private function dbConnect()
	{
		try {
			$db = new PDO('mysql:host=localhost;dbname=jt_title;charset=utf8', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
			return $db;
		} catch (Exception $e) {
			die('Erreur : ' . $e->getMessage());
		}
	}
}
