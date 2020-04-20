<?php

class AuthentificationManager extends Database
{

    public function register($user)
    {
        if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response']))
        {
            //your site secret key
            $secret = '6Lec_OsUAAAAALEpWD7yO-uLDhp_AZCAXh64jzKe';
            //get verify response data
            $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
            $responseData = json_decode($verifyResponse);
            if($responseData->success){
                $mdpUser = $user->getMdp();
                $mdp = isset($mdpUser) ? $user->getMdp() : NULL;    
                $hash = password_hash($mdp, PASSWORD_DEFAULT);
                $sQuery = Database::getPdo()->prepare("
                INSERT INTO Users 
                (lastName, firstName, username, email, mdp) 
                VALUES (:lastName, :firstName, :username, :email, :mdp)");
                $sQuery->execute([

                    'lastName'      => ($user->getLastName())  ? htmlspecialchars($user->getLastName()) : NULL,
                    'firstName'     => ($user->getFirstName()) ? htmlspecialchars($user->getLastName()) : NULL,
                    'username'      => ($user->getUsername())  ? htmlspecialchars($user->getUsername()) : NULL,
                    'email'         => ($user->getEmail())     ? htmlspecialchars($user->getEmail())    : NULL,
                    'mdp'           => ($hash) ? $hash : NULL,
                ]);
            }
        }
    }


    public function login()
    {
        if(!empty($_POST))
        {
            $queryForMdp = Database::getPdo()->prepare("
            SELECT * FROM Users 
            WHERE email = :email OR username = :email");
            $queryForMdp->execute([
                'email' =>  $_POST['email'] ?? NULL
            ]);
            $aData = $queryForMdp->fetchAll();
            if(empty($_SESSION['username']))
            {
                $motDePasse = $aData[0]['mdp'];
                if(!empty($_POST['mdp']))
                {
                    $mdp = password_verify($_POST['mdp'] ?? NULL, $motDePasse); 
                }
            }
            if(isset($mdp) && $mdp == true)
            {
                echo("<script>location.href = 'admin';</script>");
                $username = $aData[0]["username"];
                $_SESSION['username'] = $username;
                $id = $aData[0]["id"];
                $_SESSION['id'] = $id;
                $role = $aData[0]["role"];
                $_SESSION['role'] = $role;
            }
        }
    }

    public function logout()
    {
        session_destroy();
        unset($_SESSION['username']);
        header('location:login');

    }
    
}