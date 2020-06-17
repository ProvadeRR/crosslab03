<?php
session_start();
$root = $_SERVER['DOCUMENT_ROOT'];
$index = $root . '/index.php';
if(!isset($_SESSION['id']))
{
    header("Location: /index.php");
}
else if(!isset($_SESSION['lang']))
{
    header("Location: /guest/isAuth/checkLanguage.php");
}
