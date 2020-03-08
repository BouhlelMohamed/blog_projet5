<?php
header( 'content-type: text/html; charset=utf-8' );

require_once "Controllers/UserController.php";
require_once "Controllers/PostController.php";
require_once "Controllers/CommentController.php";
//require_once "Controllers/Page404Controller.php";
require_once "Controllers/AuthentificationController.php";
require_once "Controllers/BlogController.php";
require_once "Controllers/HomeController.php";
require_once "Views/View.php";
require __DIR__ . "/vendor/autoload.php";



    function showPage(string $link)
    {
        $id = $_REQUEST['id'] ?? NULL;
        $path = 
        array(
            /* Home */
            ''                      =>	array('controller' => 'BlogController','method' => 'homeVisitorPage'),
            "blog?id=$id"           =>	array('controller' => 'BlogController','method' => 'onePostPage'),
            "blogInsertComment?id=$id"=> array('controller' => 'BlogController','method' => 'insertCommentPage'),
            /* Authentification */
            'login'                 =>	array('controller' => 'AuthentificationController','method' => 'loginPage'),
            'register'              =>	array('controller' => 'AuthentificationController','method' => 'registerPage'),
            'logout'                =>	array('controller' => 'AuthentificationController','method' => 'logoutPage'),            
            /* Admin */
            'admin'                 =>	array('controller' => 'HomeController','method' => 'homePage'),
            /* Comments */
            'comments'              =>	array('controller' => 'CommentController','method' => 'commentsPage'),
            "deleteComment?id=$id" =>	array('controller' => 'CommentController','method' => 'deleteCommentPage'),
            "validateComment?id=$id"=>	array('controller' => 'CommentController','method' => 'validateCommentPage'),
            /* Posts */
            'posts'                 =>	array('controller' => 'PostController','method' => 'postsPage'),
            'insertPost'            =>	array('controller' => 'PostController','method' => 'insertPostPage'),
            "post?id=$id"           =>	array('controller' => 'PostController','method' => 'onePostPage'),
            "updatePost?id=$id"     =>	array('controller' => 'PostController','method' => 'updatePostPage'),
            "deletePost?id=$id"     =>	array('controller' => 'PostController','method' => 'deletePostPage'),
            /* Users */
            'users'                 =>	array('controller' => 'UserController','method' => 'usersPage'),
            "user?id=$id"           =>	array('controller' => 'UserController','method' => 'oneUserPage'),
            "deleteUser?id=$id"     =>	array('controller' => 'UserController','method' => 'deleteUserPage'),
            "updateUser?id=$id"     =>	array('controller' => 'UserController','method' => 'updateUserPage'),
            "validateUser?id=$id"   =>	array('controller' => 'UserController','method' => 'validateUserPage'),
            "roleUser?id=$id"       =>	array('controller' => 'UserController','method' => 'userForAdminPage'),
            "roleAdmin?id=$id"      =>	array('controller' => 'UserController','method' => 'adminForUserPage'),
        );

        if($path[$link])
        {
            $controller = new $path[$link]['controller'];
            $method = $path[$link]['method'];
            echo $controller->$method();
        }
        else
        {
            require_once 'Views/page404NotFound.view.php';
        }
    }
    
    //$link = substr($_SERVER["REQUEST_URI"], 4);
    $link = substr($_SERVER["REQUEST_URI"], 1);

    showPage($link);
