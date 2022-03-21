<?php
    session_start();
    $changeId = $_POST['changeId'];
    if  ($changeId != ''){
        
    }else{
        $changeId = $_SESSION['changeId'];
    }?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
    	<meta charset="UTF-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    	<!-- Google fonts -->
    	<link rel="preconnect" href="https://fonts.gstatic.com">
    	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Unica+One&display=swap" rel="stylesheet">
    	<!-- Bootstrap style -->
    	<link rel="stylesheet" href="../css/bootstrap-reboot.min.css">
    	<link rel="stylesheet" href="../css/bootstrap.min.css">
    	<!-- SlickSlider style -->
    	<link rel="stylesheet" href="../css/slick.css">
    	<link rel="stylesheet" href="../css/slick-theme.css">
    	<!-- Animate CSS 
    	<link rel="stylesheet" href="css/animate.min.css"/>-->
    	<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    	<!-- Main style -->
    	<link rel="stylesheet" href="../css/style.css">
    	<title>Cart</title>
    </head>
    <?php include 'header.php';
    echo "<div class='container'>";
    echo "<p>" . $changeId . "</p>";
        require_once 'connector.php'; // подключаем скрипт
		 
		$link = mysqli_connect($host, $user, $password, $database) 
		    or die("Ошибка " . mysqli_error($link)); 
		mysqli_set_charset($link, 'utf8');  
		$query ="SELECT id, name, used, price, link, type, manufname, color1, color2, color3, color4, color5, color6, color7, color8, color9, color10, color11, color12, color13, color14, color15, color16, color17, color18, color19, color20, color21, color22, color23, color24, color25, color26, color27, color28, longdescr, longused, colorCheck, noStock FROM items WHERE id='$changeId'";

		$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
		if($result)
		{
    		
		    while ($row = mysqli_fetch_row($result)) {
		        if  ($row[7] != '#000000/'){
        	        $colorCol = stristr($row[7], '/', true);
        	        $colorText = str_replace('/', '', stristr($row[7], '/'));
        	        $colorLink = $row[4];
        	        echo "<div class='d-flex align-items-center justify-content-around'><div class='colcolor' style='background:" . $colorCol . "; width: 100px; height: 100px;'></div>";
        	        echo "<p class='colname colname1' style='font-size: 40px; margin: 0 20px;'>Назва кольору: " . $colorText . "</p>";
        	        echo "<img src='" . $colorLink . "' class='collink' style='width: 100px; height: 100px;'></div>";
        	    }
        	    if  ($row[8] != '#000000/'){
        	        $colorCol = stristr(stristr($row[8], '|', true), '/', true);
        	        $colorText = str_replace('/', '', stristr(stristr($row[8], '|', true), '/'));
        	        $colorLink = str_replace('|', '', stristr($row[8], '|'));
        	        echo "<div class='d-flex align-items-center justify-content-around'><div class='colcolor' style='background:" . $colorCol . "; width: 100px; height: 100px;'></div>";
        	        echo "<p class='colname colname2' style='font-size: 40px; margin: 0 20px;'>Назва кольору: " . $colorText . "</p>";
        	        echo "<img src='" . $colorLink . "' class='collink' style='width: 100px; height: 100px;'></div>";
        	    }
        	    if  ($row[9] != '#000000/'){
        	        $colorCol = stristr(stristr($row[9], '|', true), '/', true);
        	        $colorText = str_replace('/', '', stristr(stristr($row[9], '|', true), '/'));
        	        $colorLink = str_replace('|', '', stristr($row[9], '|'));
        	        echo "<div class='d-flex align-items-center justify-content-around'><div class='colcolor' style='background:" . $colorCol . "; width: 100px; height: 100px;'></div>";
        	        echo "<p class='colname colname3' style='font-size: 40px; margin: 0 20px;'>Назва кольору: " . $colorText . "</p>";
        	        echo "<img src='" . $colorLink . "' class='collink' style='width: 100px; height: 100px;'></div>";
        	    }
        	    if  ($row[10] != '#000000/'){
        	        $colorCol = stristr(stristr($row[10], '|', true), '/', true);
        	        $colorText = str_replace('/', '', stristr(stristr($row[10], '|', true), '/'));
        	        $colorLink = str_replace('|', '', stristr($row[10], '|'));
        	        echo "<div class='d-flex align-items-center justify-content-around'><div class='colcolor' style='background:" . $colorCol . "; width: 100px; height: 100px;'></div>";
        	        echo "<p class='colname colname4' style='font-size: 40px; margin: 0 20px;'>Назва кольору: " . $colorText . "</p>";
        	        echo "<img src='" . $colorLink . "' class='collink' style='width: 100px; height: 100px;'></div>";
        	    }
        	    if  ($row[11] != '#000000/'){
        	        $colorCol = stristr(stristr($row[11], '|', true), '/', true);
        	        $colorText = str_replace('/', '', stristr(stristr($row[11], '|', true), '/'));
        	        $colorLink = str_replace('|', '', stristr($row[11], '|'));
        	        echo "<div class='d-flex align-items-center justify-content-around'><div class='colcolor' style='background:" . $colorCol . "; width: 100px; height: 100px;'></div>";
        	        echo "<p class='colname colname5' style='font-size: 40px; margin: 0 20px;'>Назва кольору: " . $colorText . "</p>";
        	        echo "<img src='" . $colorLink . "' class='collink' style='width: 100px; height: 100px;'></div>";
        	    }
        	    if  ($row[12] != '#000000/'){
        	        $colorCol = stristr(stristr($row[12], '|', true), '/', true);
        	        $colorText = str_replace('/', '', stristr(stristr($row[12], '|', true), '/'));
        	        $colorLink = str_replace('|', '', stristr($row[12], '|'));
        	        echo "<div class='d-flex align-items-center justify-content-around'><div class='colcolor' style='background:" . $colorCol . "; width: 100px; height: 100px;'></div>";
        	        echo "<p class='colname colname6' style='font-size: 40px; margin: 0 20px;'>Назва кольору: " . $colorText . "</p>";
        	        echo "<img src='" . $colorLink . "' class='collink' style='width: 100px; height: 100px;'></div>";
        	    }
        	    if  ($row[13] != '#000000/'){
        	        $colorCol = stristr(stristr($row[13], '|', true), '/', true);
        	        $colorText = str_replace('/', '', stristr(stristr($row[13], '|', true), '/'));
        	        $colorLink = str_replace('|', '', stristr($row[13], '|'));
        	        echo "<div class='d-flex align-items-center justify-content-around'><div class='colcolor' style='background:" . $colorCol . "; width: 100px; height: 100px;'></div>";
        	        echo "<p class='colname colname7' style='font-size: 40px; margin: 0 20px;'>Назва кольору: " . $colorText . "</p>";
        	        echo "<img src='" . $colorLink . "' class='collink' style='width: 100px; height: 100px;'></div>";
        	    }
        	    if  ($row[14] != '#000000/'){
        	        $colorCol = stristr(stristr($row[14], '|', true), '/', true);
        	        $colorText = str_replace('/', '', stristr(stristr($row[14], '|', true), '/'));
        	        $colorLink = str_replace('|', '', stristr($row[14], '|'));
        	        echo "<div class='d-flex align-items-center justify-content-around'><div class='colcolor' style='background:" . $colorCol . "; width: 100px; height: 100px;'></div>";
        	        echo "<p class='colname colname8' style='font-size: 40px; margin: 0 20px;'>Назва кольору: " . $colorText . "</p>";
        	        echo "<img src='" . $colorLink . "' class='collink' style='width: 100px; height: 100px;'></div>";
        	    }
        	    if  ($row[15] != '#000000/'){
        	        $colorCol = stristr(stristr($row[15], '|', true), '/', true);
        	        $colorText = str_replace('/', '', stristr(stristr($row[15], '|', true), '/'));
        	        $colorLink = str_replace('|', '', stristr($row[15], '|'));
        	        echo "<div class='d-flex align-items-center justify-content-around'><div class='colcolor' style='background:" . $colorCol . "; width: 100px; height: 100px;'></div>";
        	        echo "<p class='colname' style='font-size: 40px; margin: 0 20px;'>Назва кольору: " . $colorText . "</p>";
        	        echo "<img src='" . $colorLink . "' class='collink' style='width: 100px; height: 100px;'></div>";
        	    }
        	    if  ($row[16] != '#000000/'){
        	        $colorCol = stristr(stristr($row[16], '|', true), '/', true);
        	        $colorText = str_replace('/', '', stristr(stristr($row[16], '|', true), '/'));
        	        $colorLink = str_replace('|', '', stristr($row[16], '|'));
        	        echo "<div class='d-flex align-items-center justify-content-around'><div class='colcolor' style='background:" . $colorCol . "; width: 100px; height: 100px;'></div>";
        	        echo "<p class='colname' style='font-size: 40px; margin: 0 20px;'>Назва кольору: " . $colorText . "</p>";
        	        echo "<img src='" . $colorLink . "' class='collink' style='width: 100px; height: 100px;'></div>";
        	    }
        	    if  ($row[17] != '#000000/'){
        	        $colorCol = stristr(stristr($row[17], '|', true), '/', true);
        	        $colorText = str_replace('/', '', stristr(stristr($row[17], '|', true), '/'));
        	        $colorLink = str_replace('|', '', stristr($row[17], '|'));
        	        echo "<div class='d-flex align-items-center justify-content-around'><div class='colcolor' style='background:" . $colorCol . "; width: 100px; height: 100px;'></div>";
        	        echo "<p class='colname' style='font-size: 40px; margin: 0 20px;'>Назва кольору: " . $colorText . "</p>";
        	        echo "<img src='" . $colorLink . "' class='collink' style='width: 100px; height: 100px;'></div>";
        	    }
        	    if  ($row[18] != '#000000/'){
        	        $colorCol = stristr(stristr($row[18], '|', true), '/', true);
        	        $colorText = str_replace('/', '', stristr(stristr($row[18], '|', true), '/'));
        	        $colorLink = str_replace('|', '', stristr($row[18], '|'));
        	        echo "<div class='d-flex align-items-center justify-content-around'><div class='colcolor' style='background:" . $colorCol . "; width: 100px; height: 100px;'></div>";
        	        echo "<p class='colname' style='font-size: 40px; margin: 0 20px;'>Назва кольору: " . $colorText . "</p>";
        	        echo "<img src='" . $colorLink . "' class='collink' style='width: 100px; height: 100px;'></div>";
        	    }
        	    if  ($row[19] != '#000000/'){
        	        $colorCol = stristr(stristr($row[19], '|', true), '/', true);
        	        $colorText = str_replace('/', '', stristr(stristr($row[19], '|', true), '/'));
        	        $colorLink = str_replace('|', '', stristr($row[19], '|'));
        	        echo "<div class='d-flex align-items-center justify-content-around'><div class='colcolor' style='background:" . $colorCol . "; width: 100px; height: 100px;'></div>";
        	        echo "<p class='colname' style='font-size: 40px; margin: 0 20px;'>Назва кольору: " . $colorText . "</p>";
        	        echo "<img src='" . $colorLink . "' class='collink' style='width: 100px; height: 100px;'></div>";
        	    }
        	    if  ($row[20] != '#000000/'){
        	        $colorCol = stristr(stristr($row[20], '|', true), '/', true);
        	        $colorText = str_replace('/', '', stristr(stristr($row[20], '|', true), '/'));
        	        $colorLink = str_replace('|', '', stristr($row[20], '|'));
        	        echo "<div class='d-flex align-items-center justify-content-around'><div class='colcolor' style='background:" . $colorCol . "; width: 100px; height: 100px;'></div>";
        	        echo "<p class='colname' style='font-size: 40px; margin: 0 20px;'>Назва кольору: " . $colorText . "</p>";
        	        echo "<img src='" . $colorLink . "' class='collink' style='width: 100px; height: 100px;'></div>";
        	    }
        	    if  ($row[21] != '#000000/'){
        	        $colorCol = stristr(stristr($row[21], '|', true), '/', true);
        	        $colorText = str_replace('/', '', stristr(stristr($row[21], '|', true), '/'));
        	        $colorLink = str_replace('|', '', stristr($row[21], '|'));
        	        echo "<div class='d-flex align-items-center justify-content-around'><div class='colcolor' style='background:" . $colorCol . "; width: 100px; height: 100px;'></div>";
        	        echo "<p class='colname' style='font-size: 40px; margin: 0 20px;'>Назва кольору: " . $colorText . "</p>";
        	        echo "<img src='" . $colorLink . "' class='collink' style='width: 100px; height: 100px;'></div>";
        	    }
        	    if  ($row[22] != '#000000/'){
        	        $colorCol = stristr(stristr($row[22], '|', true), '/', true);
        	        $colorText = str_replace('/', '', stristr(stristr($row[22], '|', true), '/'));
        	        $colorLink = str_replace('|', '', stristr($row[22], '|'));
        	        echo "<div class='d-flex align-items-center justify-content-around'><div class='colcolor' style='background:" . $colorCol . "; width: 100px; height: 100px;'></div>";
        	        echo "<p class='colname' style='font-size: 40px; margin: 0 20px;'>Назва кольору: " . $colorText . "</p>";
        	        echo "<img src='" . $colorLink . "' class='collink' style='width: 100px; height: 100px;'></div>";
        	    }
        	    if  ($row[23] != '#000000/'){
        	        $colorCol = stristr(stristr($row[23], '|', true), '/', true);
        	        $colorText = str_replace('/', '', stristr(stristr($row[23], '|', true), '/'));
        	        $colorLink = str_replace('|', '', stristr($row[23], '|'));
        	        echo "<div class='d-flex align-items-center justify-content-around'><div class='colcolor' style='background:" . $colorCol . "; width: 100px; height: 100px;'></div>";
        	        echo "<p class='colname' style='font-size: 40px; margin: 0 20px;'>Назва кольору: " . $colorText . "</p>";
        	        echo "<img src='" . $colorLink . "' class='collink' style='width: 100px; height: 100px;'></div>";
        	    }
        	    if  ($row[24] != '#000000/'){
        	        $colorCol = stristr(stristr($row[24], '|', true), '/', true);
        	        $colorText = str_replace('/', '', stristr(stristr($row[24], '|', true), '/'));
        	        $colorLink = str_replace('|', '', stristr($row[24], '|'));
        	        echo "<div class='d-flex align-items-center justify-content-around'><div class='colcolor' style='background:" . $colorCol . "; width: 100px; height: 100px;'></div>";
        	        echo "<p class='colname' style='font-size: 40px; margin: 0 20px;'>Назва кольору: " . $colorText . "</p>";
        	        echo "<img src='" . $colorLink . "' class='collink' style='width: 100px; height: 100px;'></div>";
        	    }
        	    if  ($row[25] != '#000000/'){
        	        $colorCol = stristr(stristr($row[25], '|', true), '/', true);
        	        $colorText = str_replace('/', '', stristr(stristr($row[25], '|', true), '/'));
        	        $colorLink = str_replace('|', '', stristr($row[25], '|'));
        	        echo "<div class='d-flex align-items-center justify-content-around'><div class='colcolor' style='background:" . $colorCol . "; width: 100px; height: 100px;'></div>";
        	        echo "<p class='colname' style='font-size: 40px; margin: 0 20px;'>Назва кольору: " . $colorText . "</p>";
        	        echo "<img src='" . $colorLink . "' class='collink' style='width: 100px; height: 100px;'></div>";
        	    }
        	    if  ($row[26] != '#000000/'){
        	        $colorCol = stristr(stristr($row[26], '|', true), '/', true);
        	        $colorText = str_replace('/', '', stristr(stristr($row[26], '|', true), '/'));
        	        $colorLink = str_replace('|', '', stristr($row[26], '|'));
        	        echo "<div class='d-flex align-items-center justify-content-around'><div class='colcolor' style='background:" . $colorCol . "; width: 100px; height: 100px;'></div>";
        	        echo "<p class='colname' style='font-size: 40px; margin: 0 20px;'>Назва кольору: " . $colorText . "</p>";
        	        echo "<img src='" . $colorLink . "' class='collink' style='width: 100px; height: 100px;'></div>";
        	    }
        	    if  ($row[27] != '#000000/'){
        	        $colorCol = stristr(stristr($row[27], '|', true), '/', true);
        	        $colorText = str_replace('/', '', stristr(stristr($row[27], '|', true), '/'));
        	        $colorLink = str_replace('|', '', stristr($row[27], '|'));
        	        echo "<div class='d-flex align-items-center justify-content-around'><div class='colcolor' style='background:" . $colorCol . "; width: 100px; height: 100px;'></div>";
        	        echo "<p class='colname' style='font-size: 40px; margin: 0 20px;'>Назва кольору: " . $colorText . "</p>";
        	        echo "<img src='" . $colorLink . "' class='collink' style='width: 100px; height: 100px;'></div>";
        	    }
        	    if  ($row[28] != '#000000/'){
        	        $colorCol = stristr(stristr($row[28], '|', true), '/', true);
        	        $colorText = str_replace('/', '', stristr(stristr($row[28], '|', true), '/'));
        	        $colorLink = str_replace('|', '', stristr($row[28], '|'));
        	        echo "<div class='d-flex align-items-center justify-content-around'><div class='colcolor' style='background:" . $colorCol . "; width: 100px; height: 100px;'></div>";
        	        echo "<p class='colname' style='font-size: 40px; margin: 0 20px;'>Назва кольору: " . $colorText . "</p>";
        	        echo "<img src='" . $colorLink . "' class='collink' style='width: 100px; height: 100px;'></div>";
        	    }
        	    if  ($row[29] != '#000000/'){
        	        $colorCol = stristr(stristr($row[29], '|', true), '/', true);
        	        $colorText = str_replace('/', '', stristr(stristr($row[29], '|', true), '/'));
        	        $colorLink = str_replace('|', '', stristr($row[29], '|'));
        	        echo "<div class='d-flex align-items-center justify-content-around'><div class='colcolor' style='background:" . $colorCol . "; width: 100px; height: 100px;'></div>";
        	        echo "<p class='colname' style='font-size: 40px; margin: 0 20px;'>Назва кольору: " . $colorText . "</p>";
        	        echo "<img src='" . $colorLink . "' class='collink' style='width: 100px; height: 100px;'></div>";
        	    }
        	    if  ($row[30] != '#000000/'){
        	        $colorCol = stristr(stristr($row[30], '|', true), '/', true);
        	        $colorText = str_replace('/', '', stristr(stristr($row[30], '|', true), '/'));
        	        $colorLink = str_replace('|', '', stristr($row[30], '|'));
        	        echo "<div class='d-flex align-items-center justify-content-around'><div class='colcolor' style='background:" . $colorCol . "; width: 100px; height: 100px;'></div>";
        	        echo "<p class='colname' style='font-size: 40px; margin: 0 20px;'>Назва кольору: " . $colorText . "</p>";
        	        echo "<img src='" . $colorLink . "' class='collink' style='width: 100px; height: 100px;'></div>";
        	    }
        	    if  ($row[31] != '#000000/'){
        	        $colorCol = stristr(stristr($row[31], '|', true), '/', true);
        	        $colorText = str_replace('/', '', stristr(stristr($row[31], '|', true), '/'));
        	        $colorLink = str_replace('|', '', stristr($row[31], '|'));
        	        echo "<div class='d-flex align-items-center justify-content-around'><div class='colcolor' style='background:" . $colorCol . "; width: 100px; height: 100px;'></div>";
        	        echo "<p class='colname' style='font-size: 40px; margin: 0 20px;'>Назва кольору: " . $colorText . "</p>";
        	        echo "<img src='" . $colorLink . "' class='collink' style='width: 100px; height: 100px;'></div>";
        	    }
        	    if  ($row[32] != '#000000/'){
        	        $colorCol = stristr(stristr($row[32], '|', true), '/', true);
        	        $colorText = str_replace('/', '', stristr(stristr($row[32], '|', true), '/'));
        	        $colorLink = str_replace('|', '', stristr($row[32], '|'));
        	        echo "<div class='d-flex align-items-center justify-content-around'><div class='colcolor' style='background:" . $colorCol . "; width: 100px; height: 100px;'></div>";
        	        echo "<p class='colname' style='font-size: 40px; margin: 0 20px;'>Назва кольору: " . $colorText . "</p>";
        	        echo "<img src='" . $colorLink . "' class='collink' style='width: 100px; height: 100px;'></div>";
        	    }
        	    if  ($row[33] != '#000000/'){
        	        $colorCol = stristr(stristr($row[33], '|', true), '/', true);
        	        $colorText = str_replace('/', '', stristr(stristr($row[33], '|', true), '/'));
        	        $colorLink = str_replace('|', '', stristr($row[33], '|'));
        	        echo "<div class='d-flex align-items-center justify-content-around'><div class='colcolor' style='background:" . $colorCol . "; width: 100px; height: 100px;'></div>";
        	        echo "<p class='colname' style='font-size: 40px; margin: 0 20px;'>Назва кольору: " . $colorText . "</p>";
        	        echo "<img src='" . $colorLink . "' class='collink' style='width: 100px; height: 100px;'></div>";
        	    }
        	    if  ($row[34] != '#000000/'){
        	        $colorCol = stristr(stristr($row[34], '|', true), '/', true);
        	        $colorText = str_replace('/', '', stristr(stristr($row[34], '|', true), '/'));
        	        $colorLink = str_replace('|', '', stristr($row[34], '|'));
        	        echo "<div class='d-flex align-items-center justify-content-around'><div class='colcolor' style='background:" . $colorCol . "; width: 100px; height: 100px;'></div>";
        	        echo "<p class='colname' style='font-size: 40px; margin: 0 20px;'>Назва кольору: " . $colorText . "</p>";
        	        echo "<img src='" . $colorLink . "' class='collink' style='width: 100px; height: 100px;'></div>";
        	    }
		    }
		    					     
		    mysqli_free_result($result);
		}
    	       echo "<form method='POST' action='addImg.php' class='additem d-flex flex-column' enctype='multipart/form-data' style='width: 100%;'>
        		<p class='item1'>Колір/Назва кольору/Картинка
        		    <input type='hidden' name='changeId' value='$changeId'>
        		    <input class='countColor' type='hidden' name='counter' value=''>
        			<input type='color' name='itemcolor'>
        			<input type='text' name='textcolor'>
        			<input type='file' name='file'>
        		    <input type='submit' value='Добавить'>
    		    </p>
        	    </form>";
    include 'footer-index.php';
?>