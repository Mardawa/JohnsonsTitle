$(document).ready(function () {

    $("#toCheck").keyup(function () {
        if( $(this).val().length == 0){
            $("#usernameStatus").text("");
        } else {
            $.post("/view/backend/ajax-request/form/checkUsername.php",{
                username: $(this).val()
            },function(data,status){
                $("#usernameStatus").text(data);
            })
        }
    });
});