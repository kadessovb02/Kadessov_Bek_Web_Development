<?php
$servername ="localhost";
$usernamename = "root";
$password = "";
$email = filter_var(trim($_POST['email']), FILTER_SANITIZE_STRING);
$password = filter_var(trim($_POST['password']), FILTER_SANITIZE_STRING);
$name = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);
$telephone = filter_var(trim($_POST['telephone']), FILTER_SANITIZE_STRING);
 if(mb_strlen($email) < 7 || mb_strlen($email) > 30 )
    {
        echo "Неверная длина имени пользователя";
        exit();
    }
    else if(mb_strlen($password) < 8 || mb_strlen($password) > 50 )
    {
        echo "Неверная длина пароля";
        exit();
    }
    $mysql = new mysqli('localhost','root','','er-asyl');
    $mysql->query("INSERT INTO `signup` (`email`,`password`,`name`,`telephone`) 
    VALUES ('$email','$password','$name','$telephone')");
    $mysql->close();
    header('Location:/project/Authorization.html');
    exit();
?>
