<?php

    /*require_once 'Controllers/HomeController.php';
    $classHomeController = new Home;
    $countCommentsNotValidate = $classHomeController->countNotification("Comments WHERE state = 0"); 
    $countUsersNotValidate = $classHomeController->countNotification("Users WHERE state = 0"); 
    */
?>
<div class="left-side-menu">

<div class="slimscroll-menu">

    <!-- LOGO -->
    <a href="index.html" class="logo text-center">
        <span class="logo-lg">
            <img src="assets/images/logo.png" alt="" height="16">
        </span>
        <span class="logo-sm">
            <img src="assets/images/logo_sm.png" alt="" height="16">
        </span>
    </a>

    <!--- Sidemenu -->
    <ul class="metismenu side-nav">

        <li class="side-nav-item">
            <a href="/" class="side-nav-link">
                <i class="dripicons-meter"></i>
                <span class="badge badge-success float-right"><?php // $countCommentsNotValidate + $countUsersNotValidate ?></span>
                <span> Tableau de bord </span>
            </a>
        </li>

        <li class="side-nav-item">
            <a href="/users" class="side-nav-link">
                <i class="dripicons-user-group"></i>
                <span> Utilisateurs </span>
            </a>
        </li>

        <li class="side-nav-item">
            <a href="/posts" class="side-nav-link">
                <i class="dripicons-article"></i>
                <span> Articles </span>
            </a>
        </li>

        <li class="side-nav-item">
            <a href="/comments" class="side-nav-link">
                <i class="dripicons-message"></i>
                <span> Commentaires </span>
            </a>
        </li>
    </ul>

    <!-- End Sidebar -->

    <div class="clearfix"></div>

</div>
<!-- Sidebar -left -->

</div>