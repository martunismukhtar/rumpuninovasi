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
<!--      <h1>
        Halaman program
      </h1>-->
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">Editors</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <?php echo $this->session->flashdata('msg');?>
        <form role="form" id="form" novalidate="novalidate"  action="simpan-hal-program.html" method="post" enctype="multipart/form-data">
            
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-header">
                        <h3 class="box-title"><strong>Program</strong>
                            <!--<small>Advanced and full of features</small>-->
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
                  <th style="width: 180px">Judul</th>
                  <th>Penjelasan</th>
                  <th>Bahasa</th>
                  <th>Foto</th>
                  <th style="width: 80px">Update data</th>
                </tr>
                <?php 
                $no=1;
                foreach ($program->result() as $op){
                    echo '<tr>
                        <td>'.$no.'</td>
                        <td>'.$op->judul.'</td>
                        <td>'.$op->deskripsi.'</td>
                        <td>'.$op->bahasa.'</td>    
                        <td><img style="width:40%;height:30%;" src="gudang/images/program/'.$op->file_foto.'" alt=" "></td>
                        <td><div class="visible-md visible-lg hidden-sm hidden-xs">
                                    <a href="admin-edit-program?id='.$op->id.'" class="btn btn-transparent btn-xs" tooltip-placement="top" tooltip="Edit"><i class="fa fa-pencil"></i></a>
                                    <a href="delete-program?id='.$op->id.'" class="btn btn-transparent btn-xs tooltips" tooltip-placement="top" tooltip="Remove"><i class="fa fa-times fa fa-white"></i></a>
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
    CKEDITOR.replace('editor2');
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