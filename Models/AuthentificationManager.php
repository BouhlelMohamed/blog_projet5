<?php

require_once('Database.php');

class AuthentificationManager extends Database
{

    public function register()
    {
        $hash = password_hash($_POST["mdp"], PASSWORD_DEFAULT);
        $query = Database::getPdo()->prepare("
        INSERT INTO Users 
        (lastName, firstName, username, email, mdp) 
        VALUES (:lastName, :firstName, :username, :email, :mdp)");
        $query->execute([

            'lastName'      => isset($_POST["lastName"]) ? $_POST["lastName"] : NULL,
            'firstName'     => isset($_POST["firstName"]) ? $_POST["firstName"] : NULL,
            'username'      => isset($_POST["username"]) ? $_POST["username"] : NULL,
            'email'         => isset($_POST["email"]) ? $_POST["email"] : NULL,
            'mdp'           => isset($hash) ? $hash : NULL,
        ]);

        header("location: login");  

    }

    public function login()
    {
        $queryForMdp = Database::getPdo()->prepare("
        SELECT mdp FROM Users 
        WHERE email = :email");
        $queryForMdp->execute([
            'email' =>  $_POST['email']
        ]);
        $motDePasse = $queryForMdp->fetch()["mdp"];
        $mdp = password_verify($_POST['mdp'], $motDePasse); 
        if(!empty($mdp == true))
        {
            $query = Database::getPdo()->prepare("
            SELECT * FROM Users 
            WHERE email = :email, mdp = :mdp");
            $query->execute([
                'email' =>  $_POST['email'],
                'mdp'   =>  $mdp
            ]);
            header('location: /');
            session_start();
        }

    }

    public function logout()
    {
        session_start();
        session_destroy();
        unset($_SESSION['username']);
        header('location:login');

    }


    
}