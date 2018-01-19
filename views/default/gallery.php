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
    .thumbs {
  width: 100%;
  max-width: 450px; /* опционально */
  margin: 10px;
  opacity: .99;
  overflow: hidden;
  position: relative;
  border-radius: 3px;
  cursor: pointer;
  -webkit-box-shadow: 0 12px 15px 0 rgba(0, 0, 0, 0.24), 0 17px 50px 0 rgba(0, 0, 0, 0.19);
  -moz-box-shadow: 0 12px 15px 0 rgba(0, 0, 0, 0.24), 0 17px 50px 0 rgba(0, 0, 0, 0.19);
  box-shadow: 0 12px 15px 0 rgba(0, 0, 0, 0.24), 0 17px 50px 0 rgba(0, 0, 0, 0.19);
}
.thumbs:before {
  content: '';
  background: -webkit-linear-gradient(top, transparent 0%, rgba(0, 0, 0, 0.7) 100%);
  background: linear-gradient(to bottom, transparent 0%, rgba(0, 0, 0, 0.7) 100%);
  width: 100%;
  height: 50%;
  opacity: 0;
  position: absolute;
  top: 100%;
  left: 0;
  z-index: 2;
  -webkit-transition-property: top, opacity;
  transition-property: top, opacity;
  -webkit-transition-duration: 0.3s;
  transition-duration: 0.3s;
}
.thumbs img {
  display: block;
  width: 100%; /* ширина картинки */
  height: auto; /* высота картинки */
  backface-visibility: hidden;
  -webkit-backface-visibility: hidden;
}
.thumbs .caption {
  width: 100%;
  padding: 20px;
  color: #fff;
  position: absolute;
  bottom: 0;
  left: 0;
  z-index: 3;
  text-align: center;
}
.thumbs .caption span {
  display: block;
  opacity: 0;
  position: relative;
  top: 100px;
  -webkit-transition-property: top, opacity;
  transition-property: top, opacity;
  -webkit-transition-duration: 0.3s;
  transition-duration: 0.3s;
  -webkit-transition-delay: 0s;
  transition-delay: 0s;
}
.thumbs .caption .title {
  line-height: 1;
  font-weight: normal;
  font-size: 18px;
}
.thumbs .caption .info {
  line-height: 1.2;
  margin-top: 5px;
  font-size: 12px;
}
.thumbs:focus:before,
.thumbs:focus span, .thumbs:hover:before,
.thumbs:hover span {
  opacity: 1;
}
.thumbs:focus:before, .thumbs:hover:before {
  top: 50%;
}
.thumbs:focus span, .thumbs:hover span {
  top: 0;
}
.thumbs:focus .title, .thumbs:hover .title {
  -webkit-transition-delay: 0.15s;
          transition-delay: 0.15s;
}
.thumbs:focus .info, .thumbs:hover .info {
  -webkit-transition-delay: 0.25s;
          transition-delay: 0.25s;
}
    
</style>
<!-- banner -->
	<div class="banner1">
		<div class="container">
			<h2 class="animated wow slideInLeft" data-wow-delay=".5s"><a href="/">Главная</a> / <span>Портфолио</span></h2>
		</div>
	</div>
<!-- //banner -->
<?php $size = getimagesize("".DOMAIN."/images/content/files/1_RegExp_CheatSheet_rus__vk_com_tproger.png"); ?>
<pre> <?php var_dump($size); ?></pre>
<pre> <?php echo "ширина: ".$size[0]." Высота: ".$size[1]; ?></pre>


<!-- gallery -->
	<div class="gallery">
            <div class="container">
			<h3 class="animated wow zoomIn" data-wow-delay=".5s">Портфолио</h3>
			<p class="qui animated wow zoomIn" data-wow-delay=".5s">Ниже представленны некоторые мои работы</p>
			<div class="row clearfix mosaicflow">
                            <div class="mosaicflow__item thumbs">
                                <a href="<?php echo DOMAIN; ?>/portfolio/1" title="#1">
                                    <img class="img-responsive" src="<?php echo TMPL; ?>images/3.jpg" />
                                    <div class="caption">
                                        <span class="title">Заголовок картинки</span>
                                        <span class="info">Краткое описание или анонс записи</span>
                                    </div>
                                </a>
                            </div>
                            <div class="mosaicflow__item thumbs">
                                <a href="<?php echo DOMAIN; ?>/portfolio/1" title="#1">
                                    <img class="img-responsive" src="<?php echo TMPL; ?>images/4.jpg" />
                                    <div class="caption">
                                        <span class="title">Заголовок картинки</span>
                                        <span class="info">Краткое описание или анонс записи</span>
                                    </div>
                                </a>
                            </div>
                            <div class="mosaicflow__item thumbs">
                                <a href="<?php echo DOMAIN; ?>/portfolio/1" title="#1">
                                    <img class="img-responsive" src="<?php echo TMPL; ?>images/5.jpg" />
                                    <div class="caption">
                                        <span class="title">Заголовок картинки</span>
                                        <span class="info">Краткое описание или анонс записи</span>
                                    </div>
                                </a>
                            </div>
                            <div class="mosaicflow__item thumbs">
                                <a href="<?php echo DOMAIN; ?>/portfolio/1" title="#1">
                                    <img class="img-responsive" src="<?php echo TMPL; ?>images/6.jpg" />
                                    <div class="caption">
                                        <span class="title">Заголовок картинки</span>
                                        <span class="info">Краткое описание или анонс записи</span>
                                    </div>
                                </a>
                            </div>
                            <div class="mosaicflow__item thumbs">
                                <a href="<?php echo DOMAIN; ?>/portfolio/1" title="#1">
                                    <img class="img-responsive" src="<?php echo TMPL; ?>images/7.jpg" />
                                    <div class="caption">
                                        <span class="title">Заголовок картинки</span>
                                        <span class="info">Краткое описание или анонс записи</span>
                                    </div>
                                </a>
                            </div>
                            <div class="mosaicflow__item thumbs">
                                <a href="<?php echo DOMAIN; ?>/portfolio/1" title="#1">
                                    <img class="img-responsive" src="<?php echo TMPL; ?>images/4.jpg" />
                                    <div class="caption">
                                        <span class="title">Заголовок картинки</span>
                                        <span class="info">Краткое описание или анонс записи</span>
                                    </div>
                                </a>
                            </div>

                            
			</div>
			</div>
			<script type="text/javascript" src="<?php echo TMPL; ?>js/simple-lightbox.min.js"></script>
			<script>
				$(function(){
					var gallery = $('.gallery a').simpleLightbox({navText:		['&lsaquo;','&rsaquo;']});
				});
			</script>
	</div>
<!-- //gallery -->
<?php require_once 'footer.php'; // ?> 