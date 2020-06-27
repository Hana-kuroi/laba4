<?php
session_start();
include '../lang.php';

$check_user = $_SESSION['check_user'];

if($_GET["exit"]){
    session_destroy();
    header("Location: ../index.php");
}

if (isset($_GET['lang'])){
    $_SESSION['user']['lang'] = $_GET['lang'];
}

if (!(isset($_SESSION['login'])) && !(isset($_SESSION['pass']))){
    session_destroy();
    header('Location: ../index.php');
}
if ($_SESSION['rol'] != 'manager'){
    session_destroy();
    header("Location: ../index.php");
}
?>
<html>
<head>
    <title>Страница менеджера</title>
</head>
<?php 
echo $translate[$_SESSION['lang']]['hello'];
echo ", ";
echo $_SESSION['name'];
echo " ";
echo $_SESSION['surname'];
echo ". ";
echo $translate[$_SESSION['lang']][$_SESSION['rol']]; 
?>  
<form method="GET">
    <input type="submit" name="exit"  value="Exit">
</form>
<form >
    <select name="lang" method="GET">
        <option value="<?php $_SESSION['lang']; ?>"><?php echo $translate[$_SESSION['lang']]['lan']; ?></option>
        <option value="ru">Русский</option>
        <option value="ua">Українська</option>
        <option value="en">English</option>
        <option value="it">Italian</option>
    </select>
    <input type="submit" value="Save">
</form>
<form name = "test" action = "1.php" method = "post">
    <button><font>List of users</font></button>
</form>
</html>