<?php
    require_once 'connector.php'; // подключаем скрипт
	if(isset($_POST['noStockId']) && isset($_POST['stock'])){
	$link = mysqli_connect($host, $user, $password, $database)
	        or die("Ошибка " . mysqli_error($link)); 
	        mysqli_set_charset($link, 'utf8');
	     
	    // экранирования символов для mysql
	    $noStockId = htmlentities(mysqli_real_escape_string($link, $_POST['noStockId']));
	    $stock = htmlentities(mysqli_real_escape_string($link, $_POST['stock']));
	    $query ="UPDATE items SET noStock = '$stock' WHERE id = '$noStockId'";
	     
	    // выполняем запрос
	    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
	    if($result)
	    {
	    	
	    }
	    // закрываем подключение
	    mysqli_close($link);
	    header('Location: http://sissi.salon/welcome.php?');
    }
?>