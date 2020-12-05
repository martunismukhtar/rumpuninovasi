<link href="<?php echo base_url('/gudang/css/styles1.css')?>" rel="stylesheet" media="screen">
<link href="<?php echo base_url('/gudang/css/plugins.css')?>" rel="stylesheet" media="screen">
<link href="<?php echo base_url('gudang/AdminLTE-2.3.7/plugins/select2/select2.css')?>" rel="stylesheet" media="screen">
<link href="<?php echo base_url('/gudang/css/modified-admin.css')?>" rel="stylesheet" media="screen">
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
        Halaman menu
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
        <form role="form" id="form" novalidate="novalidate"  action="simpan-hal-about.html" method="post" enctype="multipart/form-data">
            
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-header">
                        <h3 class="box-title"><strong>Controller</strong>
                           
                        </h3>

                    </div>
            
                </div>
          
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label>Slug</label>
                    <input type="text" class="form-control" name="slug" placeholder="Masukkan slug">
         
                </div>
            </div> 
            <div class="col-md-6">
                <div class="form-group">
                    <label>Controller</label>
                    <input type="text" class="form-control" name="controller" placeholder="Masukkan controller">
         
                </div>
            </div> 
            <div class="col-md-3">
                <div class="form-group">
                    <label>Jenis</label>
                    <select class="form-control select2" name="jenis" style="width: 100%;">
                        <option selected="selected">--Pilih--</option>
                        <option value="1">View</option>
                        <option value="2">Input</option>
                        <option value="3">Edit</option>
                        <option value="4">Delete</option>
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
              <h3 class="box-title">Menu</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-bordered">
                <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Slug</th>
                        <th>Controller</th>
                        <th>Jenis</th>
                        <th style="width: 90px">Update data</th>
                    </tr>
                </thead>  
                <tbody class="getdata">
                    
                <?php 
                $no=1;
                foreach ($kontrol->result() as $op){
                    echo '<tr>
                        <td>'.$no.'</td>
                        <td>'.$op->slug.'</td>
                        <td>'.$op->controller.'</td>
                        <td>'.$op->jenis.'</td>    
                        <td><div class="visible-md visible-lg hidden-sm hidden-xs">
                            <a href="javascript:edit(\''.$op->id.'\');" class="btn btn-transparent btn-xs" tooltip-placement="top" tooltip="Edit"><i class="fa fa-pencil"></i></a>
                            <a href="javascript:hapus(\''.$op->id.'\');" class="btn btn-transparent btn-xs tooltips" tooltip-placement="top" tooltip="Remove"><i class="fa fa-times fa fa-white"></i></a>
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
<script>
var base='<?php echo base_url();?>';
$(function () {
    $(".select2").select2();
    
    App_.init({
        'simpan':{
            'url':base + 'simpan-controller.html', form:'#form', data:$('#form').serialize(), btnadd:'.btnadd'
        }, 
        'loadingdata':{
            url_loading:'get-controller.html', laodingclass:'loadingtabel',data:{
                limit:20
            } , '_cload':'getdata' 
        }, 
        'edit':{
            'url':base + 'edit-controller.html', form:'.fedit', btnedit:'.btnedit'
        }
    });
    
});
function edit(data){
    
    App_.edit('Form edit controller', base+'fedit-controller.html', {a:data}, {
        select2:{
            0:{
                klas:'select2', url:''
            }
        }
    });
}
function hapus(data){
    App_.hapus(base+'delete-controller.html', {a:data});        
}
</script>