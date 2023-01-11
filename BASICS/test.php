<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- CONNECT TO DB -->
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

    // -------------------------------------   GET DATA   ---------------------------------------
    
    // Write query
    $query = "SELECT * FROM `users`";
    
    // Init query
    $req = $db->query($query);
    
    // Fetch Data
    $user = $req->fetchAll();
    
    // We can choose to get that data in other forms eg = assoc array
    
    // $user_assoc = $req->fetch(PDO::FETCH_ASSOC);
    
    // echo var_dump($user_assoc);
    // echo var_dump($user);
    
    
    
    // -------------------------------------   POST DATA   ---------------------------------------
    
    // $push = "INSERT INTO `users`(`first_name`,`last_name`,`email`,`password`) VALUES ('aka', 'labi', 'aka@labi.com', 'pass1234')";
    
    // $req = $db->query($push);
    


    // -------------------------------------   EDIT DATA   ---------------------------------------
    
    // $edit = "UPDATE `users` SET `password` = 'pass12345'
    //        WHERE `first_name` = 'aka'";
    
    // $req = $db->query($edit);
    


    // -------------------------------------   DELETE DATA   ---------------------------------------
    
    // $delete = "DELETE FROM `users` WHERE `password` = 'pass12345'";
    
    // $req = $db->query($delete);
    
    // echo var_dump($user);
    
    
    // $first_name='ntn';
    // $password='pass1234';
    
    
    // -------------------------------------   SANITIZE QUERY   ---------------------------------------



    // $sql = " SELECT * FROM `users` WHERE `first_name`=:first_name AND `password`=:password";
    // // $req = $db->query($sql);
    // // $user = $req->fetch();

    // // Prepare request
    // $req = $db->prepare($sql);

    // // Protect req with bindValues
    // $req->bindValue(":first_name", $first_name, PDO::PARAM_STR);
    // $req->bindValue(":password", $password, PDO::PARAM_STR);

    // // Init req
    // $req->execute();

    // $user = $req->fetch();

    // echo var_dump($user);


    ?>

</body>
</html>