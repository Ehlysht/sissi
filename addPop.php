<?php
	require_once 'connector.php';
	$link = mysqli_connect($host, $user, $password, $database) 
		        or die("Ошибка " . mysqli_error($link));

	    $popId = $_POST['popId'];
    	$query ="UPDATE items SET noStock = 'popular' WHERE id = $popId";  	
    	$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
	    if($result)
	    {
	    	
	    }
	    // закрываем подключение
	    mysqli_close($link);
	    header('Location: http://sissi.salon/welcome.php');
?>


