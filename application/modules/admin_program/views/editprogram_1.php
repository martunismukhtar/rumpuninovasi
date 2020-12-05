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
        <h1>Edit halaman program</h1>
        
    </section>

    <!-- Main content -->
    <section class="content">
        <?php echo $this->session->flashdata('msg');?>
        <form role="form" id="form" novalidate="novalidate"  action="simpan-edit-program.html" method="post" enctype="multipart/form-data">
            
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-info">
<!--                        <div class="box-header">
                            <h3 class="box-title">Deskripsi Lembaga
                            
                            </h3>

                        </div>-->
            
                    </div>
          
                </div>
            </div>
            <div class="row">    
                <?php 
                foreach ($program->result() as $oop) {
                ?>    
                
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <!--<div class="info-box">-->
                        <div class="fileinput fileinput-new" data-provides="fileinput">
                        <?php    
                        if($oop->file_foto) {
                            echo  '<div class="fileinput-new thumbnail"><img src="gudang/images/program/'.$oop->file_foto.'" alt=""></div>';
                        } else {
                            echo  '<div class="fileinput-new thumbnail xfotomhs"></div>';
                        }
                        ?>        
                            <div class="fileinput-preview fileinput-exists thumbnail"></div>
                            <div class="user-edit-image-buttons">
                                <span class="btn btn-azure btn-file"><span class="fileinput-new"><i class="fa fa-picture"></i> Select image</span>
                                    <span class="fileinput-exists"><i class="fa fa-picture"></i> Change</span>
                                <input type="file" name="file_upload"> 
                                </span>
				<a href="#" class="btn fileinput-exists btn-red" data-dismiss="fileinput">
                                    <i class="fa fa-times"></i> Remove
				</a>
                            </div>
                        </div>
                        <!-- /.info-box-content -->
                    <!--</div>-->
                    <!-- /.info-box -->
                </div>
                
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <!--<div class="info-box">-->
                        <div class="form-group">
                        <label>Judul</label>
                        <input type="text" class="form-control" name="judul" value="<?php echo $oop->judul;?>">
                    <!--</div>-->
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <!--<div class="info-box">-->
                        <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea id="editor1" name="program" rows="2" cols="80">
                              <?php echo $oop->deskripsi;?>
                        </textarea>
                    </div>
                    <input type="hidden" name="id" value="<?php echo $oop->id;?>">
                    <input type="hidden" name="foto" value="<?php echo $oop->foto;?>">
                    <!--</div>-->
                    
                </div>
            
            <?php
            }?>
           
            </div>
            
            <div class="row">
                
            </div>    
            <div class="row">
                <div class="col-md-4">
                    <button class="btn btn-primary btn-sm pull-left btnadd" type="submit" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Sedang menyimpan data">
                    Simpan <i class="fa fa-arrow-circle-left"></i>
                    </button>
                </div>
            </div>
        
        </form>  

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
    
    //bootstrap WYSIHTML5 - text editor
//    $(".textarea").wysihtml5();
  });
</script>