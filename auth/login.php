<?php

// CHECK IF FORM HAS BEEN SENT
if(!empty($_POST)){
    // CHECK IF ALL INPUTS HAVE BEEN FILLED
    if(isset($_POST["email"], $_POST["password"]) 
    && !empty($_POST['email'])
    && !empty($_POST['password'])
    ){
        // RETRIEVE && PROTECT DATA
        if(!filter_var(($_POST["email"]), FILTER_VALIDATE_EMAIL)){
            die("Invalid Email");
        }
        $email = strip_tags($_POST['email']);
        $password = strip_tags($_POST['password']); 


        require_once '../database/connectDB.php';

        $sql = "SELECT * FROM `users` WHERE `email` = :email";

        $req = $db->prepare($sql);
        $req->bindValue(":email", $email, PDO::PARAM_STR);
        $req->execute();

        $user = $req->fetch();

        if(!$user){
            die('Email or password is not correct');
        }

        // CHECK FOR USER PASSWORD
        $password_match = password_verify($_POST['password'], $user['password']);

        if(!$password_match){
            die('Wrong password');
        }

        // CONNECT & OPEN USER SESSION
        session_start();
        // STOCKE USERDATA INTO $_SESSION
        $_SESSION["user"] = [
            "first_name" => $user["first_name"],
            "last_name" => $user["last_name"],
            "email" => $user["email"]
        ];

        if(!$_SESSION){
            echo ('No user found!');
        }

        // REDIRECT TO OVERVIEW PAGE
        header("Location: overview.php");
    }else{
        die("Incomplete form");
    }
}






$title = "Login";
$page_title = "Sign in to your account";

include_once '../includes/header.php';
include_once '../includes/navbar.php';

?>

<form method="post">
    <div>
        <label for="email">Email</label>
        <input type="email" name="email">
    </div>
    <div>
        <label for="password">Password</label>
        <input type="password" name="password">
    </div>
    <button type="submit">Sign in</button>
</form>

<?php
include_once '../includes/footer.php';
?>