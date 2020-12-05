<link href="<?php echo base_url('/gudang/css/styles1.css')?>" rel="stylesheet" media="screen">
<link href="<?php echo base_url('/gudang/css/plugins.css')?>" rel="stylesheet" media="screen">
<link href="<?php echo base_url('gudang/AdminLTE-2.3.7/plugins/select2/select2.css')?>" rel="stylesheet" media="screen">
<link href="<?php echo base_url('/gudang/css/modified-admin.css')?>" rel="stylesheet" media="screen">
<link href="<?php echo base_url('/gudang/bootstrap-fileinput/jasny-bootstrap.min.css')?>" rel="stylesheet" media="screen">
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    
    <section class="content">
        <?php echo $this->session->flashdata('msg');?>
        <form role="form" id="form" novalidate="novalidate"  action="simpan-hal-program.html" method="post" enctype="multipart/form-data">
            
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
            
                <div class="col-md-6">
                    <label>Gambar</label>
                    <div class="fileinput fileinput-new" data-provides="fileinput">
                        <div class="fileinput-new thumbnail xfotomhs"></div>
                    
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
            <div class="row">
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
            
            </div>
            <div class="row">
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
        <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Program</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                <tbody><tr>
                  <th style="width: 10px">#</th>
                  <th>Judul</th>
                  
                  <th>Foto</th>
                  <th style="width: 80px">Update data</th>
                </tr>
                <?php 
                $no=1;
                foreach ($program->result() as $op){
                    $class='r-'.$op->id;
                    echo '<tr class="'.$class.'">
                        <td>'.$no.'</td>
                        <td>'.$op->judul_id.'</td>
                        
                        <td><img style="width:40%;height:40%;" src="gudang/images/program/resize/'.$op->icon.'" alt=" "></td>
                        <td><div class="visible-md visible-lg hidden-sm hidden-xs">
                                    <a href="admin-edit-program?id='.$op->id.'" class="btn btn-transparent btn-xs" tooltip-placement="top" tooltip="Edit"><i class="fa fa-pencil"></i></a>
                                    <a href="javascript:hapus(\''.$op->id.'\', \''.$class.'\')" class="btn btn-transparent btn-xs tooltips" tooltip-placement="top" tooltip="Remove"><i class="fa fa-times fa fa-white"></i></a>
                                    </div></td>
                    </tr>';
                    $no++;
                }
                ?>
                
                
                
              </tbody></table>
            </div>

          </div>
    </section>
    
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

function hapus(a, c){
    swal({
                title: "Apakah anda yakin?",
                text: "Data yang sudah dihapus tidak bisa dikembalikan lagi!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Ya, hapus data!",
                cancelButtonText: "Tidak, batalkan hapus!",
                closeOnConfirm: false,
                closeOnCancel: false
            }, function (isConfirm) {
                if (isConfirm) {
                    $.ajax({
                        url: base+'delete-program',data: {a:a},
                        type: 'post', dataType: "json",
                        success: function (databack) {
                            
                            swal("Deleted!", "Data telah dihapus.", "success");

                            $('.'+c).remove();
                        
                        }
                    });
                
                } else {
                    swal("Cancelled", "Data tidak dihapus.", "error");
                }
            });
}
</script>