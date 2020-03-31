<?php

class Session
{

    public function sessionStart()
    {
        if(session_status() === PHP_SESSION_NONE && session_status() === PHP_SESSION_DISABLED)
        {
                header('location: login');
        }
    }

}