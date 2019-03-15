<div class="container-fluid">
    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">
            &times;
        </button>

        <strong> Info : </strong> Adding shopping cart in progress ...
    </div>

    <div class="row">
        <div class="col-md-3">

            <?= $type_menu ?>
            <br>

        </div>

        <div class="col-md-9">

            <div class="container">

                <?= $product_display ?>

                <br>

                <h2> Review <small></h2>

                <?php
                if (isset($_SESSION['pseudo'])) {
                    ?>
                <button class="btn btn-link" data-toggle="collapse" data-target="#newReview"> Write a review </button>
                </small>

                <div id="newReview" class="collapse">
                    <?php require("./view/frontend/content/product/review_form.php") ?>
                </div>
                <br>

                <?php

            } else {
                echo "Please login to write a review";
            }
            ?>

                <div class="container">
                    <?= $product_review ?>
                </div>


            </div>

        </div>

    </div>

</div>


<script src="/view/frontend/content/product/review_js.js"></script>

<script src="/view/frontend/content/product/cart_js.js"></script>