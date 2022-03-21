<?php
	require_once 'connector.php'; // подключаем скрипт
	$deleteimg = $_POST['deleteimg'];
	if(isset($_POST['id'])){
	$link = mysqli_connect($host, $user, $password, $database) 
	            or die("Ошибка " . mysqli_error($link)); 
	    $id = mysqli_real_escape_string($link, $_POST['id']);
	    $query ="DELETE FROM items WHERE id = '$id'";
	    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
	 	unlink($deleteimg);
	    mysqli_close($link);
	    // перенаправление на скрипт index.php
	    header('Location: https://sissi.salon');
	}
?>