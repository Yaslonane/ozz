<?php require_once 'header.php'; //подключаем header?> 
<!-- banner -->
<style>
.btn:hover,
.btn:focus,
.btn:active{
 outline: 0 !important;
}
/* entire container, keeps perspective */
.card-container {
 -webkit-perspective: 800px;
 -moz-perspective: 800px;
 -o-perspective: 800px;
 perspective: 800px;
 margin-bottom: 30px;
}
/* flip the pane when hovered */
.card-container:not(.manual-flip):hover .card,
.card-container.hover.manual-flip .card{
 -webkit-transform: rotateY( 180deg );
-moz-transform: rotateY( 180deg );
 -o-transform: rotateY( 180deg );
 transform: rotateY( 180deg );
}


.card-container.static:hover .card, 
.card-container.static.hover .card {
 -webkit-transform: none;
-moz-transform: none;
 -o-transform: none;
 transform: none;
}
/* flip speed goes here */
.card {
 -webkit-transition: -webkit-transform .5s;
 -moz-transition: -moz-transform .5s;
 -o-transition: -o-transform .5s;
 transition: transform .5s;
-webkit-transform-style: preserve-3d;
 -moz-transform-style: preserve-3d;
 -o-transform-style: preserve-3d;
 transform-style: preserve-3d;
 position: relative;
}

/* hide back of pane during swap */
.front, .back {
 -webkit-backface-visibility: hidden;
 -moz-backface-visibility: hidden;
 -o-backface-visibility: hidden;
 backface-visibility: hidden;
 position: absolute;
 top: 0;
 left: 0;
 background-color: #FFF;
 box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.14);
}

/* front pane, placed above back */
.front {
 z-index: 2;
}

/* back, initially hidden pane */
.back {
 -webkit-transform: rotateY( 180deg );
 -moz-transform: rotateY( 180deg );
 -o-transform: rotateY( 180deg );
 transform: rotateY( 180deg );
 z-index: 3;
}

.back .btn-simple{
 position: absolute;
 left: 0;
 bottom: 4px;
}
/* Style */


.card{
 background: none repeat scroll 0 0 #FFFFFF;
 border-radius: 4px;
 color: #444444;
}
.card-container, .front, .back {
 width: 100%;
 height: 420px;
 border-radius: 4px;
}
.card .cover{
 height: 105px;
 overflow: hidden;
 border-radius: 4px 4px 0 0;
}
.card .cover img{
 width: 100%;
}
.card .user{
 border-radius: 50%;
 display: block;
 height: 120px;
 margin: -55px auto 0;
 overflow: hidden;
 width: 120px;
}
.card .user img{
 background: none repeat scroll 0 0 #FFFFFF;
 border: 4px solid #FFFFFF;
 width: 100%;
}

.card .content{
 background-color: rgba(0, 0, 0, 0);
 box-shadow: none;
 padding: 10px 20px 20px;
}
.card .content .main {
 min-height: 160px;
}
.card .back .content .main {
 height: 215px;
}
.card .name {
 font-size: 22px;
 line-height: 28px;
 margin: 10px 0 0;
 text-align: center;
 text-transform: capitalize;
}
.card h5{
 margin: 5px 0;
 font-weight: 400;
 line-height: 20px;
}
.card .profession{
 color: #999999;
 text-align: center;
 margin-bottom: 20px;
}
.card .footercard {
 border-top: 1px solid #EEEEEE;
 color: #999999;
 margin: 30px 0 0;
 padding: 10px 0 0;
 text-align: center;
}
.card .footercard .social-links{
 font-size: 14px;
}
.card .footercard .social-links a{
 margin: 0 2px;
}
.card .footercard .btn-simple{
 margin-top: -6px;
}
.card .header {
 padding: 15px 20px;
 height: 90px;
}
.card .motto{
 border-bottom: 1px solid #EEEEEE;
 color: #999999;
 font-size: 14px;
 font-weight: 400;
 padding-bottom: 10px;
 text-align: center;
}

/* Just for presentation */

.title{
 color: #506A85;
 text-align: center;
 font-weight: 300;
 font-size: 44px;
 margin-bottom: 90px;
 line-height: 90%;
}
.title small{
 font-size: 17px;
 color: #999;
 text-transform: uppercase;
 margin: 0;
}
.space-50{
 height: 50px;
 display: block;
}
.space-200{
 height: 200px;
 display: block;
}
.white-board{
 background-color: #FFFFFF;
 min-height: 200px;
 padding: 60px 60px 20px;
}
.ct-heart{
 color: #F74933;
}

 pre.prettyprint{
 background-color: #ffffff;
 border: 1px solid #999;
 margin-top: 20px;
 padding: 20px;
 text-align: left;
}
.atv, .str{
 color: #05AE0E;
}
.tag, .pln, .kwd{
 color: #3472F7;
}
.atn{
 color: #2C93FF;
}
.pln{
 color: #333;
}
.com{
 color: #999;
} 

