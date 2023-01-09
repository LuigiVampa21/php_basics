<?php
session_start();
// REMOVE $_SESSION
unset($_SESSION["user"]);

header("Location: index.php");
?>