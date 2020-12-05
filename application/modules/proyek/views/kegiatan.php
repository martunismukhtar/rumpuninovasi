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
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">Proyek : <?php echo $proyek->row()->judul;?></div>
                <div class="panel-body"><?php echo $proyek->row()->deskripsi;?></div>
            </div>
        </div>
        <?php 
        foreach($kegiatan->result() as $ook){
        ?>
        <div class="row">
            <div class="box-faq to-animate-2 fadeInUp animated">
                <div class="feature-left animate-box fadeInLeft animated-fast" data-animate-effect="fadeInLeft">
                    <span class="icon"><i class="icon-check2"></i></span>
                    <div class="feature-copy">
                        <h3><?php echo $ook->judul;?></h3>
			<?php echo $ook->deskripsi;?> 
                        
                    </div>
		</div>
                <a class="btn btn-outline-info" href="detail-kegiatan.html?kegiatan=<?php echo $ook->id;?>">
                        <?php echo ($this->session->userdata('bahasa')=='id') ? 'Selengkapnya' : 'More'; ?>
                         <i class="fa fa-long-arrow-right"></i></a>
                
            </div>
            <hr>
        </div>
        
        <?php
        }
        ?>
    </div>
</section>  

