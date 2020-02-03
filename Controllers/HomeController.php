<?php

    require_once('./Models/UserManager.php');


class HomeController
{
    public function homePage()
    {
        $userManager = new UserManager();
        $authentificationManager = new AuthentificationManager();

        $view = new View;
        return $view->render("Views/home", array("users" => $userManager->findAllUsers(),$authentificationManager->login()));
    }
}