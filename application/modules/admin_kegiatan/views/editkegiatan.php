
<link href="<?php echo base_url('/gudang/css/plugins.css')?>" rel="stylesheet" media="screen">
<link href="<?php echo base_url('/gudang/bootstrap-fileinput/jasny-bootstrap.min.css')?>" rel="stylesheet" media="screen">
<link href="<?php echo base_url('gudang/AdminLTE-2.3.7/plugins/select2/select2.css')?>" rel="stylesheet" media="screen">
<link href="<?php echo base_url('gudang/AdminLTE-2.3.7/plugins/datepicker/datepicker3.css')?>" rel="stylesheet" media="screen">
<link href="<?php echo base_url('gudang/AdminLTE-2.3.7/plugins/colorpicker/bootstrap-colorpicker.min.css')?>" rel="stylesheet" media="screen">

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    

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
                
                <div class="col-md-2">
                    <!--<div class="info-box">-->
                        <div class="form-group">
                        <label>Program</label>
                        <select class="form-control select2" name="program" style="width: 100%;" onchange="getproyek(this)">
                            <option selected="selected">--Pilih--</option>
                            <?php 
                            foreach($program->result() as $op){
                                if($kegiatan->row()->program==$op->id) {
                                    echo '<option value="'.$op->id.'" selected>'.$op->judul.'</option>';
                                } else {
                                    echo '<option value="'.$op->id.'">'.$op->judul.'</option>';
                                }
                                
                            }
                            ?>
                        </select>
                        <input type="hidden" name="kegiatan" value="<?php echo $kegiatan->row()->id;?>">
                    <!--</div>-->
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <div class="col-md-2">
                        <div class="form-group">
                        <label>Proyek</label>
                        <select class="form-control select2 proyek" name="proyek" style="width: 100%;">
                            
                            <?php 
                            foreach($proyek->result() as $okp){
                                if($kegiatan->row()->proyek==$okp->id) {
                                    echo '<option value="'.$okp->id.'" selected>'.$okp->proyek.'</option>';
                                } else {
                                    echo '<option value="'.$okp->id.'">'.$okp->proyek.'</option>';
                                }
                                
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Tanggal Mulai</label>

                        <div class="input-group date">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" name="tanggal_mulai" class="form-control pull-right tglawal" id="datepicker" value="<?php echo $kegiatan->row()->tgl_mulai;?>">
                        </div>
                    </div>
                </div> 
                
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Tanggal Akhir</label>

                        <div class="input-group date">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" name="tanggal_akhir" class="form-control pull-right tglakhir" id="datepicker" value="<?php echo $kegiatan->row()->tgl_akhir;?>">
                        </div>
                    </div>
                </div> 
                <div class="col-md-2">
                    <div class="form-group">
                        <label>Nomor Urut</label>

                        <input type="text" name="no_urut" class="form-control pull-right" value="<?php echo $kegiatan->row()->no_urut;?>">
                    </div>
                </div> 
            </div>
            
            <div class="row">    
                
                <div class="col-md-3">
                    <!--<div class="info-box">-->
                        <div class="form-group">
                        <label>Judul</label>
                        <input type="text" class="form-control" name="judul-id" value="<?php echo $kegiatan->row()->judul_id;?>">
                        
                    <!--</div>-->
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                
                <div class="col-md-6">
                    <!--<div class="info-box">-->
                        <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea id="editor1" name="deskripsi-id" rows="2" cols="40">
                              <?php echo $kegiatan->row()->deskripsi_id;?>
                        </textarea>
                    </div>
                    
                    <!--</div>-->
                    
                </div>
                
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Bahasa</label>
                        
                        <select class="form-control select2" name="lang-id" style="width: 100%;">
                            <option value="id" selected="selected">Indonesia</option>
                            <option value="en">Inggris</option>
                            
                        </select>
         
                    </div>
                </div>
                
            </div>
            
            <div class="row">    
                
                <div class="col-md-3">
                    <!--<div class="info-box">-->
                        <div class="form-group">
                        <label>Judul</label>
                        <input type="text" class="form-control" name="judul-en" value="<?php echo $kegiatan->row()->judul_en;?>">
                        
                    </div>
                    <!-- /.info-box -->
                </div>
                
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea id="editor2" name="deskripsi-en" rows="2" cols="40">
                             <?php echo $kegiatan->row()->deskripsi_en;?> 
                        </textarea>
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
            
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-info">
                        <div class="box-header">
                            <h3 class="box-title">Foto Kegiatan
                            
                            </h3>

                        </div>
            
                    </div>
          
                </div>
                <div class="col-md-12">
                    <?php 
                    echo $this->m_kegiatan->getfotokegiatan($kegiatan->row()->id);
                    
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
        
    </section>
    <br>
    
    <!-- /.content -->
 </div>

<script src="<?php echo base_url('gudang/AdminLTE-2.3.7/plugins/select2/select2.min.js')?>"></script>
<script src="<?php echo base_url('/gudang/tinymce/js/tinymce/tinymce.min.js')?>"></script>
<script src="<?php echo base_url('/gudang/bootstrap-fileinput/jasny-bootstrap.js')?>"></script>
<script src="<?php echo base_url('gudang/AdminLTE-2.3.7/plugins/datepicker/bootstrap-datepicker.js')?>"></script>


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
    
    $('.tglawal').datepicker({
        autoclose: true, format: 'dd/mm/yyyy '
    });
    
    $('.tglakhir').datepicker({
        autoclose: true, format: 'dd/mm/yyyy '
    });
    
    $(".select2").select2();
});

function hapusgambar(a, b, c, d){
    
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
                        url: base+'hapus-gambar-kegiatan',data: {a:a, b:b, d:d},
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

function hapusdokumen(a, b, c, d){
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
                        url: base+'hapus-dokumen-produk',data: {a:a, b:b, d:d},
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

function hapusvideo(a, b, c, d){
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
                        url: base+'hapus-video-produk',data: {a:a, b:b, d:d},
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
function getproyek($obj){
    $.ajax({
        url: base+'getproyek.html',data: {a:$obj.value},
        type: 'post', dataType: "json",
        success: function (databack) {
            $('.proyek').html(databack['msg']);
        }
    });
}
</script>