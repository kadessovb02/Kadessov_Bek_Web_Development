<?php
$email = filter_var(trim($_POST['email']),FILTER_SANITIZE_STRING);
$password = filter_var(trim($_POST['password']),FILTER_SANITIZE_STRING);

$mysql = new mysqli('localhost','root','','er-asyl');
$result=$mysql->query("SELECT * FROM `signup` WHERE `email`='$email' AND `password`") ;
$user=$result->fetch_assoc();
if (count ($user)==0) {
  echo "Такой пользователь не найден";
  exit;
}
setcookie("user", $user['email'], time()+86400,"/");   
$mysql->close();
header('location: /project/korzinka' );
?>
