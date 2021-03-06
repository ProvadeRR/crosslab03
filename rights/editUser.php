<?php
session_start();
include_once '../database/db.php';

$lang = $_POST['lang'];
$name = $_POST['name'];
$surname = $_POST['surname'];
$role = $_POST['role'];
$login = $_POST['login'];
$id = $_POST['number'];

$translater = [
    'message' => [
        'ru' => 'Пользователь был успешно изменен.',
        'en' => 'User has been successfully changed.',
        'ua' => 'Користувач був успішно змінений.',
    ],
    'err' => [
        'ru' => 'Произошла ошибка, введены не все поля.',
        'en' => 'An error has occurred, not all fields have been entered.',
        'ua' => 'Сталася помилка, введені не всі поля.',
    ],
];
if (!empty($name) && !empty($surname) && !empty($login)) {
    $edit = mysqli_query($database->connect(), "UPDATE `users` SET `login` = '$login', `lang` = '$lang', `name` = '$name', `surname` = '$surname', `role` = '$role' WHERE `id`= '$id'");
    $_SESSION['message-edit'] = $translater['message'][$lang];
} else {
    $_SESSION['message-err'] = $translater['err'][$lang];
}


header('location: privelegy.php');