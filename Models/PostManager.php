<?php

class PostManager extends Database
{

    public function findAllPosts()
    {
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
        $query = Database::getPdo()->prepare("SELECT * FROM Posts WHERE id = :id");
        $query->execute(["id" => $id]);
        $postById = $query->fetch();
        if($postById != false)
        {
            return new Post($postById);
        }
        return null;
    }

    public function updatePost($post,$id)
    {
        $query = Database::getPdo()->prepare("UPDATE Posts SET title = :title, chapo = :chapo, content = :content, update_at = NOW() WHERE id = :id");
        $query->execute([
            'title'   =>  htmlentities($post->getTitle()),
            "chapo"   =>  htmlentities($post->getChapo()), 
            "content" =>  htmlentities($post->getContent()),
            "id"      =>  $id
        ]);
    }

    public function insertPost($post)
    {
            $query = Database::getPdo()->prepare("INSERT INTO Posts (id_author,title,chapo, content) VALUES(:id_author,:title,:chapo,:content)");
            $query->execute(array(
            'id_author' => $post->getIdAuthor(),
            'title'     => htmlentities($post->getTitle()),
            'chapo'     => htmlentities($post->getChapo()),          
            'content'   => htmlentities($post->getContent())          
        ));
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
        $query = Database::getPdo()->prepare("DELETE FROM Posts WHERE id = :id LIMIT 1");
        $query->execute(['id' => $id]);
    }
}