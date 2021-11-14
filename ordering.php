<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<link rel="stylesheet" href="https://unpkg.com/mustard-ui@latest/dist/css/mustard-ui.min.css">
<link rel="stylesheet" href="live_search.css">

<head>
    <title>Каталог</title>
    <style>
        h1 {
            text-align: center;
        }
    </style>
</head>

<body>
    <header>
        <h2>Поиск</h2>
        ter>
                <form method="POST" >
                    <h2>Поиск</h2>
                    
                    <input type="text" name="search">
<input type="submit" name="submit">
                </form>
        
        <script src="binary-search.js">
     </script> 
  <?php

$con = new PDO("mysql:host=localhost;dbname=search",'root','');

if (isset($_POST["submit"])) {
	$str = $_POST["search"];
	$sth = $con->prepare("SELECT * FROM `search` WHERE Name = '$str'");
$
	$sth->setFetchMode(PDO:: FETCH_OBJ);
	$sth -> execute();

	if($row = $sth->fetch())
	{
		?>
    <br><br><br>
    <table>
        <tr>
            <th>Название сервиса</th>
            <th>Описание</th>
        </tr>
        <tr>
            <td>
                <?php echo $row->name; ?>
            </td>
            <td>
                <?php echo $row->description;?>
            </td>
        </tr>

    </table>
    <?php 
	}
}

?>
           
     	
		

      
    </header>
</body>
</html> 
