<!DOCTYPE html>
<html>
<head>
    <title> test jQuery </title>

    <script src="/public/js/jquery.js"></script>

    <script type="text/javascript">
        
        $(document).ready(function(){

            $("#button1").bind("click",alertButtonClick);

        });

        function alertButtonClick(){
            alert("The button was clicked");
        }

    </script>

</head>

<body>

    <h1> Title h1 </h1>
    <p> 
        First paragrahe 
    </p>

    <p>
        Second paragrahe
    </p>

    <button id="button1"> Button 1 </button>

</body>

</html>