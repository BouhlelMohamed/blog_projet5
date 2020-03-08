<?php

    require_once('Database.php');
    require_once('./Models/Comment.php');

class CommentManager extends Database
{
    public function findAllComments()
    {
        $comment = new Comment;

        $query = Database::getPdo()->prepare("SELECT * FROM Comments");

        $query->execute();

        $comments = array();

        $allComments = $query->fetchAll();

        $index = 0;

        
        foreach($allComments as $v)
        {
            $comment = new Comment($v);
            /*
            $comment->setId($v['id']);
            $comment->setContent($v['content']);
            $comment->setState($v['state']);*/
            $comment->setIdAuthor($v['id_user']);
            $comment->setIdPost($v['id_post']);
            $comments[$index] = $comment;
            $index++;
        }

        return $comments;

    }
    // Changer dans l'user
    public function getAuthorFunction()
    {
        $query = Database::getPdo()->prepare(
        "SELECT c.id_user,u.username FROM Users u INNER JOIN Comments c ON u.id = c.id_user");
        
        $query->execute();

        $authors = array();

        $authors = $query->fetchAll(PDO::FETCH_UNIQUE);
        
        return $authors;

    }


    public function findCommentWithId(int $id)
    {
        if(isset($id) && !empty($id) && is_int($id))
        {
            $query = Database::getPdo()->prepare("SELECT * FROM Comments WHERE id_post = :id AND state = 1");
            $execute = $query->execute(['id' => (int)$id]);
                $comments = array();
                $allComments = $query->fetchAll();
                $index = 0;
                foreach($allComments as $v)
                {
                    $comment = new Comment($v);
                    $comment->setCreatedAt($v['created_at']);
                    $comment->setIdAuthor($v['id_user']);
                    $comment->setIdPost($v['id_post']);
                    $comments[$index] = $comment;
                    $index++;
                }
                return $comments;

    
        }

    }


    public function insertComment($comment,$id)
    {
            
            $query = Database::getPdo()->prepare("INSERT INTO Comments (id_post,content,id_user) VALUES(:id_post,:content,:id_user)");
            $query->execute(array(
            'id_post'     => (int)$id, // hidden formulaire
            'content'     => $comment->getContent(),
            'id_user'     => $comment->getIdAuthor()
        ));
        
    }

    public function validateComment()
    {
        $query = Database::getPdo()->prepare("UPDATE Comments SET state = :state WHERE id = :id LIMIT 1");
        $query->execute([
            "state" =>  1,
            "id"    =>  $_REQUEST['id']
        ]);
    }

    public function deleteComment()
    {
        $query = Database::getPdo()->prepare("DELETE FROM Comments WHERE id = :id LIMIT 1");
        $query->execute(['id'   =>  $_REQUEST['id']]);
    }
}