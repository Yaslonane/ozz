<!DOCTYPE html>
<html>
<head>
    <link rel="icon" href ="<?php echo DOMAIN; ?>/img/favicon.png" type= "image/x-icon"/> 
    <link rel="shortcut icon" href ="<?php echo DOMAIN; ?>/img/favicon.png" type= "image/x-icon"/>
<title><?php echo self::$title; ?></title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- //for-mobile-apps -->
<link href="<?php echo TMPL; ?>css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="<?php echo TMPL; ?>css/style.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" href="<?php echo LIB; ?>/fancybox/jquery.fancybox.css" type="text/css" media="screen" /> 
<link rel="stylesheet" href="<?php echo LIB; ?>/font-awesome/css/font-awesome.min.css" />
<!-- js -->
<script type="text/javascript" src="<?php echo TMPL; ?>js/jquery-2.1.4.min.js"></script>
<script type="text/javascript" src="<?php echo LIB; ?>/salvattore.min.js"></script>
<!-- //js -->
<!-- banner-slider -->
<script type="text/javascript" src="<?php echo TMPL; ?>js/jquery.devrama.slider-0.9.4.js"></script>
<!-- //banner-slider -->
<!-- animation-effect -->
<link href="<?php echo TMPL; ?>css/animate.min.css" rel="stylesheet"> 
<script src="<?php echo TMPL; ?>js/wow.min.js"></script>
<script>
 new WOW().init();
</script>
<!-- //animation-effect -->
<link href='//fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="<?php echo TMPL; ?>js/move-top.js"></script>
<script type="text/javascript" src="<?php echo TMPL; ?>js/easing.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
<!-- start-smoth-scrolling -->

</head>
	
<body>
<!-- header -->
	<div class="header">
		<div class="container">
                            <div>
                                <a href="/"><img class="img-responsive" src="<?php echo DOMAIN; ?>/img/logo FI ozz.png"/></a>
                            </div>
			<nav class="navbar navbar-default">
                           
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
				  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				  </button>
					<div class="logo">
						<h1><a class="navbar-brand" href="index.html"><img height="45" src="<?php echo DOMAIN; ?>/img/icon ozz.png"/></a></h1>
					</div>
				</div>

				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse nav-wil" id="bs-example-navbar-collapse-1">
					<nav class="menu menu--francisco">
						<ul class="nav navbar-nav menu__list">
							<li class="menu__item <?php if(self::$title == "Главная"):?> menu__item--current <?php endif;?>"><a href="/" class="menu__link"><span class="menu__helper">Home</span></a></li>
							<li class="menu__item <?php if(self::$title == "Портфолио"):?> menu__item--current <?php endif;?>"><a href="portfolio" class="menu__link"><span class="menu__helper">portfolio</span></a></li>
							<li class="menu__item <?php if(self::$title == "Услуги"):?> menu__item--current <?php endif;?>"><a href="services" class="menu__link"><span class="menu__helper">Services</span></a></li>
							<li class="menu__item <?php if(self::$title == "Отзывы"):?> menu__item--current <?php endif;?>"><a href="reviews" class="menu__link"><span class="menu__helper">Reviews</span></a></li>
							<li class="menu__item <?php if(self::$title == "О себе"):?> menu__item--current <?php endif;?>"><a href="about" class="menu__link"><span class="menu__helper">about</span></a></li>
						</ul>
					</nav>
					<div class="phone">
						<p><i class="glyphicon glyphicon-phone" aria-hidden="true"></i>Call- to -us <span>+0123 456 789</span></p>
					</div>
				</div>
				<!-- /.navbar-collapse -->
			</nav>
		</div>
	</div>
<!-- //header -->