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
        $user  = new User();
        $query = Database::getPdo()->prepare("SELECT * FROM Users WHERE id = :id"); 
        $query->execute(['id' => $id]);
        $userById = $query->fetch();
        $user->setId($userById['id']);
        $user->setLastName($userById['lastName']);
        $user->setFirstName($userById['firstName']);
        $user->setEmail($userById['email']);
        $user->setUsername($userById['username']);
        $user->setState($userById['state']);
        $user->setRole($userById['role']);
        return $user;
    }
   
    public function updateUserWithId($user,$id)
    {
        $query = Database::getPdo()->prepare("UPDATE Users SET firstName = :firstName ,lastName = :lastName, email = :email, username = :username  WHERE id= :id LIMIT 1");
        $result = $query->execute(
            [
                'firstName'     => htmlentities($user->getFirstName()),
                'lastName'      => htmlentities($user->getLastName()),
                'email'         => htmlentities($user->getEmail()),
                'username'      => htmlentities($user->getUsername()),
                'id'            => $id
            ]);    
    }

    public function validateUser(int $id)
    {
        $query = Database::getPdo()->prepare("UPDATE Users SET state = :state WHERE id = :id LIMIT 1");
        $query->execute([
            "state" =>  1,
            "id"    =>  $id
        ]);
    }

    public function adminForUser(int $id)
    {
        $query = Database::getPdo()->prepare("UPDATE Users SET role = :role WHERE id = :id LIMIT 1");
        $query->execute([
            "role" =>  0,
            "id"    =>  $id
        ]);
    }

     public function userForAdmin(int $id)
    {
        $query = Database::getPdo()->prepare("UPDATE Users SET role = :role WHERE id = :id LIMIT 1");
        $query->execute([
                "role" =>  1,
                "id"    =>  $id
            ]);
    } 

    public function deleteUserWithId(int $id)
    {
        $query = Database::getPdo()->prepare("DELETE FROM Users WHERE id = :id LIMIT 1");
        $query->execute(['id' =>  $id]);
    }

    public function getAuthorPosts()
    {
        $query = Database::getPdo()->prepare(
        "SELECT id_author,username FROM Users INNER JOIN Posts ON Users.id = Posts.id_author");
        $query->execute();
        $authors = array();
        $authors = $query->fetchAll(PDO::FETCH_UNIQUE);
        return $authors;
    }
}