<?php

session_start();

require_once("./model/ShopManager.php");
$shopManager = new ShopManager();

// Display a user cart
ob_start();
$req = $shopManager->getCart($_SESSION['id']);

if ($req->rowCount() > 0) {
    $totalPrice = 0;
    ?>
<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Product name</th>
            <th>Price per unit</th>
            <th>Quantity</th>
            <th>Subtotal</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php
        while ($data = $req->fetch()) {
            $totalPrice = $totalPrice + $data['Totalprice'];
            ?>
        <tr>
            <td><?= $data['Productname'] ?></td>
            <td><?= $data['Ppu'] ?></td>
            <td><?= $data['Quantity'] ?></td>
            <td><?= $data['Totalprice'] ?></td>
            <td>
                <button value=<?= $data['cartId'] ?> class="btn removeFromCart" style="background-color:transparent">
                    <i class="material-icons">remove_shopping_cart</i>
                </button>
            </td>
        </tr>
        <?php
    }
    ?>
        <tr class="table-secondary">
            <td>Total price :</td>
            <td></td>
            <td></td>
            <td> <?= $totalPrice ?></td>
            <td></td>
        </tr>
    </tbody>
</table>



<?php

} else {
    echo "Your cart is empty go in the shop and add something in it !";
}
$shopping_cart = ob_get_contents();
ob_clean();


require('./view/frontend/myCart_view.php');