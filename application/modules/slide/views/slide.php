<link href="<?php echo base_url('/gudang/css/styles1.css')?>" rel="stylesheet" media="screen">
<link href="<?php echo base_url('/gudang/css/plugins.css')?>" rel="stylesheet" media="screen">
<link href="<?php echo base_url('/gudang/bootstrap-fileinput/jasny-bootstrap.min.css')?>" rel="stylesheet" media="screen">
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Halaman slide</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Forms</a></li>
            <li class="active">Editors</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <?php echo $this->session->flashdata('msg');?>
        <form role="form" id="form" novalidate="novalidate"  action="simpan-hal-slide.html" method="post" enctype="multipart/form-data">
            
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-info">
                        <div class="box-header">
                            <h3 class="box-title">Slide
                            
                            </h3>

                        </div>
            
                    </div>
          
                </div>
            </div>
            
            <div class="row">    
                
                <div class="col-md-12">
                    <!--<div class="info-box">-->
                        <div class="form-group">
                        <label>Judul</label>
                        <input type="text" class="form-control" name="judul[]" placeholder="Masukkan judul">
                    <!--</div>-->
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
            </div>
            <div class="row">    
                <div class="col-md-12">
                    <!--<div class="info-box">-->
                    <div class="form-group">
                        <label>Deskripsi Singkat</label>
                        <textarea class="form-control" name="deskripsi[]" rows="3" placeholder="Penjelasan singkat ..."></textarea>
                    </div>
                    
                    <!--</div>-->
                    
                </div>
            
            
           
            </div>
            
            <div class="row">

                <div class="col-md-12">
                    <div class="fileinput fileinput-new" data-provides="fileinput">
                        <div class="fileinput-new thumbnail xfotomhs">  </div>
                        <div class="fileinput-preview fileinput-exists thumbnail" style="width:350px !important;height: 250px;"></div>
                        <div class="user-edit-image-buttons">
                            <span class="btn btn-azure btn-file"><span class="fileinput-new"><i class="fa fa-picture"></i> Select image</span>
                                <span class="fileinput-exists"><i class="fa fa-picture"></i> Change</span>
                                <input type="file" name="filex[]"> 
                            </span>
                            <a href="#" class="btn fileinput-exists btn-red" data-dismiss="fileinput">
                                <i class="fa fa-times"></i> Remove
                            </a>
                        </div>
                    </div>
                    
                </div>
            </div>  
            <hr>
            
            <div class="row">    
                
                <div class="col-md-12">
                    <!--<div class="info-box">-->
                        <div class="form-group">
                        <label>Judul</label>
                        <input type="text" class="form-control" name="judul[]" placeholder="Masukkan judul">
                    <!--</div>-->
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
            </div>
            <div class="row">    
                <div class="col-md-12">
                    <!--<div class="info-box">-->
                    <div class="form-group">
                        <label>Deskripsi Singkat</label>
                        <textarea class="form-control" name="deskripsi[]" rows="3" placeholder="Penjelasan singkat ..."></textarea>
                    </div>
                    
                    <!--</div>-->
                    
                </div>
            
            
           
            </div>
            
            <div class="row">

                <div class="col-md-12">
                    <div class="fileinput fileinput-new" data-provides="fileinput">
                        <div class="fileinput-new thumbnail xfotomhs">  </div>
                        <div class="fileinput-preview fileinput-exists thumbnail" style="width:350px !important;height: 250px;"></div>
                        <div class="user-edit-image-buttons">
                            <span class="btn btn-azure btn-file"><span class="fileinput-new"><i class="fa fa-picture"></i> Select image</span>
                                <span class="fileinput-exists"><i class="fa fa-picture"></i> Change</span>
                                <input type="file" name="filex[]"> 
                            </span>
                            <a href="#" class="btn fileinput-exists btn-red" data-dismiss="fileinput">
                                <i class="fa fa-times"></i> Remove
                            </a>
                        </div>
                    </div>
                    
                </div>
            </div>  
            <hr>
            
            <div class="row">    
                
                <div class="col-md-12">
                    <!--<div class="info-box">-->
                        <div class="form-group">
                        <label>Judul</label>
                        <input type="text" class="form-control" name="judul[]" placeholder="Masukkan judul">
                    <!--</div>-->
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
            </div>
            <div class="row">    
                <div class="col-md-12">
                    <!--<div class="info-box">-->
                    <div class="form-group">
                        <label>Deskripsi Singkat</label>
                        <textarea class="form-control" name="deskripsi[]" rows="3" placeholder="Penjelasan singkat ..."></textarea>
                    </div>
                    
                    <!--</div>-->
                    
                </div>
            
            
           
            </div>
            
            <div class="row">

                <div class="col-md-12">
                    <div class="fileinput fileinput-new" data-provides="fileinput">
                        <div class="fileinput-new thumbnail xfotomhs">  </div>
                        <div class="fileinput-preview fileinput-exists thumbnail" style="width:350px !important;height: 250px;"></div>
                        <div class="user-edit-image-buttons">
                            <span class="btn btn-azure btn-file"><span class="fileinput-new"><i class="fa fa-picture"></i> Select image</span>
                                <span class="fileinput-exists"><i class="fa fa-picture"></i> Change</span>
                                <input type="file" name="filex[]"> 
                            </span>
                            <a href="#" class="btn fileinput-exists btn-red" data-dismiss="fileinput">
                                <i class="fa fa-times"></i> Remove
                            </a>
                        </div>
                    </div>
                    
                </div>
            </div>  
            <hr>
            
            <div class="row">    
                
                <div class="col-md-12">
                    <!--<div class="info-box">-->
                        <div class="form-group">
                        <label>Judul</label>
                        <input type="text" class="form-control" name="judul[]" placeholder="Masukkan judul">
                    <!--</div>-->
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
            </div>
            <div class="row">    
                <div class="col-md-12">
                    <!--<div class="info-box">-->
                    <div class="form-group">
                        <label>Deskripsi Singkat</label>
                        <textarea class="form-control" name="deskripsi[]" rows="3" placeholder="Penjelasan singkat ..."></textarea>
                    </div>
                    
                    <!--</div>-->
                    
                </div>
            
            
           
            </div>
            
            <div class="row">

                <div class="col-md-12">
                    <div class="fileinput fileinput-new" data-provides="fileinput">
                        <div class="fileinput-new thumbnail xfotomhs">  </div>
                        <div class="fileinput-preview fileinput-exists thumbnail" style="width:350px !important;height: 250px;"></div>
                        <div class="user-edit-image-buttons">
                            <span class="btn btn-azure btn-file"><span class="fileinput-new"><i class="fa fa-picture"></i> Select image</span>
                                <span class="fileinput-exists"><i class="fa fa-picture"></i> Change</span>
                                <input type="file" name="filex[]"> 
                            </span>
                            <a href="#" class="btn fileinput-exists btn-red" data-dismiss="fileinput">
                                <i class="fa fa-times"></i> Remove
                            </a>
                        </div>
                    </div>
                    
                </div>
            </div>  
            <hr>
            
            <div class="row">    
                
                <div class="col-md-12">
                    <!--<div class="info-box">-->
                        <div class="form-group">
                        <label>Judul</label>
                        <input type="text" class="form-control" name="judul[]" placeholder="Masukkan judul">
                    <!--</div>-->
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
            </div>
            <div class="row">    
                <div class="col-md-12">
                    <!--<div class="info-box">-->
                    <div class="form-group">
                        <label>Deskripsi Singkat</label>
                        <textarea class="form-control" name="deskripsi[]" rows="3" placeholder="Penjelasan singkat ..."></textarea>
                    </div>
                    
                    <!--</div>-->
                    
                </div>
            
            
           
            </div>
            
            <div class="row">

                <div class="col-md-12">
                    <div class="fileinput fileinput-new" data-provides="fileinput">
                        <div class="fileinput-new thumbnail xfotomhs">  </div>
                        <div class="fileinput-preview fileinput-exists thumbnail" style="width:350px !important;height: 250px;"></div>
                        <div class="user-edit-image-buttons">
                            <span class="btn btn-azure btn-file"><span class="fileinput-new"><i class="fa fa-picture"></i> Select image</span>
                                <span class="fileinput-exists"><i class="fa fa-picture"></i> Change</span>
                                <input type="file" name="filex[]"> 
                            </span>
                            <a href="#" class="btn fileinput-exists btn-red" data-dismiss="fileinput">
                                <i class="fa fa-times"></i> Remove
                            </a>
                        </div>
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
        <!-- /.col-->
        
      <!-- ./row -->
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
                <table class="table table-bordered">
                <tbody><tr>
                  <th style="width: 10px">#</th>
                  <th>Judul</th>
                  <th>Penjelasan</th>
                  <th>Foto</th>
                  <th style="width: 90px">Update data</th>
                </tr>
                <?php 
                $no=1;
                
                foreach ($slide->result() as $op){
                    $class='r-'.$no;
                    echo '<tr class="'.$class.'">
                        <td>'.$no.'</td>
                        <td>'.$op->judul.'</td>
                        <td>'.$op->deskripsi.'</td>
                        <td><img style="width:40%;height:40%;" src="gudang/images/slides/'.$op->file_foto.'" alt=" "></td>    
                        <td><div class="visible-md visible-lg hidden-sm hidden-xs">
                            <a href="admin-edit-slide?id='.$op->id.'" class="btn btn-transparent btn-xs" tooltip-placement="top" tooltip="Edit"><i class="fa fa-pencil"></i></a>
                            <a href="javascript:hapus(\''.$op->id.'\', \''.$class.'\')" class="btn btn-transparent btn-xs tooltips" tooltip-placement="top" tooltip="Remove"><i class="fa fa-times fa fa-white"></i></a>
                            </div></td>
                    </tr>';
                    $no++;
                }
                ?>
                
                
                
              </tbody></table>
            </div>
            <!-- /.box-body -->
            
          </div>
    </section>
    
    <!-- /.content -->
 </div>

<script src="<?php echo base_url('gudang/AdminLTE-2.3.7/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js'); ?>"></script>
<script src="<?php echo base_url('/gudang/bootstrap-fileinput/jasny-bootstrap.js')?>"></script>
<script>
var base='<?php base_url();?>';    
$(function () {
   
});
function hapus(a, b){
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
                        url: base+'delete-slide',data: {a:a},
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