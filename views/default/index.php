<?php require_once 'header.php'; //подключаем header?> 
<!-- banner -->
	<div class="example-animation">
		<div data-lazy-background="<?php echo TMPL; ?>images/banner.jpg" class="banner">
			<div class="container">
				<div class="banner-info">
					<h3>Duis aute irure dolor in reprehend</h3>
					<p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui 
						officia deserunt mollit anim id est laborum.</p>
					<div class="more">
						<a href="single.html" class="hvr-shutter-in-vertical">Learn More...</a>
					</div>
				</div>
			</div>
		</div>
		<div data-lazy-background="<?php echo TMPL; ?>images/banner1.jpg" class="banner">
			<div class="container">
				<div class="banner-info">
					<h3>velit esse quam nihil molestiae conse</h3>
					<p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui 
						officia deserunt mollit anim id est laborum.</p>
					<div class="more">
						<a href="single.html" class="hvr-shutter-in-vertical">Learn More...</a>
					</div>
				</div>
			</div>
		</div>
		
	</div>
			<script type="text/javascript">       
				$(document).ready(function(){
					$('.example-animation').DrSlider(); //Yes! that's it!
				});
			</script>
<!-- //banner -->

<!-- pricing-plans -->
	<div class="pricing-plans">	
		<div class="container">
			<h3 class="animated wow zoomIn" data-wow-delay=".5s">Услуги</h3>
			<p class="qui animated wow zoomIn" data-wow-delay=".5s">Краткий список услуг предоставляемый мной</p>
			<div class="pricing-plans-grids">
				
                            <?php foreach($services as $srv): ?>
                                <div class="col-md-4 pricing-plans-grid animated wow slideInLeft" data-wow-delay=".5s">
                                    <div class="pricing-plans-grid1">
                                        <h4><?php echo $srv['name']?></h4>
                                        <h5><?php echo $srv['price']?> <sup>руб</sup></h5>
                                        <ul>
                                            <?php foreach(Services::replaseInfoByCards($srv['info']) as $list): ?>   
                                                <li>-<?php echo $list; ?> </li>
                                            <?php endforeach;?>   
                                        </ul>
                                        <div class="more m1">
                                                <a href="<?php echo DOMAIN; ?>/services/<?php echo $srv['id']?> " class="hvr-shutter-in-vertical hvr-shutter-in-vertical1">Узнать подробнее</a>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach;?>

				<div class="clearfix"> </div>
			</div>			
		</div>
	</div>
<!-- //pricing-plans -->


<!-- services 
	<div class="services">
		<div class="container">
			<h3 class="animated wow zoomIn" data-wow-delay=".5s">Services</h3>
			<p class="qui animated wow zoomIn" data-wow-delay=".5s">Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil.</p>
			<div class="services-grids">
				<div class="col-md-6 services-grids-left">
					<div class="services-grids-left-grids">
						<div class="services-grids-left-grid1">
							<div class="services-grids-left-grid animated wow slideInLeft" data-wow-delay=".5s">
								<h5>25th April 2016</h5>
								<h4>qui in ea voluptate velit</h4>
								<p>Ut enim ad minima veniam, quis nostrum exercitationem ullam 
									corporis suscipit laboriosam, nisi ut aliquid ex ea commodi 
									consequatur.</p>
							</div>
							<div class="services-grids-left-grid1-pos">
								<span></span>
							</div>
						</div>
						<div class="services-grids-left-grid1">
							<div class="services-grids-left-grid animated wow slideInLeft" data-wow-delay=".5s">
								<h5>30 April 2016</h5>
								<h4>nisi ut aliquid commodi</h4>
								<p>Ut enim ad minima veniam, quis nostrum exercitationem ullam 
									corporis suscipit laboriosam, nisi ut aliquid ex ea commodi 
									consequatur.</p>
							</div>
							<div class="services-grids-left-grid3-pos">
								<span></span>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6 services-grids-right">
					<div class="services-grids-right-grids">
						<div class="services-grids-left-grid1">
							<div class="services-grids-left-grid services-grids-right-grid animated wow slideInRight" data-wow-delay=".5s">
								<h5>28th April 2016</h5>
								<h4>corporis suscipit laboriosam</h4>
								<p>Ut enim ad minima veniam, quis nostrum exercitationem ullam 
									corporis suscipit laboriosam, nisi ut aliquid ex ea commodi 
									consequatur.</p>
							</div>
							<div class="services-grids-left-grid2-pos">
								<span></span>
							</div>
						</div>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
			<div class="service-grids-bottom animated wow slideInUp" data-wow-delay=".5s">
				<h2>Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis 
					voluptatibus maiores alias consequatur aut perferendis doloribus asperiores 
					repellat.</h2>
			</div>
		</div>
	</div>
