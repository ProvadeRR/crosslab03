<?php
session_start();
include_once "../../database/db.php";
if (isset($_POST['lang'])) {
    $_SESSION['lang'] = $_POST['lang'];
    $lang = $_SESSION['lang'];
    $id = $_SESSION['id'];
    $user = mysqli_query($database->connect(), "UPDATE users SET lang = '$lang' WHERE id = '$id'");
    header("Location: ../../");
}
else{
    header("Location: ../../");
}
