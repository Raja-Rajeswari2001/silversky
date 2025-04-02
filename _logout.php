<?php
session_start();
unset($_SESSION["loggedin"]);
unset($_SESSION["username"]);
unset($_SESSION["userId"]);
header("location: /silversky/index.php");
?>