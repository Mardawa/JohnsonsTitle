$(document).ready(function () {

    $("button.addCart").click(function () {
        // $(this).val() => productId
        $.post("/view/backend/ajax-request/cart/addToCart_ajax.php", {
            productId: $(this).val()
        }
            , function (data, status) {
                alert(data);
                //alert("Product added : a visual check will be implemented -> icon animation or message ?");
            })
    });

    $("button.removeFromCart").click(function () {
        $.post("/view/backend/ajax-request/cart/removeFromCart_ajax.php", {
            id: $(this).val()
        }
        , function (data, status){
            //alert(data);
            location.reload();
        }
        )});

});