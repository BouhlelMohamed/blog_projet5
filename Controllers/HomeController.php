<?php

class HomeController
{
    public function homePage()
    {
        $userManager             = new UserManager();
        $authentificationManager = new AuthentificationManager();
        $session          = new Session();
        $authentificationManager->login();
        $session->sessionStart();
            $view = new View;
            return $view->render("Views/admin/home", array(
                    "users" => $userManager->findAllUsers()
                ));
        }

    }

