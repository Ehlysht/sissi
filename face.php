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
	<title>Товари для догляду за обличчам</title>
	<meta name="Description" content="Якісна космети для догляду за обличчам відомих брендів"> 
	<meta name="keywords" content="интернет-магазин, засоби догляду за обличчам, купити, замовити, доставляємо по Україні, косметика, акції, відомі бренди, Kiko Milano, HASK, Rolanjona">
</head>
<?php include 'header.php'; 
    $pagename = 'face';
?>
	<p class="pagename d-none">face</p>
	<section class="firstimg">
	    <div class="container">
	        <div class="row">
	            <div class="col-12">
	                <div class="firstimg__all">
	                    <img src="img/facesection.png" alt="Для обличча" class="face__firstimg d-md-none d-block">
	                    <img src="img/faceitem.png" alt="Для обличча" class="items-img face__firstimg ml-auto d-md-block d-none">
	                </div>
	            </div>
	        </div>
	    </div>
	</section>
	<section class="routing d-md-block d-none" id="routing">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="routing__block routing__block_other d-flex align-items-center justify-content-md-start justify-content-center">
						<a href="index.php" class="routing__back d-block">
							<i class="fas fa-chevron-left routing__icon"></i>Назад<span class="routing__icon_point d-md-block d-none">•</span>
						</a>
						<div class="crumbs crumbs__one crumbs__one_ml">
    						<p class="routing__point routing__point_one">
    							 Догляд за обличчям
    						</p>
						</div>	 
					</div>
				</div>
			</div>
		</div>
	</section>
	<?php include 'submenu.php';?>
				<div class="col-md-9 col-12">
					<div class="sales-materials sales__face">
						<h2 class="forface__title text-center">
							Догляд за обличчям
						</h2>
						<div class="forface__all d-flex flex-wrap">
							<?php
								require_once 'connector.php'; // подключаем скрипт
								 
								$link = mysqli_connect($host, $user, $password, $database) 
								    or die("Ошибка " . mysqli_error($link)); 
							    mysqli_set_charset($link, 'utf8');
								$query ="SELECT id, name, used, price, link, type, manufname, color1, noStock FROM items WHERE type ='face'";

								$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
								if($result)
								{
								    
								    while ($row = mysqli_fetch_row($result)) {
								    	if  ($row[8] != 'yes'){
								    	    echo "<div class='forface__items forface__items_forface text-center'>";
								        	echo "<div class='forface__item text-center' id='$row[0]'>";
								    	}else{
								    	    echo "<div class='forface__items forface__items_forface item-order text-center'>";
								    	    echo "<div class='forface__item noStock text-center' id='$row[0]'>";
								    	}
									    if ($_SESSION['name'] == 'Tomash') {
								    		echo "<form method='POST' action='removefrom.php' class='deleteform'><input type='hidden' name='id' value='$row[0]' /><input type='submit' class='material__delete' value='X'><input type='hidden' name='deleteimg' value='$row[4]' /></form>";
								    	}
									    echo "<form method='POST' action='description.php' class='openDesc forface__item_first' id='$row[0]'><img src='$row[4]' alt='ProductImages' class='forface__img'>";
									    echo "<input type='hidden' name='toDoId' value='$row[0]'>";
									    echo "<input type='hidden' name='toDoSite' value='../face.php'>";
									    echo "<input type='hidden' name='forCrubs' value='Догляд за обличчям'>";
									    echo "<h3 class='forface__name_$row[0] product__name_$row[0] '>$row[6]</h3>";
									    echo "<h3 class='forface__subtitle product__subtitle_$row[0] shortText'>$row[1]</h3>";
								        echo "<h4 class='forface__used shortText'>$row[2]</h4>";
								        echo "<p class='forface__price'>$row[3] <span class='forface__currency'>грн.</span></p></form>";
								        echo "<form method='POST' action='tocart.php'>";
								        echo "<input type='hidden' name='whenBtn' value='oneClick'>";
								        echo "<input type='hidden' name='toDoSite' value='../face.php'>";
                        		        echo "<input type='hidden' name='useritem' value='$row[0]' />";
                        		        $userColor = str_replace('/', '', stristr($row[7], '/'));
                        		        echo "<input type='hidden' name='userqty' value='1' />";
                        		        echo "<input type='hidden' name='frompage' value='" . substr($row[5], 0 , 6) . "' />";
                        		        echo "<input type='hidden' name='fromsubpage' value='$pagename'/>";
                        		        echo "<input type='hidden' name='usercolor' value='" . $userColor . "' id='$row[0]' />";
                        		        echo "<input type='hidden' name='usercolorHex' value='" . stristr($row[7], '/', true) . "' id='$row[0]' />";
                        		        echo "<input type='hidden'  name='userLinks' value='" . $row[4] . "' id='$row[0]' />";
								        if  ($row[7] != '#000000/'){
                    	        	        $colTextdrop1 = stristr($row[7], '/');
                    	        	        echo "<input type='hidden' name='usercolor' value='" . str_replace('/', '', $colTextdrop1) . "' />";
                    	        	    }
								        
								        $query1 = "SELECT EXISTS(SELECT * FROM usercart WHERE id LIKE $row[0] AND userid LIKE '$session' )";
                                    	$result1 = mysqli_query($link, $query1) or die("Ошибка " . mysqli_error($link)); 
								        if ($row[7] != 'yes'){
                                    	    if($result1)
                                            {
                                            	while ($row1 = mysqli_fetch_row($result1)) {
                                            		$checker = $row1[0];
                                            	}
                                            }
                                            if ($checker == '1') {
            						            echo "<button class='forface__btn buyed'>В корзині</button></form>";
                                            }else{
                                                echo "<button class='forface__btn'>Купити</button></form>";
                                            }
                                    	}else{
                                    	    echo "<button class='forface__btn noStockBtn buyed'>Відсутній</button></form>";
                                    	}
								        echo "</div>";
							         	echo "</div>";
								    }				     
								    mysqli_free_result($result);
								}
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php include 'footer-index.php'; ?>