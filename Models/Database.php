<?php

require_once('Config.php');

class Database extends Config
{
    public static function getPdo()
    {
        $database = new PDO('mysql:host=localhost;dbname=blog_p5;charset=utf8', 'admin', '1234');
       
        return $database;
    }

}







