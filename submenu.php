
<section class="products" id="products">
		<div class="container">
			<div class="row">
				<div class="col-3 d-md-block d-none">
					<ul class="product__menu">
						<li class="product__item product__item_makeup" id="makeup">
							<a href="#" class="product__link">
								Макіяж<i class="fas fa-chevron-up product__link_icon" id="arrow__icon"></i>
							</a>
						</li>
						<ul class="poduct__menu_sub" id="makeup__face">
							<li class="poduct__menu_subitem poduct__menu_subitem-face" id="face">
								<a href="../makeupface.php" class="poduct__menu_sublink">
									обличчя
								</a>
							</li>
							<li class="poduct__menu_subitem poduct__menu_subitem-eyes" id="eyes">
								<a href="../makeupeyes.php" class="poduct__menu_sublink">
									очей
								</a>
							</li>
							<li class="poduct__menu_subitem poduct__menu_subitem-lips" id="lips">
								<a href="../makeuplips.php" class="poduct__menu_sublink">
									губ
								</a>
							</li>
						</ul>
						<li class="product__item product__item_face" id="face">
							<a href="../face.php" class="product__link">
								Догляд за обличчям
							</a>
						</li>
						<li class="product__item product__item_hair" id="hair">
							<a href="../hair.php" class="product__link">
								Догляд за волоссям
							</a>
						</li>
						<li class="product__item product__item_body" id="body">
							<a href="../body.php" class="product__link">
								Догляд за тілом
							</a>
						</li>
						<li class="product__item product__item_giftset" id="giftset">
							<a href="../giftset.php" class="product__link">
								Подарункові набори
							</a>
						</li>
						<li class="product__item product__brand" id="brand">
							<a href="#" class="product__link">
								Бренд<i class="fas fa-chevron-up product__link_icon" id="arrow__icon"></i>
							</a>
						</li>
						<ul class="poduct__menu_brand">
							<li class="poduct__menu_subitem">
							    <form method="POST" action="../content/brand.php">
    								<a href="#" class="poduct__menu_sublink" id="highlights1">
    									Kiko Milano
    								</a>
    								<input type="hidden" name="who" value="Kiko_Milano">
								</form>
							</li>
							<li class="poduct__menu_subitem">
							    <form method="POST" action="../content/brand.php">
    								<a href="#" class="poduct__menu_sublink" id="highlights2">
    									HASK
    								</a>
    								<input type="hidden" name="who" value="Hask">
								</form>
							</li>
							<li class="brand__menu_subitem">
							    <form method="POST" action="../content/brand.php">
    								<a href="#" class="brand__menu_sublink" id="highlights3">
    									Rolanjona
    								</a>
    								<input type="hidden" name="who" value="Rolanjona">
								</form>
							</li>
						</ul>
					</ul>
				</div>