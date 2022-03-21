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
	<title>Cart</title>
</head>
<script>
    window.onload = function() {
        $('html, body').animate({
            scrollTop: $(".header").offset().top
        }, 10);
    }
</script>
<?php include 'header.php'; 
    $pagename = 'cart';
echo "<p class='opened__items d-none'></p>";

?>
<p class="pagename d-none">cart</p>
	<section class="cart__routings" id="cart__routings">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="cart__sum_items d-lg-flex d-none flex-column">
						<div class="cart__sum_firts d-flex justify-content-between flex-lg-nowrap flex-md-wrap">
							<div class="cart__sum_text-titles">
								<p class="cart__sum_text d-lg-block d-md-none">
									Разом
								</p>
								<p class="cart__sum_text-item">
									Сумма замовлення
								</p>
							</div>
							<div class="cart__sum_sum-price d-flex justify-content-end align-items-end">
								<p class="cart__allsum">
									190,00 
								</p>
								<span class="cart__sum_sum-currency">грн</span>
							</div>
						</div>
						<div class="cartdelivery__sum_text-desc d-none d-md-none">
							<div class="cartdelivery__sum_text_block d-flex">
								<span class="cartdelivery__sum_text_decs cartdelivery__sum_text_plus">+</span> 
								<p class="cartdelivery__sum_text_decs">
									Комісія за накладний платіж за тарифами Нової пошти 
								</p>
							</div>
							<div class="cartdelivery__sum_text_block d-flex">
								<span class="cartdelivery__sum_text_decs cartdelivery__sum_text_plus">+</span>
								<p class="cartdelivery__sum_text_decs">
									 Доставка за тарифами Нової пошти
								</p>
							</div>
						</div>
						<div class="cartdelivery__user d-none">
							<p class="cartdelivery__user_title">
								Адреса отримувача
							</p>
							<p class="cartdelivery__user_text cartdelivery__user_name">
								
							</p>
							<p class="cartdelivery__user_text cartdelivery__user_adress">
								
							</p>
							<p class="cartdelivery__user_text cartdelivery__user_np">
								
							</p>
							<p class="cartdelivery__user_text cartdelivery__user_tel">
								
							</p>
						</div>
					</div>
				</div>
			</div>	
			<div class="row">
				<div class="col-md-6 col-12 d-flex justify-content-md-start justify-content-center">
					<div class="cart__routing d-flex align-items-center">
						<i class="fas fa-shopping-basket cart__routing_icon cart__routing_one active-cart"></i>
						<i class="fas fa-check cart__routing_icon d-none complete-cart complete-cart-one"></i>
						<p class="cart__routing_text cart__routing_textone complete-cart-text">
							Кошик
						</p>
					</div>
					<div class="cart__routing d-flex align-items-center">
						<i class="fas fa-truck cart__routing_icon cart__routing_two"></i>
						<i class="fas fa-check cart__routing_icon d-none complete-cart complete-cart-two"></i>
						<p class="cart__routing_text cart__routing_texttwo">
							Доставка
						</p>
					</div>
					<div class="cart__routing cart__routing_end d-flex align-items-center">
						<i class="fas fa-money-bill-alt cart__routing_icon cart__routing_three"></i>
						<i class="fas fa-check cart__routing_icon d-none complete-cart complete-cart-three"></i>
						<p class="cart__routing_text cart__routing_textthree">
							Оплата
						</p>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="cart" id="cart">
		<div class="container">
			<div class="row">
				<div class="col-12 text-md-left text-center">
					<h2 class="subtitle cart__subtitle">
						Кошик
					</h2>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-8 col-12">
					<div class="cart__titles d-flex">
						<p class="cart__titles_text cart__titles_one text-center">
							Опис
						</p>
						<p class="cart__titles_text cart__titles_two text-center d-md-block d-none">
							Ціна
						</p>
						<p class="cart__titles_text cart__titles_three text-center d-md-block d-none">
							Кіл-ть
						</p>
						<p class="cart__titles_text cart__titles_three text-center d-md-none d-block">
							Ціна / Кіл-ть
						</p>
						<p class="cart__titles_text cart__titles_four text-center d-md-block d-none">
							Сумма
						</p>
					</div>
				</div>
			</div>
			<?php
				$session = $_SESSION['name'];
				require_once 'connector.php'; // подключаем скрипт
				 
				$link = mysqli_connect($host, $user, $password, $database) 
				    or die("Ошибка " . mysqli_error($link)); 
			    mysqli_set_charset($link, 'utf8');
				$query ="SELECT id, name, used, price, link, type, manufname, color1, color2, color3, color4, longdescr, longused, userid, userqty FROM usercart WHERE userid = '$session'";

				$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
				if($result)
				{
				    
				    while ($row = mysqli_fetch_row($result)) {
				        $colTextdrop = stristr($row[7], '/', true);
		        	    $color = stristr($colTextdrop, '|', true);
		        	    $colorLinkDrop = str_replace('|', '', stristr($row[7], '|'));
				    	echo "<div class='row cart__line' id='$row[0]'>";
				    	echo "<div class='col-lg-5 col-md-7 col-9 d-flex align-items-center'>";
					    echo "<img src='$colorLinkDrop' alt='Популярне' class='cart__img'>";
					    echo "<div class='cart__desc'><p class='cart__name cart__name_$row[0]'>$row[6]</p>";
				        echo "<p class='cart__title cart__title_$row[0]'>$row[1]</p>";
				        echo "<p class='cart__used cart__used_$row[0]'>$row[2]</p><div class='cart__other_info d-flex align-items-center' style='margin: 10px 0;'>";
				        if(stristr($row[7], 'img/', true) != '#000000/|'){
				            echo "<div style='width: 28px; height: 25px; border: 1px solid #000; background: $colTextdrop'></div>";
				            echo "<div style='margin-left: 10px; color: rgba(0,0,0,.5); font-size: 15px'>" . str_replace('/', '', str_replace('|', '', stristr(stristr($row[7], '/'), '|', true))) . "</div>";
				        }
				        echo "</div></div></div>";
				        echo "<div class='col-3 d-block m-auto text-right d-md-none'><p class='cart__price cart__price_$row[0]_$row[8]'>$row[3] <span class='cart__currency'>грн</span></p>";
				        echo "<span class='cart__qty_change cart__minus' id='$row[0]_$row[8]'>-</span>";
						echo "<input type='text' name='userqty' class='cart__qty cart__qty_$row[0]_$row[8] text-center' value='$row[14]' readonly='readonly'>";
						echo "<span class='cart__qty_change cart__plus' id='$row[0]_$row[8]'>+</span></div>";
				        echo "<div class='col-lg-1 col-md-2 d-md-flex d-none align-items-center justify-content-center'>";
						echo "<p class='cart__price cart__price_$row[0]'>$row[3] <span class='cart__currency'>грн.</span></p></div>";
						echo "<div class='col-1 d-md-flex d-none align-items-center justify-content-center'>";
						echo "<span class='cart__qty_change cart__minus' id='$row[0]_$row[8]'>-</span>";
						echo "<input type='text' name='userqty' class='cart__qty cart__qty_$row[0]_$row[8] text-center' value='$row[14]' readonly='readonly'>";
						echo "<span class='cart__qty_change cart__plus' id='$row[0]_$row[8]'>+</span></div>";
						echo "<div class='col-lg-1 col-md-2 d-flex align-items-center justify-content-center'>";
						echo "<div class='cart__sum justify-content-md-end d-flex'><p class='cart__price_sum cart__price_sum_$row[0]_$row[8] d-md-inline d-none'>";
						echo $row[3] * $row[14] ;
						echo "</p><span class='cart__currency_sum d-md-flex d-none'> грн.</span>";
				        echo "<form method='POST' class='deleted__item_cart' action='refromcart.php'>";
				        echo "<input type='hidden' name='id' value='$row[0]' />";
				        echo "<input type='hidden' name='userColor' value='$row[7]' />";
				        echo "<button class='delet__btn'><i class='far fa-trash-alt cart__icon_trash'></i></button></form></div></div>";
			         	echo "</div>";
				    }
				    					     
				    mysqli_free_result($result);
				}
			?>
			<div class="row">
				<div class="col-12">
					<div class="cart__sum_items-tablet d-lg-none d-md-flex flex-column">
						<div class="cart__sum_firts d-flex justify-content-between flex-lg-nowrap flex-md-wrap">
							<div class="cart__sum_text-titles">
								<p class="cart__sum_text d-lg-block d-none">
									Разом
								</p>
								<p class="cart__sum_text-item">
									Сумма замовлення
								</p>
							</div>
							<div class="cart__sum_sum-price d-flex justify-content-end align-items-end">
								<p class="cart__allsum">
									190,00 
								</p>
								<span class="cart__sum_sum-currency"> грн</span>
							</div>
						</div>
						<div class="cartdelivery__sum_text-desc d-none d-md-none">
							<div class="cartdelivery__sum_text_block d-flex">
								<span class="cartdelivery__sum_text_decs cartdelivery__sum_text_plus">+</span> 
								<p class="cartdelivery__sum_text_decs">
									Комісія за накладний платіж за тарифами Нової пошти 
								</p>
							</div>
							<div class="cartdelivery__sum_text_block d-flex">
								<span class="cartdelivery__sum_text_decs cartdelivery__sum_text_plus">+</span>
								<p class="cartdelivery__sum_text_decs">
									 Доставка за тарифами Нової пошти
								</p>
							</div>
						</div>
						<div class="cartdelivery__user d-none">
							<p class="cartdelivery__user_title">
								Адреса отримувача
							</p>
							<p class="cartdelivery__user_text cartdelivery__user_name">
								
							</p>
							<p class="cartdelivery__user_text cartdelivery__user_adress">
								
							</p>
							<p class="cartdelivery__user_text cartdelivery__user_np">
								
							</p>
							<p class="cartdelivery__user_text cartdelivery__user_tel">
								
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="cartbouns d-md-none d-block" id="cartbonus">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="cart__bonus d-flex align-items-center">
						<i class="fas fa-exclamation cart__bonus_icon"></i>
						<p class="cart__bonus_text">
							Замовте ще на  <span class="cart__bonus_sum cart__bonus_sum1">350</span> грн і отримайте подарунок :)
						</p>
					</div>
					<div class="cart__free d-flex align-items-center">
						<i class="fas fa-exclamation cart__bonus_icon"></i>
						<p class="cart__bonus_text cart__bonus_text-second">
							Замовте ще на <span class="cart__bonus_sum cart__bonus_sum2">500</span> грн і отримайте безкоштовну доставку ;)
						</p>
					</div>
				</div>
				<div class="col-12 m-lg-auto mt-md-auto">
					<button class="cart__bonus_btn cart__onebtn">
						Купити в 1 клік
					</button>
				</div>
				<div class="col-12 m-lg-auto mt-md-auto">
					<button class="cart__bonus_btn">
						Перейти до оформлення
					</button>
				</div>
			</div>
		</div>
	</section>
	<section class="OneClick d-none" id="OneClick">
	    <div class="container">
	        <div class="row">
	            <div class="col-12">
	                <form method="POST" action="send.php" class="OneClick__form">
	                    <?php
							require_once 'connector.php'; // подключаем скрипт
							 
							$link = mysqli_connect($host, $user, $password, $database) 
							    or die("Ошибка " . mysqli_error($link)); 
							mysqli_set_charset($link, 'utf8');
							$query ="SELECT id, name, used, price, link, type, manufname, color1, color2, color3, color4, longdescr, longused, userid, userqty FROM usercart WHERE userid = '$session'";

							$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
							if($result)
							{
							    
							    while ($row = mysqli_fetch_row($result)) {
							        if  (stristr(str_replace('/', '', stristr($row[7], '/')), '|', true) != ''){
							            echo "<input type='hidden' class='usersender__$row[0]_$row[8]' name='eitems[]' value='Назва товару: $row[1]/ Цiна: $row[3]/ Кiлькiсть: $row[14]/ Відтінок: " . stristr(str_replace('/', '', stristr($row[7], '/')), '|', true). " <br>'>";
							        }else{
							            echo "<input type='hidden' class='usersender__$row[0]_$row[8]' name='eitems[]' value='Назва товару: $row[1]/ Цiна: $row[3]/ Кiлькiсть: $row[14] <br>'>";
							        }
							    		
							    		echo "<input type='hidden' class='userqty__$row[0]_$row[8]' value='$row[14]'>";
							    	}
							    					     
							    mysqli_free_result($result);
							}
						?>
						<input type="checkValue" name="fullName" style="opacity: 0;" value="OneClick">
	                    <p class="cart__form_text">
							Імя
						</p>
						<input type="lastname" name="ulname"  class="cart__form_imput cart__form_lname" required>
						<p class="cart__form_text">
							Номер телефона
						</p>
						<input type="tel" name="utel" class="cart__form_imput cart__form_tel" id="phone" required>
						<button type="submit" class="cart__form_second_next cart__form_second_action cart__form_btn">
							Оформити замовлення
						</button>
						<a href="cart.php" class="cart__form_back cart__form_btn">
        					Повернутися
        				</a>
	                </form>
	            </div>
	        </div>
	    </div>
	</section>
	<section class="popular cart__populars" id="popular cart__populars">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<h2 class="subtitle cart__popular_subtitle text-md-left text-center">
						Рекомендовані товари
					</h2>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-8 col-12">
					<div class="item__slick_cart d-flex">
						<?php
							require_once 'connector.php'; // подключаем скрипт
							 
							$link = mysqli_connect($host, $user, $password, $database) 
							    or die("Ошибка " . mysqli_error($link)); 
							mysqli_set_charset($link, 'utf8');
							$query ="SELECT id, name, used, price, link, type, color1, color2, manufname, noStock FROM items WHERE noStock ='popular'";

							$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
							if($result) 
							{
							    
							    while ($row = mysqli_fetch_row($result)) {
							    	echo "<div class='item__slick_item' id='$row[0]'>";
							    	echo "<form method='POST' action='description.php' class='openDesc popular__item popular__item_cart text-center'>";
							    	if ($_SESSION['name'] == 'Tomash') {
							    		echo "<form method='POST' action='removefrom.php' class='deleteform'><input type='hidden' name='id' value='$row[0]' /><input type='submit' class='material__delete' value='X'><input type='hidden' name='deleteimg' value='$row[4]' /></form>";
							    	}
								    echo "<input type='hidden' name='toDoId' value='$row[0]'>";
    							    echo "<input type='hidden' name='toDoSite' value='../cart.php'>";
    							    echo "<input type='hidden' name='forCrubs' value='Популярне'>";
								    echo "<div class='popular__item_first' id='$row[0]'><input type='hidden' value='popular' ><img src='$row[4]' alt='Популярне' class='popular__img cart__popular_img'>";
								    echo "<h3 class='popular__manuf cart__popular_manuf'>$row[8]</h3>";
								    echo "<h3 class='popular__name cart__popular_name'>$row[1]</h3>";
							        echo "<h4 class='popular__used cart__popular_used'>$row[2]</h4>";
							        echo "<p class='popular__price cart__popular_price'>$row[3] <span class='popular__currency cart__poplar_currency'>грн.</span></p></form>";
							        echo "<form method='POST' action='tocart.php'>";
							        echo "<form method='POST' action='tocart.php'>";
							        echo "<input type='hidden' name='whenBtn' value='oneClick'>";
							        echo "<input type='hidden' name='toDoSite' value='../cart.php'>";
    						        echo "<input type='hidden' name='useritem' value='$row[0]' />";
                    		        $userColor = str_replace('/', '', stristr($row[7], '/'));
                    		        echo "<input type='hidden' name='userqty' value='1' />";
                		            echo "<input type='hidden' name='frompage' value='cart' />";
                    		        
                    		        echo "<input type='hidden' name='usercolor' value='" . $userColor . "' id='$row[0]' />";
                    		        echo "<input type='hidden' name='usercolorHex' value='" . stristr($row[7], '/', true) . "' id='$row[0]' />";
                    		        echo "<input type='hidden'  name='userLinks' value='" . $row[4] . "' id='$row[0]' />";
							        echo "<button class='popular__btn cart__popular_btn'>Купити</button></form>";
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
	</section>
	<section class="cartbouns cartbouns__cart d-md-block d-none" id="cartbonus">
		<div class="container">
			<div class="row">
				<div class="col-8">
					<div class="cart__bonus d-flex align-items-center">
						<i class="fas fa-exclamation cart__bonus_icon"></i>
						<p class="cart__bonus_text">
							Замовте ще на  <span class="cart__bonus_sum cart__bonus_sum1">350</span> грн і отримайте подарунок :)
						</p>
					</div>
					<div class="cart__free d-flex align-items-center">
						<i class="fas fa-exclamation cart__bonus_icon"></i>
						<p class="cart__bonus_text">
							Замовте ще на <span class="cart__bonus_sum cart__bonus_sum2">500</span> грн і отримайте безкоштовну доставку ;)
						</p>
					</div>
				</div>
				<div class="col-4 m-lg-auto mt-md-auto">
				    <button class="cart__bonus_btn cart__onebtn">
						Купити в 1 клік
					</button>
					<button class="cart__bonus_btn">
						Перейти до оформлення
					</button>
				</div>
			</div>
		</div>
	</section>
	<section class="cartdelivery d-none" id="cartdelivery">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<h2 class="subtitle subtitle__firts text-md-left text-center">
						Адреса доставки
					</h2>
					<h2 class="subtitle subtitle__second text-md-left text-center d-none">
						Оберіть спосіб оплати
					</h2>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-8 col-md-7 col-12">
					<form method="POST" action="send.php" class="cart__form" id="cart__form">
						<p class="cart__form_text">
							Адреса електроної пошти
						</p>
						<input type="email" name="uemail" class="cart__form_imput cart__form_email" required>
						<p class="cart__form_text">
							Імя
						</p>
						<input type="lastname" name="ulname"  class="cart__form_imput cart__form_lname" required>
						<p class="cart__form_text">
							Прізвище
						</p>
						<input type="firtsname" name="ufname" class="cart__form_imput cart__form_fname" required>
						<p class="cart__form_text">
							Місто
						</p>
						<input type="city" name="ucity" class="cart__form_imput cart__form_city" required>
						<p class="cart__form_text">
							Відділення нової пошти
						</p>
						<input type="delyvery" name="udelyvery" class="cart__form_imput cart__form_delivery" required>
						<p class="cart__form_text">
							Номер телефона
						</p>
						<input type="tel" name="utel" class="cart__form_imput cart__form_tel" id="phone">
						<input type="radio" class="cart__form_radio cart__form_radio1" id="cart__form_radio1"  name="submited" value='Нi'>
						<label for="cart__form_radio1" class="radio__label radio__label_firts" value='Нi'>
							Не телефонувати для підтвердження замовлення
						</label>
						<?php
							require_once 'connector.php'; // подключаем скрипт
							 
							$link = mysqli_connect($host, $user, $password, $database) 
							    or die("Ошибка " . mysqli_error($link)); 
						    mysqli_set_charset($link, 'utf8'); 
							$query ="SELECT id, name, used, price, link, type, manufname, color1, color2, color3, color4, longdescr, longused, userid, userqty FROM usercart WHERE userid = '$session'";

							$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
							if($result)
							{
							    
							    while ($row = mysqli_fetch_row($result)) {
							        if  (stristr(str_replace('/', '', stristr($row[7], '/')), '|', true) != ''){
							            echo "<input type='hidden' class='usersender__$row[0]_$row[8]' name='eitems[]' value='Назва товару: $row[1]/ Цiна: $row[3]/ Кiлькiсть: $row[14]/ Відтінок: " . stristr(str_replace('/', '', stristr($row[7], '/')), '|', true). " <br>'>";
							        }else{
							            echo "<input type='hidden' class='usersender__$row[0]_$row[8]' name='eitems[]' value='Назва товару: $row[1]/ Цiна: $row[3]/ Кiлькiсть: $row[14] <br>'>";
							        }
							    		
							    		echo "<input type='hidden' class='userqty__$row[0]_$row[8]' value='$row[14]'>";
							    	}
							    					     
							    mysqli_free_result($result);
							}
						?>
						
						<div class="form__radio d-none">
							<div class="form__radio_items">
								<input type="radio" class="cart__form_radio cart__form_dev" id="cart__form_dev" name="radio-group" value='Накладений платіж'>
								<label for="cart__form_dev" class="radio__label" value='Накладений платіж'>
									Накладений платіж
									<p class="cart__form_text-desc">
										Оплата при отриманні, комісія за грошовий переказ за тарифами Нової пошти
									</p>
								</label>
							</div>
							<div class="form__radio_second">
								<input type="radio" class="cart__form_radio cart__form_cart" id="cart__form_cart" name="radio-group" value='Оплата карткою'>
								<label for="cart__form_cart" class="radio__label" value='Оплата карткою'>
									Оплата карткою
									<p class="cart__form_text-desc cart__form_text-descsec">
										Отримати реквізити для переказу коштів
									</p>
								</label>
							</div>
						</div>
						<div class="cart__form_second_actions cart__form_action_second d-none justify-content-between flex-md-row flex-column">
							<button type="button" class="cart__form_second_back cart__form_second_action cart__form_btn">
								Повернутися
							</button>
							<button type="submit" class="cart__form_second_next cart__form_second_action cart__form_btn">
								Оформити замовлення
							</button>
						</div>
					</form>
				</div>
				<div class="col-md-5 col-12">
					<div class="cart__sum_items-tablet d-lg-none d-md-flex flex-column">
						<div class="cart__sum_firts d-flex justify-content-between flex-lg-nowrap flex-md-wrap">
							<div class="cart__sum_text-titles">
								<p class="cart__sum_text d-lg-block d-none">
									Разом
								</p>
								<p class="cart__sum_text-item">
									Сумма замовлення
								</p>
							</div>
							<div class="cart__sum_sum-price d-flex justify-content-end align-items-end">
								<p class="cart__allsum">
									190,00 
								</p>
								<span class="cart__sum_sum-currency"> грн</span>
							</div>
						</div>
						<div class="cartdelivery__sum_text-desc d-none d-md-none">
							<div class="cartdelivery__sum_text_block d-flex">
								<span class="cartdelivery__sum_text_decs cartdelivery__sum_text_plus">+</span> 
								<p class="cartdelivery__sum_text_decs">
									Комісія за накладний платіж за тарифами Нової пошти 
								</p>
							</div>
							<div class="cartdelivery__sum_text_block d-flex">
								<span class="cartdelivery__sum_text_decs cartdelivery__sum_text_plus">+</span>
								<p class="cartdelivery__sum_text_decs">
									 Доставка за тарифами Нової пошти
								</p>
							</div>
						</div>
						<div class="cartdelivery__user d-none">
							<p class="cartdelivery__user_title">
								Адреса отримувача
							</p>
							<p class="cartdelivery__user_text cartdelivery__user_name">
								
							</p>
							<p class="cartdelivery__user_text cartdelivery__user_adress">
								
							</p>
							<p class="cartdelivery__user_text cartdelivery__user_np">
								
							</p>
							<p class="cartdelivery__user_text cartdelivery__user_tel">
								
							</p>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-12">
					<div class="cart__form_action d-flex justify-content-between">
						<a href="cart.php" class="cart__form_back cart__form_btn">
							Повернутися
						</a>
						<button class="cart__form_next cart__form_btn">
							Далі
						</button>
					</div>
					
				</div>
			</div>
		</div>
	</section>
	<?php include 'footer-index.php'; ?>