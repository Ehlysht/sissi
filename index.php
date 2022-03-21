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
	<title>Sissi Beauty Shop</title>
	<meta name="Description" content="Мазазин якісної косметики та товарів для догляду за тілом в Україні"> 
	<meta name="keywords" content="интернет-магазин, засоби по доглядом за тілом, купити, замовити, доставляємо по Україні, косметика, акції, відомі бренди, Kiko Milano, HASK, Rolanjona, pudra, косметика KIKO Milano Украина, косметика кико, косметика kiko,  косметика kiko Украина, косметика kiko киев,">
	<meta name="robots" content="all">
	<meta name="google-site-verification" content="3mc8TVExi15Tb1z3wPLQtHyFBS0xeAS5-nVJ713nrjI" />
</head>
<?php include 'header.php'; 
    $pagename = 'index';
    echo "<p class='opened__items d-none'></p>";
?>
	<!--<div class="loaderArea d-none d-md-block loaderArea-index">
		<div class="loader">
			<img src="img/25.gif" alt="">
		</div>
	</div>-->
	<section class="exposed d-none" id="exposed">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="exposed__images d-flex">
						<div class="arrow arrow__left" id="1">
							<img src="img/arrowl.png" alt="arrow" class="arrow__img">
						</div>
						<?php
							require_once 'connector.php'; // подключаем скрипт
							 
							$link = mysqli_connect($host, $user, $password, $database) 
							    or die("Ошибка " . mysqli_error($link)); 
							     
							$query ="SELECT imgId, imgName, imgLink FROM bgimages";

							$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
							if($result)
							{
							    
							    while ($row = mysqli_fetch_row($result)) {
							        if  ($row[0] == 1 or $row[0] == 3 or $row[0] == 5){
            						    echo "<img src='$row[2]' alt='Backgroud Images' class='exposed__img exposed__img_$row[0]'>";
							        }
							    }
							    					     
							    mysqli_free_result($result);
							}
						?>
						<div class="arrow arrow__right" id="1">
							<img src="img/arrowr.png" alt="arrow" class="arrow__img arrow__img_right">
						</div>
					</div>
					<div class="dots">
						<span class="dots__point dots__point_1 active-dots" id="1"></span>
						<span class="dots__point dots__point_2" id="2"></span>
						<span class="dots__point dots__point_3" id="3"></span>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="exposed__mobile d-none" id="exposed__mobile">
		<div class="comtainer">
			<div class="exposed__images_mobile">
			    <?php
					require_once 'connector.php'; //  подключаем скрипт
					 
					$link = mysqli_connect($host, $user, $password, $database) 
					    or die("Ошибка " . mysqli_error($link)); 
					     
					$query ="SELECT imgId, imgName, imgLink FROM bgimages";

					$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
					if($result)
					{
					    
					    while ($row = mysqli_fetch_row($result)) {
					        if  ($row[0] == 2 or $row[0] == 4 or $row[0] == 6){
					            echo "<img src='$row[2]' alt='Backgroud Images' class='exposed__img_mobile'>";
					        }
					    }
					    					     
					    mysqli_free_result($result);
					}
				?>
			</div>
		</div>
	</section>
	<section class="populars" id="populars">
		<?php include 'popular.php'; ?>
	</section>
	<section class="secondmenu">
	    <div class="container">
	        <div class="row">
	            <div class="col-12">
	                <ul class="secondmenu__list">
	                    <li class="secondmenu__item">
	                        <a href="makeupeyes.php" class="secondmenu__link">
	                            <img src="img/makeup__eyes.png" alt="Популярне" class="secondmenu__img">
	                            <p class="secondmenu__text">
	                                Очі
	                            </p>
	                        </a>
	                    </li>
	                    <li class="secondmenu__item">
	                        <a href="makeuplips.php" class="secondmenu__link">
	                            <img src="img/makeup__lips.png" alt="Популярне" class="secondmenu__img">
	                            <p class="secondmenu__text">
	                                Губи
	                            </p>
	                        </a>
	                    </li>
	                    <li class="secondmenu__item" style="margin-right: 16px;">
	                        <a href="makeupface.php" class="secondmenu__link">
	                            <img src="img/makeup__face.png" alt="Популярне" class="secondmenu__img">
	                            <p class="secondmenu__text">
	                                Обличчя
	                            </p>
	                        </a>
	                    </li>
	                    <li class="secondmenu__item">
	                        <a href="face.php" class="secondmenu__link">
	                            <img src="img/face.png" alt="Популярне" class="secondmenu__img">
	                            <p class="secondmenu__text">
	                                Догляд обличчя
	                            </p>
	                        </a>
	                    </li>
	                    <li class="secondmenu__item">
	                        <a href="hair.php" class="secondmenu__link">
	                            <img src="img/hair.png" alt="Популярне" class="secondmenu__img">
	                            <p class="secondmenu__text">
	                                Догляд волосся
	                            </p>
	                        </a>
	                    </li>
	                    <li class="secondmenu__item" style="margin-right: 9px;">
	                        <a href="body.php" class="secondmenu__link">
	                            <img src="img/body.png" alt="Популярне" class="secondmenu__img">
	                            <p class="secondmenu__text">
	                                Догляд тіло
	                            </p>
	                        </a>
	                    </li>
	                    <li class="secondmenu__item secondmenu__item_last">
	                        <a href="giftset.php" class="secondmenu__link">
	                            <img src="img/giftset.png" alt="Популярне" class="secondmenu__img">
	                            <p class="secondmenu__text" style="width: 165px;">
	                                Подарункові набори
	                            </p>
	                        </a>
	                    </li>
	                </ul>
	            </div>
	        </div>
	        <div class="row">
    	        <div class="col-12">
        	        <div class="secondmenu__black">
        	        </div>
    	        </div>
	        </div>
	    </div>
	</section>
	<section class="insta" id="insta">
	    <div class="container">
	        <div class="row">
    	        <div class="col-12">
    	            <div class="titlelines insta__lines">
    				    <div class="titleline insta__line insta__lineleft aos-init" data-aos="fade-right"></div>
    					<img src="img/inst.jpg" alt="instagram" class="insta__img">
            		    <div class="titleline insta__line insta__lineright aos-init" data-aos="fade-left"></div>
            		</div>
    	        </div>
	        </div>
	        <div class="row">
    	        <div class="col-12">
    	            <div class="insta__slick">
    	                <div class="insta__items">
            	            <a href="https://www.instagram.com/p/COAHPPDDbj4/?igshid=1q3gwqxrq2jfu" target="_blank">
            	                <img src="img/insta1.jpg" alt="instagram" class="insta__items_img">
            	                <div class="insta__items_desc d-flex align-items-end">
                	                <p class="insta__items_text">
                	                    Хайлайтер KIKO HOLIDAY GEMS - ідеа...
                	                </p>
                	                <a href="https://www.instagram.com/p/COAHPPDDbj4/?igshid=1q3gwqxrq2jfu" class="insta__items_link" target="_blank">Далі></a>
            	                </div>
            	            </a>
        	            </div>
        	            <div class="insta__items">
            	            <a href="https://www.instagram.com/p/CJ5XcW0Dmmj/?igshid=1vjis4kaegzv6" target="_blank">
            	                <img src="img/insta2.jpg" alt="instagram" class="insta__items_img">
            	                <div class="insta__items_desc d-flex align-items-end">
                	                <p class="insta__items_text">
                	                    Коли так хочеться ніжного рожевого...
            	                    </p>
                	                <a href="https://www.instagram.com/p/CJ5XcW0Dmmj/?igshid=1vjis4kaegzv6" class="insta__items_link" target="_blank">Далі></a>
            	                </div>
            	            </a>
        	            </div>
        	            <div class="insta__items">
            	            <a href="https://www.instagram.com/p/CKYhdrDjAAm/?igshid=a49fbv7pvsic" target="_blank">
            	                <img src="img/insta3.jpg" alt="instagram" class="insta__items_img">
            	                <div class="insta__items_desc d-flex align-items-end">
                	                <p class="insta__items_text">
                	                    Останім часом багато розмов про в...
            	                    </p>
                	                <a href="https://www.instagram.com/p/CKYhdrDjAAm/?igshid=a49fbv7pvsic" class="insta__items_link" target="_blank">Далі></a>
            	                </div>
            	            </a>
        	            </div>
        	            <div class="insta__items">
            	            <a href="https://www.instagram.com/p/CLYlK90jfdV/?igshid=1etdgytlpeqle" target="_blank">
            	                <img src="img/insta4.jpg" alt="instagram" class="insta__items_img">
            	                <div class="insta__items_desc d-flex align-items-end">
                	                <p class="insta__items_text">
                	                    Тональний крем LOST IN AMALFI від KIKO ...
                	                </p>
                	                <a href="https://www.instagram.com/p/CLYlK90jfdV/?igshid=1etdgytlpeqle" class="insta__items_link" target="_blank">Далі</a>
            	                </div>
            	            </a>
        	            </div>
        	            <div class="insta__items">
            	            <a href="https://www.instagram.com/p/CLqoCt9Dn_z/?igshid=drddyhiht168" target="_blank">
            	                <img src="img/insta5.jpg" alt="instagram" class="insta__items_img">
            	                <div class="insta__items_desc d-flex align-items-end">
                	                <p class="insta__items_text">Як прокинутися зранку якщо кава...</p>
                	                <a href="https://www.instagram.com/p/CLqoCt9Dn_z/?igshid=drddyhiht168" class="insta__items_link" target="_blank">Далі></a>
            	                </div>
            	            </a>
        	            </div>
        	            <div class="insta__items">
            	            <a href="https://www.instagram.com/p/CJsgtqvjSFz/?igshid=124250zfybyqc" target="_blank">
            	                <img src="img/insta6.jpg" alt="instagram" class="insta__items_img">
            	                <div class="insta__items_desc d-flex align-items-end">
                	                <p class="insta__items_text">
                	                    Зволожуючі кремчики для рук з ароматом...
            	                    </p>
                	                <a href="https://www.instagram.com/p/CJsgtqvjSFz/?igshid=124250zfybyqc" class="insta__items_link" target="_blank">Далі></a>
            	                </div>
            	            </a>
        	            </div>
        	            <div class="insta__items">
            	            <a href="https://www.instagram.com/p/CJ5VocEjw9t/?igshid=yhedpp2ggup2" target="_blank">
            	                <img src="img/insta7.jpg" alt="instagram" class="insta__items_img">
            	                <div class="insta__items_desc d-flex align-items-end">
                	                <p class="insta__items_text">
                	                    Новенькі гелі для душу...
                	                </p>
                	                <a href="https://www.instagram.com/p/CJ5VocEjw9t/?igshid=yhedpp2ggup2" class="insta__items_link" target="_blank">Далі></a>
            	                </div>
            	            </a>
        	            </div>
        	            <div class="insta__items">
            	            <a href="https://www.instagram.com/p/CMO8ffFAE5J/" target="_blank">
            	                <img src="img/insta8.jpg" alt="instagram" class="insta__items_img">
            	                <div class="insta__items_desc d-flex align-items-end">
                	                <p class="insta__items_text">
                	                   KIKO Smart Eyeshadow Palette...
                	                </p>
                	                <a href="https://www.instagram.com/p/CMO8ffFAE5J/" class="insta__items_link" target="_blank">Далі></a>
            	                </div>
            	            </a>
        	            </div>
        	        </div>
    	        </div>
	        </div>
	    </div>
	</section>
	<section class="highlights" id="highlights">
	    <div class="container container-highlights">
	        <div class="row">
	            <div class="col-12">
	                <div class="titlelines subtitle__highlights text-center">
    				    <div class="titleline subtitle__highlights_line subtitle__lineleft_highlights aos-init" data-aos="fade-right"></div>
    					<h2 class="subtitle subtitle__mobile subtitle__mobile_highlights">
                			Highlights
                		</h2>
            		    <div class="titleline subtitle__highlights_line subtitle__lineright_highlights aos-init" data-aos="fade-left"></div>
            		</div>
	            </div>
	            <div class="col-12">
	                <div class="highlights__lists">
    	                <form method="POST" action="content/highlights.php" class="subForm highlights__list highlights1__list">
    	                    <img src="img/highlights1.jpg" alt="highlights" class="highlights__img">
    	                    <p class="highlights__text">
    	                        Маска для обличча: як її обрати?
    	                    </p>
    	                    <input type="hidden" name="who" value="highlights1">
    	                    <input type="hidden" name="where" value="highlights">
    	                </form>
    	                <form method="POST" action="content/highlights.php" class="subForm highlights__list highlights2__list">
    	                    <img src="img/highlights3.png" alt="highlights" class="highlights__img">
    	                    <p class="highlights__text highlights__text_hair">
    	                        Що заважає відростити довгу косу?
    	                    </p>
    	                    <input type="hidden" name="who" value="highlights2">
    	                    <input type="hidden" name="where" value="highlights">
    	                </form>
    	                <form method="POST" action="content/highlights.php" class="subForm highlights__list highlights3__list">
    	                    <img src="img/highlights2.png" alt="highlights" class="highlights__img">
    	                    <p class="highlights__text">
    	                        Макіяж за 10 хвилин? Легко!
    	                    </p>
    	                    <input type="hidden" name="who" value="highlights3">
    	                    <input type="hidden" name="where" value="highlights">
    	                </form>
	                </div>
	            </div>
	        </div>
	    </div>
	</section>
	<section class="history" id="history">
	    <div class="container container-history">
	        <div class="row">
	            <div class="col-12">
	                <div class="titlelines subtitle__history text-center">
    				    <div class="titleline subtitle__history_line subtitle__lineleft_history aos-init" data-aos="fade-right"></div>
    					<h2 class="subtitle subtitle__mobile subtitle__mobile_history">
                			Пропонуємо косметику світових брендів
                		</h2>
            		    <div class="titleline subtitle__history_line subtitle__lineright_history aos-init" data-aos="fade-left"></div>
            		</div>
	            </div>
	        </div>
	        <div class="row">
	            <div class="col-12">
	                <div class="history__slick">
    	                <form method="POST" action="content/brand.php" class="subForm history__items history__items_first" id="Kiko_Milano">
    	                    <div class="history__desc">
    	                        <div class="history__desc_blur aos-init" data-aos="fade-down" data-aos-delay="700"></div>
    	                        <p class="history__brand aos-init" data-aos="fade-right" data-aos-delay="300">
    	                            Kiko Milano
    	                        </p>
    	                        <p class="history__text aos-init" data-aos="fade-left" data-aos-delay="500">
    	                            Італійський бренд косметики, що використовує найсучасніші технології для задоволення потреб з макіяжу
    	                        </p>
    	                    </div>
    	                    <input type="hidden" name="who" value="Kiko_Milano">
    	                    <input type="hidden" name="where" value="history">
    	                    <img src="img/brand1.jpg" alt="brand" class="history__img aos-init" data-aos="zoom-in" data-aos-delay="100">
    	                </form>
    	                <form method="POST" action="content/brand.php" class="subForm history__items history__items_second" id="hask">
    	                    <div class="history__items_other"></div>
    	                    <div class="history__desc">
    	                        <div class="history__desc_blur aos-init" data-aos="fade-down" data-aos-delay="700"></div>
    	                        <p class="history__brand aos-init" data-aos="fade-right" data-aos-delay="300">
    	                            HASK
    	                        </p>
    	                        <p class="history__text aos-init" data-aos="fade-left" data-aos-delay="500">
    	                            Органічна косметика, родом із США, це - високоякісний догляд за волоссям
    	                        </p>
    	                    </div>
    	                    <input type="hidden" name="who" value="hask">
    	                    <input type="hidden" name="where" value="history">
    	                    <img src="img/brand2.jpg" alt="brand" class="history__img aos-init" data-aos="zoom-in" data-aos-delay="100">
    	                </form>
    	                <form method="POST" action="content/brand.php" class="subForm history__items history__items_last" id="rolanjona">
    	                    <div class="history__desc">
    	                        <div class="history__desc_blur aos-init" data-aos="fade-down" data-aos-delay="700"></div>
    	                        <p class="history__brand aos-init" data-aos="fade-right" data-aos-delay="300">
    	                            Rolanjona
    	                        </p>
    	                        <p class="history__text history__text_long aos-init" data-aos="fade-left" data-aos-delay="500">
    	                            Ційний бренд органічної косметики з Китаю. Засоби цього бренду підкорили серця прихильників косметики з Азії, завдяки своїм неймовірно низьким цінам та перевіреній високій ефективності.
    	                        </p>
    	                    </div>
    	                    <input type="hidden" name="who" value="rolanjona">
    	                    <input type="hidden" name="where" value="history">
    	                    <img src="img/brand4.jpg" alt="brand" class="history__img aos-init" data-aos="zoom-in" data-aos-delay="100">
    	                </form>
    	           </div>
	            </div>
	        </div>
	    </div>
	</section>
	<section class="consultation" id="consultation">
	    <div class="container">
	        <div class="row">
	            <div class="col-12">
	                <div class="titlelines subtitle__consultation text-center">
    	                <div class="titleline subtitle__consultation_line subtitle__lineleft_consultation aos-init" data-aos="fade-right"></div>
        					<h2 class="subtitle subtitle__mobile subtitle__mobile_consultation">
                    			Консультація
                    		</h2>
            		    <div class="titleline subtitle__consultation_line subtitle__lineright_consultation aos-init" data-aos="fade-left"></div>
        		    </div>
	            </div>
	            <div class="col-md-4 col-12 d-flex align-items-center">
	                <p class="consultation__help">
	                    Можливість онлайн консультації або персональної зустрічі в <a href="#" class="consultation__help_link"><em>Sissi Salon</em></a> : м.Ужгород з підбором косметики та засобів
	                </p>
	            </div>
	            <div class="col-md-8 col-12">
	                <div class="consultation__slick">
	                    <img src="img/cons1.png" alt="SissiSalon" class="consultation__img">
	                    <img src="img/cons2.png" alt="SissiSalon" class="consultation__img">
	                    <img src="img/cons3.png" alt="SissiSalon" class="consultation__img">
	                    <img src="img/cons4.png" alt="SissiSalon" class="consultation__img">
	                    <img src="img/cons5.png" alt="SissiSalon" class="consultation__img">
	                </div>
	            </div>
	        </div>
	    </div>
	</section>
	<section class="maps" id="maps">
	    <div class="container">
	        <div class="row">
	            <div class="col-12">
	                <div class="titlelines subtitle__maps text-center">
    	                <div class="titleline subtitle__maps_line subtitle__lineleft_maps aos-init" data-aos="fade-right"></div>
        					<h2 class="subtitle subtitle__mobile subtitle__mobile_maps">
                    			Наша адреса
                    		</h2>
            		    <div class="titleline subtitle__maps_line subtitle__lineright_maps aos-init" data-aos="fade-left"></div>
        		    </div>
	            </div>
	            <div class="col-md-9 col-12">
	                <div class="maps__google">
	                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d396.3575976237239!2d22.301913780368867!3d48.625039421702446!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x473919b6e581d2c1%3A0x6fb25e81eb81bc32!2z0YPQuy4g0KTQtdC00LjQvdGG0LAsIDMyLCDQo9C20LPQvtGA0L7QtCwg0JfQsNC60LDRgNC_0LDRgtGB0LrQsNGPINC-0LHQu9Cw0YHRgtGMLCA4ODAwMA!5e0!3m2!1sru!2sua!4v1616705744835!5m2!1sru!2sua" width="100%" style="border:0;" allowfullscreen="" loading="lazy" class="maps__google"></iframe>
                    </div>
	            </div>
	            <div class="col-md-3 col-12">
	                <div class="maps__adress">
	                    <div class="maps__adress_texts">
	                        <p class="maps__adress_text">
	                            Нас можно знайти за адресою:
	                        </p>
	                        <p class="maps__adress_text">
	                            м.Ужгород, вул.Фединця,32/2
	                        </p>
	                        <p class="maps__adress_text maps__adress_text_second">
	                            Не можете знайти нас?
	                        </p>
	                        <a href="tel:+380501405023" class="maps__adress_text">
	                            <i class="fas fa-phone maps__tel_icon"></i>
	                            +38 050 140 50 23
	                        </a>
	                    </div>
	                    <img src="img/callbackimg.png" alt="background" class="maps__adress_img d-md-block d-none">
	                </div>
	            </div>
	        </div>
	    </div>
	</section>
<?php include 'footer-index.php'; ?>