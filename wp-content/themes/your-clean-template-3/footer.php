<?php
/**
 * Шаблон подвала (footer.php)
 * @package WordPress
 * @subpackage your-clean-template-3
 */
?>
	<footer id="footer-block">
		<!-- <div class="social">
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
		</div> -->
		<div class="footer-information">
			<div class="container">
				<div class="row">
					<div class="col-md-4">
						<div class="header-footer">
							<h3>ВКонтакте</h3>
						</div>
						<script type="text/javascript" src="https://vk.com/js/api/openapi.js?159"></script>
						<!-- VK Widget -->
						<div id="vk_groups"></div>
						<script type="text/javascript">
						VK.Widgets.Group("vk_groups", {mode: 3, color3: 'EB2C33'}, 20003922);
						</script>
					</div>
					<div class="col-md-4">
						<div class="header-footer">
							<h3>Facebook</h3>
						</div>
						<div id="fb-root"></div>
						<script>(function(d, s, id) {
						  var js, fjs = d.getElementsByTagName(s)[0];
						  if (d.getElementById(id)) return;
						  js = d.createElement(s); js.id = id;
						  js.src = 'https://connect.facebook.net/ru_RU/sdk.js#xfbml=1&version=v3.1';
						  fjs.parentNode.insertBefore(js, fjs);
						}(document, 'script', 'facebook-jssdk'));</script>
						<div class="fb-page" data-href="https://www.facebook.com/facebook" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/facebook" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/facebook">Facebook</a></blockquote></div>
					</div>
					<!-- <div class="col-md-3">
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
					</div> -->
					<div class="col-md-4">
						<div class="header-footer">
							<h3>Контакты</h3>
						</div>
						<p><strong>Телефон: +7 (922) 829-91-15</strong><br><strong>Email:</strong> beautyshop56@mail.ru</p>
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
							БЬЮТИ-ШОП.РФ © 2018 | Все права защищены.<br>
							<a href="http://netolab.ru" target="_blank">Создание и продвижение сайта - NETOLAB</a>
						</p>
					</div>
					<!-- <div class="col-md-4">
						<ul class="footer-payments pull-right">
							<li><img src="<?php get_template_directory_uri() ?>\img\payment-maestro.jpg" alt="payment" /></li>
							<li><img src="<?php get_template_directory_uri() ?>\img\payment-discover.jpg" alt="payment" /></li>
							<li><img src="<?php get_template_directory_uri() ?>\img\payment-visa.jpg" alt="payment" /></li>
							<li><img src="<?php get_template_directory_uri() ?>\img\payment-american-express.jpg" alt="payment" /></li>
							<li><img src="<?php get_template_directory_uri() ?>\img\payment-paypal.jpg" alt="payment" /></li>
						</ul>
					</div> -->
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