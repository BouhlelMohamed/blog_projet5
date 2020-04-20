<?php

class PostManager extends Database
{

    public function findAllPosts()
    {
            $token = bin2hex(random_bytes(32));
            $_SESSION['token'] = $token;
            $query = Database::getPdo()->prepare("SELECT * FROM Posts  ORDER BY created_at DESC");
            $query->execute();
            $posts = array();
            $allPosts = $query->fetchAll();
            $index = 0;
            foreach($allPosts as $v)
            {
                $post = new Post($v);
                $posts[$index] = $post;
                $index++;
            }
        return $posts;
    }

    public function findPostById($id)
    {
        $token = bin2hex(random_bytes(32));
        $_SESSION['token'] = $token;
        $query = Database::getPdo()->prepare("SELECT * FROM Posts WHERE id = :id");
        $query->execute(["id" => $id]);
        $postById = $query->fetch();
        if(!$postById)
        {
            echo("<script>location.href = '/p5/page404';</script>");
        }elseif($postById != false)
        {
            return new Post($postById);
        }
    }

    public function updatePost($post,$id)
    {
        // D'ou l'utilisateur arrive
        //if(substr($_SERVER['HTTP_REFERER'],0,34) == 'http://mohamed-bouhlel.com/p5/post')
        //{
            //On vérifie que tous les jetons sont là
            if (isset($_SESSION['token']) AND isset($_POST['token']) AND 
            !empty($_SESSION['token']) AND !empty($_POST['token'])) {
                // On vérifie que les deux correspondent
                if ($_SESSION['token'] == $_POST['token']) {
                    if(!empty($_SESSION['username']) && !empty($_SESSION['id']))
                    {
                        $query = Database::getPdo()->prepare("UPDATE Posts SET title = :title, chapo = :chapo, content = :content, update_at = NOW() WHERE id = :id");
                        $query->execute([
                            'title'   =>  htmlspecialchars($post->getTitle()),
                            "chapo"   =>  htmlspecialchars($post->getChapo()), 
                            "content" =>  htmlspecialchars($post->getContent()),
                            "id"      =>  $id
                        ]);
                    }
                }
            }
        //}
        else {
            // Les token ne correspondent pas
            echo("<script>location.href = '/p5/';</script>");
        }

    }

    public function insertPost($post)
    {
        //if($_SERVER['HTTP_REFERER'] == 'http://mohamed-bouhlel.com/p5/posts')
        //{
            //On vérifie que tous les jetons sont là
            if (isset($_SESSION['token']) AND isset($_POST['token']) AND 
                !empty($_SESSION['token']) AND !empty($_POST['token'])) {
                if ($_SESSION['token'] == $_POST['token']) {
                    if(!empty($_SESSION['username']) && !empty($_SESSION['id']))
                    {
                        $query = Database::getPdo()->prepare("INSERT INTO Posts (id_author,title,chapo, content) VALUES(:id_author,:title,:chapo,:content)");
                        $query->execute(array(
                            'id_author' => $post->getIdAuthor(),
                            'title'     => htmlspecialchars($post->getTitle()),
                            'chapo'     => htmlspecialchars($post->getChapo()),          
                            'content'   => htmlspecialchars($post->getContent())          
                        ));
                    }
                }
            }
        //}
    }


    public function getAuthorPost($iPostId='')
    {
            if(isset($iPostId) && strlen($iPostId) > 0 && !empty($iPostId))
            {
                $sQuery = Database::getPdo()->prepare("SELECT p.id id_post,u.id id_user,u.username 
                FROM Posts p 
                INNER JOIN Users u
                WHERE p.id = $iPostId 
                AND p.id_author = u.id");
                //var_dump($sQuery);die;
            }
            else
            {
                $sQuery = Database::getPdo()->prepare("SELECT p.id id_post,u.id id_user,u.username 
                FROM Posts p 
                INNER JOIN Users u
                ON p.id_author = u.id GROUP BY u.id");
            }
            $sQuery->execute();
            $aData = $sQuery->fetchAll();
            if(isset($aData))
            {
                return $aData;
            }
    }

    public function deletePost(int $id)
    {
        if(!empty($_SESSION['username']) && !empty($_SESSION['id']))
        {
            $query = Database::getPdo()->prepare("DELETE FROM Posts WHERE id = :id LIMIT 1");
            $query->execute(['id' => $id]);
        }

    }
}