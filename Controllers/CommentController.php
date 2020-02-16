<?php

    require_once('./Models/CommentManager.php');

class CommentController
{
    public function commentsPage()
    {
        $commentManager = new CommentManager();
        $findAllComments = $commentManager->findAllComments();
        $view = new View;
        return $view->render("Views/admin/Comments/showComments", 
        array(
            "comments" => $findAllComments
        ));

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