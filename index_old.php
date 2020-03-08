<?php

require_once "Controllers/UserController.php";
require_once "Controllers/PostController.php";
require_once "Controllers/CommentController.php";
require_once "Controllers/Page404Controller.php";
require_once "Controllers/AuthentificationController.php";
require_once "Controllers/BlogController.php";
require_once "Controllers/HomeController.php";

require_once "Views/View.php";




function path($link , $controllerName , $method){

    $page = substr($_SERVER["REQUEST_URI"], 4);
    var_dump($page);
    if($page == $link)
    {
        $controller = new $controllerName;
        //Database::dump($controller);
        echo $controller->$method();
    } 
    /*else{
        $controller = new Page404();
        echo $controller->page404NotFound();

    }
    */
    /*switch($url)
    {
        case $link:
            $controller = new $controllerName();
            echo $controller->$method();
        break;
        case "/":
            $controller = new HomeController;
            echo $controller->homePage();
    }*/

}

$id = $_REQUEST['id'] ?? NULL;

// ---- VISITOR ----
path("","BlogController","homeVisitorPage");

path("blog?id=$id","BlogController","onePostPage");
path("blogInsertComment?id=$id","BlogController","insertCommentPage");



// ---- ADMIN ----
path("admin","HomeController","homePage");

// Users
path("users","UserController","usersPage");
path("user?id=$id","UserController","oneUserPage");
path("deleteUser?id=$id","UserController","deleteUserPage");
path("updateUser?id=$id","UserController","updateUserPage");
path("validateUser?id=$id","UserController","validateUserPage");
path("roleUser?id=$id","UserController","userForAdminPage");
path("roleAdmin?id=$id","UserController","adminForUserPage");

// Posts
path("posts","PostController","postsPage");
path("insertPost","PostController","insertPostPage");
path("post?id=$id","PostController","onePostPage");
path("updatePost?id=$id","PostController","updatePostPage");
path("deletePost?id=$id","PostController","deletePostPage");

// Comments
path("comments","CommentController","commentsPage");
path("deleteComment?id=$id","CommentController","deleteCommentPage");
path("validateComment?id=$id","CommentController","validateCommentPage");

// Authentification
path("register","AuthentificationController","registerPage");
path("login","AuthentificationController","loginPage");
path("logout","AuthentificationController","logoutPage");
