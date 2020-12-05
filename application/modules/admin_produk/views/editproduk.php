
<link href="<?php echo base_url('/gudang/css/plugins.css')?>" rel="stylesheet" media="screen">
<link href="<?php echo base_url('/gudang/bootstrap-fileinput/jasny-bootstrap.min.css')?>" rel="stylesheet" media="screen">
<link href="<?php echo base_url('gudang/AdminLTE-2.3.7/plugins/select2/select2.css')?>" rel="stylesheet" media="screen">

<style>
.file {
  visibility: hidden;
  position: absolute;
}    
</style>

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
        <form role="form" id="form" novalidate="novalidate"  action="simpan-edit-produk.html" method="post" enctype="multipart/form-data">
            
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-info">
                        <div class="box-header">
                            <h3 class="box-title"><strong>Produk</strong>
                            
                            </h3>

                        </div>
            
                    </div>
          
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Kegiatan</label>
                        <select class="form-control select2" name="kegiatan" style="width: 100%;">
                            <option selected="selected">--Pilih--</option>
                            <?php
                            foreach($kegiatan->result() as $ook){
                                if($produk->row()->kegiatan==$ook->id) {
                                    echo '<option value="'.$ook->id.'" selected>'.$ook->keg.'</option>';
                                } else {
                                    echo '<option value="'.$ook->id.'">'.$ook->keg.'</option>';
                                }
                                
                            }
                            ?>
                        </select>
                        <input type="hidden" name="id-produk" value="<?php echo $produk->row()->id; ?>">
                    </div>
          
                </div>
            </div>
            <div class="row">    
                
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Judul</label>
                        <input type="text" class="form-control" name="judul-id" value="<?php echo $produk->row()->judul_id; ?>">
                       
                    </div>
                     
                </div>
                
                <div class="col-md-6">
                    <!--<div class="info-box">-->
                        <div class="form-group">
                        <label>Deskripsi dalam bahasa Indonesia</label>
                        <textarea id="editor1" name="deskripsi-id" rows="2" cols="80">
                            <?php echo $produk->row()->deskripsi_id; ?>
                        </textarea>
                    </div>
                    
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
                    <div class="form-group">
                        <label>Judul</label>
                        <input type="text" class="form-control" name="judul-en" value="<?php echo $produk->row()->judul_en; ?>">
                        
                    </div>
                     
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Deskripsi dalam bahasa Inggris</label>

                        <textarea class="form-control" name="deskripsi-en" style="height: 200px;"><?php echo $produk->row()->deskripsi_en; ?></textarea>
                    </div>
                    
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
            <br>
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-info">
                        <div class="box-header">
                            <h3 class="box-title">Dokumen
                            
                            </h3>

                        </div>
            
                    </div>
                </div>        
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Jenis Produk</label>
                        <select class="form-control select2 sledok" name="jenis_dok" style="width: 100%;" onchange="selectdokumen(this)">
                            <?php
                            if($produk->row()->jenis_dokumen==1) {
                                echo '<option value="1" selected>Dokumen</option>
                            <option value="2">Aplikasi</option>
                            <option value="3">Media</option>';
                            } else if($produk->row()->jenis_dokumen==2){
                                echo '<option value="1">Dokumen</option>
                            <option value="2" selected>Aplikasi</option>
                            <option value="3">Media</option>';
                            } else {
                                echo '<option value="1">Dokumen</option>
                            <option value="2">Aplikasi</option>
                            <option value="3" selected>Media</option>';
                            }
                            ?>
                            
                        </select>
         
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Cover</label>
                        <input type="file" name="cover" class="file">
                        <div class="input-group col-xs-12">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-picture"></i></span>
                            <?php if($produk->row()->cover){?>
                                <input type="text" class="form-control input-lg" disabled value="<?php echo $produk->row()->cover;?>">
                            <?php } else { ?> 
                                <input type="text" class="form-control input-lg" disabled placeholder="Upload Cover">
                            <?php } ?>    
                            <span class="input-group-btn">
                                <button class="browse btn btn-primary input-lg" type="button"><i class="glyphicon glyphicon-search"></i> Cari</button>
                            </span>
                        </div>
                    </div>
                </div>        
                <?php if($produk->row()->jenis_dokumen==2) {?>
                <div class="col-md-4 divurl">
                    <div class="form-group">
                        <label>Url </label>
                        <input type="text" name="url" class="form-control" value="<?php echo $produk->row()->nama_file; ?>">
                        
                    </div>
                </div>
                <?php } else {?>
                <div class="col-md-4 divurl" style="display:none;">
                    <div class="form-group">
                        <label>Url </label>
                        <input type="text" name="url" class="form-control">
                        
                    </div>
                </div>
                <?php } ?>
                
                <?php if($produk->row()->jenis_dokumen!=2) {?>
                <div class="col-md-4 divdok">
                    <div class="form-group">
                        <label>Dokumen/Video </label>
                        <input type="file" name="file" class="file">
                        <div class="input-group col-xs-12">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-picture"></i></span>
                            <input type="text" class="form-control input-lg" disabled value="<?php echo $produk->row()->nama_file;?>">
                            <span class="input-group-btn">
                                <button class="browse btn btn-primary input-lg" type="button"><i class="glyphicon glyphicon-search"></i> Cari</button>
                            </span>
                        </div>
                    </div>
                </div>
                <?php } else {?>
                <div class="col-md-4 divdok">
                    <div class="form-group">
                        <label>Dokumen/Video </label>
                        <input type="file" name="file" class="file" value="sdasds">
                        <div class="input-group col-xs-12">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-picture"></i></span>
                            <input type="text" class="form-control input-lg" disabled placeholder="Upload File">
                            <span class="input-group-btn">
                                <button class="browse btn btn-primary input-lg" type="button"><i class="glyphicon glyphicon-search"></i> Cari</button>
                            </span>
                        </div>
                    </div>
                </div>
                <?php } ?>
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
    
getslecteddok();

function getslecteddok() {
    $dok=$('.sledok').val();
    if(parseInt($dok)===1 || parseInt($dok)===3) {
        $('.divurl').hide();
        $('.divdok').show();
    } else if(parseInt($dok)===2){
        $('.divurl').show();
        $('.divdok').hide();
    }
}
function selectdokumen($obj){
   
    if(parseInt($obj.value)===1 || parseInt($obj.value)===3) {
        $('.divurl').hide();
        $('.divdok').show();
    } else if(parseInt($obj.value)===2)  {
        $('.divurl').show();
        $('.divdok').hide();
    }
}

$(document).on('click', '.browse', function(){
  var file = $(this).parent().parent().parent().find('.file');
  file.trigger('click');
});
$(document).on('change', '.file', function(){
  $(this).parent().find('.form-control').val($(this).val().replace(/C:\\fakepath\\/i, ''));
});    
    
$(function () {
    tinymce.init({
        selector: 'textarea',
        images_upload_base_path: 'gudang/images/produk/',
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
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
//    CKEDITOR.replace('editor1');
//    CKEDITOR.replace('editor2');
    
    //bootstrap WYSIHTML5 - text editor
//    $(".textarea").wysihtml5();
    $(".select2").select2();
  });
</script>