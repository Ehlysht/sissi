	<section class="popular" id="popular">
		<div class="container">
			<div class="row">
				<div class="col-12 text-center">
					<div class="titlelines subtitle__line_popular">
    				    <div class="titleline subtitle__line_pop subtitle__lineleft_pop aos-init" data-aos="fade-right"></div>
    					<h2 class="subtitle subtitle__mobile subtitle__mobile_pop">
                			Популярне
                		</h2>
            		    <div class="titleline subtitle__line_pop subtitle__lineright_pop aos-init" data-aos="fade-left"></div>
            		    <img src="img/popimage.png" alt="Популярне" class="popular__first_img d-md-none d-block">
            		</div>
				</div>
			</div>
			<div class="row">
				<div class="col-12 item__slick_colmobile">
					<div class="item__slick">
					<?php
					session_start();
						require_once 'connector.php'; // подключаем скрипт
					    $session = $_SESSION['name'];
						$link = mysqli_connect($host, $user, $password, $database) 
						    or die("Ошибка " . mysqli_error($link)); 
						mysqli_set_charset($link, 'utf8');
						$query ="SELECT id, name, used, price, link, type, manufname, color1, noStock FROM items";
		 
						$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
						if($result)
						{
						    
						    while ($row = mysqli_fetch_row($result)) {
						        if ($row[8] == 'popular'){
    						    	echo "<div class='item__slick_item item__slick_item-mobile'>";
    						    	echo "<form method='POST' action='description.php' class='openDesc popular__item text-center' id='$row[0]'>";
    						    	if ($_SESSION['name'] == 'Tomash') {
    						    		echo "<form method='POST' action='removefrom.php' class='deleteform'><input type='hidden' name='popular' value='popular'><input type='hidden' name='id' value='$row[0]' /><input type='submit' class='material__delete' value='X'><input type='hidden' name='deleteimg' value='$row[4]' /></form>";
    						    	}
    							    echo "<input type='hidden' name='toDoId' value='$row[0]'>";
    							    echo "<input type='hidden' name='toDoSite' value='../index.php'>";
    							    echo "<input type='hidden' name='forCrubs' value='Популярне'>";
    							    echo "<div class='popular__item_first' id='$row[0]'><input type='hidden' value='popular' ><img src='../$row[4]' alt='Популярне' class='popular__img popular__img_mobile'>";
    							    echo "<h3 class='popular__manuf'>$row[6]</h3>";
    							    echo "<h3 class='popular__name shortText'>$row[1]</h3>";
    						        echo "<h4 class='popular__used shortText'>$row[2]</h4>";
    						        echo "<p class='popular__price'>$row[3] <span class='popular__currency'>грн.</span></p></form>";
    						        echo "<form method='POST' action='tocart.php'>";
    						        echo "<input type='hidden' name='whenBtn' value='oneClick'>";
								        echo "<input type='hidden' name='toDoSite' value='../index.php'>";
    						        echo "<input type='hidden' name='useritem' value='$row[0]' />";
                    		        $userColor = str_replace('/', '', stristr($row[7], '/'));
                    		        echo "<input type='hidden' name='userqty' value='1' />";
                    		        
                    		        if ($pagename == 'makeup'){
                    		            echo "<input type='hidden' name='fromsubpage' value='$subpagename'/>";
                    		        }else{
                    		           echo "<input type='hidden' name='frompage' value='$pagename' />"; 
                    		        }
                    		        echo "<input type='hidden' name='usercolor' value='" . $userColor . "' id='$row[0]' />";
                    		        echo "<input type='hidden' name='usercolorHex' value='" . stristr($row[7], '/', true) . "' id='$row[0]' />";
                    		        echo "<input type='hidden'  name='userLinks' value='" . $row[4] . "' id='$row[0]' />";
    						        echo "<button class='popular__btn'>Купити</button></form>";
    						        
    						        
    						        $query1 = "SELECT EXISTS(SELECT * FROM usercart WHERE id LIKE $row[0] AND userid LIKE '$session' )";
                                	$result1 = mysqli_query($link, $query1) or die("Ошибка " . mysqli_error($link)); 
                                	 if($result1)
                                    {
                                    	while ($row1 = mysqli_fetch_row($result1)) {
                                    		$checker = $row1[0];
                                    	}
                                    }
                                    if ($checker == '1') {
    						            
                                    }else{
                                        
                                    }
    						        echo "</div>";
    					         	echo "</div>";
						        }
						    }
						    					     
						    mysqli_free_result($result);
						}
					?>
				</div>
			</div>
		</div>
	</section>
	