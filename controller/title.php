<?php

require_once("./model/FormCheckerManager.php");
$formCheckerManager = new FormCheckerManager();

require_once("./model/ShopManager.php");
$shopManager = new ShopManager();

// Generate the table to display all the titles
ob_start();
$req = $shopManager->getTitles();
?>
<table class="table">
    <thead class="thead-light">
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Delete</th>
            <th>Edit</th>
        </tr>
    </thead>
    <tbody>
        <?php
				while ($data = $req->fetch()) {
					echo "<tr>
	<td>{$data["id"]}</td>

	<td id=\"title{$data["id"]}\">{$data["title"]}</td>

	<td align=\"left\"> 
		<button value=\"{$data["id"]}\" type=\"button\" class=\"btn btn-outline-danger btn-sm deleteTitle\">
			&times; 
		</button> 
	</td>

	<td align=\"left\"> 
		<button id=\"btnEdit{$data["id"]}\" 
		value=\"{$data["id"]}\" 
		type=\"button\" 
		class=\"btn btn-link btn-sm editTitle\"> 
			Edit 
		</button>

		<div id=\"btn2{$data["id"]}\" class=\"btn-group btn-group-sm\" style=\"display: none;\">

  			<button id=\"btnConfirm{$data["id"]}\" value=\"{$data["id"]}\" type=\"button\" class=\"btn btn-link btn-sm confirmTitle\">Confirm</button>

  			<button id=\"btnCancel{$data["id"]}\" value=\"{$data["id"]}\" type=\"button\" class=\"btn btn-link btn-sm cancelTitle\">Cancel</button>
		</div>

	</td>

	</tr>";
				}
				?>
    </tbody>
</table>
<?php
$titles = ob_get_contents();
ob_clean();
// End of the table generation 

if (isset($_POST["new-title"])) {
	$status = true;
	$newtitle = $formCheckerManager->test_input($_POST["new-title"]);
	if ($newtitle == "") {
		$status = false;
	}
	try {
		$shopManager->titleAlreadyIn($newtitle);
	} catch (Exception $e) {
		$status = false;
		$titleErr = $e->getMessage();
	}

	if ($status) {
		$shopManager->addTitle($newtitle);
		Header('Location: ' . $_SERVER['PHP_SELF'] . '?action=title');
	} else {
		// Title already in the database 
	}
}

require("./view/frontend/title_view.php");
