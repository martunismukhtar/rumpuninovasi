
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Siyasah Rumpun Inovasi</title>
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/icon" href="assets/images/favicon.ico"/>
    <!-- Font Awesome -->
    <link href="<?php echo base_url('gudang/intensely/assets/css/font-awesome.css');?>" rel="stylesheet">
    
    <link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
    <link href="http://localhost/templatepoltekes/vendor/fontawesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    
    <!-- Bootstrap -->
    <link href="<?php echo base_url('gudang/intensely/assets/css/bootstrap.css');?>" rel="stylesheet">    
    <!-- Slick slider -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('gudang/intensely/assets/css/slick.css');?>"/> 
    <!-- Animate css -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('gudang/intensely/assets/css/animate.css');?>"/> 
    <!-- Bootstrap progressbar  --> 
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('gudang/intensely/assets/css/bootstrap-progressbar-3.3.4.css');?>"/> 
     <!-- Theme color -->
    <link id="switcher" href="<?php echo base_url('gudang/intensely/assets/css/theme-color/default-theme.css');?>" rel="stylesheet">
    <link id="switcher" href="<?php echo base_url('gudang/css/modified.css');?>" rel="stylesheet">
    <!-- Main Style -->
    <link href="<?php echo base_url('gudang/intensely/style.css');?>" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>    
    <!-- Fonts -->

    <!-- Open Sans for body font -->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <!-- Lato for Title -->
    <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'> 
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
    .main-login {
        margin-top: 0;
        position: relative;
    }    
    
    .main-login .logo {
        padding: 0 10px;
    }
    .margin-top-30 {
        margin-top: 30px !important;
    }
    .main-login .box-login, .main-login .box-forgot, .main-login .box-register {
        background: #FFFFFF;
        border-radius: 5px;
        overflow: hidden;
        padding: 15px;
        margin: 15px 0 65px 0;
    }
    </style>
  </head>
  <body> 

  <!-- BEGAIN PRELOADER -->
  <div id="preloader">
    <div id="status">&nbsp;</div>
  </div>
  <!-- END PRELOADER -->

  <!-- SCROLL TOP BUTTON -->
  <a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
  <!-- END SCROLL TOP BUTTON -->

  <!-- Start header -->
  <!--<header id="header">-->
    <!-- header top search -->
<!--    <div class="header-top">
      <div class="container">
        <form action="">
          <div id="search">
          <input type="text" placeholder="Type your search keyword here and hit Enter..." name="s" id="m_search" style="display: inline-block;">
          <button type="submit">
            <i class="fa fa-search"></i>
          </button>
        </div>
        </form>
      </div>
    </div>-->
    <!-- header bottom -->
<!--    <div class="header-bottom">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-sm-6 col-xs-6">
            <div class="header-contact">
              <ul>
                <li>
                  <div class="phone">
                    <i class="fa fa-phone"></i>
                    +1(800) 699-7071
                  </div>
                </li>
                <li>
                  <div class="mail">
                    <i class="fa fa-envelope"></i>
                    iam@domain.com
                  </div>
                </li>
              </ul>
            </div>
          </div>
          <div class="col-md-6 col-sm-6 col-xs-6">
            <div class="header-login">
              <a class="login modal-form" data-target="#login-form" data-toggle="modal" href="#">Login / Sign Up</a>
            </div>
          </div>
        </div>
      </div>
    </div>-->
  <!--</header>-->
  <!-- End header -->

  <!-- Start login modal window -->
  <div aria-hidden="false" role="dialog" tabindex="-1" id="login-form" class="modal leread-modal fade in">
    <div class="modal-dialog">
      <!-- Start login section -->
      <div id="login-content" class="modal-content">
        <div class="modal-header">
          <button aria-label="Close" data-dismiss="modal" class="close" type="button"><span aria-hidden="true">×</span></button>
          <h4 class="modal-title"><i class="fa fa-unlock-alt"></i>Login</h4>
        </div>
        <div class="modal-body">
          <form>
            <div class="form-group">
              <input type="text" placeholder="User name" class="form-control">
            </div>
            <div class="form-group">
              <input type="password" placeholder="Password" class="form-control">
            </div>
             <div class="loginbox">
              <label><input type="checkbox"><span>Remember me</span></label>
              <button class="btn signin-btn" type="button">SIGN IN</button>
            </div>                    
          </form>
        </div>
        <div class="modal-footer footer-box">
          <a href="#">Forgot password ?</a>
          <span>No account ? <a id="signup-btn" href="#">Sign Up.</a></span>            
        </div>
      </div>
      <!-- Start signup section -->
      <div id="signup-content" class="modal-content">
        <div class="modal-header">
          <button aria-label="Close" data-dismiss="modal" class="close" type="button"><span aria-hidden="true">×</span></button>
          <h4 class="modal-title"><i class="fa fa-lock"></i>Sign Up</h4>
        </div>
        <div class="modal-body">
          <form>
            <div class="form-group">
              <input placeholder="Name" class="form-control">
            </div>
            <div class="form-group">
              <input placeholder="Username" class="form-control">
            </div>
            <div class="form-group">
              <input placeholder="Email" class="form-control">
            </div>
            <div class="form-group">
              <input type="password" placeholder="Password" class="form-control">
            </div>
            <div class="signupbox">
              <span>Already got account? <a id="login-btn" href="#">Sign In.</a></span>
            </div>
            <div class="loginbox">
              <label><input type="checkbox"><span>Remember me</span><i class="fa"></i></label>
              <button class="btn signin-btn" type="button">SIGN UP</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- End login modal window -->

  <!-- BEGIN MENU -->
  <section id="menu-area">      
    <nav class="navbar navbar-default" role="navigation">  
      <div class="container">
        <div class="navbar-header">
          <!-- FOR MOBILE VIEW COLLAPSED BUTTON -->
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <!-- LOGO -->              
          <!-- TEXT BASED LOGO -->
          <a class="navbar-brand" href="index.html">Siasah Rumpun Inovasi</a>              
          <!-- IMG BASED LOGO  -->
          <!-- <a class="navbar-brand" href="index.html"><img src="assets/images/logo.png" alt="logo"></a> -->                    
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul id="top-menu" class="nav navbar-nav navbar-right main-nav">
            <li><a href="index.html">Home</a></li>
            <li><a href="tentang-kami.html">Tentang Kami</a></li>
            <li><a href="program.html">Program</a></li>
            <li><a href="kegiatan.html">Kegiatan</a></li>
            <li><a href="produk-kami.html">Produk</a></li>
            
            <li><a href="contact.html">Contact</a></li>
          </ul>                 
        </div><!--/.nav-collapse -->
        <a href="#" id="search-icon">
          <i class="fa fa-search">            
          </i>
        </a>
      </div>     
    </nav>
  </section>
  <!-- END MENU --> 
  
 <!-- Start single page header -->
  <section id="single-page-header">
    <div class="overlay">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="single-page-header-left">
