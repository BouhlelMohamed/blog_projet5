<?php

class PostController
{
    public function postsPage()
    {
        $postManager = new PostManager();
        $successMessageDeletePost = $_SESSION['successMessageDeletePost'] ?? NULL;
        $successMessageAddPost = $_SESSION['successMessageAddPost'] ?? NULL;
        unset($_SESSION['successMessageDeletePost']);
        unset($_SESSION['successMessageAddPost']);
        $view = new View;
        return $view->render("Views/admin/Posts/showPosts", 
        array(
            "posts" => $postManager->findAllPosts(),
            "successMessageDeletePost" => $successMessageDeletePost,
            "successMessageAddPost" => $successMessageAddPost

        ));

    }

    public function onePostPage()
    {
        $postManager = new PostManager();
        $id = $_REQUEST['id'];
        $successMessageUpdatePost = $_SESSION['successMessageUpdatePost'] ?? NULL;
        unset($_SESSION['successMessageUpdatePost']);
        $post = $postManager->findPostById($id);
        $view = new View;
        return $view->render("Views/admin/Posts/showOnePost", 
        array(
            "post"   => $post,
            'author' => $postManager->getAuthorPost($id),
            'successMessageUpdatePost' => $successMessageUpdatePost
        ));

    }

    public function updatePostPage()
    {
        $id          = htmlspecialchars($_REQUEST['id']);
        $post        = new Post(htmlspecialchars($_POST));
        $postManager = new PostManager();
        $postManager->updatePost($post,$id);
        $_SESSION['successMessageUpdatePost'] = '<div class="alert alert-notif alert-info" style="background-color: #1dff63;color: black;">Votre article a bien été modifié</div>';
        header("location: post?id=$id");
    }

    public function insertPostPage()
    {
        $post        = new Post(htmlspecialchars($_POST));
        $postManager = new PostManager();
        $postManager->insertPost($post);
        $_SESSION['successMessageAddPost'] = '<div class="alert alert-notif alert-info" style="background-color: rgb(29, 192, 255);">L\'article a bien été créé</div>';
        header('location: posts');
    }

    public function deletePostPage()
    {
        $postManager = new PostManager();
        $id          = htmlspecialchars($_REQUEST['id']) ?? NULL;
        $_SESSION['successMessageDeletePost'] = '<div class="alert alert-notif alert-info" style="background-color:#ff0000b3;">Votre article a bien été supprimé</div>';
        if(!empty($id))
        {
            $postManager->deletePost($id);
        }        
        header('location: posts');
    }
}