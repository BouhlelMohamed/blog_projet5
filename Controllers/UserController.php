<?php

class UserController
{
    public function usersPage()
    {
        $userManager = new UserManager();
        $successMessage = $_SESSION['successMessage'] ?? NULL;
        $successMessageValidateUser = $_SESSION['successMessageValidateUser'] ?? NULL;
        $successMessageForDeleteUser = $_SESSION['successMessageForDeleteUser'] ?? NULL;
        unset($_SESSION['successMessage']);
        unset($_SESSION['successMessageValidateUser']);
        unset($_SESSION['successMessageForDeleteUser']);
        $view = new View;
        return $view->render("Views/admin/Users/showUsers", 
        array(
            "users" => $userManager->findAllUsers(),
            "successMessage" => $successMessage,
            "successMessageValidateUser" => $successMessageValidateUser,
            "successMessageForDeleteUser" => $successMessageForDeleteUser
            )
        );

    }
    public function oneUserPage()
    {
        $userManager = new UserManager();
        $id          = $_REQUEST['id'];
        $view = new View;
        return $view->render("Views/admin/Users/showOneUser", 
        array(
            "user" => $userManager->findOneUserById($id)
        ));
    }

    public function updateUserPage()
    {
        $id          = $_REQUEST['id'];
        $user        = new User($_POST);
        $userManager = new UserManager();
        $userManager->updateUserWithId($user,$id);
        header("Location: user?id=$id");
    }

    public function validateUserPage()
    {
        $userManager = new UserManager();    
        $id          = $_REQUEST['id'];
        $userManager->validateUser($id);
        $_SESSION['successMessageValidateUser'] = '<div class="alert alert-notif alert-info" style="background-color: #1dff63;color: black;">L\'utilisateur a bien été validé</div>';
        header("Location: users");
    }

    public function userForAdminPage()
    {
        $userManager = new UserManager();
        $id          = $_REQUEST['id'];
        $userManager->userForAdmin($id);
        $_SESSION['successMessage'] = '<div class="alert alert-notif alert-info">Le rôle d\'utilisateur a bien été changé</div>';
        header("Location: users");
    }

    public function adminForUserPage()
    {
        $userManager = new UserManager();
        $id          = $_REQUEST['id'];
        $userManager->adminForUser($id);
        $_SESSION['successMessage'] = '<div class="alert alert-notif alert-info">Le rôle d\'utilisateur a bien été changé</div>';
        header("Location: users");
    }

    public function deleteUserPage()
    {
        $userManager = new UserManager();
        $id          = $_REQUEST['id'];
        $userManager->deleteUserWithId($id);
        $_SESSION['successMessageForDeleteUser'] = '<div class="alert alert-notif alert-info" style="background-color:#ff0000b3;">L\'utilisateur a bien été supprimé</div>';
        header("Location: users");
    }

    
}