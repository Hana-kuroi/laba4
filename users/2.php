<html lang="ru">
<head>
    <title>Админ-панель</title>
</head>
<body>
<?php
session_start();
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
        $sql = mysqli_query($link, "UPDATE `user` SET `name` = '{$_POST['Name']}',`surname` = '{$_POST['Surname']}',`login` = '{$_POST['Login']}', `pass` = '{$_POST['Password']}',`lang` = '{$_POST['Language']}',`rol` = '{$_POST['Role']}' WHERE `id`={$_GET['red_id']}");
    } else 
    {

        $sql = mysqli_query($link, "INSERT INTO `user` (`name`, `surname`,`login`,`pass`,`lang`,`rol`) VALUES ('{$_POST['Name']}', '{$_POST['Surname']}','{$_POST['Login']}',  '{$_POST['Password']}','{$_POST['Language']}','{$_POST['Role']}')");
    }

    if ($sql) 
    {
        echo '<p>Успешное изменение!</p>';
    } else 
    {
        echo '<p>Произошла ошибка: ' . mysqli_error($link) . '</p>';
    }
}

if (isset($_GET['del_id'])) 
{

    $sql = mysqli_query($link, "DELETE FROM `users` WHERE `id` = {$_GET['del_id']}");
    if ($sql) 
    {
        echo "<p>Пользователь удален.</p>";
    } else 
    {
        echo '<p>Произошла ошибка: ' . mysqli_error($link) . '</p>';
    }
}


if (isset($_GET['red_id'])) {
    $sql = mysqli_query($link, "SELECT `id`, `name`, `surname`,`login`,`pass`,`lang`,`rol` FROM `user` WHERE `id`={$_GET['red_id']}");
    $user = mysqli_fetch_array($sql);
}
?>
<form action = "" method = "post" >
    <table>
        <tr>
            <td> Name:</td>
            <td><input type = "text" name = "Name" value = "<?= isset($_GET['red_id']) ? $user['Name'] : ''; ?>" ></td>
        </tr>
        <tr>
            <td> Surname:</td>
            <td><input type = "text" name = "Surname" value = "<?= isset($_GET['red_id']) ? $user['Surname'] : ''; ?>" ></td>
        </tr>
        <tr>
            <td> Login:</td>
            <td><input type = "text" name = "Login" value = "<?= isset($_GET['red_id']) ? $user['Login'] : ''; ?>" ></td>
        </tr>
        <tr>
            <td> Password:</td>
            <td><input type = "text" name = "Password" value = "<?= isset($_GET['red_id']) ? $user['Password'] : ''; ?>" ></td>
        </tr>
        <tr>
            <td> Language:</td>
            <td><input type = "text" name = "Language" value = "<?= isset($_GET['red_id']) ? $user['Language'] : ''; ?>" ></td>
        </tr>
        <tr>
            <td> Role:</td>
            <td><input type = "text" name = "Role" value = "<?= isset($_GET['red_id']) ? $user['Role'] : ''; ?>" ></td>
        </tr>
        <tr>
            <td><input type = "submit" value = "OK" ></td >
        </tr>
    </table>
</form>

<table>
    <tr>
        <td> id</td>
        <td> Name</td>
        <td> Surname</td>
        <td> Login</td>
        <td> Password</td>
        <td> Language</td>
        <td> Role</td>
        <td> Удаление</td>
        <td> Редактирование</td>
    </tr>

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
                "<td><a href='?del_id={$result['id']}'>Удалить</a></td>" .
                "<td><a href='?red_id={$result['id']}'>Изменить</a></td>" .
                '</tr>';
        }
    ?>
</table>
<form action = 'admin.php'>
    <input type = 'submit' value = 'Back to admin-ka'>
</form>
</body>
</html>