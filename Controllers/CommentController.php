<?php

    require_once('./Models/CommentManager.php');

class CommentController
{
    public function commentsPage()
    {
        $commentManager = new CommentManager();
        $findAllComments = $commentManager->findAllComments();
        $authors = $commentManager->getAuthorFunction();
        $view = new View;
        return $view->render("Views/admin/Comments/showComments", 
        array(
            "comments" => $findAllComments,
            "authors"  => $authors
        ));

    }


    public function validateCommentPage()
    {
        $comment = new Comment();
        $commentManager = new CommentManager();
        $commentManager->validateComment($comment);
        header("Location: comments");

        //return $this->commentsPage();
        
    }

    public function deleteCommentPage()
    {
        $commentManager = new CommentManager();
        $commentManager->deleteComment();
        header("Location: comments");
    }
}