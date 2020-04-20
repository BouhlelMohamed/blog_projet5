<?php

class UserManager extends Database
{

    public function findAllUsers() 
    {
        $query = Database::getPdo()->prepare("SELECT * FROM Users ORDER BY created_at DESC"); 
        $query->execute();
        $users = array();
        $allUsers = $query->fetchAll();
        $index = 0; 
        foreach($allUsers as $v)
        {
            $user = new User($v);
            $users[$index] = $user;
            $index++;
        }
        return $users;
    } 

    public function findOneUserById(int $id)
    {
        if(!empty($_SESSION['username']) && !empty($_SESSION['id']))
        {
            $user  = new User();
            $query = Database::getPdo()->prepare("SELECT * FROM Users WHERE id = :id"); 
            $query->execute(['id' => $id]);
            $userById = $query->fetch();
            if(!$userById)
            {
                echo("<script>location.href = '/p5/users';</script>");
            }
            $user->setId($userById['id']);
            $user->setLastName($userById['lastName']);
            $user->setFirstName($userById['firstName']);
            $user->setEmail($userById['email']);
            $user->setUsername($userById['username']);
            $user->setState($userById['state']);
            $user->setRole($userById['role']);
            return $user;
        }
    }
   
    public function updateUserWithId($user,$id)
    {
        if(!empty($_SESSION['username']) && !empty($_SESSION['id']))
        {
            $query = Database::getPdo()->prepare("UPDATE Users SET firstName = :firstName ,lastName = :lastName, email = :email, username = :username  WHERE id= :id LIMIT 1");
            $query->execute(
                [
                    'firstName'     => htmlentities(htmlspecialchars($user->getFirstName())),
                    'lastName'      => htmlentities(htmlspecialchars($user->getLastName())),
                    'email'         => htmlentities(htmlspecialchars($user->getEmail())),
                    'username'      => htmlentities(htmlspecialchars($user->getUsername())),
                    'id'            => $id
                ]);   
        } 
    }

    public function validateUser(int $id)
    {
        if(!empty($_SESSION['username']) && !empty($_SESSION['id']))
        {
            $query = Database::getPdo()->prepare("UPDATE Users SET state = :state WHERE id = :id LIMIT 1");
            $query->execute([
                "state" =>  1,
                "id"    =>  $id
            ]);
        }
    }

    public function adminForUser(int $id)
    {
        if(!empty($_SESSION['username']) && !empty($_SESSION['id']))
        {
            $query = Database::getPdo()->prepare("UPDATE Users SET role = :role WHERE id = :id LIMIT 1");
            $query->execute([
                "role" =>  0,
                "id"    =>  $id
            ]);
        }
    }

     public function userForAdmin(int $id)
    {
        if(!empty($_SESSION['username']) && !empty($_SESSION['id']))
        {
            $query = Database::getPdo()->prepare("UPDATE Users SET role = :role WHERE id = :id LIMIT 1");
            $query->execute([
                    "role" =>  1,
                    "id"    =>  $id
                ]);
        }
    } 

    public function deleteUserWithId(int $id)
    {
        if(!empty($_SESSION['username']) && !empty($_SESSION['id']))
        {
            $query = Database::getPdo()->prepare("DELETE FROM Users WHERE id = :id LIMIT 1");
            $query->execute(['id' =>  $id]);
        }
    }

    public function getAuthorPosts()
    {
        if(!empty($_SESSION['username']) && !empty($_SESSION['id']))
        {
            $query = Database::getPdo()->prepare(
            "SELECT id_author,username FROM Users INNER JOIN Posts ON Users.id = Posts.id_author");
            $query->execute();
            $authors = array();
            $authors = $query->fetchAll(PDO::FETCH_UNIQUE);
            return $authors;
        }
    }
}