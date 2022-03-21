	<footer class="footer" id="footer">
		<div class="container footer__container">
			<div class="row">
				<div class="col-lg-10 col-md-7 col-7">
					<nav class="footer__nav" id="footer__nav">
						<ul class="footer__nav_menu d-flex flex-lg-nowrap flex-md-row flex-column flex-wrap">
							<li class="footer__nav_item">
								<a href="index.php" class="footer__nav_link">
									Головна
								</a>
							</li>
							<li class="footer__nav_item">
								<a href="makeupface.php" class="footer__nav_link">
									Макіяж
								</a>
							</li>
							<li class="footer__nav_item">
								<a href="face.php" class="footer__nav_link">
									Догляд за обличчям
								</a>
							</li>
							<li class="footer__nav_item">
								<a href="hair.php" class="footer__nav_link">
									Догляд за волоссям
								</a>
							</li>
							<li class="footer__nav_item">
								<a href="body.php" class="footer__nav_link">
									Догляд за тілом
								</a>
							</li>
							<li class="footer__nav_item">
								<a href="giftset.php" class="footer__nav_link">
									Подарункові набори
								</a>
							</li>
						</ul>
					</nav>
				</div>
				<div class="col-lg-2 col-5 text-right">
					<div class="footer__tel_block d-flex justify-content-end">	
						<a href="tel:+380501405023" class="footer__tel">
						    <i class="fas fa-phone footer__tel_icon"></i>
							+380 50 140 50 23
						</a>
					</div>
					<div class="footer__icons d-flex justify-content-end">
						<a href="#" class="footer__link">
							<i class="fab fa-whatsapp footer__icon"></i>
						</a>
						<a href="#" class="footer__link">
							<i class="fab fa-instagram footer__icon"></i>
						</a>
						<a href="#" class="footer__link">
							<i class="fab fa-facebook-messenger footer__icon"></i>
						</a>
						<a href="#" class="footer__link">
							<i class="fab fa-facebook footer__icon footer__icon_last"></i>
						</a>
					</div>
				</div>
			</div>
		</div>
	</footer>
	<script type="text/javascript" src="../js/jquery-3.6.0.min.js"></script>
	<script type="text/javascript" src="../js/jquery.scrolla.min.js"></script>
	<script type="text/javascript" src="../js/jquery.maskedinput.min.js"></script>
	<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
			AOS.init({
	        	disable: false, // accepts following values: 'phone', 'tablet', 'mobile', boolean, expression or function
              startEvent: 'DOMContentLoaded', // name of the event dispatched on the document, that AOS should initialize on
              initClassName: 'aos-init', // class applied after initialization
              animatedClassName: 'aos-animate', // class applied on animation
              useClassNames: false, // if true, will add content of `data-aos` as classes on scroll
              disableMutationObserver: false, // disables automatic mutations' detections (advanced)
              debounceDelay: 50, // the delay on debounce used while resizing window (advanced)
              throttleDelay: 99, // the delay on throttle used while scrolling the page (advanced)
              
            
              // Settings that can be overridden on per-element basis, by `data-aos-*` attributes:
              offset: 120, // offset (in px) from the original trigger point
              delay: 0, // values from 0 to 3000, with step 50ms
              duration: 400, // values from 0 to 3000, with step 50ms
              easing: 'ease', // default easing for AOS animations
              once: false, // whether animation should happen only once - while scrolling down
              mirror: false, // whether elements should animate out while scrolling past them
              anchorPlacement: 'top-bottom', // defines which position of the element regarding to window should trigger the animation

			});
    </script>
	<script type="text/javascript" src="../js/slick.min.js"></script>
	<script src="https://kit.fontawesome.com/eac70106db.js" crossorigin="anonymous"></script>
	<script type="text/javascript" src="../js/main.js"></script>
</body>
</html>