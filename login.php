<?php
ob_start();
session_start();


if( isset($_SESSION['username'] ) )
{
    //header( 'location: home.php' );
}
//if( isset($_POST['g-recaptcha-response']) && $_POST['g-recaptcha-response'] != "" )
//{
if( isset( $_POST['captcha']) && $_POST['captcha']!= "" )
{
    //echo $_SESSION['captcha']['code'] ."   ".  $_POST['captcha'];
    if( strtolower( $_SESSION['captcha']['code'] ) ==  strtolower( $_POST['captcha']) )
    {
        if(isset($_POST['username']) && $_POST['username'] != "" && $_POST['Password'] != "" )
        {
            require_once "include/code.php";
            $user = new users();
            $user->_login( $_POST['username'], $_POST['Password']);

        }

    }

    else
    {
        $_SESSION = array();
        include("plugins/captcha/simple-php-captcha.php");
        $_SESSION['captcha'] = simple_php_captcha();
        //echo $_SESSION['captcha']['code'];
    }

}

else
{
    $_SESSION = array();
    include("plugins/captcha/simple-php-captcha.php");
    $_SESSION['captcha'] = simple_php_captcha();
    //echo $_SESSION['captcha']['code'];
}

//}

?>

<!DOCTYPE html>
<html lang="fa" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
    <meta name="author" content="GeeksLabs">
    <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
    <link rel="shortcut icon" href="img/favicon.png">

    <title>صفحه ورود</title>

   
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />



        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons 2.0.0 -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/iCheck/flat/blue.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="plugins/morris/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker-bs3.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

    <link rel="stylesheet" href="dist/fonts/fonts-fa.css">
    <link rel="stylesheet" href="dist/css/bootstrap-rtl.min.css">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>

    <!--  google recaptcha  linkage  -->
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <![endif]-->
</head>

  <body class="login-img-body"  dir="rtl">

    <div class="container">

       
        <div class="col-md-offset-4 col-md-4">

              <form class="login-form" action="" method="post">
                <div class="form-group">
                    <div class="text-center"><h4> ورود </h4></div>
                </div>
                <div class="login-wrap">
                    <p class="login-img"><i class="icon_lock_alt"></i></p>
                    <div class="input-group">
                      <span class="input-group-addon"><i class="icon_profile"></i></span>
                      <input type="text" name="username" class="form-control" placeholder="نام کاربری" autofocus>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="icon_key_alt"></i></span>
                        <input type="password" name="Password" class="form-control" placeholder="رمز عبور">
                    </div>
                    <!--<div class="g-recaptcha" data-sitekey="6LeeIsQSAAAAAP1Y9xyhVrlzret6Js156HrZsoVm"></div>-->
                    <input type="text" name="captcha" class="form-control" placeholder="کد زیر را وارد کنید" autofocus>

                    <?php   echo "<img  class='thumbnail' style='margin-top:10px'   src='" . $_SESSION['captcha']['image_src'] . "' >";  ?>

                    <div class="checkbox pull-right" style="float: right">
                        <span class="pull-right"> <a href="#"> گذرواژه ام را فراموش کرده ام</a></span>
                        </br>
                        <input type="checkbox"  id="rememberme" style="margin-right: 0px" value="remember-me">
                        <label for="rememberme"> مرا بخاطر بسپار </label>
                    </div>
                    <button class="btn btn-primary btn-lg btn-block" type="submit">ورود</button>


                </div>

              </form>

        </div>

    </div>


  </body>
</html>
