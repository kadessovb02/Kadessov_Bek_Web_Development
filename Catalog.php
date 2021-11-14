<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<head>
    <link rel="stylesheet" href="menu.css">
    <title>Каталог</title>
    <style>
        body {
        background-image: url(catalog.jpg);
        max-width: 100%;
max-height: 100%;
        }
        
      
        
        .container {
            position: relative;
            text-align: left;
            color: rgb(255, 255, 255);
        }
        
        .centered {
            position: absolute;
            transform: translate(-50%, -50%);
        }
        
        img {
            filter: grayscale(70%);
        }
    </style>

    <body>
        
        <h2>Каталог</h2>
        <hr>
      
            <center>
                <form method="POST" >
                    <h2>Поиск</h2>
                    
                    <input type="text" name="search">
<input type="submit" name="submit">
                </form>
                <div class="block" data-attr="">

                </div>
                <script src='binary-search.js'>

                </script>
                <?php


$connection = new PDO("mysql:host=localhost;dbname=search",'root','');

if (isset($_POST["submit"])) {
	$str = $_POST["search"];
	$sth = $connection->prepare("SELECT * FROM `search` WHERE Name = '$str'");

	$sth->setFetchMode(PDO:: FETCH_OBJ);
	$sth -> execute();

	if($row = $sth->fetch())
	{
		?>
    
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
		
		
    else{
        echo "По запросу ничего не найдено. 
        Убедитесь, что все слова написаны без ошибок.
     ";
    }


}

?>
            </center>

            

    </body>
</head>

</html>
