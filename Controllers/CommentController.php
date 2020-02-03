<?php

    require_once('./Models/CommentManager.php');

class CommentController
{
    public function commentsPage()
    {
        $commentManager = new CommentManager();
        
        $view = new View;
        return $view->render("Views/Comments/showComments", array("comments" => $commentManager->findAllComments()),$commentManager->findAuthor());

    }

    public function validateCommentPage()
    {
        $commentManager = new CommentManager();
        $commentManager->validateComment();
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