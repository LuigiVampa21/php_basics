<?php
// require "./functions/verif.php";
require "./database/connectDB.php";
$title = 'Home'; 
$page_title = 'Home Page';
    include "./includes/header.php";
    include "./includes/navbar.php";

    $first_name='ntn';
    $password='pass1234';


    $sql = " SELECT * FROM `users` WHERE `first_name`=:first_name AND `password`=:password";
    // $req = $db->query($sql);
    // $user = $req->fetch();

    // Prepare request
    $req = $db->prepare($sql);

    // Protect req with bindValues
    $req->bindValue(":first_name", $first_name, PDO::PARAM_STR);
    $req->bindValue(":password", $password, PDO::PARAM_STR);

    // Init req
    $req->execute();

    $user = $req->fetch();

    echo var_dump($user);

    include "./includes/footer.php";
?>    
