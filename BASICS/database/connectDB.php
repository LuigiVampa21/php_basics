<?php
    define('DBHOST', 'localhost');
    define('DBUSER', 'root');
    define('DBPASS', '');
    define('DBNAME', 'php_practice_db');

    
    // DSN
    $dsn = "mysql:dbname=".DBNAME.";host=".DBHOST;
    try{
        $db = new PDO($dsn, DBUSER, DBPASS);
        $db->exec("SET NAMES utf8");
        // Set DEFAULT FETCH
        $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        echo "Connected to Database";
    }catch(PDOException $e){
        die($e->getMessage());
        echo $e;
    }

?>