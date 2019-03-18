<?php
require_once("./model/ShopManager.php");
$shopManager = new ShopManager();

require_once("./model/FormCheckerManager.php");
$formCheckerManager = new FormCheckerManager();

$id = $_GET['productKey'];

// Product general info
ob_start();
$data = $shopManager->getProductById($id);
$avgStar = $data['AVG_star'] * 1;
$s1 = round($avgStar * 2) / 2;
?>

<div>
    <h1> <?= $data["name"] ?> </h1>
    <?= $shopManager->generateStar($s1); ?>
    <br>
</div>

<div class="row">

    <div class="col-md-3">
        <img class="mx-auto d-block img-fluid" src="http://placehold.it/250x300">
    </div>

    <div class="col-md-9">
        Product id : <?= $data["id"] ?>
        <br>
        Description :
        <p>
            <?= $data["description"] ?>
        </p>
        <br>
        Stock : <?= $data["stock"] ?>
        <br>
        Price : <?= $data["price"]; ?>$
        <br>

        <button value=<?= $data["id"] ?> class="btn btn-outline-secondary addCart" style="">
            <i class="material-icons">add_shopping_cart</i>
        </button>

    </div>

</div>

<?php
$product_display = ob_get_contents();
ob_clean();
// End of Product general info

// Product review
ob_start();
$req = $shopManager->getReview($id);
if ($req->rowCount() > 0) {
    while ($data = $req->fetch()) {
        $nbStar = $data['Star'] * 1;
        $star = $shopManager->generateStar($nbStar);
        ?>
<div id="r<?= $data['ReviewID'] ?>" class="media border p-3">
    <img src=<?= "/public/img/users/{$data['Username']}{$data['UserID']}/profile_picture.jpeg" ?> alt="Profile Pic" class="mr-3 mt-3 rounded-circle" style="width:60px;">

    <div class="media-body">

        <div class="row">
            <div class="col">
                <h3> <?= $data['Username'] ?> :

                    <small id="rTitle<?= $data['ReviewID'] ?>">
                        <?= $data['Title'] ?>
                    </small>

                    <span id="rStar<?= $data['ReviewID'] ?>">
                        <?= $star ?>
                    </span>
                </h3>
            </div>

        </div>

        <div id="rText<?= $data['ReviewID'] ?>">
            <?= $data['Text'] ?>
        </div>

        <p class="text-right">
            <small> <i> <?= $data['Date'] ?> </i></small>

            <?php if (isset($_SESSION['id'])) {
                if ($data['UserID'] == $_SESSION['id']) {
                    ?>

            <div class="text-right">
                <!-- div with button edit/confirm/cancel-->

                <button id="btnEdit<?= $data['ReviewID'] ?>" value="<?= $data['ReviewID'] ?>" type="button" class="btn btn-link btn-sm editReview">
                    Edit
                </button>

                <div id="btn2<?= $data['ReviewID'] ?>" class="btn-group btn-group-sm" style="display: none;">

                    <button id="btnConfirm<?= $data['ReviewID'] ?>" value="<?= $data['ReviewID'] ?>" type="button" class="btn btn-link btn-sm confirmReview">Confirm</button>

                    <button id="btnCancel<?= $data['ReviewID'] ?>" value="<?= $data['ReviewID'] ?>" type="button" class="btn btn-link btn-sm cancelReview">Cancel</button>

                </div>
            </div> <!-- end of div button-->
            <?
        }
    } ?>

        </p>
    </div>
</div>
<?php

}
} else {
    echo "Be the first to review this product !";
}
$product_review  = ob_get_contents();
ob_clean();
