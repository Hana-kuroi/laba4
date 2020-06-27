<!DOCTYPE html>
<html>
<head>
    <title>Менеджер-панель</title>
</head>
<body>
<?php
$link = mysqli_connect('localhost', 'root' , '', 'basa');
if(!$link)
{
    die('Error connect to database');
}
$sql = mysqli_query($link, "SELECT `id`, `name`, `surname`,`login`,`pass`,`lang`,`rol` FROM `user` WHERE `id`={$_GET['red_id']}");

if (!$link) 
{
    echo 'Не могу соединиться с БД. Код ошибки: ' . mysqli_connect_errno() . ', ошибка: ' . mysqli_connect_error();
    exit;
}

if (isset($_POST["Name"])) 
{

    if (isset($_GET['red_id'])) 
    {
        $sql = mysqli_query($link, "SELECT `id`, `name`, `surname`,`login`,`pass`,`lang`,`rol` FROM `user` WHERE `id`={$_GET['red_id']}");
        $sql = mysqli_query($link, "UPDATE `user` SET `name` = '{$_POST['Name']}',`surname` = '{$_POST['Surname']}',`login` = '{$_POST['Login']}',  `pass` = '{$_POST['Password']}',`lang` = '{$_POST['Language']}',`rol` = '{$_POST['Role']}' WHERE `id`={$_GET['red_id']}");
    } else 
    {

        $sql = mysqli_query($link, "INSERT INTO `user` (`name`, `surname`,`login`,`pass`,`lang`,`rol`) VALUES ('{$_POST['Name']}', '{$_POST['Surname']}','{$_POST['Login']}', '{$_POST['Password']}','{$_POST['Language']}','{$_POST['Role']}')");
    }

    if ($sql) 
    {
        echo '<p>Успешное изменение!</p>';
    } else 
    {
        echo '<p>Произошла ошибка: ' . mysqli_error($link) . '</p>';
    }
}

if (isset($_GET['red_id'])) 
{
    $sql = mysqli_query($link, "SELECT `id`, `name`, `surname`,`login`,`pass`,`lang`,`rol` FROM `user` WHERE `id`={$_GET['red_id']}");
    $user = mysqli_fetch_array($sql);
}
?>

<table>
    <tr >
        <td > id</td >
        <td > Name</td >
        <td > Surname</td >
        <td > Login</td >
        <td > Password</td >
        <td > Language</td >
        <td > Role</td >
    </tr >

    <?php
    $sql = mysqli_query($link, 'SELECT `id`, `name`, `surname`,`login`,`pass`,`lang`,`rol` FROM `user`');
    while ($result = mysqli_fetch_array($sql)) 
    {
        echo '<tr>' .
            "<td>{$result['id']}</td>" .
            "<td>{$result['name']}</td>" .
            "<td>{$result['surname']}</td>" .
            "<td>{$result['login']}</td>" .
            "<td>{$result['pass']}</td>" .
            "<td>{$result['lang']}</td>" .
            "<td>{$result['rol']}</td>" .
            "<td><a href='?red_id={$result['id']}'>Изменить</a></td>" .
            '</tr>';
    }
    ?>
</table>
<form action = 'manager.php'>
    <input type = 'submit' value = 'Back to manager page'>
</form>
</body>
</html>