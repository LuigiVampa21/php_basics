<?php
$title = "Add Item";
$page_title = 'Add New Item';

if(!empty($_POST)){
    // Check datas
    if(isset($_POST['title'], $_POST['content']) && !empty($_POST['title']) && !empty($_POST['content'])){

        // If form complete retrieve datas
        $title = strip_tags($_POST['title']);
        $content = htmlspecialchars($_POST['content']);
        
        require_once "../../database/connectDB.php";

        $sql = "INSERT INTO `item` (`title`, `content`) VALUES (:title, :content)";

        $req = $db->prepare($sql);
        
        $req->bindValue(':title', $title, PDO::PARAM_STR);
        $req->bindValue(':content', $content, PDO::PARAM_STR);
        
        $newItem = $req->execute();
        
        echo var_dump($newItem);
        
    }else{
        die("Incomplete form");
    }
}
var_dump($_POST);

    include_once "../../includes/header.php";
    include_once "../../includes/navbar.php";


?>
<form method="post">
    <div>
        <label for="title">Title</label>
        <input type="text" name="title">
    </div>
    <div>
        <label for="content">Content</label>
        <input type="text" name="content">
    </div>

    <button type="submit">Save</button>
</form>


<?php

    include_once "../../includes/footer.php";

?>