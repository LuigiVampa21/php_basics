
<?php
    @session_start();
?>
<nav>
        <h1><?= $page_title ?></h1>
        <ul>
            <li>Home</li>
            <li>Services</li>
            <li>Contact</li>

    <?php if(!isset($_SESSION["user"])): ?>
        <li><a href="./auth/login.php">Sign in</a></li>
        <li><a href="./auth/register.php">Sign up</a></li>
        <?php else: ?>
        <li><a href="./auth/logout.php">Log out</a></li>
        <?php endif ?>
        </ul>
</nav>