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
        if(isset($_POST['email']) && isset($_POST['lastName']))
        {
            $des = "mohamed.bouhleel@gmail.com";
            $to = $_POST['email'];
            $subject = "INSCRIPTION - BLOG - ".strtoupper($_POST['lastName']);
            $txt = 'Bienvenue ' . ucfirst($_POST['lastName']) . ' sur notre blog.';
            $headers = "From: $des" . "\r\n" .
            "CC: mohamed.bouhleel@gmail.com";
            mail($to,$subject,$txt,$headers);
        }
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