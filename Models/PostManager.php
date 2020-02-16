<?php


require_once('./Models/Post.php');

require_once 'Database.php';

class PostManager extends Database
{

    public function findAllPosts()
    {
        $query = Database::getPdo()->prepare("SELECT * FROM Posts");

        $query->execute();

        $posts = array();

        $allPosts = $query->fetchAll();

        $index = 0;

        foreach($allPosts as $v)
        {
            $post = new Post;
            $post->setId($v['id']);
            $post->setTitle($v['title']);
            $post->setChapo($v['chapo']);
            $post->setContent($v['content']);
            $post->setCreatedAt($v['created_at']);
            $post->setUpdateAt($v['update_at']);
            $post->setIdAuthor($v['id_author']);
            $posts[$index] = $post;
            $index++;
        }

        return $posts;
    }

    public function findPostById()
    {
        $post = new Post;
        
        $query = Database::getPdo()->prepare("SELECT * FROM Posts WHERE id = :id");

        $query->execute(["id" => $_REQUEST['id']]);

        $postById = $query->fetch();

        $post->setId($postById['id']);
        $post->setTitle($postById['title']);
        $post->setChapo($postById['chapo']);
        $post->setContent($postById['content']);
        $post->setCreatedAt($postById['created_at']);
        $post->setUpdateAt($postById['update_at']);


        return $post;
    }

    public function updatePost()
    {
        $query = Database::getPdo()->prepare("UPDATE Posts SET title = :title, chapo = :chapo, content = :content, update_at = NOW() WHERE id = :id");
        
        $result = $query->execute([
                          //$post->setTitle($_POST['title']),
                          //$post->setChapo($_POST['chapo']),
                          //$post->setContent($_POST['content']),
            "title"   =>  isset($_POST['title']) ? $_POST["title"] : NULL,
            "chapo"   =>  isset($_POST['chapo']) ? $_POST['chapo'] : NULL,
            "content" =>  isset($_POST['content']) ? $_POST['content'] : NULL,
            "id"      =>  $_REQUEST['id']
        ]);
        
    }

    public function insertPost($post)
    {
            
            $query = Database::getPdo()->prepare("INSERT INTO Posts (title,chapo, content) VALUES(:title,:chapo,:content)");
            
            $query->execute(array(
            'title'     => $post->getTitle(),
            'chapo'     => $post->getChapo(),          
            'content'   => $post->getContent()          
        ));
        
    }


    public function getAuthorPost()
    {

        $query = Database::getPdo()->prepare("SELECT id_author
        FROM Posts
        WHERE id = :id");
        $query->execute(['id'   =>  $_REQUEST['id']]);
        $idAuthor = $query->fetch();
        
        $queryForAuthor = Database::getPdo()->prepare("SELECT username
        FROM Users
        WHERE id = :id");
        $queryForAuthor->execute(['id'   =>  $idAuthor['id_author']]);
        $result = $queryForAuthor->fetch();
        return $result['username'];
    }

    public function deletePost()
    {
        $query = Database::getPdo()->prepare("DELETE FROM Posts WHERE id = id LIMIT 1");
        $query->execute(['id' => $_REQUEST['id']]);
    }
}