<?php
 @session_start();

 if(!isset($_SESSION["user"])){
    header("Location: ../auth/login.php");
    exit;
}

// RETRIEVE DATA
if($_FILES){
    if($_FILES['file'] && !$_FILES['file']['error']){
        // VALIDATE EXTENSION FILE && TYPE MIME
        $allowed = [
            "jpg" => "image/jpg",
            "jpeg" => "image/jpeg",
            "png" => "image/png",
        ];
        
        $filename = $_FILES["file"]["name"];
        $filetype = $_FILES["file"]["type"];
        $filesize = $_FILES["file"]["size"];
        
        $extension = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
        if(!array_key_exists($extension, $allowed) || !in_array($filetype, $allowed)){
            die("Incorrect file format");
        }
        // LIMIT FILE SIZE TO 1MO
        echo var_dump($filesize);
        if($filesize > 1024 * 1024){
            die("File too heavy");
        }
        // GENERATE UNIQ ID
        $newname = md5(uniqid());
        echo var_dump($newname);
        
        // GENERATE PATH
        $newfilename = __DIR__ . "/files/$newname.$extension";
        // echo var_dump($newfilename);

        // MOVE FILE TO FILES FOLDER
        if(!move_uploaded_file($_FILES["file"]["tmp_name"], $newfilename)){
            die('Upload failed. Please try again later');
        } 

    }
}


$title="File uploading";
$page_title="Upload your files";

    include_once "../includes/header.php";
    include_once "../includes/navbar.php";
    
    
    ?>

<form method="post" enctype="multipart/form-data">
  <div>
    <label for="file">Choose file to upload</label>
    <input type="file" id="file" name="file" multiple />
  </div>
  <div>
    <button>Submit</button>
  </div>
</form>
    
<?php
    include_once "../includes/footer.php";
?>