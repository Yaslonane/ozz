<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="ThemeBucket">
  <link rel="shortcut icon" href="#" type="image/png">

  <title><?php echo self::$title; ?></title>
  
   <!--ckeditor-->
  <script type="text/javascript" src="<?php echo LIB; ?>/ckeditor/ckeditor.js"></script>
  <script type="text/javascript" src="<?php echo LIB; ?>/AjexFileManager/Ajex.js"></script>
  
      <!--multi-select-->
    <link rel="stylesheet" type="text/css" href="<?php echo ADM_TMPL; ?>js/jquery-multi-select/css/multi-select.css" />
  

  <link href="<?php echo ADM_TMPL; ?>css/style.css" rel="stylesheet">
  <link href="<?php echo ADM_TMPL; ?>css/style-responsive.css" rel="stylesheet">
    <!--icheck-->
  <link href="<?php echo ADM_TMPL; ?>js/iCheck/skins/minimal/minimal.css" rel="stylesheet">
  <link href="<?php echo ADM_TMPL; ?>js/iCheck/skins/square/square.css" rel="stylesheet">
  <link href="<?php echo ADM_TMPL; ?>js/iCheck/skins/square/red.css" rel="stylesheet">
  <link href="<?php echo ADM_TMPL; ?>js/iCheck/skins/square/blue.css" rel="stylesheet">

  <!--dashboard calendar-->
  <link href="<?php echo ADM_TMPL; ?>css/clndr.css" rel="stylesheet">
  
    <!--pickers css-->
  <link rel="stylesheet" type="text/css" href="<?php echo ADM_TMPL; ?>js/bootstrap-datepicker/css/datepicker-custom.css" />
  <link rel="stylesheet" type="text/css" href="<?php echo ADM_TMPL; ?>js/bootstrap-timepicker/css/timepicker.css" />
  <link rel="stylesheet" type="text/css" href="<?php echo ADM_TMPL; ?>js/bootstrap-colorpicker/css/colorpicker.css" />
  <link rel="stylesheet" type="text/css" href="<?php echo ADM_TMPL; ?>js/bootstrap-daterangepicker/daterangepicker-bs3.css" />
  <link rel="stylesheet" type="text/css" href="<?php echo ADM_TMPL; ?>js/bootstrap-datetimepicker/css/datetimepicker-custom.css" />


  <!--common-->
  <link href="<?php echo ADM_TMPL; ?>css/style.css" rel="stylesheet">
  <link href="<?php echo ADM_TMPL; ?>css/style-responsive.css" rel="stylesheet">
  
  <link href="<?php echo ADM_TMPL; ?>js/advanced-datatable/css/demo_page.css" rel="stylesheet" />
  <link href="<?php echo ADM_TMPL; ?>js/advanced-datatable/css/demo_table.css" rel="stylesheet" />
  <link rel="stylesheet" href="<?php echo ADM_TMPL; ?>js/data-tables/DT_bootstrap.css" />




  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
  <script src="js/html5shiv.js"></script>
  <script src="js/respond.min.js"></script>
  <![endif]-->

  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
  <script src="js/html5shiv.js"></script>
  <script src="js/respond.min.js"></script>
  <![endif]-->
</head>

<body class="horizontal-menu-page">

<section>

    <nav class="navbar navbar-default" role="navigation">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo DOMAIN; ?>/adminpanel">
                    <img src="<?php echo ADM_TMPL; ?>images/logo.png" alt="">
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li ><a href="<?php echo DOMAIN; ?>/adminpanel">Главная</a></li>
                    <li> <!--class="active"--><a href="<?php echo DOMAIN; ?>/adminpanel/services">Услуги</a></li>
                    <li><a href="<?php echo DOMAIN; ?>/adminpanel/posts">Блог</a></li>
                    <li><a href="<?php echo DOMAIN; ?>/adminpanel/category">Категории</a></li>
                    <li><a href="<?php echo DOMAIN; ?>/adminpanel/gallery">Галерея</a></li>
     
                </ul>

                <ul class="nav navbar-nav navbar-right">

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <img alt="" src="<?php echo ADM_TMPL; ?>images/photos/user-avatar.png"> Админ <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo DOMAIN; ?>" target="_blank">На сайт</a></li>
                            <li><a href="<?php echo DOMAIN; ?>/logout">Выйти</a></li>
                        </ul>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>