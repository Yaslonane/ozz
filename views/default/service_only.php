<?php require_once 'header.php'; //подключаем header?> 
<!-- banner -->
	<div class="banner1">
		<div class="container">
			<h2 class="animated wow slideInLeft" data-wow-delay=".5s"><a href="/">Главная</a> / <span><?php echo $service['name']; ?></span></h2>
		</div>
	</div>
<!-- //banner -->
<!-- single -->
	<div class="single">
		<div class="container">
			<div class="single-grids">
			
                        <div class="col-md-8 single-grid-left">
					<div class="flex-slider-single animated wow slideInLeft" data-wow-delay=".5s">
						<section class="slider">
							<div class="flexslider">
								
                                                                        <div class="single-grid-left-grid">
                                                                                <img src="<?php echo $service['img']; ?>" alt=" " class="img-responsive" />
                                                                                <div class="single-grid-left-grid1">
                                                                                        <div class="single-grid-left-grid1-right">
                                                                                                <h4><?php echo $service['name']; ?></h4>
                                                                                                <p><?php echo $service['price']; ?></p>
                                                                                        </div>
                                                                                        <div class="clearfix"> </div>
                                                                                        <p class="fugiat"><?php echo $service['text']; ?></p>
                                                                                        <h3>Список: </h3>
                                                                                        <ul>
                                                                                            <?php foreach(Services::replaseInfoByCards($service['info']) as $list): ?>   
                                                                                                <li>-<?php echo $list; ?> </li>
                                                                                            <?php endforeach;?>
                                                                                        </ul>
                                                                                </div>
                                                                        </div>
                                                                    
							</div>
						</section>

					</div>

					<div class="author">
						<h3 class="animated wow zoomIn" data-wow-delay=".5s">Случайный отзыв</h3>
						<div class="author-grid animated wow slideInLeft" data-wow-delay=".5s">
							<div class="author-grid-left">
								<img src="<?php echo TMPL; ?>images/8.jpg" alt=" " class="img-responsive "/>
							</div>
							<div class="author-grid-right">
								<h4>Allen Rosy<span>Contractor Chief</span></h4>
								<p>Nam libero tempore, cum soluta nobis est eligendi optio 
									cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis 
									voluptas assumenda est, omnis dolor repellendus.</p>
								<ul class="social-nav model-8">
									<li><a href="#" class="facebook"><i></i></a></li>
									<li><a href="#" class="twitter"><i> </i></a></li>
									<li><a href="#" class="g"><i></i></a></li>
									<li><a href="#" class="p"><i></i></a></li>
								</ul>
							</div>
							<div class="clearfix"> </div>
						</div>
					</div>

				</div>
				<div class="col-md-4 single-grid-right">
					<div class="blog-right1">
                                            <div class="categories animated wow slideInUp" data-wow-delay=".5s">
                                                <h3>Categories</h3>
                                                <ul>
                                                    <?php foreach($srvlst as $list): ?>   
                                                        <li><a href="<?php echo DOMAIN . "/services/". $list['id']; ?>"><?php echo $list['name']; ?></a></li>
                                                    <?php endforeach;?>
                                                        

                                                </ul>
                                            </div>
						
						
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
<!-- //single -->
<?php require_once 'footer.php'; // ?> 