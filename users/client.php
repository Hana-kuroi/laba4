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
?>
<html>
<head>
    <title>Страница клиента</title>
</head>
<form method="GET">
    <input type="submit" name="exit"  value="Exit">
</form>
<?php 
echo $translate[$_SESSION['lang']]['hello'];
echo ", ";
echo $_SESSION['name'];
echo " ";
echo $_SESSION['surname'];
echo ". ";
echo $translate[$_SESSION['lang']][$_SESSION['rol']]; 
?>  
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
<form name = "test" action = "izmenen.php" method = "post">
    <button>You data</button>
</form>
</html>