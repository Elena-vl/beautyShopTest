<?php
/**
 * Шаблон подвала (footer.php)
 * @package WordPress
 * @subpackage your-clean-template-3
 */
?>
	<footer id="footer-block">
		<div class="social">
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<div class="socials">
							<a href="#"><i class="fa fa-skype"></i></a>
							<a href="#"><i class="fa fa-linkedin"></i></a>
							<a href="#"><i class="fa fa-facebook"></i></a>
							<a href="#"><i class="fa fa-twitter"></i></a>
							<a href="#"><i class="fa fa-google-plus"></i></a>
							<a href="#"><i class="fa fa-youtube"></i></a>
						</div>   
					</div>
					<div class="col-md-6">
						<form class="form-horizontal">
							<input type="text" class="input form-control" placeholder="Newsletter">
							<button type="submit"> Sign up <i class="fa fa-angle-right"></i></button>
						</form>
					</div>
				</div>
			</div>
		</div>
		<div class="footer-information">
			<div class="container">
				<div class="row">
					<div class="col-md-3">
						<div class="header-footer">
							<h3>Information</h3>
						</div>
						<ul class="footer-categories list-unstyled">
							<li><a href="#">About Us</a></li>
							<li><a href="#">Contact Us</a></li>
							<li><a href="#">Delivery Information</a></li>
							<li><a href="#">Privacy Policy</a></li>
							<li><a href="#">Terms & Conditions</a></li>
							<li><a href="#">Site Map</a></li>
							<li><a href="#">Returns</a></li>
						</ul>
					</div>
					<div class="col-md-3">
						<div class="header-footer">
							<h3>My Account</h3>
						</div>
						<ul class="footer-categories list-unstyled">
							<li><a href="#">My Account</a></li>
							<li><a href="#">Wish List</a></li>
							<li><a href="#">Order History</a></li>
							<li><a href="#">Brands</a></li>
							<li><a href="#">Specials</a></li>
							<li><a href="#">Newsletter</a></li>
							<li><a href="#">Secure payment</a></li>
						</ul>
					</div>
					<div class="col-md-3">
						<div class="header-footer">
							<h3>I want ...</h3>
						</div>
						<p>
							Lorem ipsum dolor sit amet, consectetur adipisicing elit.
						</p>
						<div class="want">
							<form class="form-horizonta">
								<textarea class="form-control" placeholder="I want ..."></textarea>
								<button type="submit"> Send us <i class="fa fa-angle-right"></i></button>
							</form>
						</div>



					</div>
					<div class="col-md-3">
						<div class="header-footer">
							<h3>Get In Touch</h3>
						</div>
						<p><strong>Phone: 1-000-000-0000</strong><br><strong>Email:</strong> info@yourdomain.com</p>
						<p><strong>Your Company LTD.</strong><br>Street Name, 000000, City Name</p>
						<p><a href=""><i class="icon-map-marker"></i> Location in Google Maps</a></p>
					</div>
				</div>
			</div>
		</div>

		<div class="footer-copy color-scheme-1">
			<div class="container">
				<div class="row">
					<div class="col-md-4">
						<a href="index.html" class="logo-copy pull-left"></a>
					</div>
					<div class="col-md-4">
						<p class="text-center">
							БЬЮТИ-ШОП.РФ © 2018| Все права защищены.<br>
							<a href="http://netolab.ru" target="_blank">Создание и продвижение сайта - NETOLAB</a>
						</p>
					</div>
					<div class="col-md-4">
						<ul class="footer-payments pull-right">
							<li><img src="<?php get_template_directory_uri() ?>\img\payment-maestro.jpg" alt="payment" /></li>
							<li><img src="<?php get_template_directory_uri() ?>\img\payment-discover.jpg" alt="payment" /></li>
							<li><img src="<?php get_template_directory_uri() ?>\img\payment-visa.jpg" alt="payment" /></li>
							<li><img src="<?php get_template_directory_uri() ?>\img\payment-american-express.jpg" alt="payment" /></li>
							<li><img src="<?php get_template_directory_uri() ?>\img\payment-paypal.jpg" alt="payment" /></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</footer>
	<!-- End Section footer -->
	<!-- <script src="js/vendor/jquery.js"></script> -->
	<!-- <script src="js/vendor/jquery.easing.1.3.js"></script> -->
	<!-- <script src="js/vendor/bootstrap.js"></script> -->

	<!-- <script src="js/vendor/jquery.flexisel.js"></script> -->
	<!-- <script src="js/vendor/wow.min.js"></script> -->
	<!-- <script src="js/vendor/jquery.transit.js"></script> -->
	<!-- <script src="js/vendor/jquery.jcountdown.js"></script> -->
	<!-- <script src="js/vendor/jquery.jPages.js"></script> -->
	<!-- <script src="js/vendor/owl.carousel.js"></script> -->

	<!-- <script src="js/vendor/responsiveslides.min.js"></script> -->
	<!-- <script src="js/vendor/jquery.elevateZoom-3.0.8.min.js"></script> -->

	<!-- jQuery REVOLUTION Slider  -->
	<!-- <script type="text/javascript" src="js/vendor/jquery.themepunch.plugins.min.js"></script> -->
	<!-- <script type="text/javascript" src="js/vendor/jquery.themepunch.revolution.min.js"></script> -->
	<!-- <script type="text/javascript" src="js/vendor/jquery.scrollTo-1.4.2-min.js"></script> -->

	<!-- Custome Slider  -->
	<!-- <script src="js/main.js"></script> -->

	<!--Here will be Google Analytics code from BoilerPlate-->
<?php wp_footer(); // необходимо для работы плагинов и функционала  ?>
</body>
</html>