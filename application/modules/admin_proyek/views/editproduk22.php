<link href="<?php echo base_url('/gudang/css/styles1.css')?>" rel="stylesheet" media="screen">
<link href="<?php echo base_url('/gudang/css/plugins.css')?>" rel="stylesheet" media="screen">
<link href="<?php echo base_url('/gudang/bootstrap-fileinput/jasny-bootstrap.min.css')?>" rel="stylesheet" media="screen">
<?php 
if(!$this->session->userdata('email')) {
    redirect('masuk');
}
    
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Halaman produk</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Forms</a></li>
            <li class="active">Editors</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <?php echo $this->session->flashdata('msg');?>
        <form role="form" id="form" novalidate="novalidate"  action="simpan-edit-produk.html" method="post" enctype="multipart/form-data">
            
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-info">
                        <div class="box-header">
                            <h3 class="box-title">Produk
                            
                            </h3>

                        </div>
            
                    </div>
          
                </div>
            </div>
            
            <div class="row">    
                
                <div class="col-md-12">
                    <!--<div class="info-box">-->
                        <div class="form-group">
                        <label>Judul</label>
                        <input type="text" class="form-control" name="judul" value="<?php echo $produk->row()->judul;?>">
                    <!--</div>-->
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
            </div>
            <div class="row">    
                <div class="col-md-12">
                    <!--<div class="info-box">-->
                        <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea id="editor1" name="dokumen" rows="2" cols="80">
                              <?php echo $produk->row()->deskripsi;?>
                        </textarea>
                    </div>
                    
                    <!--</div>-->
                    
                </div>
                <input type="hidden" name="id" value="<?php echo $produk->row()->id;?>">
            
           
            </div>
            
            <div class="row">

                <div class="col-md-12">
                    <?php
                if($foto->num_rows()>0) {
                    foreach($foto->result() as $oof){
                ?>
                    <div class="fileinput fileinput-new" data-provides="fileinput">
                        
                        <?php    
                        if($oof->nama_file) {
                            echo  '<div class="fileinput-new thumbnail"><img src="gudang/images/produk/foto/'.$oof->nama_file.'" alt=""></div>';
                        } else {
                            echo  '<div class="fileinput-new thumbnail xfotomhs"></div>';
                        }
                        ?>   
                        <div class="fileinput-preview fileinput-exists thumbnail" style="width:350px !important;height: 250px;"></div>
                        <div class="user-edit-image-buttons">
                            <span class="btn btn-azure btn-file"><span class="fileinput-new"><i class="fa fa-picture"></i> Select image</span>
                                <span class="fileinput-exists"><i class="fa fa-picture"></i> Change</span>
                                <input type="file" name="file_upload[]"> 
                            </span>
                            <a href="#" class="btn fileinput-exists btn-red" data-dismiss="fileinput">
                                <i class="fa fa-times"></i> Remove
                            </a>
                        </div>
                        <input type="hidden" name="idfoto[]" value="<?php echo $oof->id;?>">
                    </div>
                <?php
                    }
                
                }
                    for($p=0;$p<10;$p++) {
                        echo '<div class="fileinput fileinput-new" data-provides="fileinput">
                        <div class="fileinput-new thumbnail xfotomhs">  </div>
                        <div class="fileinput-preview fileinput-exists thumbnail" style="width:350px !important;height: 250px;"></div>
                        <div class="user-edit-image-buttons">
                            <span class="btn btn-azure btn-file"><span class="fileinput-new"><i class="fa fa-picture"></i> Select image</span>
                                <span class="fileinput-exists"><i class="fa fa-picture"></i> Change</span>
                                <input type="file" name="filex[]"> 
                            </span>
                            <a href="#" class="btn fileinput-exists btn-red" data-dismiss="fileinput">
                                <i class="fa fa-times"></i> Remove
                            </a>
                        </div>
                    </div> ';
                    }
                    ?>
                    

                </div>
            </div>  
            <hr>
            
            
            <div class="row">
                <div class="col-md-4">
                    <button class="btn btn-primary btn-sm pull-left btnadd" type="submit" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Sedang menyimpan data">
                    Simpan <i class="fa fa-arrow-circle-left"></i>
                    </button>
                </div>
            </div>
        
        </form>  
        <!-- /.col-->
        
      <!-- ./row -->
    </section>
    <br>
    <section class="content">
        
    </section>
    
    <!-- /.content -->
 </div>

<script src="<?php echo base_url('gudang/AdminLTE-2.3.7/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js'); ?>"></script>
<script src="<?php echo base_url('/gudang/bootstrap-fileinput/jasny-bootstrap.js')?>"></script>
<script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1');
    CKEDITOR.replace('sistem_informasi');
    CKEDITOR.replace('model');
    //bootstrap WYSIHTML5 - text editor
//    $(".textarea").wysihtml5();
  });
</script>