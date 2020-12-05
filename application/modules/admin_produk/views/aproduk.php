
<link href="<?php echo base_url('/gudang/css/plugins.css')?>" rel="stylesheet" media="screen">

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
        <form role="form" id="form" novalidate="novalidate"  action="simpan-hal-produk.html" method="post" enctype="multipart/form-data">
            
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
                            foreach($kegiatan->result()as $ook){
                                echo '<option value="'.$ook->id.'">'.$ook->keg.'</option>';
                            }
                            ?>
                        </select>
         
                    </div>
          
                </div>
            </div>
            <div class="row">    
                
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Judul</label>
                        <input type="text" class="form-control" name="judul-id" placeholder="Masukkan judul">
                    </div>
                     
                </div>
                
                <div class="col-md-6">
                    <!--<div class="info-box">-->
                        <div class="form-group">
                        <label>Deskripsi dalam bahasa Indonesia</label>
                        <textarea id="editor1" name="deskripsi-id" rows="2" cols="80">
                              
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
                        <input type="text" class="form-control" name="judul-en" placeholder="Masukkan judul">
                    </div>
                     
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Deskripsi dalam bahasa Inggris</label>

                        <textarea class="form-control" name="deskripsi-en" style="height: 200px;"></textarea>
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
                        <select class="form-control select2" name="jenis_dok" style="width: 100%;" onchange="selectdokumen(this)">
                            
                            <option value="1" >Dokumen</option>
                            <option value="2" >Aplikasi</option>
                            <option value="3" >Media</option>
                        </select>
         
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Cover</label>
                        <input type="file" name="cover" class="file">
                        <div class="input-group col-xs-12">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-picture"></i></span>
                            <input type="text" class="form-control input-lg" disabled placeholder="Upload Cover">
                            <span class="input-group-btn">
                                <button class="browse btn btn-primary input-lg" type="button"><i class="glyphicon glyphicon-search"></i> Cari</button>
                            </span>
                        </div>
                    </div>
                </div>        
                <div class="col-md-4 divurl" style="display:none;">
                    <div class="form-group">
                        <label>Url </label>
                        <input type="text" name="url" class="form-control">
                        
                    </div>
                </div>
                <div class="col-md-4 divdok">
                    <div class="form-group">
                        <label>Dokumen/Video </label>
                        <input type="file" name="file" class="file">
                        <div class="input-group col-xs-12">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-picture"></i></span>
                            <input type="text" class="form-control input-lg" disabled placeholder="Upload File">
                            <span class="input-group-btn">
                                <button class="browse btn btn-primary input-lg" type="button"><i class="glyphicon glyphicon-search"></i> Cari</button>
                            </span>
                        </div>
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
    <section class="content">
        <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Produk</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                <tbody><tr>
                  <th style="width: 10px">#</th>
                  <th>Judul</th>
                  <th>Penjelasan</th>
                  <th>Cover</th>
                  <th>File</th>
                  
                  <th style="width: 90px">Update data</th>
                </tr>
                <?php 
                $no=1;
                foreach ($produk->result() as $op){
                    $class='r-'.$op->id;
                    echo '<tr class="'.$class.'">
                        <td>'.$no.'</td>
                        <td>'.$op->judul_id.'</td>
                        <td>'.$op->deskripsi_id.'</td>
                        <td>'.$op->cover.'</td>    
                        <td>'.$op->nama_file.'</td>        
                                  
                        <td><div class="visible-md visible-lg hidden-sm hidden-xs">
                            <a href="edit-produk.egp?id='.$op->id.'" class="btn btn-transparent btn-xs" tooltip-placement="top" tooltip="Edit"><i class="fa fa-pencil"></i></a>
                            <a href="javascript:hapus(\''.$op->id.'\', \''.$class.'\', \''.$op->jenis_dokumen.'\');" class="btn btn-transparent btn-xs tooltips" tooltip-placement="top" tooltip="Remove"><i class="fa fa-times fa fa-white"></i></a>
                            </div></td>
                    </tr>';
                    $no++;
                }
                ?>
                
                
                
              </tbody></table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <ul class="pagination pagination-sm no-margin pull-right">
                <li><a href="#">«</a></li>
                <li><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">»</a></li>
              </ul>
            </div>
          </div>
    </section>
    
    <!-- /.content -->
 </div>

<script src="<?php echo base_url('/gudang/tinymce/js/tinymce/tinymce.min.js')?>"></script>

<script src="<?php echo base_url('gudang/AdminLTE-2.3.7/plugins/select2/select2.min.js')?>"></script>

<script>
var base='<?php echo base_url();?>';
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
  
function hapus(a, b, c){
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
                url: base+'hapus-produk.html',data: {a:a, c:c},
                type: 'post', dataType: "json",
                success: function (databack) {
                    swal("Deleted!", "Data telah dihapus.", "success");

                    $('.'+b).remove();
                        
                }
            });
                
        } else {
            swal("Cancelled", "Data tidak dihapus.", "error");
        }
    });
}  
</script>