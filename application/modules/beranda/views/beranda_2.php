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
    <!-- Progress bar  -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('gudang/intensely/assets/css/bootstrap-progressbar-3.3.4.css');?>"/>
     <!-- Theme color -->
    <link id="switcher" href="<?php echo base_url('gudang/intensely/assets/css/theme-color/default-theme.css');?>" rel="stylesheet">

    <!-- Main Style -->
    <link href="<?php echo base_url('gudang/intensely/style.css');?>" rel="stylesheet">

    <!-- Fonts -->

    <!-- Open Sans for body font -->
    <!--<link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>-->
    <!-- Lato for Title -->
    <!--<link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>-->    
    
    <link id="switcher" href="<?php echo base_url('gudang/css/modified.css');?>" rel="stylesheet">
   
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
<!--            <a class="navbar-brand" href="index.html"><img src="assets/images/logo.png" alt="logo"></a> -->
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

  <!-- Start slider -->
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
  <!-- End slider -->

  <!-- Start Feature -->
  <?php
  if($des->num_rows()>0) {
  ?>
  <section id="feature">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="title-area">
            <h3 class="title"><?php echo ($this->session->userdata('bahasa')=='id') ? 'Lembaga' : 'Institution'; ?></h3>
            <span class="line"></span>
            <p></p>
          </div>
        </div>
        <div class="col-md-6">
            <div class="cp-about-left">
                <figure class="cp-about-img">
                    <img src="gudang/images/deskripsi/<?php echo $des->row()->file_foto;?>" alt=""  class="img-responsive" width="555" height="400">
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
  <!-- End Feature -->
  
  <section id="about">
    <div class="container">
        <div class="col-md-12">
          <div class="title-area">
            <h3 class="title"><?php echo ($this->session->userdata('bahasa')=='id') ? 'Proyek' : 'Project'; ?></h3>
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
                        <img style="width:100%;" class="img-responsive" src="gudang/images/proyek/<?php echo $op->file_foto;?>" alt=" "></a>
                </div>
                <div class="col-md-9 col-sm-9" style="padding-left:0px;">
                    <h3 class="hx"><?php echo $op->judul;?></h3>
                    <?php echo limit_text($op->deskripsi, 300); ?>
                    <a class="btn btn-outline-info" href="list-kegiatan.html?proyek=<?php echo $op->id;?>">
                        <?php echo ($this->session->userdata('bahasa')=='en') ? 'More' : 'Selengkapnya'; ?>
                         <i class="fa fa-long-arrow-right"></i></a>
                </div>
            </div>
            <hr >
        <?php    
        }
        ?>
      
    </div>
  </section>
  
  <!-- Start about  -->
  
  <!-- end about -->

  <!-- Start counter -->
  <section class="sectionkegiatan">
    <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="title-area">
            <h4 class="title"><?php echo ($this->session->userdata('bahasa')=='id') ? 'Kegiatan' : 'Activity'; ?></h4>
            <span class="line"></span>
            <p></p>
          </div>
          </div>
            
            <div class="col-md-12">
                <?php
        foreach($kegiatan->result() as $ok){
        ?>
            <div class="search-result">
               <h3 class="hx"><?php echo $ok->judul;?></h3>
                    
                <?php echo limit_text($ok->deskripsi, 300);?>
                <a class="btn btn-outline-info" href="detail-kegiatan.html?kegiatan=<?php echo $ok->id;?>">
                    <?php echo ($this->session->userdata('bahasa')=='id') ? 'Selengkapnya' : 'More'; ?><i class="fa fa-long-arrow-right"></i></a>
        </div>
                <hr>
        <?php
        }
        ?>
            </div>
        </div>
      </div>
  </section>
  <!-- End counter -->


  <!-- Start Service -->
  <section id="about">
    <div class="container">
      <div class="row">

        <div class="col-md-12">
          <div class="service-content">
            <div class="row">
              <!-- Start single service -->
              
              <?php 
              foreach($produk->result() as $oppp){
                  echo '<div class="col-md-2">
                <article class="blog-news-single">
                  <div class="blog-news-img">
                    <img src="gudang/images/produk/foto/'.$oppp->cover.'" alt="image">
                  </div>
                  
                  <div class="blog-news-details text-center">
                    <a class="btn btn-outline-info" href="gudang/images/produk/dokumen/'.$oppp->nama_file.'">Unduh file <i class="fa fa-long-arrow-right"></i></a>   
                  </div>
                </article>
              </div>';
              }
              ?>
              
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End Service -->


  <!-- Start footer -->
  <footer id="footer">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="footer-left">
           <p>Designed by <a href="#">GI-SRI 2016 || Support by British Council Newton Fund – Institutional Links Project</a></p>
          </div>
        </div>
        
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
  
  </body>
</html>