<?php
require_once('Config.php');

class Database extends Config
{
    public static function getPdo()
    {
        $database = new PDO("mysql:host=localhost;dbname=mohabsat_projet5", "mohabsat_mohamed3", "Mohamed369852.");
       
        return $database;
    }

}







