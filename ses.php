<?php
session_start();
$link = mysqli_connect('localhost', 'root' , '','basa');
$login = $_POST["login"];
$password = $_POST["password"];



$verify_user = mysqli_query($link, "SELECT * FROM user WHERE login = '$login' AND pass = '$pass' ");
$_SESSION['check_user'] = $verify_user;
$user = mysqli_fetch_assoc($verify_user);



$_SESSION['user'] = [
    "id" => $user['id'],
    "name" => $user['name'],
    "surname" => $user['surname'],
    "login" => $user['login'],
    "pass" => $user['pass'],
    "rol" => $user['rol'],
    "lang" => $user['lang']
];



if ((mysqli_num_rows($verify_user) > 0))
{

$_SESSION['login'] = $login;
$_SESSION['password'] = $password;


if ($user['rol'] == 'admin'){
    header('Location: users\admin.php'); 
}


if ($user['rol'] == 'manager'){
    header('Location: users\manager.php');
}


if ($user['rol'] == 'client'){
    header('Location: users\client.php'); 
}

}