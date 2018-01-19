<!-- footer -->
	<div class="footer">	
		<div class="container">
			<div class="footer-grids">
				<div class="col-md-4 footer-grid animated wow slideInLeft" data-wow-delay=".5s">
					<h3>About Us</h3>
					<p>Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse 
						quam nihil molestiae consequatur.</p>
					<div class="social">
						<ul class="social-nav model-8">
							<li><a href="#" class="facebook"><i></i></a></li>
							<li><a href="#" class="twitter"><i> </i></a></li>
							<li><a href="#" class="g"><i></i></a></li>
							<li><a href="#" class="p"><i></i></a></li>
						</ul>
					</div>
				</div>
				<div class="col-md-4 footer-grid animated wow slideInLeft" data-wow-delay=".6s">
					<h3>Вконтакте</h3>
					блок VK
				</div>
				<div class="col-md-4 footer-grid animated wow slideInLeft" data-wow-delay=".7s">
					<h3>instagramm</h3>
					блок instagramm
				</div>
				<div class="clearfix"> </div>
			</div>
			<div class="footer-grids1">
				<div class="footer-grids1-left animated wow slideInLeft" data-wow-delay=".5s">
					<ul>
                                                <li <?php if(self::$title == "Главная"):?> class="active" <?php endif;?>><a href="/" >Home</a></li>
                                                <li <?php if(self::$title == "Портфолио"):?> class="active" <?php endif;?>><a href="portfolio" >portfolio</a></li>
                                                <li <?php if(self::$title == "Услуги"):?> class="active" <?php endif;?>><a href="services" >Services</a></li>
                                                <li <?php if(self::$title == "Отзывы"):?> class="active" <?php endif;?>><a href="reviews" >Reviews</a></li>
                                                <li <?php if(self::$title == "О себе"):?> class="active" <?php endif;?>><a href="about" >about</a></li>
					</ul>
				</div>
				<div class="footer-grids1-right">
					<p class="animated wow slideInRight" data-wow-delay=".5s">&copy 2016 Acreage. All rights reserved | Design by <a href="http://w3layouts.com/">W3layouts</a></p>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
<!-- //footer -->
<!-- for bootstrap working -->
	<script src="<?php echo TMPL; ?>js/bootstrap.js"></script>
        <script src="<?php echo LIB; ?>/jmosaicflow/jquery.mosaicflow.min.js"></script> 
        <!--<script type="text/javascript" src="<?php echo LIB; ?>/fancybox/jquery.fancybox.pack.js"></script> -->
        <script type="text/javascript"> 
          $(document).ready(function() { 
            $("a.fancyimage").fancybox(); 
          }); 
        </script> 
<!-- //for bootstrap working -->
<!-- here stars scrolling icon -->
	<script type="text/javascript">
		$(document).ready(function() {
			/*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
				};
			*/
								
			$().UItoTop({ easingType: 'easeOutQuart' });
								
			});
	</script>
<!-- //here ends scrolling icon -->
</body>
</html>