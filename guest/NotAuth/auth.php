<?php
session_start();
require_once "../../database/db.php";

$login = $_POST['login'];
$password = md5($_POST['password']);

$checkuser = mysqli_query($database->connect(), "SELECT * FROM users WHERE login = '$login' AND password = '$password'");

if (mysqli_num_rows($checkuser) > 0) {
    $user = mysqli_fetch_assoc($checkuser);
    $_SESSION['id'] = $user['id'];
    if(empty($user['lang']))
    {
        header("Location: ../isAuth/checkLanguage.php");
    }
    else{
        $_SESSION['lang'] = $user['lang'];
        header("Location: ../../");
    }
} else {
    if ($database->checkData('login', $login) === 0) {
        $_SESSION['message'] = "Пользователя не существует!";
        header("Location: form-auth.php");
        exit;
    }
    if ($database->checkData('password', $password) === 0) {
        $_SESSION['inputLogin'] = $_POST['login'];
        $_SESSION['message'] = "Вы ввели неверный пароль";
        header("Location: form-auth.php");
        exit;
    }
}


