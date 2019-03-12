<form id="review_form" class="form" method="post" action="
<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . '?action=clothing'; ?>">

    <div class="form-group">

        <label for="reviewTitle"> Title :</label>
        <input type="text" class="form-control" id="reviewTitle" name="reviewTitle" placeholder="Enter the title of your review" required>

        <label for="userID"> userID : à masquer </label>
        <input type="text" class="form-control" name="userID" id="userID" value="<?= $_SESSION['id'] ?>">

        <label for="productID"> productID : à masquer </label>
        <input type="text" class="form-control" name="productID" id="productID" value="<?= $_GET['productKey'] ?>">

        Rating :
        <div class="rating"></div>

        <label for="reviewText">Review :</label>
        <textarea class="form-control" rows="5" id="reviewText" name="reviewText" placeholder="Write your review here !"></textarea>

    </div>

    <button type="submit" class="btn btn-secondary mb-2">Add your review </button>

</form>
<br>

<script src="/public/js/jquery.star.rating.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('.rating').addRating({
            max: 5,
            fieldName: 'rating',
						fieldId: 'rating',
						value: '5'
        });
    });
</script> 