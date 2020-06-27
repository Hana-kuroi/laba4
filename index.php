<?php 
session_start();
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Главная</title>
</head>
<body>
  <form action="ses.php" method="post">    
    <p>ЛОГИН:<br><input type="text" name="login"></p>
    <p>ПАРОЛЬ:<br><input type="password" name="password"></p>
    <button>Войти</button>  
    <p>
        У Вас нету аккаунта? - <a href="regist.php">зарегистрироваться</a>
      </p>

      <?php 
      if ($_SESSION['mess']) 
      {
        echo '<p>' .$_SESSION['mess'] . '</p>';
      }      
        unset($_SESSION['mess']);
      ?>
    



  </form>
</body>
</html>