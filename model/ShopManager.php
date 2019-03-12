<?php
class ShopManager
{

// Clothing Section

	// generate star 
	public function generateStar($star){
		$star1 ="";
		if ($star*2 % 2 == 0) {
			for ($i=1; $i <= $star; $i++) { 
			$star1 .= "<i class=\"material-icons\">star</i>";
			}
			for ($i=0; $i < 5-$star ; $i++) { 
			$star1 .= "<i class=\"material-icons\">star_border</i>";
			}
		return $star1;
		} else {
			for ($i=1; $i <= $star; $i++) { 
			$star1 .= "<i class=\"material-icons\">star</i>";
			}
			$star1 .= "<i class=\"material-icons\">star_half</i>";
			for ($i=1; $i < 5-$star ; $i++) { 
			$star1 .= "<i class=\"material-icons\">star_border</i>";
			}
			return $star1;
		}
		
	}

	// Add a product to the data base
	public function addNewProduct($userID,$productID,$title,$review,$star)
	{
		$db = $this->dbConnect();
		$sql = "INSERT INTO product_review(fkUsersId, fkProductsId, title, review, star)
			VALUES(:userID,:productID,:title,:review,:star)";
		$req = $db->prepare($sql);
		$req->execute(array(
	  		'userID'=> $userID,
	  		'productID' => $productID,
	  		'title' => $title,
	  		'review' => $review,
	  		'star' => $star));
	}

	// get all the review of q product
	public function getReview($id)
	{
		$db = $this->dbConnect();
		$req = $db-> prepare('
			SELECT product_review.id as `ReviewID`, users.pseudo as `Username`,users.id as `UserID`, products.name as `ProductName`, product_review.review as `Text`, product_review.star as `Star`, product_review.date as `Date`, product_review.title as `Title`
			FROM `product_review`, users, products 
			WHERE fkUsersId = users.id 
			AND fkProductsId = products.id 
			AND products.id = :productID');
		$req->execute(array('productID' => $id));
		return $req;
	}

	// get 1 product with its id 
	public function getProductById($id)
	{
		$db = $this->dbConnect();
		$req = $db->prepare("
			SELECT products.id, name, price, products.description ,stock, product_type.type, AVG(product_review.star) as `AVG_star`
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
		$req = $db->query("
			SELECT product_type.type, COUNT(products.id) as'count' FROM products, product_type WHERE products.type = product_type.id
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
	  		'title'=> $title));
	}


	// Update the $id title
	public function editTitle($id,$newTitle){
		$db = $this->dbConnect();
		$req = $db->prepare("UPDATE `titles`
			SET `title`= :newTitle
			WHERE `id`= :id");
		$req->execute(array(
	  		'id'=> $id,
	  		'newTitle' => $newTitle));
	}

	// Delete a title with id $id
	public function deleteTitle($id)
	{
		$db = $this->dbConnect();
		$req = $db->prepare("DELETE
			FROM `titles`
			WHERE id=:id");
		$req->execute(array(
	  		'id'=> $id));
	}

	// Check if title already in database 
	public function titleAlreadyIn($title)
	{
		$db = $this->dbConnect();
		$req = $db->prepare("SELECT id FROM titles WHERE title =:title");
		$req->execute(array('title' => $title));
		$bool = (bool) $req -> fetchColumn();
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
		try
		{
			$db = new PDO('mysql:host=localhost;dbname=jt_title;charset=utf8', 'root', 'root',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
			return $db;
		}
		catch(Exception $e)
		{
			die('Erreur : '.$e->getMessage());
		}
	}


}