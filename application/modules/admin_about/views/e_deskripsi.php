<link href="<?php echo base_url('/gudang/css/styles1.css')?>" rel="stylesheet" media="screen">
<link href="<?php echo base_url('/gudang/css/plugins.css')?>" rel="stylesheet" media="screen">
<link href="<?php echo base_url('gudang/AdminLTE-2.3.7/plugins/select2/select2.css')?>" rel="stylesheet" media="screen">
<link href="<?php echo base_url('/gudang/css/modified-admin.css')?>" rel="stylesheet" media="screen">
<link href="<?php echo base_url('/gudang/bootstrap-fileinput/jasny-bootstrap.min.css')?>" rel="stylesheet" media="screen">
<?php 
if(!$this->session->userdata('email')) {
    redirect('masuk');
}
    
?>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Halaman deskripsi lembaga
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
        <form role="form" id="form" novalidate="novalidate"  action="simpan-edit-deskripsi.html" method="post" enctype="multipart/form-data">
            
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
        </div>
        
        <div class="row">
            <div class="col-md-2">
                <div class="form-group">
                    <label>Judul</label>
                    <input type="text" class="form-control" name="judul" value="<?php echo $deskripsi->row()->judul; ?>">
                    <input type="hidden" name="id" value="<?php echo $deskripsi->row()->id; ?>">
                    <input type="hidden" name="foto" value="<?php echo $deskripsi->row()->foto; ?>">
                </div>
            </div> 
            <div class="col-md-6">
                <div class="form-group">
                    <label>Deskripsi</label>
                    <textarea id="editor1" name="deskripsi" rows="10" cols="80">
                            <?php echo $deskripsi->row()->deskripsi; ?>
                    </textarea>
         
                </div>
            </div> 
            <div class="col-md-1">
                <div class="form-group">
                    <label>Bahasa</label>
                    <select class="form-control select2" name="lang" style="width: 100%;">
                        <option selected="selected">--Pilih--</option>
                        <?php
                        if($deskripsi->row()->lang=='id') {
                            echo '<option value="id" selected>Indonesia</option>
                        <option value="en">English</option>';
                        } else {
                            echo '<option value="id">Indonesia</option>
                        <option value="en" selected>English</option>';
                        }
                        ?>
                        
                    </select>
         
                </div>
            </div>
            
            <div class="col-md-3">
                <div class="fileinput fileinput-new" data-provides="fileinput">
                    <div class="fileinput-new thumbnail xfotomhs"><img src="gudang/images/deskripsi/<?php echo $deskripsi->row()->file_foto;?>" alt=""></div>
                    
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

                   <div class="col-md-4">
                        <button class="btn btn-primary btn-sm pull-left btnadd" type="submit" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Sedang menyimpan data">
                            Simpan <i class="fa fa-arrow-circle-left"></i>
                        </button>
                    </div>
		</div>
        
        <br>

        </form>
      <!-- ./row -->
    </section>
    
    
    <!-- /.content -->
  </div>

<div class="modal fade modaledit" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content _b_r_s">
            <div class="modal-header">
                <h2 class="jdlform _b_r_s judulheaderedit"><i class="ti-pencil-alt"></i> Modal title</h2>
            </div>
            <div class="modal-body bodyedit">
                Modal Content
            </div>
        </div>
    </div>
</div>


<script src="<?php echo base_url('gudang/AdminLTE-2.3.7/plugins/select2/select2.min.js')?>"></script>
<script src="<?php echo base_url('gudang/AdminLTE-2.3.7/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js'); ?>"></script>
<script src="<?php echo base_url('/gudang/bootstrap-fileinput/jasny-bootstrap.js')?>"></script>
<script>
var base='<?php echo base_url();?>';

$(function () {
    
    CKEDITOR.replace('editor1');
    
    $(".select2").select2();
    
//    App_.init({
//        'simpan':{
//            'url':base + 'simpan-menu.html', form:'#form', data:$('#form').serialize(), btnadd:'.btnadd'
//        }, 
//        'loadingdata':{
//            url_loading:'get-menu.html', laodingclass:'loadingtabel',data:{
//                limit:20
//            } , '_cload':'getdata' 
//        }, 
//        'edit':{
//            'url':base + 'seditw____ww.html', form:'.fedit', btnedit:'.btnedit'
//        }
//    });
    
});
function edit(data){
    window.location.href = base+'fedit-deskripsi?id='+data;
//    App_.edit('Form edit menu', base+'fedit-menu.html', {a:data}, {
//        select2:{
//            0:{
//                klas:'select2', url:''
//            }
//        }
//    });
}
function hapus(data){
    App_.hapus(base+'delete-menu.html', {a:data});        
}
</script>