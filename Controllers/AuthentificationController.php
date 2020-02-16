<?php

require_once('./Models/AuthentificationManager.php');

class AuthentificationController
{

    public function registerPage()
    {
        $authentificationManager = new AuthentificationManager();

        $view = new View;
        return $view->render("Views/admin/Authentifications/register",
        array(
            $authentificationManager->register()
        ),
        "base.authentification");
        }

    public function loginPage()
    {
        $authentificationManager = new AuthentificationManager();

        $view = new View;
        return $view->render("Views/admin/Authentifications/login",
        array($authentificationManager->login()),"base.authentification");
    }

    public function logoutPage()
    {
        $authentificationManager = new AuthentificationManager();

        $view = new View;
        return $view->render("Views/admin/Authentifications/logout",
        array($authentificationManager->logout()),"base.authentification");
    }

}