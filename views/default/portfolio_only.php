<?php require_once 'header.php'; //подключаем header?> 
<style>
    .mosaicflow__item { 
      padding:3px; 
    } 
    .mosaicflow__column { 
      float:left; 
    } 
    .mosaicflow__item img { 
      display:block; 
      width:100%; 
      height:auto; 
      padding: 4px; 
      background-color: #fff; 
      border: 1px solid #ddd; 
      border-radius: 4px; 
    } 
    .mosaicflow__item img:hover { 
      opacity: 0.6; 
      filter: alpha(opacity=60); 
    } 
    .banerport{
        background: url(<?php echo TMPL; ?>images/3.jpg) no-repeat 0px 0px;
        /* background: url(../images/banner.jpg) no-repeat 0px 0px; */
	background-size: cover;
	-webkit-background-size: cover;
	-moz-background-size: cover;
	-o-background-size: cover;
	-ms-background-size: cover;
	min-height: 240px;
	padding: 6em 0 0;
	text-align: center;
    }
    
</style>
<!-- banner -->
	<div class="banerport">
		<div class="container">
			<h2 class="animated wow slideInLeft" data-wow-delay=".5s"><a href="/">Главная</a> / <span>Портфолио</span></h2>
		</div>
	</div>
<!-- //banner -->
<!-- gallery -->
	<div class="gallery">
		<div class="container">
                        <h3 class="animated wow zoomIn" data-wow-delay=".5s">Портфолио</h3>
			<p class="qui animated wow zoomIn" data-wow-delay=".5s">Ниже представленны некоторые мои работы</p>

                        <div class="row clearfix mosaicflow">
                            <div class="mosaicflow__item">
                                <a class="fancyimage" rel="group" href="<?php echo TMPL; ?>images/3.jpg" title="photo #1">
                                  <img class="img-responsive" src="<?php echo TMPL; ?>images/3.jpg" />
                                </a>
                            </div>
                            <div class="mosaicflow__item">
                                <a class="fancyimage" rel="group" href="<?php echo TMPL; ?>images/4.jpg" >
                                  <img class="img-responsive" src="<?php echo TMPL; ?>images/4.jpg" />
                                </a>
                            </div>
                            <div class="mosaicflow__item">
                                <a class="fancyimage" rel="group" href="<?php echo TMPL; ?>images/5.jpg" >
                                  <img class="img-responsive" src="<?php echo TMPL; ?>images/5.jpg" />
                                </a>
                            </div>
                            <div class="mosaicflow__item">
                                <a class="fancyimage" rel="group" href="<?php echo TMPL; ?>images/6.jpg" >
                                  <img class="img-responsive" src="<?php echo TMPL; ?>images/6.jpg" />
                                </a>
                            </div>
                            <div class="mosaicflow__item">
                                <a class="fancyimage" rel="group" href="<?php echo TMPL; ?>images/7.jpg" >
                                  <img class="img-responsive" src="<?php echo TMPL; ?>images/7.jpg" />
                                </a>
                            </div>
                            <div class="mosaicflow__item">
                                <a class="fancyimage" rel="group" href="<?php echo TMPL; ?>images/3.jpg" >
                                  <img class="img-responsive" src="<?php echo TMPL; ?>images/3.jpg" />
                                </a>
                            </div>
                            <div class="mosaicflow__item">
                                <a class="fancyimage" rel="group" href="<?php echo TMPL; ?>images/4.jpg" >
                                  <img class="img-responsive" src="<?php echo TMPL; ?>images/4.jpg" />
                                </a>
                            </div>
                            <div class="mosaicflow__item">
                                <a class="fancyimage" rel="group" href="<?php echo TMPL; ?>images/5.jpg" >
                                  <img class="img-responsive" src="<?php echo TMPL; ?>images/5.jpg" />
                                </a>
                            </div>
                            <div class="mosaicflow__item">
                                <a class="fancyimage" rel="group" href="<?php echo TMPL; ?>images/6.jpg" >
                                  <img class="img-responsive" src="<?php echo TMPL; ?>images/6.jpg" />
                                </a>
                            </div>
                            <div class="mosaicflow__item">
                                <a class="fancyimage" rel="group" href="<?php echo TMPL; ?>images/7.jpg" >
                                  <img class="img-responsive" src="<?php echo TMPL; ?>images/7.jpg" />
                                </a>
                            </div>
                            <div class="mosaicflow__item">
                                <a class="fancyimage" rel="group" href="<?php echo TMPL; ?>images/3.jpg" >
                                  <img class="img-responsive" src="<?php echo TMPL; ?>images/3.jpg" />
                                </a>
                            </div>
                            <div class="mosaicflow__item">
                                <a class="fancyimage" rel="group" href="<?php echo TMPL; ?>images/4.jpg" >
                                  <img class="img-responsive" src="<?php echo TMPL; ?>images/4.jpg" />
                                </a>
                            </div>
                            <div class="mosaicflow__item">
                                <a class="fancyimage" rel="group" href="<?php echo TMPL; ?>images/5.jpg" >
                                  <img class="img-responsive" src="<?php echo TMPL; ?>images/5.jpg" />
                                </a>
                            </div>
                            <div class="mosaicflow__item">
                                <a class="fancyimage" rel="group" href="<?php echo TMPL; ?>images/6.jpg" >
                                  <img class="img-responsive" src="<?php echo TMPL; ?>images/6.jpg" />
                                </a>
                            </div>
                            <div class="mosaicflow__item">
                                <a class="fancyimage" rel="group" href="<?php echo TMPL; ?>images/7.jpg" >
                                  <img class="img-responsive" src="<?php echo TMPL; ?>images/7.jpg" />
                                </a>
                            </div>
                        </div>
			
		</div>
	</div>
<!-- //gallery -->
<?php require_once 'footer.php'; // ?> 