<?php

require_once 'Database.php';
require_once('./Models/User.php');

class UserManager extends Database
{

    public function findAllUsers() 
    {
        $query = Database::getPdo()->prepare("SELECT * FROM Users"); 
        
        $query->execute();
  
        $users = array();
  
        $allUsers = $query->fetchAll();

        $index = 0; 

        foreach($allUsers as $v)
        {
            $user = new User();
            $user->setId($v['id']);
            $user->setLastName($v['lastName']);
            $user->setFirstName($v['firstName']);
            $user->setEmail($v['email']);
            $user->setUsername($v['username']);
            $user->setState($v['state']);
            $user->setRole($v['role']);
            $user->setCreatedAt($v['created_at']);
            $users[$index] = $user;
            $index++;
  
        }
        return $users;
    } 

    public function findOneUserById()
    {
        $user  = new User();
        
        $query = Database::getPdo()->prepare("SELECT * FROM Users WHERE id = :id"); 
        
        $query->execute(['id' => $_REQUEST['id']]);
       
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
   
    public function updateUserWithId()
    {
        $query = Database::getPdo()->prepare("UPDATE Users SET firstName = :firstName ,lastName = :lastName, email = :email, username = :username  WHERE id= :id LIMIT 1");
        $result = $query->execute(
            [
                'firstName'     => isset($_POST["firstName"]) ? $_POST["firstName"] : NULL,
                'lastName'      => isset($_POST["lastName"]) ? $_POST["lastName"] : NULL,
                'email'         => isset($_POST["email"]) ? $_POST["email"] : NULL,
                'username'      => isset($_POST["username"]) ? $_POST["username"] : NULL,
                'id'            => $_REQUEST['id']
            ]);    
    }

    public function validateUser()
    {
        $query = Database::getPdo()->prepare("UPDATE Users SET state = :state WHERE id = :id LIMIT 1");
        $query->execute([
            "state" =>  1,
            "id"    =>  $_REQUEST['id']
        ]);
    }

    public function adminForUser()
    {

        $query = Database::getPdo()->prepare("UPDATE Users SET role = :role WHERE id = :id LIMIT 1");
        $query->execute([
            "role" =>  0,
            "id"    =>  $_REQUEST['id']
        ]);
            
       
    }

     public function userForAdmin()
    {

        $query = Database::getPdo()->prepare("UPDATE Users SET role = :role WHERE id = :id LIMIT 1");
        $query->execute([
                "role" =>  1,
                "id"    =>  $_REQUEST['id']
            ]);
                
       
    } 

    public function deleteUserWithId()
    {
        $query = Database::getPdo()->prepare("DELETE FROM Users WHERE id = :id LIMIT 1");
        $query->execute(['id' =>  $_REQUEST['id']]);
    }

}