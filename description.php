<?php
	session_start();
	error_reporting(0);
	ini_set('display_errors', 0);
	if ($_SESSION['name'] == '') {
		$_SESSION['name'] = time();

	}else{
		echo "<p class='d-none'></p>";
	}
	if ($_SESSION['name'] == 'Tomash') {
		echo "<form action='logout.php' method='POST'><button>Log out</button></form>";
	}
?>
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
	<title>Description</title>
</head>	
<script>
    window.onload = function() {
        var heightDesc = $('#description__item_decs').height();
        $('.description__descs').css('height', heightDesc);
    }
</script>
	<?php
	include 'header.php';
	echo "<p class='opened__items d-none'>" . $_POST['toDoId'] . "</p>";
	echo "<section class='routing routing__popular' id='routing'>
            	<div class='container'>
            		<div class='row'>
            			<div class='col-12'>
            				<div class='routing__block routing__block_popular d-flex align-items-center justify-content-md-start justify-content-center'>
            					<a href='" . $_POST['toDoSite'] . "' class='routing__back d-block'>
            						<i class='fas fa-chevron-left routing__icon'></i>Назад
            					</a>
            					<div class='crumbs crumbs__two crumbs__two_popular'>
            					    <span class='routing__point_all routing__point_all_popular  d-md-block d-none routing__point_all-one'>•</span>
            						<a href='" . $_POST['toDoSite'] . "' class='routing__point_text routing__point_text_popular routing__point_two'>" .
            							 $_POST['forCrubs']
            						. "</a>
            					</div>
            					<div class='crumbs crumbs__three'>
            					    <span class='routing__point_all routing__point_all-two'>•</span>
            						<p class='routing__point_text routing__point_three routing__point_three_popular'>
            							 
            						</p>
            					</div>
            				</div>
            			</div>
            		</div>
            	</div>
            </section>";
		require_once 'connector.php'; // подключаем скрипт
		 
		$link = mysqli_connect($host, $user, $password, $database) 
		    or die("Ошибка " . mysqli_error($link)); 
		mysqli_set_charset($link, 'utf8');  
		$query ="SELECT id, name, used, price, link, type, manufname, color1, color2, color3, color4, color5, color6, color7, color8, color9, color10, color11, color12, color13, color14, color15, color16, color17, color18, color19, color20, color21, color22, color23, color24, color25, color26, color27, color28, longdescr, longused, colorCheck, noStock FROM items WHERE id =" . $_POST['toDoId'];

		$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
		if($result)
		{
		    
		    while ($row = mysqli_fetch_row($result)) {
		    	echo "<section class='description description__$row[0]' id='description__$row[0]'>";
		    	echo "<div class='container'>";
		    	echo "<div class='row'>";
		  //  	echo "<div class='col-2 d-block d-md-none'><div class='description__carusel'>";
	   // 	    echo "<img src='$row[4]' alt='ProductImages' class='description__carusel-img'>";
    //     		    	for ($i = 8; $i <= 34; $i++) {
    //     		    	    $colorlink = stristr($row[$i], '|');
    //     		    	    if(str_replace('|', '', $colorlink)){
    //     		    	        echo "<img src='" . str_replace('|', '', $colorlink) . "' alt='ProductImages' class='description__carusel-img'>";
    //     		    	    }
    //                     }
		  //  	echo "</div></div>";
		    	echo "<div class='col-md-5 col-12'>";
		    	echo "<img src='$row[4]' alt='ProductImages' class='description__img description__img_$row[0]'>";
				echo "</div>";
		    	echo "<div class='col-md-7 col-12'>";
		    	echo "<div class='description__items'>";
		    	if  ($row[38] != 'yes'){
		        	echo "<h3 class='description__name'>$row[6]</h3>";
		    	    echo "<h3 class='description__subtitle'>$row[1]</h3>";
		    	}else{
		    	    echo "<h3 class='description__name noStockText'>$row[6]</h3>";
		    	    echo "<h3 class='description__subtitle noStockText'>$row[1]</h3>";
		    	}
		    	
		    	echo "<h4 class='description__used'>$row[2]</h4>";
		    	echo "<p class='description__text'>Код товара: <span class='description__id'>$row[0]</span></p>";
		    	echo "<p class='description__price d-none d-md-block'>$row[3] <span class='description__currency'>грн</span></p>";
		    	echo "<div class='description__buy colorDown d-md-flex d-none flex-column flex-md-row align-items-md-center'>";
		    	
		        echo "<div class='description__qty_block d-md-flex d-none justify-content-between'><input type='number' class='description__qty text-center' value='1' id='$row[0]'>";
		        echo "<p class='description__price d-md-none d-block'>$row[3] <span class='description__currency'>грн</span></p></div>";
		        echo "<form method='POST' action='tocart.php' class='description__tocart'>";
		        echo "<input type='hidden' name='useritem' value='$row[0]' />";
		        $userColor = str_replace('/', '', stristr($row[7], '/'));
		        echo "<input type='hidden' class='description__qty_$row[0]' name='userqty' value='1' />";
		        echo "<input type='hidden' name='frompage' value='" . substr($row[5], 0 , 6) . "' />";
		        echo "<input type='hidden' class='userDescriptionPage$row[0]' name='fromsubpage' value='$pagename'/>";
		        echo "<input type='hidden' class='userColors$row[0]' name='usercolor' value='" . $userColor . "' id='$row[0]' />";
		        echo "<input type='hidden' class='userColorsHex$row[0]' name='usercolorHex' value='" . stristr($row[7], '/', true) . "' id='$row[0]' />";
		        echo "<input type='hidden' class='userLinks$row[0]' name='userLinks' value='" . $row[4] . "' id='$row[0]' />";
		        echo "<input type='hidden' name='toDoId' value='" .$_POST['toDoId'] . "'/>";
		        echo "<input type='hidden' name='forCrubs' value='" .$_POST['forCrubs'] . "'/>";
		        echo "<input type='hidden' name='toDoSite' value='" .$_POST['toDoSite'] . "'/>";
		        echo "<button class='description__btn'>Купити</button></form>";
		        
        	    
		        $query1 = "SELECT EXISTS(SELECT * FROM usercart WHERE id LIKE $row[0] AND userid LIKE '$session' )";
            	$result1 = mysqli_query($link, $query1) or die("Ошибка " . mysqli_error($link)); 
            	if  ($row[38] != 'yes'){
                	if($result1)
                    {
                    	while ($row1 = mysqli_fetch_row($result1)) {
                    		$checker = $row1[0];
                    	}
                    }
                    if ($checker == '1') {
                    }else{
                        
                    }
            	}else{
            	    echo "<button class='description__btn buyed noStockBtn'>Відсутній</button></form>";
            	}
            	echo "</div>";
		        if ($row[37] != 'yes') {
		            
		        	echo "<p class=' d-md-block description__color'>Відтінок</p>";
		        	$colTextdrop1 = stristr($row[7], '/');
	        	    $color1 = stristr($colTextdrop1, '|', true);
	        	    $colorLinkDrop1 = stristr($colTextdrop1, '|', true);
		        	echo "<div class='description__color_drop-text description__color_drop-text$row[0]'>" . str_replace('/', '', $colTextdrop1) ."</div><i class='fas fa-chevron-down description__color_icon'></i>";
	        	    echo "<div class='description__color_drop d-none'>";
	        	    if  ($row[7] != '#000000/'){
	        	        $colTextdrop1 = stristr($row[7], '/');
		        	    $color1 = $row[4];
		        	    $colorLinkDrop1 = stristr($row[7], '|');
		        	    echo "<div class='description__color_text' id='option1_$row[0]'><p>" . str_replace('/', '', $colTextdrop1) ."</p><input type='hidden' value=" . $row[4] . "></div>";
	        	    }
		        	if  ($row[8] != '#000000/'){
		        	    $colTextdrop2 = stristr($row[8], '/');
		        	    $color2 = stristr($colTextdrop2, '|', true);
		        	    $colorLinkDrop2 = stristr($row[8], '|');
		        	    echo "<div class='description__color_text' id='option2_$row[0]'><p>" . str_replace('/', '', $color2) ."</p><input type='hidden' value=" . str_replace('|', '', $colorLinkDrop2) . "></div>";
	        	    }
	        	    if  ($row[9] != '#000000/'){
	        	        $colTextdrop3 = stristr($row[9], '/');
		        	    $color3 = stristr($colTextdrop3, '|', true);
		        	    $colorLinkDrop3 = stristr($row[9], '|');
		        	    echo "<div class='description__color_text' id='option3_$row[0]'><p>" . str_replace('/', '', $color3) ."</p><input type='hidden' value=" . str_replace('|', '', $colorLinkDrop3) . "></div>";
	        	    }
	        	    if  ($row[10] != '#000000/'){
	        	        $colTextdrop4 = stristr($row[10], '/');
		        	    $color4 = stristr($colTextdrop4, '|', true);
		        	    $colorLinkDrop4 = stristr($row[10], '|');
		        	    echo "<div class='description__color_text' id='option4_$row[0]'><p>" . str_replace('/', '', $color4) ."</p><input type='hidden' value=" . str_replace('|', '', $colorLinkDrop4) . "></div>";
	        	    }
	        	    if  ($row[11] != '#000000/'){
	        	        $colTextdrop5 = stristr($row[11], '/');
		        	    $color5 = stristr($colTextdrop5, '|', true);
		        	    $colorLinkDrop5 = stristr($row[11], '|');
		        	    echo "<div class='description__color_text' id='option5_$row[0]'><p>" . str_replace('/', '', $color5) ."</p><input type='hidden' value=" . str_replace('|', '', $colorLinkDrop5) . "></div>";
	        	    }
	        	    if  ($row[12] != '#000000/'){
	        	        $colTextdrop6 = stristr($row[12], '/');
		        	    $color6 = stristr($colTextdrop6, '|', true);
		        	    $colorLinkDrop6 = stristr($row[12], '|');
		        	    echo "<div class='description__color_text' id='option6_$row[0]'><p>" . str_replace('/', '', $color6) ."</p><input type='hidden' value=" . str_replace('|', '', $colorLinkDrop6) . "></div>";
	        	    }
	        	    if  ($row[13] != '#000000/'){
	        	        $colTextdrop7 = stristr($row[13], '/');
		        	    $color7 = stristr($colTextdrop7, '|', true);
		        	    $colorLinkDrop7 = stristr($row[13], '|');
		        	    echo "<div class='description__color_text' id='option7_$row[0]'><p>" . str_replace('/', '', $color7) ."</p><input type='hidden' value=" . str_replace('|', '', $colorLinkDrop7) . "></div>";
	        	    }
	        	    if  ($row[14] != '#000000/'){
	        	        $colTextdrop8 = stristr($row[14], '/');
		        	    $color8 = stristr($colTextdrop8, '|', true);
		        	    $colorLinkDrop8 = stristr($row[14], '|');
		        	    echo "<div class='description__color_text' id='option8_$row[0]'><p>" . str_replace('/', '', $color8) ."</p><input type='hidden' value=" . str_replace('|', '', $colorLinkDrop8) . "></div>";
	        	    }
	        	    if  ($row[15] != '#000000/'){
	        	        $colTextdrop9 = stristr($row[15], '/');
		        	    $color9 = stristr($colTextdrop9, '|', true);
		        	    $colorLinkDrop9 = stristr($row[15], '|');
		        	    echo "<div class='description__color_text' id='option9_$row[0]'><p>" . str_replace('/', '', $color9) ."</p><input type='hidden' value=" . str_replace('|', '', $colorLinkDrop9) . "></div>";
	        	    }
	        	    if  ($row[16] != '#000000/'){
	        	        $colTextdrop10 = stristr($row[16], '/');
		        	    $color10 = stristr($colTextdrop10, '|', true);
		        	    $colorLinkDrop10 = stristr($row[16], '|');
		        	    echo "<div class='description__color_text' id='option10_$row[0]'><p>" . str_replace('/', '', $color10) ."</p><input type='hidden' value=" . str_replace('|', '', $colorLinkDrop10) . "></div>";
	        	    }
	        	    if  ($row[17] != '#000000/'){
	        	        $colTextdrop11 = stristr($row[17], '/');
		        	    $color11 = stristr($colTextdrop11, '|', true);
		        	    $colorLinkDrop11 = stristr($row[17], '|');
		        	    echo "<div class='description__color_text' id='option11_$row[0]'><p>" . str_replace('/', '', $color11) ."</p><input type='hidden' value=" . str_replace('|', '', $colorLinkDrop11) . "></div>";
	        	    }
	        	    if  ($row[18] != '#000000/'){
	        	        $colTextdrop12 = stristr($row[18], '/');
		        	    $color12 = stristr($colTextdrop12, '|', true);
		        	    $colorLinkDrop12 = stristr($row[18], '|');
		        	    echo "<div class='description__color_text' id='option12_$row[0]'><p>" . str_replace('/', '', $colo12) ."</p><input type='hidden' value=" . str_replace('|', '', $colorLinkDrop12) . "></div>";
	        	    }
	        	    if  ($row[19] != '#000000/'){
	        	        $colTextdrop13 = stristr($row[19], '/');
		        	    $color13 = stristr($colTextdrop13, '|', true);
		        	    $colorLinkDrop13 = stristr($row[19], '|');
		        	    echo "<div class='description__color_text' id='option13_$row[0]'><p>" . str_replace('/', '', $color13) ."</p><input type='hidden' value=" . str_replace('|', '', $colorLinkDrop13) . "></div>";
	        	    }
	        	    if  ($row[20] != '#000000/'){
	        	        $colTextdrop14 = stristr($row[20], '/');
		        	    $color14 = stristr($colTextdrop14, '|', true);
		        	    $colorLinkDrop14 = stristr($row[20], '|');
		        	    echo "<div class='description__color_text' id='option14_$row[0]'><p>" . str_replace('/', '', $color14) ."</p><input type='hidden' value=" . str_replace('|', '', $colorLinkDrop14) . "></div>";
	        	    }
	        	    if  ($row[21] != '#000000/'){
	        	        $colTextdrop15 = stristr($row[21], '/');
		        	    $color15 = stristr($colTextdrop15, '|', true);
		        	    $colorLinkDrop15 = stristr($row[21], '|');
		        	    echo "<div class='description__color_text' id='option15_$row[0]'><p>" . str_replace('/', '', $color15) ."</p><input type='hidden' value=" . str_replace('|', '', $colorLinkDrop15) . "></div>";
	        	    }
	        	    if  ($row[22] != '#000000/'){
	        	        $colTextdrop16 = stristr($row[22], '/');
		        	    $color16 = stristr($colTextdrop16, '|', true);
		        	    $colorLinkDrop16 = stristr($row[22], '|');
		        	    echo "<div class='description__color_text' id='option16_$row[0]'><p>" . str_replace('/', '', $color16) ."</p><input type='hidden' value=" . str_replace('|', '', $colorLinkDrop16) . "></div>";
	        	    }
	        	    if  ($row[23] != '#000000/'){
	        	        $colTextdrop17 = stristr($row[23], '/');
		        	    $color17 = stristr($colTextdrop17, '|', true);
		        	    $colorLinkDrop17 = stristr($row[23], '|');
		        	    echo "<div class='description__color_text' id='option17_$row[0]'><p>" . str_replace('/', '', $color17) ."</p><input type='hidden' value=" . str_replace('|', '', $colorLinkDrop17) . "></div>";
	        	    }
	        	    if  ($row[24] != '#000000/'){
	        	        $colTextdrop18 = stristr($row[24], '/');
		        	    $color18 = stristr($colTextdrop18, '|', true);
		        	    $colorLinkDrop18 = stristr($row[24], '|');
		        	    echo "<div class='description__color_text' id='option18_$row[0]'><p>" . str_replace('/', '', $color18) ."</p><input type='hidden' value=" . str_replace('|', '', $colorLinkDrop18) . "></div>";
	        	    }
	        	    if  ($row[25] != '#000000/'){
	        	        $colTextdrop19 = stristr($row[25], '/');
		        	    $color19 = stristr($colTextdrop19, '|', true);
		        	    $colorLinkDrop19 = stristr($row[25], '|');
		        	    echo "<div class='description__color_text' id='option19_$row[0]'><p>" . str_replace('/', '', $color19) ."</p><input type='hidden' value=" . str_replace('|', '', $colorLinkDrop19) . "></div>";
	        	    }
	        	    if  ($row[26] != '#000000/'){
	        	        $colTextdrop20 = stristr($row[26], '/');
		        	    $color20 = stristr($colTextdrop20, '|', true);
		        	    $colorLinkDrop20 = stristr($row[26], '|');
		        	    echo "<div class='description__color_text' id='option20_$row[0]'><p>" . str_replace('/', '', $color20) ."</p><input type='hidden' value=" . str_replace('|', '', $colorLinkDrop20) . "></div>";
	        	    }
	        	    if  ($row[27] != '#000000/'){
	        	        $colTextdrop21 = stristr($row[27], '/');
		        	    $color21 = stristr($colTextdrop21, '|', true);
		        	    $colorLinkDrop21 = stristr($row[27], '|');
		        	    echo "<div class='description__color_text' id='option21_$row[0]'><p>" . str_replace('/', '', $color21) ."</p><input type='hidden' value=" . str_replace('|', '', $colorLinkDrop21) . "></div>";
	        	    }
	        	    if  ($row[28] != '#000000/'){
	        	        $colTextdrop22 = stristr($row[28], '/');
		        	    $color22 = stristr($colTextdrop22, '|', true);
		        	    $colorLinkDrop22 = stristr($row[28], '|');
		        	    echo "<div class='description__color_text' id='option22_$row[0]'><p>" . str_replace('/', '', $color22) ."</p><input type='hidden' value=" . str_replace('|', '', $colorLinkDrop22) . "></div>";
	        	    }
	        	    if  ($row[29] != '#000000/'){
	        	        $colTextdrop23 = stristr($row[29], '/');
		        	    $color23 = stristr($colTextdrop23, '|', true);
		        	    $colorLinkDrop23 = stristr($row[29], '|');
		        	    echo "<div class='description__color_text' id='option23_$row[0]'><p>" . str_replace('/', '', $color23) ."</p><input type='hidden' value=" . str_replace('|', '', $colorLinkDrop23) . "></div>";
	        	    }
	        	    if  ($row[30] != '#000000/'){
	        	        $colTextdrop24 = stristr($row[30], '/');
		        	    $color24 = stristr($colTextdrop24, '|', true);
		        	    $colorLinkDrop24 = stristr($row[30], '|');
		        	    echo "<div class='description__color_text' id='option24_$row[0]'><p>" . str_replace('/', '', $color24) ."</p><input type='hidden' value=" . str_replace('|', '', $colorLinkDrop24) . "></div>";
	        	    }
	        	    if  ($row[31] != '#000000/'){
	        	        $colTextdrop25 = stristr($row[31], '/');
		        	    $color25 = stristr($colTextdrop25, '|', true);
		        	    $colorLinkDrop25 = stristr($row[31], '|');
		        	    echo "<div class='description__color_text' id='option25_$row[0]'><p>" . str_replace('/', '', $color25) ."</p><input type='hidden' value=" . str_replace('|', '', $colorLinkDrop25) . "></div>";
	        	    }
	        	    if  ($row[32] != '#000000/'){
	        	        $colTextdrop26 = stristr($row[32], '/');
		        	    $color26 = stristr($colTextdrop26, '|', true);
		        	    $colorLinkDrop26 = stristr($row[32], '|');
		        	    echo "<div class='description__color_text' id='option26_$row[0]'><p>" . str_replace('/', '', $color26) ."</p><input type='hidden' value=" . str_replace('|', '', $colorLinkDrop26) . "></div>";
	        	    }
	        	    if  ($row[33] != '#000000/'){
	        	        $colTextdrop27 = stristr($row[33], '/');
		        	    $color27 = stristr($colTextdrop27, '|', true);
		        	    $colorLinkDrop27 = stristr($row[33], '|');
		        	    echo "<div class='description__color_text' id='option27_$row[0]'><p>" . str_replace('/', '', $color27) ."</p><input type='hidden' value=" . str_replace('|', '', $colorLinkDrop27) . "></div>";
	        	    }
	        	    if  ($row[34] != '#000000/'){
	        	        $colTextdrop28 = stristr($row[34], '/');
		        	    $color28 = stristr($colTextdrop28, '|', true);
		        	    $colorLinkDrop28 = stristr($row[34], '|');
		        	    echo "<div class='description__color_text' id='option28_$row[0]'><p>" . str_replace('/', '', $color28) ."</p><input type='hidden' value=" . str_replace('|', '', $colorLinkDrop28) . "></div>";
	        	    }
	        	    
		        	echo "</div>";
		        	echo "<div class='description__prev_color align-md-items-center d-flex'>";
		        	
		        	echo "<div class='description__prev d-flex' style='background: " . stristr($row[7], '/', true) ."'></div>";
		        	echo "<div class='description__colors d-flex flex-wrap'>";
		        	if  ($row[7] != '#000000/'){
		        	    $colText1 = stristr($row[7], '/');
		        	    $colortext1 = stristr($colText1, '|', true);
		        	    echo "<div class='description__color_img option1_$row[0] active-color' style='background: " . stristr($row[7], '/', true) ."' id='option1_$row[0]'>" . stristr($row[7], '/', true) . "<input type='hidden' value='" . str_replace('/', '', $colText1) .  "'>";
		        	    $colorlink1 = stristr($row[7], '|');
		        	    echo "<input type='hidden' class='color__link1' value=" . $row[4] . "></div>";
		        	}
		        	if  ($row[8] != '#000000/'){
		        	    $colText2 = stristr($row[8], '/');
		        	    $colortext2 = stristr($colText2, '|', true);
		        	    echo "<div class='description__color_img option2_$row[0]' style='background: " . stristr($row[8], '/', true) ."' id='option2_$row[0]'>" . stristr($row[8], '/', true) . "<input type='hidden' value='" . str_replace('/', '', $colortext2) .  "'>";
		        	    $colorlink2 = stristr($row[8], '|');
                        echo "<input type='hidden' class='color__link1' value=" . str_replace('|', '', $colorlink2) . "></div>";
		        	}
		        	if  ($row[9] != '#000000/'){
		        	    $colText3 = stristr($row[9], '/');
		        	    $colortext3 = stristr($colText3, '|', true);
		        	    echo "<div class='description__color_img option3_$row[0]' style='background: " . stristr($row[9], '/', true) ."' id='option3_$row[0]'>" . stristr($row[9], '/', true) . "<input type='hidden' value='" . str_replace('/', '', $colortext3) .  "'>";
		        	    $colorlink3 = stristr($row[9], '|');
                        echo "<input type='hidden' class='color__link1' value=" . str_replace('|', '', $colorlink3) . "></div>";
		        	}
		        	if  ($row[10] != '#000000/'){
		        	    $colText4 = stristr($row[10], '/');
		        	    $colortext4 = stristr($colText4, '|', true);
		        	    echo "<div class='description__color_img option4_$row[0]' style='background: " . stristr($row[10], '/', true) ."' id='option4_$row[0]'>" . stristr($row[10], '/', true) . "<input type='hidden' value='" . str_replace('/', '', $colortext4) .  "'>";
		        	    $colorlink4 = stristr($row[10], '|');
                        echo "<input type='hidden' class='color__link1' value=" . str_replace('|', '', $colorlink4) . "></div>";
		        	}
		        	if  ($row[11] != '#000000/'){
		        	    $colText5 = stristr($row[11], '/');
		        	    $colortext5 = stristr($colText5, '|', true);
		        	    echo "<div class='description__color_img option5_$row[0]' style='background: " . stristr($row[11], '/', true) ."' id='option5_$row[0]'>" . stristr($row[11], '/', true) . "<input type='hidden' value='" . str_replace('/', '', $colortext5) .  "'>";
		        	    $colorlink5 = stristr($row[11], '|');
                        echo "<input type='hidden' class='color__link1' value=" . str_replace('|', '', $colorlink5) . "></div>";
		        	}
		        	if  ($row[12] != '#000000/'){
		        	    $colText6 = stristr($row[12], '/');
		        	    $colortext6 = stristr($colText6, '|', true);
		        	    echo "<div class='description__color_img option6_$row[0]' style='background: " . stristr($row[12], '/', true) ."' id='option6_$row[0]'>" . stristr($row[12], '/', true) . "<input type='hidden' value='" . str_replace('/', '', $colortext6) .  "'>";
		        	    $colorlink6 = stristr($row[12], '|');
                        echo "<input type='hidden' class='color__link1' value=" . str_replace('|', '', $colorlink6) . "></div>";
		        	}
		        	if  ($row[13] != '#000000/'){
		        	    $colText7 = stristr($row[13], '/');
		        	    $colortext7 = stristr($colText7, '|', true);
		        	    echo "<div class='description__color_img option7_$row[0]' style='background: " . stristr($row[13], '/', true) ."' id='option7_$row[0]'>" . stristr($row[13], '/', true) . "<input type='hidden' value='" . str_replace('/', '', $colortext7) .  "'>";
		        	    $colorlink7 = stristr($row[13], '|');
                        echo "<input type='hidden' class='color__link1' value=" . str_replace('|', '', $colorlink7) . "></div>";
		        	}
		        	if  ($row[14] != '#000000/'){
		        	    $colText8 = stristr($row[14], '/');
		        	    $colortext8 = stristr($colText8, '|', true);
		        	    echo "<div class='description__color_img option8_$row[0]' style='background: " . stristr($row[14], '/', true) ."' id='option8_$row[0]'>" . stristr($row[14], '/', true) . "<input type='hidden' value='" . str_replace('/', '', $colortext8) .  "'>";
		        	    $colorlink8 = stristr($row[14], '|');
                        echo "<input type='hidden' class='color__link1' value=" . str_replace('|', '', $colorlink8) . "></div>";
		        	    
		        	}
		        	if  ($row[15] != '#000000/'){
		        	    $colText9 = stristr($row[15], '/');
		        	    $colortext9 = stristr($colText9, '|', true);
		        	    echo "<div class='description__color_img option9_$row[0]' style='background: " . stristr($row[15], '/', true) ."' id='option9_$row[0]'>" . stristr($row[15], '/', true) . "<input type='hidden' value='" . str_replace('/', '', $colortext9) .  "'>";
		        	    $colorlink9 = stristr($row[15], '|');
                        echo "<input type='hidden' class='color__link1' value=" . str_replace('|', '', $colorlink9) . "></div>";
		        	    
		        	}
		        	if  ($row[16] != '#000000/'){
		        	    $colText10 = stristr($row[16], '/');
		        	    $colortext10 = stristr($colText10, '|', true);
		        	    echo "<div class='description__color_img option10_$row[0]' style='background: " . stristr($row[16], '/', true) ."' id='option10_$row[0]'>" . stristr($row[16], '/', true) . "<input type='hidden' value='" . str_replace('/', '', $colortext10) . "'>";
		        	    $colorlink10 = stristr($row[16], '|');
                        echo "<input type='hidden' class='color__link1' value=" . str_replace('|', '', $colorlink10) . "></div>";
		        	    
		        	}
		        	if  ($row[17] != '#000000/'){
		        	    $colText11 = stristr($row[17], '/');
		        	    $colortext11 = stristr($colText11, '|', true);
		        	    echo "<div class='description__color_img option11_$row[0]' style='background: " . stristr($row[17], '/', true) ."' id='option11_$row[0]'>" . stristr($row[17], '/', true) . "<input type='hidden' value='" . str_replace('/', '', $colortext11) .  "'>";
		        	    $colorlink11 = stristr($row[17], '|');
                        echo "<input type='hidden' class='color__link1' value=" . str_replace('|', '', $colorlink11) . "></div>";
		        	    
		        	}
		        	if  ($row[18] != '#000000/'){
		        	    $colText12 = stristr($row[18], '/');
		        	    $colortext12 = stristr($colText12, '|', true);
		        	    echo "<div class='description__color_img option12_$row[0]' style='background: " . stristr($row[18], '/', true) ."' id='option12_$row[0]'>" . stristr($row[18], '/', true) . "<input type='hidden' value='" . str_replace('/', '', $colortext12) .  "'>";
		        	    $colorlink12 = stristr($row[18], '|');
                        echo "<input type='hidden' class='color__link1' value=" . str_replace('|', '', $colorlink12) . "></div>";
		        	    
		        	}
		        	if  ($row[19] != '#000000/'){
		        	    $colText13 = stristr($row[19], '/');
		        	    $colortext13 = stristr($colText13, '|', true);
		        	    echo "<div class='description__color_img option13_$row[0]' style='background: " . stristr($row[19], '/', true) ."' id='option13_$row[0]'>" . stristr($row[19], '/', true) . "<input type='hidden' value='" . str_replace('/', '', $colortext13) .  "'>";
		        	    $colorlink13 = stristr($row[19], '|');
                        echo "<input type='hidden' class='color__link1' value=" . str_replace('|', '', $colorlink13) . "></div>";
		        	    
		        	}
		        	if  ($row[20] != '#000000/'){
		        	    $colText14 = stristr($row[20], '/');
		        	    $colortext14 = stristr($colText14, '|', true);
		        	    echo "<div class='description__color_img option14_$row[0]' style='background: " . stristr($row[20], '/', true) ."' id='option14_$row[0]'>" . stristr($row[20], '/', true) . "<input type='hidden' value='" . str_replace('/', '', $colortext14) .  "'>";
		        	    $colorlink14 = stristr($row[20], '|');
                        echo "<input type='hidden' class='color__link1' value=" . str_replace('|', '', $colorlink14) . "></div>";
		        	    
		        	}
		        	if  ($row[21] != '#000000/'){
		        	    $colText15 = stristr($row[21], '/');
		        	    $colortext15 = stristr($colText15, '|', true);
		        	    echo "<div class='description__color_img option15_$row[0]' style='background: " . stristr($row[21], '/', true) ."' id='option15_$row[0]'>" . stristr($row[21], '/', true) . "<input type='hidden' value='" . str_replace('/', '', $colortext15) .  "'>";
		        	    $colorlink15 = stristr($row[21], '|');
                        echo "<input type='hidden' class='color__link1' value=" . str_replace('|', '', $colorlink15) . "></div>";
		        	    
		        	}
		        	if  ($row[22] != '#000000/'){
		        	    $colText16 = stristr($row[22], '/');
		        	    $colortext16 = stristr($colText16, '|', true);
		        	    echo "<div class='description__color_img option16_$row[0]' style='background: " . stristr($row[22], '/', true) ."' id='option16_$row[0]'>" . stristr($row[22], '/', true) . "<input type='hidden' value='" . str_replace('/', '', $colortext16) .  "'>";
		        	    $colorlink16 = stristr($row[22], '|');
                        echo "<input type='hidden' class='color__link1' value=" . str_replace('|', '', $colorlink16) . "></div>";
		        	    
		        	}
		        	if  ($row[23] != '#000000/'){
		        	    $colText17 = stristr($row[23], '/');
		        	    $colortext17 = stristr($colText17, '|', true);
		        	    echo "<div class='description__color_img option17_$row[0]' style='background: " . stristr($row[23], '/', true) ."' id='option17_$row[0]'>" . stristr($row[23], '/', true) . "<input type='hidden' value='" . str_replace('/', '', $colortext17) .  "'>";
		        	    $colorlink17 = stristr($row[23], '|');
                        echo "<input type='hidden' class='color__link1' value=" . str_replace('|', '', $colorlink17) . "></div>";
		        	    
		        	}
		        	if  ($row[24] != '#000000/'){
		        	    $colText18 = stristr($row[24], '/');
		        	    $colortext18 = stristr($colText18, '|', true);
		        	    echo "<div class='description__color_img option18_$row[0]' style='background: " . stristr($row[24], '/', true) ."' id='option18_$row[0]'>" . stristr($row[24], '/', true) . "<input type='hidden' value='" . str_replace('/', '', $colortext18) .  "'>";
		        	    $colorlink18 = stristr($row[24], '|');
                        echo "<input type='hidden' class='color__link1' value=" . str_replace('|', '', $colorlink18) . "></div>";
		        	    
		        	}
		        	if  ($row[25] != '#000000/'){
		        	    $colText19 = stristr($row[25], '/');
		        	    $colortext19 = stristr($colText19, '|', true);
		        	    echo "<div class='description__color_img option19_$row[0]' style='background: " . stristr($row[25], '/', true) ."' id='option19_$row[0]'>" . stristr($row[25], '/', true) . "<input type='hidden' value='" . str_replace('/', '', $colortext19) .  "'>";
		        	    $colorlink19 = stristr($row[25], '|');
                        echo "<input type='hidden' class='color__link1' value=" . str_replace('|', '', $colorlink19) . "></div>";
		        	    
		        	}
		        	if  ($row[26] != '#000000/'){
		        	    $colText20 = stristr($row[26], '/');
		        	    $colortext20 = stristr($colText20, '|', true);
		        	    echo "<div class='description__color_img option20_$row[0]' style='background: " . stristr($row[26], '/', true) ."' id='option20_$row[0]'>" . stristr($row[26], '/', true) . "<input type='hidden' value='" . str_replace('/', '', $colortext20) .  "'>";
		        	    $colorlink20 = stristr($row[26], '|');
                        echo "<input type='hidden' class='color__link1' value=" . str_replace('|', '', $colorlink20) . "></div>";
		        	    
		        	}
		        	if  ($row[27] != '#000000/'){
		        	    $colText21 = stristr($row[27], '/');
		        	    $colortext21 = stristr($colText21, '|', true);
		        	    echo "<div class='description__color_img option21_$row[0]' style='background: " . stristr($row[27], '/', true) ."' id='option21_$row[0]'>" . stristr($row[27], '/', true) . "<input type='hidden' value='" . str_replace('/', '', $colortext21) .  "'>";
		        	    $colorlink21 = stristr($row[27], '|');
                        echo "<input type='hidden' class='color__link1' value=" . str_replace('|', '', $colorlink21) . "></div>";
		        	    
		        	}
		        	if  ($row[28] != '#000000/'){
		        	    $colText22 = stristr($row[28], '/');
		        	    $colortext22 = stristr($colText22, '|', true);
		        	    echo "<div class='description__color_img option22_$row[0]' style='background: " . stristr($row[28], '/', true) ."' id='option22_$row[0]'>" . stristr($row[28], '/', true) . "<input type='hidden' value='" . str_replace('/', '', $colortext22) .  "'>";
		        	    $colorlink22 = stristr($row[28], '|');
                        echo "<input type='hidden' class='color__link1' value=" . str_replace('|', '', $colorlink22) . "></div>";
		        	    
		        	}
		        	if  ($row[29] != '#000000/'){
		        	    $colText23 = stristr($row[29], '/');
		        	    $colortext23 = stristr($colText23, '|', true);
		        	    echo "<div class='description__color_img option23_$row[0]' style='background: " . stristr($row[29], '/', true) ."' id='option23_$row[0]'>" . stristr($row[29], '/', true) . "<input type='hidden' value='" . str_replace('/', '', $colortext23) .  "'>";
		        	    $colorlink23 = stristr($row[29], '|');
                        echo "<input type='hidden' class='color__link1' value=" . str_replace('|', '', $colorlink23) . "></div>";
		        	    
		        	}
		        	if  ($row[30] != '#000000/'){
		        	    $colText24 = stristr($row[30], '/');
		        	    $colortext24 = stristr($colText24, '|', true);
		        	    echo "<div class='description__color_img option24_$row[0]' style='background: " . stristr($row[30], '/', true) ."' id='option24_$row[0]'>" . stristr($row[30], '/', true) . "<input type='hidden' value='" . str_replace('/', '', $colortext24) .  "'>";
		        	    $colorlink24 = stristr($row[30], '|');
                        echo "<input type='hidden' class='color__link1' value=" . str_replace('|', '', $colorlink24) . "></div>";
		        	    
		        	}
		        	if  ($row[31] != '#000000/'){
		        	    $colText25 = stristr($row[31], '/');
		        	    $colortext25 = stristr($colText25, '|', true);
		        	    echo "<div class='description__color_img option25_$row[0]' style='background: " . stristr($row[31], '/', true) ."' id='option25_$row[0]'>" . stristr($row[31], '/', true) . "<input type='hidden' value='" . str_replace('/', '', $colortext25) .  "'>";
		        	    $colorlink25 = stristr($row[31], '|');
                        echo "<input type='hidden' class='color__link1' value=" . str_replace('|', '', $colorlink25) . "></div>";
		        	    
		        	}
		        	if  ($row[32] != '#000000/'){
		        	    $colText26 = stristr($row[32], '/');
		        	    $colortext26 = stristr($colText26, '|', true);
		        	    echo "<div class='description__color_img option26_$row[0]' style='background: " . stristr($row[32], '/', true) ."' id='option26_$row[0]'>" . stristr($row[32], '/', true) . "<input type='hidden' value='" . str_replace('/', '', $colortext26) .  "'>";
		        	    $colorlink26 = stristr($row[32], '|');
                        echo "<input type='hidden' class='color__link1' value=" . str_replace('|', '', $colorlink26) . "></div>";
		        	    
		        	}
		        	if  ($row[33] != '#000000/'){
		        	    $colText27 = stristr($row[33], '/');
		        	    $colortext27 = stristr($colText27, '|', true);
		        	    echo "<div class='description__color_img option27_$row[0]' style='background: " . stristr($row[33], '/', true) ."' id='option27_$row[0]'>" . stristr($row[33], '/', true) . "<input type='hidden' value='" . str_replace('/', '', $colortext27) .  "'>";
		        	    $colorlink27 = stristr($row[33], '|');
                        echo "<input type='hidden' class='color__link1' value=" . str_replace('|', '', $colorlink27) . "></div>";
		        	    
		        	}
		        	if  ($row[34] != '#000000/'){
		        	    $colText28 = stristr($row[34], '/');
		        	    $colortext28 = stristr($colText28, '|', true);
		        	    echo "<div class='description__color_img option28_$row[0]' style='background: " . stristr($row[34], '/', true) ."' id='option28_$row[0]'>" . stristr($row[34], '/', true) . "<input type='hidden' value='" . str_replace('/', '', $colortext28) .  "'>";
		        	    $colorlink28 = stristr($row[34], '|');
                        echo "<input type='hidden' class='color__link1' value=" . str_replace('|', '', $colorlink28) . "></div>";
		        	    
		        	}
			        echo "</div>";
			        echo "</div>";
			        echo "<div class='description__buy colorUp description__buy_colrors d-flex d-md-none flex-column flex-md-row align-items-md-center'>";
    		        echo "<div class='d-flex description__qty_block justify-content-between'><input type='number' class='description__qty text-center' value='1' id='$row[0]'>";
    		        echo "<p class='description__price d-md-none d-block'>$row[3] <span class='description__currency'>грн</span></p></div>";
    		        echo "<form method='POST' action='tocart.php' class='description__tocart'>";
    		        echo "<input type='hidden' name='useritem' value='$row[0]' />";
    		        $userColor = str_replace('/', '', stristr($row[7], '/'));
    		        echo "<input type='hidden' class='description__qty_$row[0]' name='userqty' value='1' />";
    		        echo "<input type='hidden' name='frompage' value='" . substr($row[5], 0 , 6) . "' />";
    		        echo "<input type='hidden' class='userDescriptionPage$row[0]' name='fromsubpage' value='$pagename'/>";
    		        echo "<input type='hidden' class='userColors$row[0]' name='usercolor' value='" . $userColor . "' id='$row[0]' />";
    		        echo "<input type='hidden' class='userColorsHex$row[0]' name='usercolorHex' value='" . stristr($row[7], '/', true) . "' id='$row[0]' />";
    		        echo "<input type='hidden' class='userLinks$row[0]' name='userLinks' value='" . $row[4] . "' id='$row[0]' />";
    		        echo "<input type='hidden' name='toDoId' value='" .$_POST['toDoId'] . "'/>";
    		        echo "<input type='hidden' name='forCrubs' value='" .$_POST['forCrubs'] . "'/>";
    		        echo "<input type='hidden' name='toDoSite' value='" .$_POST['toDoSite'] . "'/>";
    		        echo "<button class='description__btn'>Купити</button></form>";
    		        $query1 = "SELECT EXISTS(SELECT * FROM usercart WHERE id LIKE $row[0] AND userid LIKE '$session' )";
    		        
                	$result1 = mysqli_query($link, $query1) or die("Ошибка " . mysqli_error($link)); 
                	if  ($row[38] != 'yes'){
                    	if($result1)
                        {
                        	while ($row1 = mysqli_fetch_row($result1)) {
                        		$checker = $row1[0];
                        	}
                        }
                        if ($checker == '1') {
                        }else{
                        }
                	}else{
                	    echo "<button class='description__btn buyed noStockBtn'>Відсутній</button></form>";
                	}
                	echo "</div>";
		        }else{
		            echo "<div class='description__buy colorUp d-flex d-md-none flex-column flex-md-row align-items-md-center'>";
    		        echo "<div class='d-flex description__qty_block justify-content-between'><input type='number' class='description__qty text-center' value='1' id='$row[0]'>";
    		        echo "<p class='description__price d-md-none d-block'>$row[3] <span class='description__currency'>грн</span></p></div>";
    		        echo "<form method='POST' action='tocart.php' class='description__tocart'>";
    		        echo "<input type='hidden' name='useritem' value='$row[0]' />";
    		        $userColor = str_replace('/', '', stristr($row[7], '/'));
    		        echo "<input type='hidden' class='description__qty_$row[0]' name='userqty' value='1' />";
    		        echo "<input type='hidden' name='frompage' value='" . substr($row[5], 0 , 6) . "' />";
    		        echo "<input type='hidden' class='userDescriptionPage$row[0]' name='fromsubpage' value='$pagename'/>";
    		        echo "<input type='hidden' class='userColors$row[0]' name='usercolor' value='" . $userColor . "' id='$row[0]' />";
    		        echo "<input type='hidden' class='userColorsHex$row[0]' name='usercolorHex' value='" . stristr($row[7], '/', true) . "' id='$row[0]' />";
    		        echo "<input type='hidden' class='userLinks$row[0]' name='userLinks' value='" . $row[4] . "' id='$row[0]' />";
    		        echo "<input type='hidden' name='toDoId' value='" .$_POST['toDoId'] . "'/>";
    		        echo "<input type='hidden' name='forCrubs' value='" .$_POST['forCrubs'] . "'/>";
    		        echo "<input type='hidden' name='toDoSite' value='" .$_POST['toDoSite'] . "'/>";
    		        echo "<button class='description__btn'>Купити</button></form>";
    		        $query1 = "SELECT EXISTS(SELECT * FROM usercart WHERE id LIKE $row[0] AND userid LIKE '$session' )";
                	$result1 = mysqli_query($link, $query1) or die("Ошибка " . mysqli_error($link)); 
                	if  ($row[38] != 'yes'){
                    	if($result1)
                        {
                        	while ($row1 = mysqli_fetch_row($result1)) {
                        		$checker = $row1[0];
                        	}
                        }
                        if ($checker == '1') {
                        }else{
                        }
                	}else{
                	    echo "<button class='description__btn buyed noStockBtn'>Відсутній</button></form>";
                	}
                	echo "</div>";
		        }
		        echo "<div class='description__descs'>";
		        echo "<div class='description__titles'>";
		        echo "<a href='javascript:void(0);' class='description__desc_title active-decs-title' id='decs'>Опис</a>";
		        echo "<a href='javascript:void(0);' class='description__desc_title' id='used'>Застосування</a>";
		        echo "</div>";
		        echo "<div class='description__item description__item_decs' id='description__item_decs'>";
		        echo "<p class='description__desc_text'>$row[35]</p>";
		        echo "</div>";
		        echo "<div class='description__item description__item_used d-none'>"; 
		        echo "<p class='description__desc_text'>$row[36]</p>";
		        echo "</div>";
		        echo "<div class='description__delivery d-md-none d-block'>";
		        echo "<div class='description__delivery_block description__delivery_first align-items-center d-flex'>";
		        echo "<i class='fas fa-truck description__delivery_icon'></i><p class='description__delivery_text'>Доставка Новою поштою</p>";
		        echo "</div>";
		        echo "<div class='description__delivery_block align-items-center d-flex'>";
		        echo "<i class='fas fa-money-bill-alt description__delivery_icon'></i><p class='description__delivery_text'>Оплата при отримані або онлайн</p>";
		        echo "</div>";
	         	echo "</div>";
	         	echo "</div>";
	         	echo "</div>";
	         	echo "</div>";
	         	echo "<div class='col-5 d-md-none d-flex flex-column align-items-end'>";
	         	   
		        echo "</div>";
	         	echo "</section>";
		    }
		    					     
		    mysqli_free_result($result);
		}
	?>
	<section class="populars" id="populars">
		<?php include 'popular.php'; ?>
	</section>
<?php include 'footer-index.php'; ?>