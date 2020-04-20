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
        $token = bin2hex(random_bytes(32));
        $_SESSION['token'] = $token;
            if(isset($id) && !empty($id) && is_int($id))
            {
                $query = Database::getPdo()->prepare("SELECT * FROM Comments WHERE id_post = :id AND state = 1");
                $query->execute(['id' => (int)$id]);
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
        if(substr($_SERVER['HTTP_REFERER'],0,34) == 'http://mohamed-bouhlel.com/p5/blog')
        {
            if (isset($_SESSION['token']) AND isset($_POST['token']) AND 
            !empty($_SESSION['token']) AND !empty($_POST['token'])) {
                if ($_SESSION['token'] == $_POST['token']) {
                    if(!empty($_SESSION['username']) && !empty($_SESSION['id']))
                        {
                            $query = Database::getPdo()->prepare("INSERT INTO Comments (id_post,content,id_user) VALUES(:id_post,:content,:id_user)");
                            $query->execute(array(
                                'id_post'     => (int)$id,
                                'content'     => htmlentities(htmlspecialchars($comment->getContent())),
                                'id_user'     => htmlentities(htmlspecialchars($comment->getIdAuthor()))
                            ));
                        }
                    }
            }
        }

    }

    public function validateComment(int $id)
    {
        if(!empty($_SESSION['username']) && !empty($_SESSION['id']))
        {
            $query = Database::getPdo()->prepare("UPDATE Comments SET state = :state WHERE id = :id LIMIT 1");
            $query->execute([
                "state" =>  1,
                "id"    =>  $id
            ]);
        }
    }

    public function deleteComment(int $id)
    {
        if(!empty($_SESSION['username']) && !empty($_SESSION['id']))
        {
            $query = Database::getPdo()->prepare("DELETE FROM Comments WHERE id = :id LIMIT 1");
            $query->execute(['id'   =>  $id]);
        }
    }
}