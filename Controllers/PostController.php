<?php

    require_once('./Models/PostManager.php');

class PostController
{
    public function postsPage()
    {
        $postManager = new PostManager();
        $post = new Post();

        $view = new View;
        return $view->render("Views/Posts/showPosts", array("posts" => $postManager->findAllPosts()));

    }

    public function onePostPage()
    {
        $postManager = new PostManager();
        
        $view = new View;
        return $view->render("Views/Posts/showOnePost", array("post" => $postManager->findPostById(), 'author' => $postManager->getAuthorPost()));

    }

    public function updatePostPage()
    {
        $postManager = new PostManager();
        $postManager->updatePost();
        $id = $_REQUEST['id'];
        header("location: post?id=$id");
    }

    public function insertPostPage()
    {
        $postManager = new PostManager();
        $postManager->insertPost();
        header('location: posts');
    }

    public function deletePostPage()
    {
        $postManager = new PostManager();
        $postManager->deletePost();
        header('location: posts');

    }
}