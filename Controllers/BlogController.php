<?php

class BlogController
{

    public function homeVisitorPage()
    {     
        
        $postManager    = new PostManager;
        $view           = new View;
        $authors        = $postManager->getAuthorPost();
        if(isset($_POST['mail']) && isset($_POST['message']) && isset($_POST['name'])){
            if(isset($_GET['send']) && $_GET['send'] == 1)
            {
                $des = htmlspecialchars($_POST['mail']);
                $to = "mohamed.bouhleel@gmail.com";
                $subject = "Contact - Blog - ".htmlspecialchars($_POST['name']);
                $txt = htmlspecialchars($_POST['message']);
                $headers = "From: $des" . "\r\n" .
                "CC: mohamed.bouhleel@gmail.com";
                mail($to,$subject,$txt,$headers);    
            }
        }
        return $view->render("Views/visitor/blog/blog",
        array(
        "posts"         => $postManager->findAllPosts(),
        "authors"       => $authors,
        )
        ,"base.visitor");
            
    }

    public function onePostPage()
    {
        $id = htmlspecialchars($_REQUEST['id']);
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
        $comment        = new Comment(htmlspecialchars($_POST));
        $id = htmlspecialchars($_REQUEST['id']);
        $commentManager->insertComment($comment,$id);
        $url = $_SERVER['HTTP_REFERER'];
        header("Location: $url");
    }

}