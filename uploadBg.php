<?php
    $check = can_upload($_FILES['file']);
      if($check === true){
        // загружаем изображение на сервер
        make_upload($_FILES['file']);
      }
      else{
      }
	function can_upload($file){
		// если имя пустое, значит файл не выбран
		if($file['name'] == '')
		return 'Вы не выбрали файл.';

		/* если размер файла 0, значит его не пропустили настройки 
		сервера из-за того, что он слишком большой */
		if($file['size'] == 0)
		return 'Файл слишком большой.';

		// разбиваем имя файла по точке и получаем массив
		$getMime = explode('.', $file['name']);
		// нас интересует последний элемент массива - расширение
		$mime = strtolower(end($getMime));
		// объявим массив допустимых расширений
		$types = array('jpg', 'png', 'gif', 'bmp', 'jpeg');

		// если расширение не входит в список допустимых - return
		if(!in_array($mime, $types))
		return 'Недопустимый тип файла.';

		return true;
	}

	function make_upload($file){	
		// формируем уникальное имя картинки: случайное число и name
		$filename = mt_rand(0, 10000) . $file['name'];
		copy($file['tmp_name'], 'img/' . $filename);
	
        
		require_once 'connector.php'; // подключаем скрипт
		if(isset($_POST['where'])){
		    require_once 'connector.php'; // подключаем скрипт
        			 
        	$link1 = mysqli_connect($host, $user, $password, $database) 
        	    or die("Ошибка " . mysqli_error($link1)); 
        	$linktoimg = htmlentities(mysqli_real_escape_string($link1, $_POST['where']));
        	$query1 ="SELECT imgId, imgName, imgLink FROM bgimages WHERE imgName LIKE '$linktoimg'";
        
        	$result1 = mysqli_query($link1, $query1) or die("Ошибка " . mysqli_error($link1)); 
        	if($result)
        	{
        	    
        	    while ($row = mysqli_fetch_row($result1)) {
        	        unlink($row[2]); 
        	    }
        	    mysqli_free_result($result1);
        	}
		    // подключаемся к серверу
		    $link = mysqli_connect($host, $user, $password, $database) 
		        or die("Ошибка " . mysqli_error($link)); 
		     
		    // экранирования символов для mysql
		    $imgName = htmlentities(mysqli_real_escape_string($link, $_POST['where']));
		    $imgLink = 'img/' . $filename;
		    // создание строки запроса
		    $query = "UPDATE bgimages SET imgLink = '$imgLink' WHERE imgName = '$imgName'";
		    
		    // выполняем запрос
		    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
		    if($result)
		    {
		    	
		    }
		    // закрываем подключение
		    mysqli_close($link);
		    header('Location: http://sissi.salon/welcome.php?');
	    }
	}
?>
