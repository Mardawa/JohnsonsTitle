$(document).ready(function () {

    $("button.addCart").click(function () {
        // $(this).val() => productId
        $.post("/view/frontend/content/myCart/addToCart_ajax.php", {
            productId: $(this).val()
        }
            , function (data, status) {
                alert(data);
                //alert("Product added : a visual check will be implemented -> icon animation or message ?");
            })
    });

    $("button.removeFromCart").click(function () {
        $.post("view/frontend/content/myCart/removeFromCart_ajax.php", {
            id: $(this).val()
        }
        , function (data, status){
            //alert(data);
            location.reload();
        }
        )});

});