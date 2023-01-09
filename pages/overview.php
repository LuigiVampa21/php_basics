<?php

session_start();

$title="Overview";
$page_title= $_SESSION['user']['first_name'] . "'s Profile";

require('../database/connectDB.php');

include "../includes/header.php";
include "../includes/navbar.php";
?>

<p>Lastname: <?= $_SESSION['user']['last_name'] ?></p>
<p>Email: <?= $_SESSION['user']['email'] ?></p>


<?php
include "../includes/footer.php";
?>