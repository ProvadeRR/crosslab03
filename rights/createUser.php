<?php
session_start();
include_once '../database/db.php';

$lang = $_POST['lang'];
$name = $_POST['name'];
$password = md5($_POST['password']);
$surname = $_POST['surname'];
$role = $_POST['role'];
$login = $_POST['login'];
$id = $_POST['number'];
$translater = [
    'message' => [
        'ru' => 'Пользователь был успешно создан.',
        'en' => 'User has been successfully сreated.',
        'ua' => 'Користувач був успішно створений.',
    ],
    'err' => [
        'ru' => 'Произошла ошибка, введены не все поля.',
        'en' => 'An error has occurred, not all fields have been entered.',
        'ua' => 'Сталася помилка, введені не всі поля.',
    ],
];
if (!empty($name) && !empty($surname) && !empty($login) && !empty($password)) {
    $create = mysqli_query($database->connect(), "INSERT INTO `users`(`id`, `login`, `password`, `name`, `surname`, `lang`, `role`) VALUES (null,'$login','$password','$name','$surname','$lang','$role')");
    $_SESSION['message-edit'] = $translater['message'][$lang];
} else {
    $_SESSION['message-err'] = $translater['err'][$lang];
}

header('location: privelegy.php');