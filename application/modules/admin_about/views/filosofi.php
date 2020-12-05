
<link href="<?php echo base_url('/gudang/css/plugins.css')?>" rel="stylesheet" media="screen">
<link href="<?php echo base_url('gudang/AdminLTE-2.3.7/plugins/select2/select2.css')?>" rel="stylesheet" media="screen">
<link href="<?php echo base_url('/gudang/css/modified-admin.css')?>" rel="stylesheet" media="screen">
<link href="<?php echo base_url('/gudang/bootstrap-fileinput/jasny-bootstrap.min.css')?>" rel="stylesheet" media="screen">
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    

    <!-- Main content -->
    <section class="content">
        <?php echo $this->session->flashdata('msg');?>
        <form role="form" id="form" novalidate="novalidate"  action="simpan-filosofi.html" method="post" enctype="multipart/form-data">
            
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-info">
                        <div class="box-header">
                            <h3 class="box-title"><strong>Filosofi Lembaga</strong>
                            
                            </h3>

                        </div>
            
                    </div>
          
                </div>
            </div>
            
            <div class="row">
            <?php 
            $a=2;
            foreach($filosofi_id->result() as $obf) {
                echo '<div class="col-md-3 dddrow">
                <div class="box box-info">
                    <div class="box-header">
                        <input type="text" class="form-control" name="judul-id[]" value="'.$obf->judul.'">
              
                    </div>
                    <textarea id="editor'.$a.'" name="filosofi-id[]" rows="10" cols="80">
                              '.$obf->deskripsi.'              
                    </textarea>
                    <input type="hidden" name="idfilosofi-id[]" value="'.$obf->id.'">
                </div>
            
                </div> ';
                $a++;
            }
            ?>  
                <div class="col-md-1">
                    <div class="form-group">
                        <label>Bahasa</label>
                        <select class="form-control select2" name="lang-id" style="width: 100%;">
                            <option value="in" selected="selected">Indonesia</option>
                        
                        </select>
         
                    </div>
                </div>
            

            </div>
            <div class="row">
            <?php 
            $b=5;
            if($filosofi_en->num_rows()>0) {
                foreach($filosofi_en->result() as $obfe) {
                    echo '<div class="col-md-3 dddrow">
                        <div class="box box-info">
                            <div class="box-header">
                                <input type="text" class="form-control" name="judul-en[]" value="'.$obfe->judul.'">
              
                            </div>
                            <textarea id="editor'.$b.'" name="filosofi-en[]" rows="10" cols="80">
                              '.$obfe->deskripsi.'              
                            </textarea>
                            <input type="hidden" name="idfilosofi-en[]" value="'.$obfe->id.'">
                        </div>
                    </div> ';
                    $b++;
                }
                
                
            } else {
                for($k=0;$k<3;$k++) {
                    echo '<div class="col-md-3 dddrow">
                        <div class="box box-info">
                            <div class="box-header">
                                <input type="text" class="form-control" name="judul-en[]" placeholder="Masukkan judul">
              
                            </div>
                            <textarea id="editor'.$b.'" name="filosofi-en[]" rows="10" cols="80">
                                           
                            </textarea>
                            
                        </div>
                    </div> ';
                    $b++;
                }
            }
            ?>  
            <div class="col-md-1">
                <div class="form-group">
                    <label>Bahasa</label>
                    <select class="form-control select2" name="lang-en" style="width: 100%;">
                        <option value="en" selected="selected">Inggris</option>
                        
                    </select>
         
                </div>
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
        
    </section>
    <br>
    <section class="content">
        
    </section>
    
    <!-- /.content -->
 </div>

<script src="<?php echo base_url('gudang/AdminLTE-2.3.7/plugins/select2/select2.min.js')?>"></script>
<script src="<?php echo base_url('/gudang/tinymce/js/tinymce/tinymce.min.js')?>"></script>
<script src="<?php echo base_url('/gudang/bootstrap-fileinput/jasny-bootstrap.js')?>"></script>
<script>
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
</script>