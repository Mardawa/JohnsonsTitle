<?php
// exemple : not using it atm, button doesn't work
$root = $_SERVER['DOCUMENT_ROOT'];
require_once($root."\model\ShopManager.php");
$shopManager = new ShopManager();

//ob_start();
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
while ($data = $req->fetch())
{
	echo "<tr>
	<td>{$data["id"]}</td>
	<td>{$data["title"]}</td>
	<td> <button value=\"{$data["id"]}\" type=\"button\" class=\"btn btn-outline-danger btn-sm deleteTitle\"> &times; </button> </td>
	</tr>";
}
?>
	</tbody>
</table>
<?php
//$titles = ob_get_contents();
//ob_clean();