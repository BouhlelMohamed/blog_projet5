<?php

require_once "Controllers/UserController.php";
require_once "Controllers/PostController.php";
require_once "Controllers/CommentController.php";
require_once "Controllers/Page404Controller.php";

require_once "Controllers/HomeController.php";
require_once "Views/View.php";





function path($link , $controllerName , $method){

    $page = substr($_SERVER["REQUEST_URI"],1);


    
    if($page == $link)
    {
        $controller = new $controllerName;
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

$id = $_REQUEST['id'];

path("","HomeController","homePage");

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