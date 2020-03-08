<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- App favicon -->
        <link rel="shortcut icon" href="https://upload.wikimedia.org/wikipedia/commons/thumb/2/27/PHP-logo.svg/1200px-PHP-logo.svg.png">

        <!-- App css -->
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />

    </head>

    <body class="authentication-bg">
    <div class="account-pages mt-5 mb-5">
            <div class="container">
                <div class="row justify-content-center">

    <?= $content; ?>

                </div>
        </div>
    </div>
    
    <footer class="footer footer-alt">
         <?php echo Date("Y") . " ©" . " Bouhlel Mohamed"; ?>
    </footer>

        <!-- App js -->
        <script src="assets/js/app.min.js"></script>
    </body>
</html>
