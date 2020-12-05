<link href="<?php echo base_url('/gudang/css/styles1.css')?>" rel="stylesheet" media="screen">
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
        <form role="form" id="form" novalidate="novalidate"  action="simpan-hal-kegiatan.html" method="post" enctype="multipart/form-data">
            
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
                
                <div class="col-md-3">
                        <div class="form-group">
                        <label>Program</label>
                        <select class="form-control select2" name="program" style="width: 100%;" onchange="getproyek(this)">
                            <option selected="selected">--Pilih--</option>
                            <?php 
                            foreach($program->result() as $op){
                                echo '<option value="'.$op->id.'">'.$op->judul.'</option>';
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                        <div class="form-group">
                        <label>Proyek</label>
                        <select class="form-control select2 proyek" name="proyek" style="width: 100%;">
                            <option selected="selected">--Pilih--</option>
                            
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
                            <input type="text" name="tanggal_mulai" class="form-control pull-right tglawal" id="datepicker">
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
                            <input type="text" name="tanggal_akhir" class="form-control pull-right tglakhir" id="datepicker">
                        </div>
                    </div>
                </div> 
            </div>
            
            <div class="row">    
                
                <div class="col-md-3">
                    <!--<div class="info-box">-->
                        <div class="form-group">
                        <label>Judul</label>
                        <input type="text" class="form-control" name="judul-id" placeholder="Masukkan judul">
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
                        <input type="text" class="form-control" name="judul-en" placeholder="Masukkan judul">
                    <!--</div>-->
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                
                <div class="col-md-6">
                    <!--<div class="info-box">-->
                        <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea id="editor2" name="deskripsi-en" rows="2" cols="40">
                              
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
                    for($f=1;$f<9;$f++) {
                        echo '<div class="fileinput fileinput-new" data-provides="fileinput">
                        <div class="fileinput-new thumbnail xfotomhs">  </div>
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
                    </div> ';
                    }
                    ?>
                   
                </div>
            </div> 
            
            
            <br><hr>
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-info">
                        <div class="box-header">
                            <h3 class="box-title">Produk Kegiatan</h3>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-9">
                    <!--<div class="info-box">-->
                        <div class="form-group">
                        <label>Deskripsi dalam bahasa Indonesia</label>
                        <textarea id="editor3" name="deskripsi-produk-id" rows="2" cols="40">
                              
                        </textarea>
                    </div>
                    
                    <!--</div>-->
                    
                </div>
                
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Bahasa</label>
                        <select class="form-control select2" name="lang-produk-id" style="width: 100%;">
                            <option value="id" selected="selected">Indonesia</option>
                        
                        </select>
         
                    </div>
                </div>
                
                <div class="col-md-9">
                    <!--<div class="info-box">-->
                        <div class="form-group">
                        <label>Deskripsi dalam bahasa Inggris</label>
                        <textarea id="editor4" name="deskripsi-produk-en" rows="2" cols="40">
                              
                        </textarea>
                    </div>
                    
                    <!--</div>-->
                    
                </div>
                
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Bahasa</label>
                        <select class="form-control select2" name="lang-produk-en" style="width: 100%;">
                            <option value="en" selected="selected">Inggris</option>
                        
                        </select>
         
                    </div>
                </div>
                
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
                    for($f=1;$f<9;$f++) {
                        echo '<div class="fileinput fileinput-new" data-provides="fileinput">
                        <div class="fileinput-new thumbnail xfotomhs">  </div>
                        <div class="fileinput-preview fileinput-exists thumbnail" style="width:350px !important;height: 250px;"></div>
                        <div class="user-edit-image-buttons">
                            <span class="btn btn-azure btn-file"><span class="fileinput-new"><i class="fa fa-picture"></i> Pilih dokumen</span>
                                <span class="fileinput-exists"><i class="fa fa-picture"></i> Ganti</span>
                                <input type="file" name="dokumen[]"> 
                            </span>
                            <a href="#" class="btn fileinput-exists btn-red" data-dismiss="fileinput">
                                <i class="fa fa-times"></i> Hapus
                            </a>
                        </div>
                    </div> ';
                    }
                    ?>
                    

                </div>
                
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
                    for($f=1;$f<9;$f++) {
                        echo '<div class="fileinput fileinput-new" data-provides="fileinput">
                        <div class="fileinput-new thumbnail xfotomhs">  </div>
                        <div class="fileinput-preview fileinput-exists thumbnail" style="width:350px !important;height: 250px;"></div>
                        <div class="user-edit-image-buttons">
                            <span class="btn btn-azure btn-file"><span class="fileinput-new"><i class="fa fa-picture"></i> Pilih video</span>
                                <span class="fileinput-exists"><i class="fa fa-picture"></i> Ganti</span>
                                <input type="file" name="video[]"> 
                            </span>
                            <a href="#" class="btn fileinput-exists btn-red" data-dismiss="fileinput">
                                <i class="fa fa-times"></i> Hapus
                            </a>
                        </div>
                    </div> ';
                    }
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
    <section class="content">
        <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Kegiatan</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                <tbody><tr>
                  <th style="width: 10px">#</th>
                  <th>Judul</th>
                  <th>Penjelasan</th>
                  <th>Bahasa</th>
                  <th style="width: 90px">Update data</th>
                </tr>
                <?php 
                $no=1;
                foreach ($kegiatan->result() as $op){
                    echo '<tr>
                        <td>'.$no.'</td>
                        <td>'.$op->judul.'</td>
                        <td>'.$op->deskripsi.'</td>
                        <td>'.$op->bahasa.'</td>    
                        <td><div class="visible-md visible-lg hidden-sm hidden-xs">
                                    <a href="admin-edit-kegiatan?id='.$op->id.'" class="btn btn-transparent btn-xs" tooltip-placement="top" tooltip="Edit"><i class="fa fa-pencil"></i></a>
                                    <a href="delete-kegiatan?id='.$op->id.'" class="btn btn-transparent btn-xs tooltips" tooltip-placement="top" tooltip="Remove"><i class="fa fa-times fa fa-white"></i></a>
                                    </div></td>
                    </tr>';
                    $no++;
                }
                ?>
                
                
                
              </tbody></table>
            </div>
            <!-- /.box-body -->
<!--            <div class="box-footer clearfix">
              <ul class="pagination pagination-sm no-margin pull-right">
                <li><a href="#">«</a></li>
                <li><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">»</a></li>
              </ul>
            </div>-->
          </div>
    </section>
    
    <!-- /.content -->
 </div>

<script src="<?php echo base_url('gudang/AdminLTE-2.3.7/plugins/select2/select2.min.js')?>"></script>
<script src="<?php echo base_url('gudang/AdminLTE-2.3.7/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js'); ?>"></script>
<script src="<?php echo base_url('/gudang/bootstrap-fileinput/jasny-bootstrap.js')?>"></script>
<script src="<?php echo base_url('gudang/AdminLTE-2.3.7/plugins/datepicker/bootstrap-datepicker.js')?>"></script>


<script>
var base='<?php echo base_url();?>';    
$(function () {
    CKEDITOR.replace('editor1');
    CKEDITOR.replace('editor2');
    CKEDITOR.replace('editor3');
    CKEDITOR.replace('editor4');
    
    $('.tglawal').datepicker({
        autoclose: true, format: 'dd/mm/yyyy '
    });
    
    $('.tglakhir').datepicker({
        autoclose: true, format: 'dd/mm/yyyy '
    });
    
    $(".select2").select2();
});
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