

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
                <li class="active">Tentang Kami</li>
              </ol>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

<section class="cp-about-section pd-tb60" id="xabout">
    <?php
    foreach($deskripsi->result() as $od){
    ?>    
      <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div role="alert" class="alert alert-info"><?php echo $od->judul;?></div>

                </div>

            </div>
            <div class="row">
                
                <div class="col-md-6">
                    <div class="cp-about-left">
                        <!--<h2>Deskripsi Lembaga</h2>-->
                        
                        <!--<span class="judul1">Deskripsi Lembaga</span>-->
                        <figure class="cp-about-img">
                            <?php
                            if($od->file_foto) {
                                echo '<img width="555" height="450" class="img-responsive" src="gudang/images/deskripsi/'.$od->file_foto.'" alt="">';
                            } else {
                                echo '<img width="555" height="450" class="img-responsive" src="'.base_url('gudang/images/gdgd.jpg').'" alt="">';
                            }
                            ?>
                            
                        </figure>
                    </div>
                </div>
                <div class="col-md-6">
 
                    <div class="cp-about-text">
                        <?php echo $od->deskripsi;?>
   
                    </div>
                </div>
            </div>
        </div>
    <?php
    }
    ?>
        
    </section>

<section class="cp-process-section pd-tb60" id="about">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div role="alert" class="alert alert-info">Filosofi Lembaga</div>

            </div>

        </div>
        <div class="row">
            <?php 
            foreach($filosofi_lembaga->result() as $or){
                echo '<div class="col-md-4 col-sm-6">
                <div class="cp-process-box">
                    <span class="cp-icon-box">
                        <i class="fa fa-sitemap"></i>
                    </span>
                    <div class="cp-text">
                        <h3>'.$or->judul.'</h3>
                        '.$or->deskripsi.'
                    </div>
                </div> 
            </div>';
            }
            ?>
            </div>
        </div>
    </section>

<section class="cp-about-section pd-tb60" id="xabout">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div role="alert" class="alert alert-info">Rentang Inovasi</div>

            </div>
        </div>
        <div class="row">
            <?php 
            foreach($rentang_inovasi->result() as $or){
                echo '<div class="col-md-3 col-sm-6">
                <div class="cp-process-box">
                    <span class="cp-icon-box">
                        <i class="fa fa-sitemap"></i>
                    </span>
                    <div class="cp-text">
                        <h3>'.$or->judul.'</h3>
                        '.$or->deskripsi.'
                    </div>
                </div> 
            </div>';
            }
            ?>

            </div>
        </div>
    </section>