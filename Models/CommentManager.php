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
            $comment = new Comment;
            $comment->setId($v['id']);
            $comment->setContent($v['content']);
            $comment->setState($v['state']);
            $comments[$index] = $comment;
            $index++;
        }

        return $comments;

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