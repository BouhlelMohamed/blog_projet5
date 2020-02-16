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
    <a href="" class="logo text-center">
        <span class="logo-lg">
            <img style="width:120px;height:70px;margin-top: 30px;margin-bottom: 30px;" src="https://upload.wikimedia.org/wikipedia/commons/thumb/3/31/Webysther_20160423_-_Elephpant.svg/350px-Webysther_20160423_-_Elephpant.svg.png" alt="" height="16">
        </span>
        <span class="logo-sm">
            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/3/31/Webysther_20160423_-_Elephpant.svg/350px-Webysther_20160423_-_Elephpant.svg.png" alt="" height="16">
        </span>
    </a>

    <!--- Sidemenu -->
    <ul class="metismenu side-nav">

        <li class="side-nav-item">
            <a href="/admin" class="side-nav-link">
                <i class="dripicons-meter"></i>
                <span class="badge badge-success float-right"><?php // $countCommentsNotValidate + $countUsersNotValidate ?></span>
                <span> Tableau de bord </span>
            </a>
        </li>

        <li class="side-nav-item">
            <a href="users" class="side-nav-link">
                <i class="dripicons-user-group"></i>
                <span> Utilisateurs </span>
            </a>
        </li>

        <li class="side-nav-item">
            <a href="posts" class="side-nav-link">
                <i class="dripicons-article"></i>
                <span> Articles </span>
            </a>
        </li>

        <li class="side-nav-item">
            <a href="comments" class="side-nav-link">
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