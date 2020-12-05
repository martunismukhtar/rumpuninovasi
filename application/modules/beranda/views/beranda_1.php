<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>SRI:Siasah Rumpun Inovasi</title>
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/icon" href="assets/images/favicon.ico"/>
    <!-- Font Awesome -->
    <link href="<?php echo base_url('gudang/intensely/assets/css/font-awesome.css');?>" rel="stylesheet">
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

    <!-- Main Style -->
    <link href="<?php echo base_url('gudang/intensely/style.css');?>" rel="stylesheet">

    <link href="<?php echo base_url('gudang/lightgallery/dist/css/lightgallery.css');?>" rel="stylesheet">
    <link id="switcher" href="<?php echo base_url('gudang/css/modified.css');?>" rel="stylesheet">
   <style type="text/css">
    body{
        background-color: #152836
    }
    .navbar-brand {
        text-transform: capitalize; 
    } 
        </style>
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
  <header id="header">
    <!-- header top search -->
<!--    <div class="header-top">
      <div class="container">
        
      </div>
    </div>-->
    <!-- header bottom -->
    
  </header>
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
            <?php
            echo menu();
            ?>
            <!--<li><a href="contact.html">Contact</a></li>-->
          </ul>                     
        </div><!--/.nav-collapse -->
        
        <div id="search-icon">
            <a href="index.html?lang=id">ID</a> | <a href="index.html?lang=en">EN</a>
        </div>
        
      </div>     
    </nav>
  </section>
  <!-- END MENU --> 
  
  <!-- Start single page header -->
  <section id="slider">
    <div class="main-slider">
        
      <?php 
      foreach($slide->result() as $objs){
      ?>
            <div class="single-slide">
        <img src="gudang/images/slides/<?php echo $objs->file_foto; ?>" alt="img">
        <div class="slide-content">
          <div class="container">
            <div class="row">
              <div class="col-md-6 col-sm-6">
                <div class="slide-article">
                  <h1 class="wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.5s"><?php echo $objs->judul; ?></h1>
                  <p class="wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.75s"><?php echo $objs->deskripsi; ?></p>
                  
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
      <?php  
      }
      ?>
               
    </div>
  </section>
  <!-- End single page header -->
  
  <!-- Start Feature -->
  <?php
  if($des->num_rows()>0) {
  ?>
  <section id="feature">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="title-area">
            <h4 class="title"><?php echo ($this->session->userdata('bahasa')=='id') ? 'Lembaga' : 'Institution'; ?></h4>
            <span class="line"></span>
            <p></p>
          </div>
        </div>
        <div class="col-md-6">
            <div class="cp-about-left">
                <figure class="cp-about-img">
                    <img src="gudang/images/deskripsi/<?php echo $des->row()->file_foto;?>" alt="" width="555" height="400">
                </figure>
            </div>
        </div>
        <div class="col-md-6">
            <div class="cp-about-text">
                <?php echo $des->row()->deskripsi;?>
            </div>
        </div>
      </div>
    </div>
  </section>
  <?php
  }
  ?>
  
  <section id="service">
    <div class="container">
        <div class="col-md-12">
          <div class="title-area">
            <h4 class="title"><?php echo ($this->session->userdata('bahasa')=='id') ? 'Proyek' : 'Project'; ?></h4>
            <span class="line"></span>
            <p></p>
          </div>
        </div>
        <?php
        foreach($proyek->result() as $op){
            ?>
            <div class="row" style="padding-left:0px;margin-left: 0px;">
                <div class="col-md-3 col-xs-4" style="padding-left:0px;">
                    <a class="img-responsive" href="#" title="">
                        <img style="width:100%;" src="gudang/images/proyek/<?php echo $op->file_foto;?>" alt=" "></a>
                </div>
                <div class="col-md-9 col-sm-9" style="padding-left:0px;">
                    <h4><a href="list-kegiatan.html?proyek=<?php echo $op->id;?>" style="color:#337ab7;"><?php echo $op->judul;?></a></h4>
                    <?php echo $op->deskripsi; ?>
                </div>
            </div>
            <hr>
        <?php    
        }
        ?>
      
    </div>
  </section>
  
  <section id="about">
    <div class="container">
        <div class="col-md-12">
          <div class="title-area">
            <h4 class="title"><?php echo ($this->session->userdata('bahasa')=='id') ? 'Kegiatan' : 'Activity'; ?></h4>
            <span class="line"></span>
            <p></p>
          </div>
        </div>
        <?php
        foreach($kegiatan->result() as $ok){
        ?>
            <div class="search-result">
            <h4><a href="detail-kegiatan.html?kegiatan=<?php echo $ok->id;?>" style="color:#337ab7;"><?php echo $ok->judul;?></a></h4>
                    <!--<a href="#">http://www.apple.com</a>-->
                <?php echo $ok->deskripsi;?>
        </div>
        <hr>
        <?php
        }
        ?>
        
    </div>
  </section>
  
  
  
  <section class="cp-filterable-portfolio">
        <div class="container">
            <div class="cp-section-title">
                <!--<h2>Galeri</h2>-->
                <!--<strong> Morlem ipsum dolor sit amet, vesena tomosi elit. Ut elit tellus luctus nec.</strong>-->
            </div>
        </div>
        <div class="cp-filterable-portfolio-holder">

            <div class="demo-gallery">
            <ul id="lightgallery" class="list-unstyled row">
                <?php
                foreach($foto_kegiatan->result() as $ook) {
                ?>
                <li class="col-xs-6 col-sm-4 col-md-3" 
                    data-src="gudang/images/kegiatan/foto/<?php echo $ook->nama_file;?>" >
                    <a href="">
                        <img class="img-responsive" style="height:200px;width: 300px;" src="gudang/images/kegiatan/foto/<?php echo $ook->nama_file;?>">
                    </a>
                </li>
                <?php
                }
                ?>

            </ul>
        </div>
            </div>
    </section>
  
  <!-- End Feature -->

  <!-- Start subscribe us -->
