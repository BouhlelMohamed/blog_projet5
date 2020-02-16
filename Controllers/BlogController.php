<?php

    
require_once('./Models/PostManager.php');
require_once('./Models/CommentManager.php');


class BlogController
{

    public function homeVisitorPage()
    {
        $postManager = new PostManager;
        $view = new View;
        return $view->render("Views/visitor/blog/blog",array(
        "posts" => $postManager->findAllPosts())
        ,"base.visitor");
            
    }

    public function onePostPage()
    {
        $postManager = new PostManager;
        $commentManager = new CommentManager();
        $comment = new Comment();
        $view = new View;
        $postById = $postManager->findPostById();
        $commentWithId = $commentManager->findCommentWithId();
        $authorPost = $postManager->getAuthorPost();
        return $view->render("Views/visitor/blog/blog-post",array(
            "post"     => $postById,
            "comments" => $commentWithId,
            "author"   => $authorPost),
            "base.onePost"
        );
            
    }

    public function insertCommentPage()
    {
        $commentManager = new CommentManager();
        $comment = new Comment($_POST);
        $commentManager->insertComment($comment);
        $url = $_SERVER['HTTP_REFERER'];
        header("Location: $url");
    }

}