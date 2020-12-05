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
                <li class="active">Detail Kegiatan</li>
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
                <div class="panel-heading"><?php echo $kegiatan->row()->judul;?></div>
                <div class="panel-body"><?php echo $kegiatan->row()->deskripsi;?></div>
            </div>
        </div>
        <div class="row">
        <?php 
        if($foto->num_rows()>0) {
            $li='<div class="demo-gallery">'
                . '<ul id="lightgallery" class="list-unstyled row">';
                foreach($foto->result() as $pf){
                    $li .= '<li class="col-xs-6 col-sm-4 col-md-3" style="margin-bottom:10px;"'
                        . 'data-src="gudang/images/kegiatan/foto/'.$pf->nama_file.'">'
                        . '<a href=""><img style="height:200px;width: 300px;" class="img-responsive" src="gudang/images/kegiatan/foto/resize/'.$pf->nama_file.'"></a></li>';
                }
                $li .='</ul></div>';
                    
                echo $li;
        }
        ?>
        <hr>
        </div>
    </div>
    </section>  
<script type="text/javascript">
        $(document).ready(function(){
            $('#lightgallery').lightGallery();
            $('#lightgallery1').lightGallery();
            $('#lightgallery2').lightGallery();
        });
  </script>
  <script src="<?php echo base_url('gudang/lightgallery/js/lightgallery.js');?>"></script>
  <script src="<?php echo base_url('gudang/lightgallery/js/lg-fullscreen.js');?>"></script>
  <script src="<?php echo base_url('gudang/lightgallery/js/lg-thumbnail.js');?>"></script>
  
  <script src="<?php echo base_url('gudang/lightgallery/js/lg-zoom.js');?>"></script>
  <script src="<?php echo base_url('gudang/lightgallery/js/lg-hash.js');?>"></script>
  <script src="<?php echo base_url('gudang/lightgallery/js/lg-pager.js');?>"></script>
  <script src="<?php echo base_url('gudang/lightgallery/lib/jquery.mousewheel.min.js');?>"></script>