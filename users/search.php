<?php
session_start();
$role = $_POST['role'];
$link = mysqli_connect('localhost', 'root' , '','basa');
$name = $_POST['name'];
$surname = $_POST['surname'];

$check_user = mysqli_query($link, "SELECT * FROM `user` WHERE `name` = '$name' AND `surname` = '$surname' ");
$_SESSION['check_user'] = $check_user;
$user = mysqli_fetch_assoc($check_user);
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
if (mysqli_num_rows($check_user) > 0) 
{
    if ($name == $user['name'])
    {
        $sql = mysqli_query($link, "SELECT `id`, `name`, `surname`,`login`,`pass`,`lang`,`rol` FROM `user` WHERE '$role' = ? ");
        while ($result = mysqli_fetch_array($sql, "s", $_POST['search']))
         {
            echo '<tr>' .
                "<td>{$result['id']}</td>" .
                "<td>{$result['name']}</td>" .
                "<td>{$result['surname']}</td>" .
                "<td>{$result['login']}</td>" .
                "<td>{$result['pass']}</td>" .
                "<td>{$result['lang']}</td>" .
                "<td>{$result['rol']}</td>" .
                '</tr>';
        }
    }
    else 
    {
        echo 'Такого пользователя не существует';
    }
}
