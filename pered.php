<?php
session_start();
$link = mysqli_connect('localhost', 'root' , '', 'basa');
if(!$link
{
    die('Error connect to database');
}


$login = $_POST['login'];
$password = $_POST['pass'];
$name = $_POST['name'];
$surname = $_POST['surname'];
$lang = $_POST['lang'];
$role = $_POST['rol'];


if ($login === $_POST['login']) {
    mysqli_query($link, "INSERT INTO `users` (`id`, `login`, `pass`, `name`, `surname`, `lang`, `rol`) VALUES (NULL, '$login', '$pass', '$name', '$surname', '$lang', '$rol')");
    $_SESSION['message'] = 'Регистрация прошла успешно';
    header('location: index.php');
}
?>