//services -->
<!-- services-bottom -->
	<div class="services-bottom">
		<div class="container">
			<div class="col-md-3 services-bottom-left">
				<p class="counter">89,147</p> 
				<h3>Users</h3>
				<div class="services-bottom-left-grid hvr-shutter-in-horizontal">
					<i class="glyphicon glyphicon-user" aria-hidden="true"></i>
				</div>
			</div>
			<div class="col-md-3 services-bottom-left">
				<p class="counter">99,434</p> 
				<h3>Loans</h3>
				<div class="services-bottom-left-grid hvr-shutter-in-horizontal">
					<i class="glyphicon glyphicon-home" aria-hidden="true"></i>
				</div>
			</div>
			<div class="col-md-3 services-bottom-left">
				<p class="counter">76,454</p> 
				<h3>Support</h3>
				<div class="services-bottom-left-grid hvr-shutter-in-horizontal">
					<i class="glyphicon glyphicon-open" aria-hidden="true"></i>
				</div>
			</div>
			<div class="col-md-3 services-bottom-left">
				<p class="counter">45,000</p> 
				<h3>Profit</h3>
				<div class="services-bottom-left-grid hvr-shutter-in-horizontal">
					<i class="glyphicon glyphicon-yen" aria-hidden="true"></i>
				</div>
			</div>
			<div class="clearfix"> </div>
			<!-- Stats-Number-Scroller-Animation-JavaScript -->
				<script src="<?php echo TMPL; ?>js/waypoints.min.js"></script> 
				<script src="<?php echo TMPL; ?>js/counterup.min.js"></script> 
				<script>
					jQuery(document).ready(function( $ ) {
						$('.counter').counterUp({
							delay: 20,
							time: 1000
						});
					});
				</script>

			<!-- //Stats-Number-Scroller-Animation-JavaScript -->
		</div>
	</div>
<!-- //services-bottom -->
<!-- testimonials -->
	<div class="testimonials">
		<div class="container">
			<h3 class="animated wow zoomIn" data-wow-delay=".5s">Testimonials</h3>
			<p class="qui animated wow zoomIn" data-wow-delay=".5s">Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil.</p>
			<div class="testimonials-grids">
				<div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
					<ul id="myTab" class="nav nav-tabs" role="tablist">
						<li role="presentation" class="active"><a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">Joy Allen</a></li>
						<li role="presentation"><a href="#carl" role="tab" id="carl-tab" data-toggle="tab" aria-controls="profile">Michael Carl</a></li>
						<li role="presentation"><a href="#james" role="tab" id="james-tab" data-toggle="tab" aria-controls="profile">Allen Rosy</a></li>
					</ul>
					<div id="myTabContent" class="tab-content">
						<div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">
							<div class="tabcontent-grids">
								<img src="<?php echo TMPL; ?>images/2.png" alt=" " class="img-responsive" />
								<h4>Joy Allen<span>Contractor Chief</span></h4>
								<p>Duis aute irure dolor in reprehenderit in voluptate velit esse 
									cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat 
									cupidatat non proident, sunt in culpa qui officia deserunt mollit 
									anim id est laborum.</p>
							</div>
						</div>
						<div role="tabpanel" class="tab-pane fade" id="carl" aria-labelledby="carl-tab">
							<div class="tabcontent-grids">
								<img src="<?php echo TMPL; ?>images/3.png" alt=" " class="img-responsive" />
								<h4>Michael Carl<span>Contractor</span></h4>
								<p>Duis aute irure dolor in reprehenderit in voluptate velit esse 
									cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat 
									cupidatat non proident, sunt in culpa qui officia deserunt mollit 
									anim id est laborum.</p>
							</div>
						</div>
						<div role="tabpanel" class="tab-pane fade" id="james" aria-labelledby="james-tab">
							<div class="tabcontent-grids">
								<img src="<?php echo TMPL; ?>images/4.png" alt=" " class="img-responsive" />
								<h4>Allen Rosy<span>Contractor Chief</span></h4>
								<p>Duis aute irure dolor in reprehenderit in voluptate velit esse 
									cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat 
									cupidatat non proident, sunt in culpa qui officia deserunt mollit 
									anim id est laborum.</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<!-- //testimonials -->
<?php require_once 'footer.php'; //подключаем footer?> 