<link href="<?php echo base_url('/gudang/css/styles1.css')?>" rel="stylesheet" media="screen">
<link href="<?php echo base_url('/gudang/css/plugins.css')?>" rel="stylesheet" media="screen">
<link href="<?php echo base_url('/gudang/bootstrap-fileinput/jasny-bootstrap.min.css')?>" rel="stylesheet" media="screen">
<link href="<?php echo base_url('gudang/AdminLTE-2.3.7/plugins/select2/select2.css')?>" rel="stylesheet" media="screen">
<?php 
if(!$this->session->userdata('email')) {
    redirect('masuk');
}
    
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Halaman kegiatan</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Forms</a></li>
            <li class="active">Editors</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <?php echo $this->session->flashdata('msg');?>
        <form role="form" id="form" novalidate="novalidate"  action="simpan-edit-kegiatan.html" method="post" enctype="multipart/form-data">
            
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-info">
                        <div class="box-header">
                            <h3 class="box-title"><strong>Kegiatan</strong>
                            
                            </h3>

                        </div>
            
                    </div>
          
                </div>
            </div>
            
            <div class="row">    
                
                <div class="col-md-12">
                    <!--<div class="info-box">-->
                        <div class="form-group">
                        <label>Program</label>
                        <select class="form-control select2" name="program" style="width: 100%;">
                            <option selected="selected">--Pilih--</option>
                            <?php 
                            foreach($program->result() as $op){
                                if($op->id==$kegiatan->row()->program) {
                                    echo '<option value="'.$op->id.'" selected>'.$op->judul.'</option>';
                                } else {
                                    echo '<option value="'.$op->id.'">'.$op->judul.'</option>';
                                }
                                
                            }
                            ?>
                        </select>
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
                        <label>Judul</label>
                        <input type="text" class="form-control" name="judul" value="<?php echo $kegiatan->row()->judul;?>">
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
                        <textarea id="editor1" name="deskripsi" rows="2" cols="80">
                              <?php echo $kegiatan->row()->deskripsi;?>
                        </textarea>
                        <input type="hidden" name="id" value="<?php echo $kegiatan->row()->id;?>">
                    </div>
                    
                    <!--</div>-->
                    
                </div>
            
            
           
            </div>
            
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-info">
                        <div class="box-header">
                            <h3 class="box-title">Foto
                            
                            </h3>

                        </div>
            
                    </div>
          
                </div>
                
                <div class="col-md-12">
                    
                    <?php
                if($foto->num_rows()>0) {
                    foreach($foto->result() as $oof){
                ?>
                    <div class="fileinput fileinput-new" data-provides="fileinput">
                        
                        <?php    
                        if($oof->nama_file) {
                            echo  '<div class="fileinput-new thumbnail"><img style="width:350px !important;height: 250px;" src="gudang/images/kegiatan/foto/'.$oof->nama_file.'" alt=""></div>';
                        } else {
                            echo  '<div class="fileinput-new thumbnail xfotomhs"></div>';
                        }
                        ?>   
                        <div class="fileinput-preview fileinput-exists thumbnail" style="width:350px !important;height: 250px;"></div>
                        <div class="user-edit-image-buttons">
                            <span class="btn btn-azure btn-file"><span class="fileinput-new"><i class="fa fa-picture"></i> Pilih image</span>
                                <span class="fileinput-exists"><i class="fa fa-picture"></i> Ganti</span>
                                <input type="file" name="file_upload[]"> 
                            </span>
                            <a href="#" class="btn fileinput-exists btn-red" data-dismiss="fileinput">
                                <i class="fa fa-times"></i> Hapus
                            </a>
                        </div>
                        <input type="hidden" name="idfoto[]" value="<?php echo $oof->dokumen;?>">
                    </div>
                <?php
                    }
                
                }
                for($f=0;$f<8;$f++) {
                        echo '
                    <div class="fileinput fileinput-new" data-provides="fileinput">
                        <div class="fileinput-new thumbnail xfotomhs"></div>
                       
                        <div class="fileinput-preview fileinput-exists thumbnail" style="width:350px !important;height: 250px;"></div>
                        <div class="user-edit-image-buttons">
                            <span class="btn btn-azure btn-file"><span class="fileinput-new"><i class="fa fa-picture"></i> Pilih image</span>
                                <span class="fileinput-exists"><i class="fa fa-picture"></i> Ganti</span>
                                <input type="file" name="file_upload[]"> 
                            </span>
                            <a href="#" class="btn fileinput-exists btn-red" data-dismiss="fileinput">
                                <i class="fa fa-times"></i> Hapus
                            </a>
                        </div>
                    </div>';
                    }  
                
                ?>
                
                </div>
            </div>  
            
            
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-info">
                        <div class="box-header">
                            <h3 class="box-title">Video
                            
                            </h3>

                        </div>
            
                    </div>
          
                </div>
                <div class="col-md-12">
                    
                <?php
                if($video->num_rows()>0) {
                    foreach($video->result() as $oof){
                ?>
                    <div class="fileinput fileinput-new" data-provides="fileinput">
                        
                        <?php    
                        if($oof->nama_file) {
                            echo  '<div class="fileinput-new thumbnail"><img src="gudang/images/kegiatan/foto/'.$oof->nama_file.'" alt=""></div>';
                        } else {
                            echo  '<div class="fileinput-new thumbnail xfotomhs"></div>';
                        }
                        ?>   
                        <div class="fileinput-preview fileinput-exists thumbnail" style="width:350px !important;height: 250px;"></div>
                        <div class="user-edit-image-buttons">
                            <span class="btn btn-azure btn-file"><span class="fileinput-new"><i class="fa fa-picture"></i> Pilih image</span>
                                <span class="fileinput-exists"><i class="fa fa-picture"></i> Ganti</span>
                                <input type="file" name="video[]"> 
                            </span>
                            <a href="#" class="btn fileinput-exists btn-red" data-dismiss="fileinput">
                                <i class="fa fa-times"></i> Hapus
                            </a>
                        </div>
                        <input type="hidden" name="idvideo[]" value="<?php echo $oof->id;?>">
                    </div>
                <?php
                    }
                }
                for($v=0;$v<4;$v++) {
                        echo '
                    <div class="fileinput fileinput-new" data-provides="fileinput">
                        <div class="fileinput-new thumbnail xfotomhs"></div>
                       
                        <div class="fileinput-preview fileinput-exists thumbnail" style="width:350px !important;height: 250px;"></div>
                        <div class="user-edit-image-buttons">
                            <span class="btn btn-azure btn-file"><span class="fileinput-new"><i class="fa fa-picture"></i> Pilih image</span>
                                <span class="fileinput-exists"><i class="fa fa-picture"></i> Ganti</span>
                                <input type="file" name="video[]"> 
                            </span>
                            <a href="#" class="btn fileinput-exists btn-red" data-dismiss="fileinput">
                                <i class="fa fa-times"></i> Hapus
                            </a>
                        </div>
                    </div>';
                    }
                ?>
                    
                </div>
            </div>  
            
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-info">
                        <div class="box-header">
                            <h3 class="box-title">Dokumen
                            
                            </h3>

                        </div>
            
                    </div>
          
                </div>
                <div class="col-md-12">
                    
                <?php
                if($dokumen->num_rows()>0) {
                    foreach($dokumen->result() as $oof){
                ?>
                    <div class="fileinput fileinput-new" data-provides="fileinput">
                        
                        <?php    
                        if($oof->nama_file) {
                            echo  '<div class="fileinput-new thumbnail"><img src="gudang/images/kegiatan/foto/'.$oof->nama_file.'" alt=""></div>';
                        } else {
                            echo  '<div class="fileinput-new thumbnail xfotomhs"></div>';
                        }
                        ?>   
                        <div class="fileinput-preview fileinput-exists thumbnail" style="width:350px !important;height: 250px;"></div>
                        <div class="user-edit-image-buttons">
                            <span class="btn btn-azure btn-file"><span class="fileinput-new"><i class="fa fa-picture"></i> Pilih image</span>
                                <span class="fileinput-exists"><i class="fa fa-picture"></i> Ganti</span>
                                <input type="file" name="dokumen[]"> 
                            </span>
                            <a href="#" class="btn fileinput-exists btn-red" data-dismiss="fileinput">
                                <i class="fa fa-times"></i> Hapus
                            </a>
                        </div>
                        <input type="hidden" name="iddokumen[]" value="<?php echo $oof->id;?>">
                    </div>
                <?php
                    }
                
                }
                for($v=0;$v<4;$v++) {
                        echo '
                    <div class="fileinput fileinput-new" data-provides="fileinput">
                        <div class="fileinput-new thumbnail xfotomhs"></div>
                       
                        <div class="fileinput-preview fileinput-exists thumbnail" style="width:350px !important;height: 250px;"></div>
                        <div class="user-edit-image-buttons">
                            <span class="btn btn-azure btn-file"><span class="fileinput-new"><i class="fa fa-picture"></i> Pilih image</span>
                                <span class="fileinput-exists"><i class="fa fa-picture"></i> Ganti</span>
                                <input type="file" name="dokumen[]"> 
                            </span>
                            <a href="#" class="btn fileinput-exists btn-red" data-dismiss="fileinput">
                                <i class="fa fa-times"></i> Hapus
                            </a>
                        </div>
                    </div>';
                    }
                ?>
               
                </div>
            </div>
            
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
    
    
    <!-- /.content -->
 </div>

<script src="<?php echo base_url('gudang/AdminLTE-2.3.7/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js'); ?>"></script>
<script src="<?php echo base_url('/gudang/bootstrap-fileinput/jasny-bootstrap.js')?>"></script>
<script src="<?php echo base_url('gudang/AdminLTE-2.3.7/plugins/select2/select2.min.js')?>"></script>
<script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1');
    $(".select2").select2();
    //bootstrap WYSIHTML5 - text editor
//    $(".textarea").wysihtml5();
  });
</script>