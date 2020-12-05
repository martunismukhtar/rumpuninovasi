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
                <li class="active">Program</li>
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
        foreach($proyek->result() as $op){
            echo '<div class="row" style="padding-left:0px;margin-left: 0px;">'
            . '<div class="box-faq to-animate-2 fadeInUp animated">'
                . '<div class="col-md-2" style="padding-left:0px;">'
                    . '<a class="img-responsive" href="#" title="">'
                    . '<img style="width:100%;height:120px;" src="gudang/images/proyek/'.$op->file_foto.'" alt=" "></a>'
                . '</div>'
                . '<div class="col-md-9 col-sm-9" style="padding-left:0px;">'
                    . '<h3 style="margin-top: 0px;" class="hx">'.$op->judul.'</h3>'
                    . ''.limit_text($op->deskripsi, 120).''
                    . ' <br><a class="btn btn-outline-info" href="list-proyek.html?program='.$op->id.'">Selengkapnya <i class="fa fa-long-arrow-right"></i></a>'
                . '</div>'
               . '</div>'
            . '</div><hr>';
        ?>
        
        
        <?php
        }
        ?>
    </div>
</section>  
