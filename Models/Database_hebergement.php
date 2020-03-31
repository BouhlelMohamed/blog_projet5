<?php

class Database
{
    public static function getPdo()
    {
        $database = new PDO('mysql:host=localhost;dbname=blog_p5;charset=utf8', 'admin', '1234');
       
        return $database;
    }

    public function dump($string)
    {
        echo "<pre>";
        var_dump($string);
        echo "</pre>";
    }
}







