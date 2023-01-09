<?php

require_once "./database/connectDB.php";
$title = 'Item List'; 
$page_title = 'All Items';
    include "./includes/header.php";
    include "./includes/navbar.php";

    $sql = "SELECT * from `item` ORDER BY `created_at` DESC";

    $req = $db->query($sql);

    $items = $req->fetchAll();

?>


<section>
<?php foreach($items as $item): ?>
        <article>
            <h1> <a href="item.php?id=<?=$item['id']?>"> <?= $item['title'] ?> </a></h1>
            <p>Published on: <?= $item['created_at']?></p>
            <div><?= $item['content']?></div>
        </article>
<?php endforeach; ?>
    </section>
        
<?php

    include "./includes/footer.php";

?>