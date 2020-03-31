<?php

class AuthentificationManager extends Database
{

    public function register($user)
    {
        $mdpUser = $user->getMdp();
        $mdp = isset($mdpUser) ? $user->getMdp() : NULL;    
        $hash = password_hash($mdp, PASSWORD_DEFAULT);
        $sQuery = Database::getPdo()->prepare("
        INSERT INTO Users 
        (lastName, firstName, username, email, mdp) 
        VALUES (:lastName, :firstName, :username, :email, :mdp)");
        $sQuery->execute([

            'lastName'      => htmlentities($user->getLastName())  ? $user->getLastName() : NULL,
            'firstName'     => htmlentities($user->getFirstName()) ? $user->getLastName() : NULL,
            'username'      => htmlentities($user->getUsername())  ? $user->getUsername() : NULL,
            'email'         => htmlentities($user->getEmail())     ? $user->getEmail()    : NULL,
            'mdp'           => isset($hash) ? $hash : NULL,
        ]);
    }


    public function login()
    {
        $queryForMdp = Database::getPdo()->prepare("
        SELECT mdp FROM Users 
        WHERE email = :email OR username = :email");
        $queryForMdp->execute([
            'email' =>  $_POST['email'] ?? NULL
        ]);
        $motDePasse = $queryForMdp->fetch()["mdp"];
        $mdp = password_verify($_POST['mdp'] ?? NULL, $motDePasse); 
        //var_dump($mdp);
        if(isset($mdp) && $mdp == true)
        {
            $query = Database::getPdo()->prepare("
            SELECT * FROM Users 
            WHERE email = :email, mdp = :mdp");
            //var_dump('im here');
            $query->execute([
                'email' =>  $_POST['email'] ?? NULL,
                'mdp'   =>  $mdp
            ]);
            header('Location: admin');
            session_start();
            $queryForSession = Database::getPdo()->prepare("
            SELECT username FROM Users 
            WHERE email = :email");
            $queryForSession->execute([
                'email' =>  $_POST['email'] ?? NULL
            ]);
            $username = $queryForSession->fetch()["username"];
            $_SESSION['username'] = $username;

            $queryForId = Database::getPdo()->prepare("
            SELECT id FROM Users 
            WHERE email = :email");
            $queryForId->execute([
                'email' =>  $_POST['email'] ?? NULL
            ]);
            $id = $queryForId->fetch()["id"];
            $_SESSION['id'] = $id;

            $queryForRole = Database::getPdo()->prepare("
            SELECT role FROM Users 
            WHERE email = :email");
            $queryForRole->execute([
                'email' =>  $_POST['email'] ?? NULL
            ]);
            $role = $queryForRole->fetch()["role"];
            $_SESSION['role'] = $role;
       }
    }

    public function logout()
    {
        session_destroy();
        unset($_SESSION['username']);
        header('location:login');

    }
    
}