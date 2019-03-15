<!DOCTYPE html>
<html lang="fr">
<html>

    <head>

        <?php require('view\frontend\template\head.php'); ?>

        <script src="/public/js/jquery.js"></script>

        <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    </head>

    <body>
        <div>

            <?php require('./view\frontend\template\header.php'); ?>

            <br>

            <?= $content ?>

            <br>
            
        </div>
        
    </body>

    <footer class="jumbotron text-center" style="margin-bottom:0">
        Website prototype v0.0.1b
    </footer>

</html>