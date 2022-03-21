
<body>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PSBPHGJ"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <div class="d-none d-md-block" id="load">
        <div>
            <img src="img/25.gif">
        </div>
    </div>

	<header class="header animate__animated  index-header" id="header">
		<div class="container">
		    <div class='text-center m-auto test__offset' style='width: 10px;'></div>
			<div class="row d-flex align-items-end align-md-items-start header__logo_block">
				<div class="col-2 d-md-none d-flex align-items-end">
					<i class="fas fa-bars menu__burger"></i>
					<i class="fas fa-times menu__closer d-none"></i>
				</div>
				<div class="col-md-11 col-8 text-center">
					<a href="../index.php" class="logo__link">
						<h1 class="logo__text">
						    Sissi Beauty Shop
						</h1>
						<p class="logo__text_sub">
						    cozy like at home
						</p>
					</a>
				</div>
				<div class="col-md-1 col-2 d-flex align-items-end justify-content-end ml-md-auto">
					<a href="../cart.php" class="gotocart">
						
							<?php
								$session = $_SESSION['name'];
								require_once 'connector.php'; // подключаем скрипт
								 
								$link = mysqli_connect($host, $user, $password, $database) 
								    or die("Ошибка " . mysqli_error($link)); 
								     
								$query ="SELECT id FROM usercart WHERE userid = '$session'";

								$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
								if($result)
								{
								    
								    while ($row = mysqli_fetch_row($result)) {
								    	echo "<span class='cart__couter_item'><span class='inCart'></span></span>";
								    }
								    					     
								    mysqli_free_result($result);
								}
							?>
						
						<i class="fas fa-shopping-basket cart__icon"></i>
					</a>
				</div>
			</div>
			<div class="row">
				<div class="col-12">
					<nav class="nav" id="nav">
						<ul class="nav__menu d-md-flex flex-md-row flex-column d-none" id="nav__menu">
						    <li class="nav__item nav__home d-md-none d-inline order-1" id="home">
								<a href="index.php" class="nav__link nav__link_home">
									Sissi
								</a>
							</li>
							<li class="nav__item nav__makeup order-2" id="makeup">
								<a href="#" class="nav__link">
									Макіяж
								</a>
							</li>
							<ul class="poduct__menu_header order-3 d-md-none" id="makeup__face">
								<li class="poduct__menu_subitem poduct__headermenu_subitem poduct__menu_subitem-face" id="face">
									<a href="../makeupface.php" class="poduct__menu_sublink poduct__headermenu_sublink">
										обличчя
									</a>
								</li>
								<li class="poduct__menu_subitem poduct__headermenu_subitem poduct__menu_subitem-eyes" id="eyes">
									<a href="../makeupeyes.php" class="poduct__menu_sublink poduct__headermenu_sublink">
										очі
									</a>
								</li>
								<li class="poduct__menu_subitem poduct__headermenu_subitem poduct__menu_subitem-lips" id="lips">
									<a href="../makeuplips.php" class="poduct__menu_sublink poduct__headermenu_sublink">
										губи
									</a>
								</li>
							</ul>
							<li class="nav__item nav__face order-md-4 order-4" id="face">
								<a href="../face.php" class="nav__link">
									Догляд за обличчям
								</a>
							</li>
							<li class="nav__item nav__hair order-md-5 order-5" id="hair">
								<a href="../hair.php" class="nav__link">
									Догляд за волоссям
								</a>
							</li>
							<li class="nav__item nav__body order-md-6 order-6" id="body">
								<a href="../body.php" class="nav__link">
									Догляд за тілом
								</a>
							</li>
							<li class="nav__item nav__giftset order-md-7 order-7" id="giftset">
								<a href="../giftset.php" class="nav__link">
									Подарункові набори
								</a>
							</li>
							<li class="nav__item nav__brand order-md-2 order-8" id="brand">
								<a href="#" class="nav__link">
									Бренд
								</a>
							</li>
							<ul class="brand__menu_header order-9 d-md-none">
								<li class="brand__menu_subitem poduct__headermenu_subitem">
								    <form method="POST" action="../content/brand.php">
    									<a href="#" class="brand__menu_sublink poduct__headermenu_sublink" id="highlights1">
    										Kiko Milano
    									</a>
    									<input type="hidden" name="who" value="Kiko_Milano">
								    </form>
								</li>
								<li class="brand__menu_subitem poduct__headermenu_subitem">
								    <form method="POST" action="../content/brand.php">
    									<a href="#" class="brand__menu_sublink poduct__headermenu_sublink" id="highlights2">
    										HASK
    									</a>
    									<input type="hidden" name="who" value="Hask">
								    </form>
								</li>
								<li class="brand__menu_subitem poduct__headermenu_subitem">
								    <form method="POST" action="../content/brand.php">
    									<a href="#" class="brand__menu_sublink poduct__headermenu_sublink" id="highlights3">
    										Rolanjona
    									</a>
        								<input type="hidden" name="who" value="Rolanjona">
    								</form>
								</li>
							</ul>
						</ul>
					</nav>
				</div>
			</div>
		</div>
	</header>