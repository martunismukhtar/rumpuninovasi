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
        
    </section>

    <!-- Main content -->
    <section class="content">
        <?php echo $this->session->flashdata('msg');?>
        <form role="form" id="form" novalidate="novalidate"  action="simpan-edit-proyek.html" method="post" enctype="multipart/form-data">
            
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-info">
                        <div class="box-header">
                            <h3 class="box-title"><strong>Proyek</strong>
                            
                            </h3>

                        </div>
            
                    </div>
          
                </div>
            </div>
            <div class="row">
            
                <div class="col-md-6">
                    <label>Gambar</label>
                    <div class="fileinput fileinput-new" data-provides="fileinput">
                        
                        <?php
                        if($proyek->row()->icon) {
                            echo '<div class="fileinput-new thumbnail xfotomhs"><img style="height:250px;width:300px;" src="gudang/images/proyek/'.$proyek->row()->icon.'" alt=""></div>';
//                            
                        } else {
                            echo '<div class="fileinput-new thumbnail xfotomhs"></div>';
                        }
                        ?>
                        
                        <div class="fileinput-preview fileinput-exists thumbnail"></div>
                        <div class="user-edit-image-buttons">
                            <span class="btn btn-azure btn-file">
                                <span class="fileinput-new"><i class="fa fa-picture"></i> Pilih gambar</span>
                                <span class="fileinput-exists"><i class="fa fa-picture"></i> Ganti</span>
                                <input type="file" name="filex"> 
                            </span>
                            <a href="#" class="btn fileinput-exists btn-red" data-dismiss="fileinput">
                                <i class="fa fa-times"></i> Hapus
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    
                    <div class="form-group">
                        <label>Program</label>
                        <select class="form-control select2" name="program" style="width: 100%;">
                            
                            <?php
                            foreach($program->result() as $op){
                                
                                if($proyek->row()->program==$op->id) {
                                    echo '<option value="'.$op->id.'" selected>'.$op->program.'</option>';
                                } else {
                                    echo '<option value="'.$op->id.'">'.$op->program.'</option>';
                                }
                                
                            }
                            ?>
                        </select>
                        
                        <input type="hidden" name="idproyek" value="<?php echo $proyek->row()->id;?>">
                    </div>
                </div>
            </div>
            <div class="row">    
                
                <div class="col-md-3">
                    <!--<div class="info-box">-->
                        <div class="form-group">
                        <label>Judul</label>
                        <input type="text" class="form-control" name="judul-id" value="<?php echo $proyek->row()->judul_id;?>">
                        
                    </div>
                    <!-- /.info-box -->
                </div>
                
                <div class="col-md-6">
                    <!--<div class="info-box">-->
                        <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea id="editor1" name="deskripsi-id" rows="5" cols="80">
                              <?php echo $proyek->row()->deskripsi_id;?>
                        </textarea>
                    </div>
                    
                    <!--</div>-->
                    
                </div>
                
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Bahasa</label>
                        <select class="form-control select2" name="lang-id" style="width: 100%;">
                            <option value="id" selected="selected">Indonesia</option>
                        
                        </select>
         
                    </div>
                </div>
                
            </div>
            
            <div class="row">    
                
                <div class="col-md-3">
                    <!--<div class="info-box">-->
                        <div class="form-group">
                        <label>Judul</label>
                        <input type="text" class="form-control" name="judul-en" value="<?php echo $proyek->row()->judul_en;?>">
                        
                    </div>
                    <!-- /.info-box -->
                </div>
                
                <div class="col-md-6">
                    <!--<div class="info-box">-->
                        <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea id="editor2" name="deskripsi-en" rows="5" cols="80">
                              <?php echo $proyek->row()->deskripsi_en;?>
                        </textarea>
                    </div>
                    
                    <!--</div>-->
                    
                </div>
                
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Bahasa</label>
                        <select class="form-control select2" name="lang-en" style="width: 100%;">
                            <option value="en" selected="selected">Inggris</option>
                        
                        </select>
         
                    </div>
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

<script src="<?php echo base_url('/gudang/tinymce/js/tinymce/tinymce.min.js')?>"></script>
<script src="<?php echo base_url('/gudang/bootstrap-fileinput/jasny-bootstrap.js')?>"></script>
<script src="<?php echo base_url('gudang/AdminLTE-2.3.7/plugins/select2/select2.min.js')?>"></script>

<script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    tinymce.init({
        selector: 'textarea',
        theme: 'modern',
        plugins: [
            'advlist autolink lists link image charmap print preview hr anchor pagebreak',
            'searchreplace wordcount visualblocks visualchars code fullscreen',
            'insertdatetime media nonbreaking save table contextmenu directionality',
            'emoticons template paste textcolor colorpicker textpattern imagetools codesample toc'
        ],
        toolbar1: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
        toolbar2: 'print preview media | forecolor backcolor emoticons | codesample',
        image_advtab: true,
        templates: [
            { title: 'Test template 1', content: 'Test 1' },
            { title: 'Test template 2', content: 'Test 2' }
        ]
//        setup: function(editor) {
//            editor.on('keyup', function(e) {
//                // Revalidate the hobbies field
//                $('#tinyMCEForm').formValidation('revalidateField', 'hobbies');
//            });
//        }
    });
    
    //bootstrap WYSIHTML5 - text editor
//    $(".textarea").wysihtml5();
    $(".select2").select2();
  });
</script>