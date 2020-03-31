<?php

class BlogController
{

    public function homeVisitorPage()
    {     
        
        $postManager    = new PostManager;
        $view           = new View;
        $authors        = $postManager->getAuthorPost();
        return $view->render("Views/visitor/blog/blog",
        array(
        "posts"         => $postManager->findAllPosts(),
        "authors"       => $authors,
        )
        ,"base.visitor");
            
    }

    public function onePostPage()
    {
        $id = $_REQUEST['id'];
        $postManager    = new PostManager;
        $commentManager = new CommentManager();
        $view           = new View;
        $postById       = $postManager->findPostById($id);
        if($postById == null)
        {
            $page404Controller = new Page404Controller();
            return $page404Controller->page404NotFound();
        }
        $commentWithId  = $commentManager->findCommentWithId((int)$id);
        $authorPost     = $postManager->getAuthorPost((int)$id);
        $authors        = $commentManager->getAuthorFunction();
        return $view->render("Views/visitor/blog/blog-post",array(
            "post"          => $postById,
            "comments"      => $commentWithId,
            "author"        => $authorPost,
            "authors"       => $authors
        ),
            "base.onePost"
        );
            
    }

    public function insertCommentPage()
    {
        $commentManager = new CommentManager();
        $comment        = new Comment($_POST);
        $id = $_REQUEST['id'];
        $commentManager->insertComment($comment,$id);
        $url = $_SERVER['HTTP_REFERER'];
        header("Location: $url");
    }

}