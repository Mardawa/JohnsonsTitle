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
<!-- Table displaying the cart -->
<table class="table table-bordered table-hover table-responsive-sm">
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
                    <i class="material-icons" data-toggle="tooltip" data-placement="bottom" title="Delete this item">remove_shopping_cart</i>
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
<!-- End of table -->

<br>

<!-- button -> open model to proceed to checkout -->
<div class="container">
    <button class="btn btn-block btn-secondary" data-toggle="modal" data-target="#modalCheckout"> Proceed to checkout
    </button>
</div>

<!-- Modal -->
<div class="modal fade" id="modalCheckout">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">

                <h5 class="modal-title">
                    <ul class="list-group list-group-horizontal" id="list-tab" role="tablist">
                        <li class="list-group-item border-0 list-group-item-action active" id="list-recap-list" data-toggle="list" href="#list-recap" role="tab" aria-controls="home"> Recap </li>
                        <li class="list-group-item border-0 list-group-item-action" id="list-payment-list" data-toggle="list" href="#list-payment" role="tab" aria-controls="profile"> Payment </li>
                        <li class="list-group-item border-0 list-group-item-action" id="list-confirmation-list" data-toggle="list" href="#list-confirmation" role="tab" aria-controls="messages"> Confirmation </li>
                    </ul>
                </h5>

                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <div class="tab-content" id="nav-tabContent">

                    <div class="tab-pane fade show active" id="list-recap" role="tabpanel" aria-labelledby="list-home-list">
                        recap : redisplay the cart data pulled from the database
                        <!-- <button class="btn btn-outline-success" data-toggle="list" href="#list-payment" role="tab" aria-controls="profile"> Next </button> -->
                    </div>

                    <div class="tab-pane fade" id="list-payment" role="tabpanel" aria-labelledby="list-profile-list">
                        Plugin for a payment system ?
                        <!-- <button class="btn btn-outline-success" id="list-confirmation-list" data-toggle="list" href="#list-confirmation" role="tab" aria-controls="messages"> Next </button> -->
                    </div>

                    <div class="tab-pane fade" id="list-confirmation" role="tabpanel" aria-labelledby="list-messages-list">
                        display the data from the database (cart) --> if confirm --> push to databse (orders)
                        <!-- <button class="btn btn-outline-success"> Confirm </button> -->
                    </div>

                </div>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" class="close" data-dismiss="modal"> Cancel </button>
            </div>
        </div>
    </div>
</div>

<?php

} else {
    echo "Your cart is empty go in the shop and add something in it !";
}
$shopping_cart = ob_get_contents();
ob_clean();


require('./view/frontend/myCart_view.php');
