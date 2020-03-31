<?php


class CommentManager extends Database
{
    public function findAllComments()
    {
        $comment = new Comment;
        $query = Database::getPdo()->prepare("SELECT * FROM Comments ORDER BY created_at DESC");
        $query->execute();
        $comments = array();
        $allComments = $query->fetchAll();
        $index = 0;
        foreach($allComments as $v)
        {
            $comment = new Comment($v);
            $comment->setIdAuthor($v['id_user']);
            $comments[$index] = $comment;
            $index++;
        }

        return $comments;

    }

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
                    $comment->setIdAuthor($v['id_user']);
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
            'id_post'     => (int)$id,
            'content'     => htmlentities($comment->getContent()),
            'id_user'     => htmlentities($comment->getIdAuthor())
        ));
        
    }

    public function validateComment(int $id)
    {
        $query = Database::getPdo()->prepare("UPDATE Comments SET state = :state WHERE id = :id LIMIT 1");
        $query->execute([
            "state" =>  1,
            "id"    =>  $id
        ]);
    }

    public function deleteComment(int $id)
    {
        $query = Database::getPdo()->prepare("DELETE FROM Comments WHERE id = :id LIMIT 1");
        $query->execute(['id'   =>  $id]);
    }
}