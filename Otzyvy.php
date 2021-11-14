<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<head>
    
    <title>Отзывы</title>
    <style>
        body {
            background-color: rgb(182 174 213); 
            }
        
        h2 {
            color: white;
        }
        submit {width: 50%;
    font-size: 20 px;
    color: rgb(255, 255, 255);
    font-weight: bold;
    border: 2px solid rgba(255, 255, 255, 0);
    background-color: rgb(255 255 255);
    padding: 6px 0;
    transition: 0.5s;
    }
    </style>

    <body>
       
        <h2>Отзывы</h2>
        <hr>
        <form action="" method="POST">
        <label>Имя пользователя: <br> <?=$_COOKIE['user'] ?> <br> </label> <!-- takes data from cookies and shows how username is --> 
        <label>Отзыв: <br> <textarea cols="45" rows="5" name="otzyv"></textarea> </label><br>
        <input type="submit" name="send" value="Отправить">
        </form>

    </body>
</head>
</html>
<?php
$name = $_COOKIE['user'];
$text = $_POST["otzyv"];
$post = $_POST["send"];

if($post) {

$write = fopen("otzyvy.txt","a+");
fwrite($write, "<u><b>$name</b></u><br>$text<br>");
fclose($write);

$read = fopen("otzyvy.txt","r+t");
echo "Все коментарии:<br>";
// Conditional code, if ..., then the data is written to the text database
while(!feof($read)){
    echo fread($read, 1024);
}
fclose($read);
}
else{
    $read = fopen("otzyvy.txt","r+t");
    echo "Все коментарии:<br>";
// else show all reviews
while(!feof($read)){
    echo fread($read, 1024);
}
fclose($read);
}




?>
