<?php

require_once('Database.php');

class SessionManager extends Database
{

    public function sessionStart()
    {
        if(session_status() === PHP_SESSION_NONE && session_status() === PHP_SESSION_DISABLED)
        {
                header('location: login');
        }
    }

}