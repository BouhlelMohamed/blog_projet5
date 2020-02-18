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

    public function getAuthorFunction()
    {
        $query = Database::getPdo()->prepare(
        "SELECT id_user,username FROM Users INNER JOIN Comments ON Users.id = Comments.id_user");
        
        $query->execute();

        $authors = array();

        $authors = $query->fetchAll(PDO::FETCH_UNIQUE);

        return $authors;

    }


    public function findCommentWithId()
    {
        $query = Database::getPdo()->prepare("SELECT * FROM Comments WHERE id_post = :id AND state = 1");
        
        $query->execute(['id' => $_REQUEST['id']]);
        
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
            $comment->setCreatedAt($v['created_at']);
            $comment->setIdAuthor($v['id_user']);
            $comment->setIdPost($v['id_post']);
            $comments[$index] = $comment;
            $index++;
        }

        return $comments;

    }


    public function insertComment($comment)
    {
            
            $query = Database::getPdo()->prepare("INSERT INTO Comments (id_post,content,id_user) VALUES(:id_post,:content,:id_user)");
            
            $query->execute(array(
            'id_post'     => $_REQUEST['id'],
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