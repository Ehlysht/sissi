<?php
	require_once 'connector.php'; // подключаем скрипт
	
	if(isset($_POST['id'])){

	$link = mysqli_connect($host, $user, $password, $database) 
	            or die("Ошибка " . mysqli_error($link)); 
        mysqli_set_charset($link, 'utf8');
	    $id = mysqli_real_escape_string($link, $_POST['id']);
	    $userColor = mysqli_real_escape_string($link, $_POST['userColor']);
	    $query ="DELETE FROM usercart WHERE id = '$id' AND color1 = '$userColor'";
	    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
	 	
	    mysqli_close($link);
	    // перенаправление на скрипт index.php
	    header('Location: http://sissi.salon/cart.php');
	}
?>