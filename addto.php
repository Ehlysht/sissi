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
		if(isset($_POST['itemname']) && isset($_POST['itemused']) && isset($_POST['itemprice']) && isset($_POST['itemtype']) && isset($_POST['itemmanuf']) && isset($_POST['itemcolor1']) && isset($_POST['itemlongdesc']) && isset($_POST['itemlongused'])){
		 
		    // подключаемся к серверу
		    $link = mysqli_connect($host, $user, $password, $database)
		        or die("Ошибка " . mysqli_error($link)); 
		        mysqli_set_charset($link, 'utf8');
		     
		    // экранирования символов для mysql
		    $name = htmlentities(mysqli_real_escape_string($link, $_POST['itemname']));
		    $description = htmlentities(mysqli_real_escape_string($link, $_POST['itemused']));
		    $price = htmlentities(mysqli_real_escape_string($link, $_POST['itemprice']));
		    $linkto = 'img/' . $filename;
		    $itemtype = htmlentities(mysqli_real_escape_string($link, $_POST['itemtype']));
		    $itemmanuf = htmlentities(mysqli_real_escape_string($link, $_POST['itemmanuf']));
		    $colorCheck = htmlentities(mysqli_real_escape_string($link, $_REQUEST['colorCheck']));
		    $itemcolor1 = htmlentities(mysqli_real_escape_string($link, $_POST['itemcolor1'])) . '/' . htmlentities(mysqli_real_escape_string($link, $_POST['textcolor1']));
		    $itemcolor2 = '#000000/';
		    $itemcolor3 = '#000000/';
		    $itemcolor4 = '#000000/';
		    $itemcolor5 = '#000000/';
		    $itemcolor6 = '#000000/';
		    $itemcolor7 = '#000000/';
		    $itemcolor8 = '#000000/';
		    $itemcolor9 = '#000000/';
		    $itemcolor10 = '#000000/';
		    $itemcolor11 = '#000000/';
		    $itemcolor12 = '#000000/';
		    $itemcolor13 = '#000000/';
		    $itemcolor14 = '#000000/';
		    $itemcolor15 = '#000000/';
		    $itemcolor16 = '#000000/';
		    $itemcolor17 = '#000000/';
		    $itemcolor18 = '#000000/';
		    $itemcolor19 = '#000000/';
		    $itemcolor20 = '#000000/';
		    $itemcolor21 = '#000000/';
		    $itemcolor22 = '#000000/';
		    $itemcolor23 = '#000000/';
		    $itemcolor24 = '#000000/';
		    $itemcolor25 = '#000000/';
		    $itemcolor26 = '#000000/';
		    $itemcolor27 = '#000000/';
		    $itemcolor28 = '#000000/';
		    $itemlongdesc = htmlentities(mysqli_real_escape_string($link, $_POST['itemlongdesc']));
		    $itemlongused = htmlentities(mysqli_real_escape_string($link, $_POST['itemlongused']));
		    $userqty = htmlentities(mysqli_real_escape_string($link, $_POST['itemlongused']));
		    $stock = 'no';
		    // создание строки запроса
		    $query ="INSERT INTO items VALUES(NULL, '$name','$description', '$price', '$linkto', '$itemtype', '$itemmanuf', '$itemcolor1', '$itemcolor2', '$itemcolor3', '$itemcolor4', '$itemcolor5', '$itemcolor6', '$itemcolor7', '$itemcolor8', '$itemcolor9', '$itemcolor10', '$itemcolor11', '$itemcolor12', '$itemcolor13', '$itemcolor14', '$itemcolor15', '$itemcolor16', '$itemcolor17', '$itemcolor18', '$itemcolor19', '$itemcolor20', '$itemcolor21', '$itemcolor22', '$itemcolor23', '$itemcolor24', '$itemcolor25', '$itemcolor26', '$itemcolor27', '$itemcolor28', '$itemlongdesc', '$itemlongused', '$colorCheck', '$stock')";
		     
		    // выполняем запрос
		    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
		    if($result)
		    {
		    	
		    }
		    // закрываем подключение
		    mysqli_close($link);
		    header('Location: http://sissi.salon/welcome.php');
	    }
	}
?>