<!--              <h2>404 Error - Not Found</h2>
              <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>-->
            </div>
          </div>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="single-page-header-right">
              <ol class="breadcrumb">
                <li><a href="index.html">Home</a></li>
                <li class="active">Login</li>
              </ol>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End single page header -->
  <!-- Start error section  -->
  <section id="error">
<!--    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="errror-page-area">
            <h1 class="error-title"><span class="fa fa-bug"></span></h1>
            <div class="error-content">
              <span>Opps!</span>
              <p>We're sorry, but the page you were looking for doesn't exist.</p>
              <a class="error-home" href="index.html">Home Page</a>
            </div>
          </div>
        </div>
      </div>
    </div>-->

<div class="container">
    
        <div class="row">
            <div class="main-login col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
                <div class="logo margin-top-30"></div>
				<!-- start: LOGIN BOX -->
                <div class="box-login">
                    <form class="form-login" action="logn" method="post" novalidate="novalidate">
                        <fieldset>
                            <legend>
                                Sign in to your account
                            </legend>
                            <?php echo $this->session->flashdata('msg');?>
                            <p>Please enter your name and password to log in.</p>
                            <div class="form-group">
                                <!--<span class="input-icon">-->
                                <input type="text" class="form-control" name="email" placeholder="Email">
                                    <!--<i class="fa fa-user"></i> </span>-->
                            </div>
                            <div class="form-group form-actions">
                                <span class="input-icon">
                                    <input type="password" class="form-control password" name="password" placeholder="Password">
									<!--<i class="fa fa-lock"></i>-->
                                </span>
                            </div>
                            <div class="form-actions">
                                <button type="submit" class="btn btn-primary pull-right">
                                    Login <i class="fa fa-arrow-circle-right"></i>
                                </button>
                            </div>
                        </fieldset>
                    </form>
                </div>
				<!-- end: LOGIN BOX -->
            </div>
    	</div>
    </div>

  </section>
  <!-- End error section  -->

  <!-- Start subscribe us -->
  <section id="subscribe">
    <div class="subscribe-overlay">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="subscribe-area">
<!--              <h2>Subscribe Newsletter</h2>
              <form action="" class="subscrib-form">
                <input type="text" placeholder="Enter Your E-mail..">
                <button class="subscribe-btn" type="submit">Submit</button>
              </form>-->
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End subscribe us -->

  <!-- Start footer -->
  <footer id="footer">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-sm-6">
          <div class="footer-left">
            <p>Designed by <a href="#">Geotera Inovasi</a></p>
          </div>
        </div>
        <div class="col-md-6 col-sm-6">
          <div class="footer-right">
            <a href="index.html"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-google-plus"></i></a>
            <a href="#"><i class="fa fa-linkedin"></i></a>
            <a href="#"><i class="fa fa-pinterest"></i></a>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!-- End footer -->

 <!-- jQuery library -->
 <script src="<?php echo base_url('gudang/js/bootstrap.min.js');?>"></script>
  <!-- Slick Slider -->
  <script type="text/javascript" src="<?php echo base_url('gudang/intensely/assets/js/slick.js');?>"></script>    
 <!-- counter -->
  <script src="<?php echo base_url('gudang/intensely/assets/js/waypoints.js');?>"></script>
  <script src="<?php echo base_url('gudang/intensely/assets/js/jquery.counterup.js');?>"></script>
  <!-- Wow animation -->
  <script type="text/javascript" src="<?php echo base_url('gudang/intensely/assets/js/wow.js');?>"></script> 
  <!-- progress bar   -->
  <script type="text/javascript" src="<?php echo base_url('gudang/intensely/assets/js/bootstrap-progressbar.js');?>"></script>  
  
 
  <!-- Custom js -->
  <script type="text/javascript" src="<?php echo base_url('gudang/intensely/assets/js/custom.js');?>"></script>
    
  </body>
</html>