<?php 
session_start();
$root = $_SERVER["DOCUMENT_ROOT"];
$redirect = $root . "/redirect.php";
include  $root. "/classes.php";
include  $root . "/database/db.php";
$id = $_SESSION['id'];
$checkuser = mysqli_query($database->connect(), "SELECT * FROM users WHERE `id` = '$id'");
if (mysqli_num_rows($checkuser) > 0) {
    $user = mysqli_fetch_assoc($checkuser);
    $name = $user['name'];
    $surname = $user['surname'];
    $role = $user['role'];
    $lang = $user['lang'];
       switch($role){
           case 1:{
            $obj = new Client($name, $surname);
            break;
            }
           case 2:{
            $obj = new Manager($name, $surname);
            break;
            }
            case 3:{
            $obj = new Admin($name,$surname);
            break;
        }
       }
} 
else {
    header("Location: ../../");
}