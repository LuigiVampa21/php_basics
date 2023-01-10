<?php
 @session_start();

 if(!isset($_SESSION["user"])){
    header("Location: ../auth/login.php");
    exit;
}

echo var_dump($_FILES);

$title="File uploading";
$page_title="Upload your files";

    include_once "../includes/header.php";
    include_once "../includes/navbar.php";
    
    
    ?>

<form method="post" enctype="multipart/form-data">
    
    <div>
        <label for="file">File</label>
        <input type="file" name="image">
    </div>
    <button type="submit">Submit</button>
</form>
    
<?php
    include_once "../includes/footer.php";
?>