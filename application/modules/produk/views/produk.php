<link href="<?php echo base_url('gudang/lightgallery/dist/css/lightgallery.css');?>" rel="stylesheet">

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
                <li class="active">Produk</li>
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
                <div class="col-md-12">
          <!-- Custom Tabs -->
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tab_1" data-toggle="tab">Dokumen</a></li>
                            <li><a href="#tab_2" data-toggle="tab">Video</a></li>
                            <li><a href="#tab_3" data-toggle="tab">Sistem Informasi</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab_1">
                                <br>
                                
                                <?php echo $this->m_produk->getdokumen(); ?>
                                
                            </div>
              <!-- /.tab-pane -->
                            <div class="tab-pane" id="tab_2">
                             
                                <?php echo $this->m_produk->getvideo(); ?>
                            </div>
                <!-- /.tab-pane -->
                            <div class="tab-pane" id="tab_3">
                                <br>
                                <?php echo $this->m_produk->getsi(); ?>
                            </div>
              
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>  

<script type="text/javascript">
        
  </script>
