<?php 

spl_autoload_register(function($class) {
    $getcwd = getcwd();
    $sources = [];
    $sources[] = "$getcwd/Controllers/$class.php";
    $sources[] = "$getcwd/Views/$class.php";
    $sources[] = "$getcwd/Models/$class.php" ;
    foreach ($sources as $source) {
            if (file_exists($source)) {
                require_once $source;
                return;
            } 
        } 
    });