<!--  <section id="subscribe">
    <div class="subscribe-overlay">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="subscribe-area">
              <h2 class="wow fadeInUp">Subscribe Newsletter</h2>
              <form action="" class="subscrib-form wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.5s">
                <input type="text" placeholder="Enter Your E-mail..">
                <button class="subscribe-btn" type="submit">Submit</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>-->
  <!-- End subscribe us -->

  <!-- Start footer -->
  <footer id="footer">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-sm-6">
          <div class="footer-left">
           <p>Designed by <a href="#">GI-SRI 2016</a></p>
          </div>
        </div>
<!--        <div class="col-md-6 col-sm-6">
          <div class="footer-right">
            <a href="index.html"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-google-plus"></i></a>
            <a href="#"><i class="fa fa-linkedin"></i></a>
            <a href="#"><i class="fa fa-pinterest"></i></a>
          </div>
        </div>-->
      </div>
    </div>
  </footer>
  <!-- End footer -->

    <!-- jQuery library -->
  <script src="<?php echo base_url('gudang/js/jquery-1.11.3.min.js');?>"></script>    
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <!-- Bootstrap -->
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
  
  <script type="text/javascript">
        $(document).ready(function(){
            $('#lightgallery').lightGallery();
        });
  </script>
  <script src="<?php echo base_url('gudang/lightgallery/js/lightgallery.js');?>"></script>
  <script src="<?php echo base_url('gudang/lightgallery/js/lg-fullscreen.js');?>"></script>
  <script src="<?php echo base_url('gudang/lightgallery/js/lg-thumbnail.js');?>"></script>
  <script src="<?php echo base_url('gudang/lightgallery/js/lg-video.js');?>"></script>
  <script src="<?php echo base_url('gudang/lightgallery/js/lg-autoplay.js');?>"></script>
  <script src="<?php echo base_url('gudang/lightgallery/js/lg-zoom.js');?>"></script>
  <script src="<?php echo base_url('gudang/lightgallery/js/lg-hash.js');?>"></script>
  <script src="<?php echo base_url('gudang/lightgallery/js/lg-pager.js');?>"></script>
  <script src="<?php echo base_url('gudang/lightgallery/lib/jquery.mousewheel.min.js');?>"></script>
  </body>
</html>