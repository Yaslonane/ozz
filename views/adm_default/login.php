<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="ThemeBucket">
    <link rel="shortcut icon" href="#" type="image/png">

    <title>Login</title>

    <link href="<?php echo ADM_TMPL; ?>css/style.css" rel="stylesheet">
    <link href="<?php echo ADM_TMPL; ?>css/style-responsive.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
</head>

<body class="login-body">

<div class="container">
<?php //var_dump($errors); ?>
<?php //var_dump($_POST); ?>
    <form class="form-signin" action="" method="post">
        <div class="form-signin-heading text-center">
            <h1 class="sign-title">Войдите</h1>
            <img src="<?php echo ADM_TMPL; ?>images/login-logo.png" alt=""/>
        </div>
        <div class="login-wrap">
            <input type="text" name="email" class="form-control" placeholder="e-mail" >
            <input type="password" name="password" class="form-control" placeholder="Password">

            <button class="btn btn-lg btn-login btn-block" type="submit" name="submit">
                <i class="fa fa-check"></i>
            </button>

        </div>
    </form>

</div>



<!-- Placed js at the end of the document so the pages load faster -->

<!-- Placed js at the end of the document so the pages load faster -->
<script src="<?php echo ADM_TMPL; ?>js/jquery-1.10.2.min.js"></script>
<script src="<?php echo ADM_TMPL; ?>js/bootstrap.min.js"></script>
<script src="<?php echo ADM_TMPL; ?>js/modernizr.min.js"></script>

</body>
</html>
