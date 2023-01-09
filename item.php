<?php

// GET URL ID
if(!isset($_GET['id']) || empty($_GET)){
    header("Location: items.php");
    exit;
}

$id = $_GET["id"];

require_once "./database/connectDB.php";
$title = 'Item'; 
include "./includes/header.php";

$sql = "SELECT * from `item` WHERE `id` = :id";

$req = $db->prepare($sql);

$req->bindValue(':id', $id, PDO::PARAM_INT);

$req->execute();

$item = $req->fetch();

if(!$item){
    http_response_code(404);
    echo "This article does not exists";
    exit;
}

$page_title = $item['title'];
include "./includes/navbar.php";
?>


<section>
        <article>
            <h1> <?= $item['title'] ?> </h1>
            <p>Published on: <?= $item['created_at']?></p>
            <div><?= $item['content']?></div>
        </article>
    </section>
        
<?php

    include "./includes/footer.php";

?>