<link rel="stylesheet" type="text/css" href="<?php echo base_url('gudang/css/icomoon.css');?>"/>
<section id="single-page-header" style="background-image: url('gudang/images/slides/<?php echo getstaticback()->row()->nama_file;?>') !important;background-repeat: repeat;width:100%;">
    <div class="overlay">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="single-page-header-left">
<!--              <h2>Feature</h2>
              <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>-->
            </div>
          </div>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="single-page-header-right">
              <ol class="breadcrumb">
                <li><a href="index.html">Home</a></li>
                <li class="active">Kegiatan</li>
              </ol>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
 
<section class="cp-about-section pd-tb60" id="xabout">
    <div class="container">
        <?php 
        foreach($kegiatan->result() as $ook){
        ?>
        <div class="row">
            <div class="box-faq to-animate-2 fadeInUp animated">
                <i class="icon-check2" style="float:left;"></i>
		<div class="desc">
                    <h3><?php echo $ook->judul;?></h3>
                    <?php echo $ook->deskripsi;?>
                    <a class="blog-more-btn" href="detail-kegiatan.html?kegiatan=<?php echo $ook->id;?>">Selengkapnya <i class="fa fa-long-arrow-right"></i></a>
		</div>
            </div>
            <hr>
        </div>
        
        <?php
        }
        ?>
    </div>
</section>  
