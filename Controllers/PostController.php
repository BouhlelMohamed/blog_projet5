<?php

    require_once('./Models/PostManager.php');

class PostController
{
    public function postsPage()
    {
        $postManager = new PostManager();
        $post = new Post();

        $view = new View;
        return $view->render("Views/admin/Posts/showPosts", 
        array(
            "posts" => $postManager->findAllPosts()
        ));

    }

    public function onePostPage()
    {
        $postManager = new PostManager();
        
        $view = new View;
        return $view->render("Views/admin/Posts/showOnePost", 
        array(
            "post" => $postManager->findPostById(),
            'author' => $postManager->getAuthorPost()
        ));

    }

    public function updatePostPage()
    {
        $id = $_REQUEST['id'];
        $post = new Post($_POST);
        $postManager = new PostManager();
        $postManager->updatePost($post);
        header("location: post?id=$id");
    }

    public function insertPostPage()
    {
        $post = new Post($_POST);
        $postManager = new PostManager();
        $postManager->insertPost($post);
        header('location: posts');
    }

    public function deletePostPage()
    {
        $postManager = new PostManager();
        $postManager->deletePost();
        header('location: posts');

    }
}