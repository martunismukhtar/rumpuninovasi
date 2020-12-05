<link href="<?php echo base_url('/gudang/css/styles1.css')?>" rel="stylesheet" media="screen">
<link href="<?php echo base_url('/gudang/css/plugins.css')?>" rel="stylesheet" media="screen">
<link href="<?php echo base_url('gudang/AdminLTE-2.3.7/plugins/select2/select2.css')?>" rel="stylesheet" media="screen">
<link href="<?php echo base_url('/gudang/css/modified-admin.css')?>" rel="stylesheet" media="screen">
<link href="<?php echo base_url('/gudang/bootstrap-fileinput/jasny-bootstrap.min.css')?>" rel="stylesheet" media="screen">
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    
    <section class="content">
        <?php echo $this->session->flashdata('msg');?>
        <form role="form" id="form" novalidate="novalidate"  action="simpan-edit-program.html" method="post" enctype="multipart/form-data">
            
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-info">
                        <div class="box-header">
                            <h3 class="box-title"><strong>Program</strong>
                            
                            </h3>

                        </div>
            
                    </div>
          
                </div>
            </div>
            
            <div class="row">
                
                <input type="hidden" name="idprogram" value="<?php echo $program->row()->id;?>">
                
                <div class="col-md-6">
                    <label>Gambar</label>
                    
                    <div class="fileinput fileinput-new" data-provides="fileinput">
                        <?php
                        if($program->row()->icon) {
                            echo '<div class="fileinput-new thumbnail xfotomhs"><img style="height:250px;width:300px;" src="gudang/images/program/resize/'.$program->row()->icon.'" alt=""></div>';
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
                                <input type="file" name="file_upload"> 
                            </span>
                            <a href="#" class="btn fileinput-exists btn-red" data-dismiss="fileinput">
                                <i class="fa fa-times"></i> Remove
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <?php

            if($program->num_rows()>0) {
                
                echo '<div class="row">
                <div class="col-md-2">
                    <div class="form-group">
                        <label>Judul</label>
                        
                        <input type="text" class="form-control" name="judul-id" value="'.$program->row()->judul_id.'">
                            
                    </div>
                </div> 
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea id="editor1" name="deskripsi-id" rows="10" cols="80">'.$program->row()->deskripsi_id.'</textarea>
         
                    </div>
                </div> 
                <div class="col-md-1">
                    <div class="form-group">
                        <label>Bahasa</label>
                        <select class="form-control select23" name="lang-id" style="width: 100%;">
                            <option value="id" selected="selected">Indonesia</option>
                            
                        </select>
         
                    </div>
                </div>
            
               </div>';
            } else {
                echo '<div class="row">
                <div class="col-md-2">
                    <div class="form-group">
                        <label>Judul</label>
                        <input type="text" class="form-control" name="judul-id">
                            
                    </div>
                </div> 
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea id="editor1" name="deskripsi-id" rows="10" cols="80">
                        
                        </textarea>
         
                    </div>
                </div> 
                <div class="col-md-1">
                    <div class="form-group">
                        <label>Bahasa</label>
                        <select class="form-control select23" name="lang-id" style="width: 100%;">
                            <option value="id" selected="selected">Indonesia</option>
                            
                        </select>
         
                    </div>
                </div>
            
               </div>';
            }
            
            if($program->num_rows()>0) {
                
                echo '<div class="row">
                <div class="col-md-2">
                    <div class="form-group">
                        <label>Judul</label>
                       
                        <input type="text" class="form-control" name="judul-en" value="'.$program->row()->judul_en.'">
                            
                    </div>
                </div> 
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea id="editor2" name="deskripsi-en" rows="10" cols="80">'.$program->row()->deskripsi_en.'</textarea>
         
                    </div>
                </div> 
                <div class="col-md-1">
                    <div class="form-group">
                        <label>Bahasa</label>
                        <select class="form-control select23" name="lang-en" style="width: 100%;">
                            <option value="en" selected="selected">English</option>
                        </select>
         
                    </div>
                </div>
            
               </div>';
            } else {
                echo '<div class="row">
                <div class="col-md-2">
                    <div class="form-group">
                        <label>Judul</label>
                        
                        <input type="text" class="form-control" name="judul-en" >
                    
                    </div>
                </div> 
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea id="editor2" name="deskripsi-en" rows="10" cols="80">
                            
                        </textarea>
                    </div>
                </div> 
                <div class="col-md-1">
                    <div class="form-group">
                        <label>Bahasa</label>
                        <select class="form-control select2" name="lang-en" style="width: 100%;">
                            <option value="en" selected="selected">English</option>
                        </select>
                    </div>
                </div>
            </div>';
            }
            ?>
            
        <hr>
            
            <div class="row">
                <div class="col-md-4">
                    <button class="btn btn-primary btn-sm pull-left btnadd" type="submit" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Sedang menyimpan data">
                    Simpan <i class="fa fa-arrow-circle-left"></i>
                    </button>
                </div>
            </div>
        
        </form>  
        
    </section>
    <br>
    
    
    <!-- /.content -->
 </div>

<script src="<?php echo base_url('gudang/AdminLTE-2.3.7/plugins/select2/select2.min.js')?>"></script>
<script src="<?php echo base_url('/gudang/tinymce/js/tinymce/tinymce.min.js')?>"></script>
<script src="<?php echo base_url('/gudang/bootstrap-fileinput/jasny-bootstrap.js')?>"></script>
<script>
var base='<?php echo base_url();?>';    
$(function () {
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
    
    $(".select2").select2();
});
function hapus(a, b){
    App_.hapus(base+'delete-program', {a:a, b:b});        
}
</script>