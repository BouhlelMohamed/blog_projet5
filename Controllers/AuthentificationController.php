<?php

class AuthentificationController
{

    public function registerPage()
    {
        $user        = new User($_POST);
        $authentificationManager = new AuthentificationManager();
        $authentificationManager->register($user);
        $_SESSION['successMessageAddUser'] = '<div class="alert alert-notif alert-info" style="background-color: rgb(29, 192, 255);">Votre compte a bien été créé</div>';
        $view = new View;
        return $view->render("Views/admin/Authentifications/register",
        array(),"base.authentification");
        
    }

    public function loginPage()
    {
        $authentificationManager = new AuthentificationManager();
        $authentificationManager->login();
        $successMessageAddUser = $_SESSION['successMessageAddUser'] ?? NULL;
        unset($_SESSION['successMessageAddUser']);
        $view = new View;
        return $view->render("Views/admin/Authentifications/login",
        array(
            "successMessageAddUser" => $successMessageAddUser
        ),"base.authentification");
    }

    public function logoutPage()
    {
        $authentificationManager = new AuthentificationManager();
        $authentificationManager->logout();
        $view = new View;
        return $view->render("Views/admin/Authentifications/logout",
        array(
            
        ),"base.authentification");
    }

}