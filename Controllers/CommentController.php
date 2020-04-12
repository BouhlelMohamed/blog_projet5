<?php


class CommentController
{
    public function commentsPage()
    {
        $commentManager  = new CommentManager();
        $findAllComments = $commentManager->findAllComments();
        $authors         = $commentManager->getAuthorFunction();
        $successMessageValidateComment = $_SESSION['successMessageValidateComment'] ?? NULL;
        unset($_SESSION['successMessageValidateComment']);
        $successMessageForDeleteComment = $_SESSION['successMessageForDeleteComment'] ?? NULL;
        unset($_SESSION['successMessageForDeleteComment']);
        $view            = new View;
        return $view->render("Views/admin/Comments/showComments", 
        array(
            "comments" => $findAllComments,
            "authors"  => $authors,
            "successMessageValidateComment" => $successMessageValidateComment,
            "successMessageForDeleteComment" => $successMessageForDeleteComment

        ));

    }


    public function validateCommentPage()
    {
        $id = $_REQUEST['id'];
        $comment        = new Comment();
        $commentManager = new CommentManager();
        $commentManager->validateComment($id,$comment);
        $_SESSION['successMessageValidateComment'] = '<div class="alert alert-notif alert-info" style="background-color: #1dff63;color: black;">Le commentaire a bien été validé</div>';
        header("Location: comments");

        //return $this->commentsPage();
        
    }

    public function deleteCommentPage()
    {
        $id = $_REQUEST['id'];
        $commentManager = new CommentManager();
        $commentManager->deleteComment($id);
        $_SESSION['successMessageForDeleteComment'] = '<div class="alert alert-notif alert-info" style="background-color:#ff0000b3;">Le commentaire a bien été supprimé</div>';
        header("Location: comments");
    }
}