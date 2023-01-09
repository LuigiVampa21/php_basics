<?php

// CHECK IF FORM HAS BEEN SENT
if(!empty($_POST)){
    // CHECK IF ALL INPUTS HAVE BEEN FILLED
    if(isset($_POST["first_name"], $_POST["last_name"], $_POST["email"], $_POST["password"]) 
    && !empty($_POST['first_name'])
    && !empty($_POST['last_name'])
    && !empty($_POST['email'])
    && !empty($_POST['password'])
    ){
        // RETRIEVE && PROTECT DATA
        $first_name = strip_tags($_POST['first_name']);
        $last_name = strip_tags($_POST['last_name']);
        if(!filter_var(($_POST["email"]), FILTER_VALIDATE_EMAIL)){
            die("Invalid Email");
        }
        $email = strip_tags($_POST['email']);
        $password = strip_tags($_POST['password']); 

        $hashed_password = password_hash($password, PASSWORD_ARGON2ID);

        require_once '../database/connectDB.php';

        $sql = "INSERT INTO `users` (`first_name`, `last_name`, `email`, `password`) VALUES (:first_name, :last_name, :email,'$hashed_password')";

        $req = $db->prepare($sql);

        $req->bindValue(":first_name", $first_name, PDO::PARAM_STR);
        $req->bindValue(":last_name", $last_name, PDO::PARAM_STR);
        $req->bindValue(":email", $email, PDO::PARAM_STR);
        $req->execute();

        // CONNECT & OPEN USER SESSION
        session_start();
        // STOCKE USERDATA INTO $_SESSION
        $_SESSION["user"] = [
            "first_name" => $first_name,
            "last_name" => $last_name,
            "email" => $email
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






$title = "Register";
$page_title = "Create an Account";

include_once '../includes/header.php';
include_once '../includes/navbar.php';

?>

<form method="post">
    <div>
        <label for="first_name">First Name</label>
        <input type="text" name="first_name">
    </div>
    <div>
        <label for="last_name">Last Name</label>
        <input type="text" name="last_name">
    </div>
    <div>
        <label for="email">Email</label>
        <input type="email" name="email">
    </div>
    <div>
        <label for="password">Password</label>
        <input type="password" name="password">
    </div>
    <button type="submit">Sign up</button>
</form>

<?php
include_once '../includes/footer.php';
?>