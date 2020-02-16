<?php

    require_once('./Models/UserManager.php');

class UserController
{
    public function usersPage()
    {
        $userManager = new UserManager();
        
        $view = new View;
        return $view->render("Views/admin/Users/showUsers", 
        array(
            "users" => $userManager->findAllUsers())
        );

    }
    public function oneUserPage()
    {
        $userManager = new UserManager();
        
        $view = new View;
        return $view->render("Views/admin/Users/showOneUser", 
        array(
            "user" => $userManager->findOneUserById()
        ));
    }

    public function updateUserPage()
    {
        $id = $_REQUEST['id'];
        $userManager = new UserManager();
        $userManager->updateUserWithId();
        header("Location: user?id=$id");
    }

    public function validateUserPage()
    {
        $userManager = new UserManager();
        $userManager->validateUser();
        header("Location: users");
    }

    public function userForAdminPage()
    {
        $userManager = new UserManager();
        $userManager->userForAdmin();
        header("Location: users");
    }

    public function adminForUserPage()
    {
        $userManager = new UserManager();
        $userManager->adminForUser();
        header("Location: users");
    }

    public function deleteUserPage()
    {
        $userManager = new UserManager();
        $userManager->deleteUserWithId();
        header("Location: users");
    }

    
}