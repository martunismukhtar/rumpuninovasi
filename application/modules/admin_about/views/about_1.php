<link href="<?php echo base_url('/gudang/css/styles1.css')?>" rel="stylesheet" media="screen">
<link href="<?php echo base_url('/gudang/css/plugins.css')?>" rel="stylesheet" media="screen">
<?php 
if(!$this->session->userdata('email')) {
    redirect('masuk');
}
    
?>
<link href="<?php echo base_url('/gudang/bootstrap-fileinput/jasny-bootstrap.min.css')?>" rel="stylesheet" media="screen">
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Halaman tentang kami
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">Editors</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <?php echo $this->session->flashdata('msg');?>
        <form role="form" id="form" novalidate="novalidate"  action="simpan-hal-about.html" method="post" enctype="multipart/form-data">
            
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-header">
                        <h3 class="box-title"><strong>Deskripsi Lembaga</strong>
                            <!--<small>Advanced and full of features</small>-->
                        </h3>

                    </div>
            
                </div>
          
            </div>
            <?php 
            foreach($deskripsi->result() as $od) {
            ?>
                <div class="col-md-6 dddrow">
                    <div class="box box-info">
                        <div class="box-header">
                            <h3 class="box-title">Foto</h3>
              
                        </div>
                        
                        <div class="col-sm-10" style="padding-left: 0px;">
                            
                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                <?php
                                if($od->file_foto) {
                                    echo  '<div class="fileinput-new thumbnail"><img src="gudang/images/deskripsi/'.$od->file_foto.'" alt=""></div>';
                                } else {
                                    echo  '<div class="fileinput-new thumbnail xfotomhs"></div>';
                                }
                                ?>
                                
                                <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                <div class="user-edit-image-buttons">
                                    <span class="btn btn-azure btn-file">
                                        <span class="fileinput-new"><i class="fa fa-picture"></i> Pilih gambar</span>
                                        <span class="fileinput-exists"><i class="fa fa-picture"></i> Ganti</span>
                                        <input type="file" name="file_upload"> 
                                    </span>
                                    <a href="#" class="btn fileinput-exists btn-red" data-dismiss="fileinput">
                                        <i class="fa fa-times"></i> Remove
                                    </a>
                                </div>
                            </div>
                        </div>
                        
                        
                    </div>
                    
                </div>
                <div class="col-md-6 dddrow">
                    <div class="box box-info">
                        <div class="box-header">
                            <h3 class="box-title"><?php echo $od->judul;?></h3>
              
                        </div>
                        <textarea id="editor1" name="deskripsi" rows="10" cols="80">
                            <?php echo $od->deskripsi;?>
                        </textarea>
                    </div>
                    <input type="hidden" name="iddes" value="<?php echo $od->id;?>">
            
                </div>
            <?php
            
            }
            ?>
              
        <!-- /.col-->
        </div>
        <br>
        
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-header">
                        <h3 class="box-title"><strong>Filosofi Lembaga</strong>
 
                        </h3>
 
                    </div>
            
                </div>
          
            </div>
            <?php 
            $a=2;
            foreach($filosofi_lembaga->result() as $obf) {
                echo '<div class="col-md-4 dddrow">
                <div class="box box-info">
                    <div class="box-header">
                        <h3 class="box-title">'.$obf->judul.'</h3>
              
                    </div>
                    <textarea id="editor'.$a.'" name="filosofi[]" rows="10" cols="80">
                              '.$obf->deskripsi.'              
                    </textarea>
                    <input type="hidden" name="idfilosofi[]" value="'.$obf->id.'">
                </div>
            
                </div> ';
                $a++;
            }
            ?>  
        <!-- /.col-->
        </div>
        
        <br>
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-header">
                        <h3 class="box-title"><strong>Rentang Inovasi</strong>
 
                        </h3>
 
                    </div>
            
                </div>
          
            </div>
            
            <?php 
            $i=6;
            foreach($rentang_inovasi->result() as $obr) {
                echo '<div class="col-md-3 dddrow">
                <div class="box box-info">
                    <div class="box-header">
                        <h3 class="box-title">'.$obr->judul.'</h3>
              
                    </div>
                    <textarea id="editor'.$i.'" name="inovasi[]" rows="10" cols="80">
                              '.$obr->deskripsi.'              
                    </textarea>
                    <input type="hidden" name="idinovasi[]" value="'.$obr->id.'">
                </div>
            
                </div> ';
                $i++;
            }
            ?>

        </div>
        <br>
        <div class="row">
            <div class="col-md-4">
                <button class="btn btn-primary btn-sm pull-left btnadd" type="submit" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Sedang menyimpan data">
                Simpan <i class="fa fa-arrow-circle-left"></i>
                </button>
            </div>
        </div>
        </form>
      <!-- ./row -->
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
    CKEDITOR.replace('editor2');
    CKEDITOR.replace('editor3');
    CKEDITOR.replace('editor4');
    CKEDITOR.replace('editor6');
    CKEDITOR.replace('editor7');
    CKEDITOR.replace('editor8');
    CKEDITOR.replace('editor9');
    //bootstrap WYSIHTML5 - text editor
//    $(".textarea").wysihtml5();
  });
</script>