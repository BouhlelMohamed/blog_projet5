
<!DOCTYPE html>
    <html lang="fr">

    <head>
        <meta charset="utf-8" />
        <title><?= $title = "blog"; ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">
        <!-- Bootstrap toggle -->
        <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
        <!-- third party css -->
        <link href="assets/css/vendor/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
        <!-- third party css end -->
        <script src="https://kit.fontawesome.com/19c4d3f0ef.js" crossorigin="anonymous"></script>
        <!-- App css -->
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />

    </head>

    <body>

        <!-- Begin page -->
        <div class="wrapper">

            <!-- ========== Left Sidebar Start ========== -->
            <?php require_once 'template/sidebar.view.php'; ?>
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <div class="content">

                    <?php require_once 'template/navbar.view.php'; ?>
        
            <?= $content ?>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->
            </div>
            </div>
        </div>
        <!-- END wrapper -->

        <!-- Right Sidebar -->
            <?php require_once 'template/rightbar.view.php'; ?>
        <!-- /Right-bar -->

        <!-- Footer Start -->
        <?php require_once 'template/footer.view.php'; ?>
        <!-- end Footer -->

        <!-- bundle -->
        <script src="assets/js/app.min.js"></script>

        <!-- third party js -->
        <script src="assets/js/vendor/Chart.bundle.min.js"></script>
        <script src="assets/js/vendor/jquery-jvectormap-1.2.2.min.js"></script>
        <script src="assets/js/vendor/jquery-jvectormap-world-mill-en.js"></script>
        <!-- third party js ends -->
        <!-- bootstrap toggle -->

        <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

        <!-- demo app -->
        <script src="assets/js/pages/demo.dashboard.js"></script>
        <!-- end demo js-->
    </body>

</html>