.btn-simple{
 opacity: .8;
 color: #666666;
 background-color: transparent;
}

.btn-simple:hover,
.btn-simple:focus{
 background-color: transparent;
 box-shadow: none;
 opacity: 1;
}
.btn-simple i{
 font-size: 16px;
}

.navbar-brand-logo{
 padding: 0;
}
.navbar-brand-logo .logo{
 border: 1px solid #333333;
 border-radius: 50%;
 float: left;
 overflow: hidden;
 width: 60px;
}
.navbar .navbar-brand-logo .brand{
 color: #FFFFFF;
 float: left;
 font-size: 18px;
 font-weight: 400;
 line-height: 20px;
 margin-left: 10px;
 margin-top: 10px;
 width: 60px;
}
.navbar-default .navbar-brand-logo .brand{
 color: #555;
}


/* Fix bug for IE */

@media screen and (-ms-high-contrast: active), (-ms-high-contrast: none) {
 .front, .back{
 -ms-backface-visibility: visible; 
 backface-visibility: visible;
 }
 
 .back {
 visibility: hidden;
 -ms-transition: all 0.2s cubic-bezier(.92,.01,.83,.67);
 }
 .front{
 z-index: 4;
 }
 .card-container:not(.manual-flip):hover .back,
 .card-container.manual-flip.hover .back{
 z-index: 5;
 visibility: visible;
 }
 
}
.banner1{
        background: url("http://blog.local/views/default/images/3.jpg") no-repeat center !important;
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
	<div class="banner1">
		<div class="container">
			<h2 class="animated wow slideInLeft" data-wow-delay=".5s"><a href="/">Главная</a> / <span>Отзывы</span></h2>
		</div>
	</div>
<!-- //banner -->
<!-- mail -->
	<div class="about">	
		<div class="container">
                    <h3 class="animated wow zoomIn" data-wow-delay=".5s">Отзывы </h3>
                    <p class="qui animated wow zoomIn" data-wow-delay=".5s">Немного теплых слов от довольных клиентов</p>
                    <br>    
                    <div class="row">
                        <div class="col-sm-10 col-sm-offset-1">
                            <?php foreach ($reviews as $rev):?>
                            <div class="col-md-4 col-sm-6">
                                <div class="card-container manual-flip">
                                    <div class="card">
                                        <div class="front">
                                            <div class="cover">
                                                <img src="http://bootstraptema.ru/snippets/block/2016/rotate-block/rotating_card_thumb.png"/>
                                            </div>
                                            <div class="user">
                                                <img class="img-circle" src="<?php echo $rev['img']?>"/>
                                            </div>
                                            <div class="content">
                                                <div class="main">
                                                    <h3 class="name"><?php echo $rev['name']?></h3>
                                                    <p class="profession"><?php echo date("m-d-Y", $rev['date']); ?></p>
                                                    <h5><i class="fa fa-map-marker fa-fw text-muted"></i> <?php echo $rev['location']?></h5>
                                                    <h5><i class="fa fa-building-o fa-fw text-muted"></i> <?php echo $rev['event']?> </h5>
                                                </div>
                                                <div class="footercard">
                                                    <button class="btn btn-simple" onclick="rotateCard(this)">
                                                        <i class="fa fa-mail-forward"></i> Прочитать
                                                    </button>
                                                </div>
                                            </div>
                                        </div> <!-- end front panel -->

                                        <div class="back">
                                            <div class="header">
                                                <h5 class="motto">"To be or not to be, this is my awesome motto!"</h5>
                                            </div> 
                                            <div class="content">
                                                <div class="main">
                                                    <h4 class="text-center"><?php echo $rev['name']?></h4>
                                                    <p><?php echo $rev['text']?></p>
                                                </div>
                                            </div>
                                            <div class="footercard">
                                                <button class="btn btn-simple" rel="tooltip" title="Flip Card" onclick="rotateCard(this)">
                                                    <i class="fa fa-reply"></i> Назад
                                                </button>
                                                <div class="social-links text-right">
                                                    <a href="#" ><i class="fa fa-facebook fa-fw"></i></a>
                                                    <a href="#" ><i class="fa fa-google-plus fa-fw"></i></a>
                                                    <a href="#" ><i class="fa fa-twitter fa-fw"></i></a>
                                                </div>
                                            </div>
                                        </div> <!-- end back panel -->
                                    </div> <!-- end card -->
                                </div> <!-- end card-container -->
                            </div> <!-- end col sm 3 -->
                            <?php endforeach;?>
                        </div> <!-- end col-sm-10 -->
                    </div>
		</div>
	</div>
<!-- //mail -->
<script>
 function rotateCard(btn){
 var $card = $(btn).closest('.card-container');
 console.log($card);
 if($card.hasClass('hover')){
 $card.removeClass('hover');
 } else {
 $card.addClass('hover');
 }
 }
</script>

<?php require_once 'footer.php'; //подключаем footer?> 