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
        Halaman deskripsi lembaga
      </h1>-->
     
    </section>

    <!-- Main content -->
    <section class="content">
        <?php echo $this->session->flashdata('msg');?>
        <form role="form" id="form" novalidate="novalidate"  action="simpan-filosofi.html" method="post" enctype="multipart/form-data">
            
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-header">
                        <h3 class="box-title"><strong>Filosofi Lembaga</strong>
                            <!--<small>Advanced and full of features</small>-->
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
        <hr>
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
    
    CKEDITOR.replace('editor2');
    CKEDITOR.replace('editor3');
    CKEDITOR.replace('editor4');
    
    
    CKEDITOR.replace('editor5');
    CKEDITOR.replace('editor6');
    CKEDITOR.replace('editor7');
    
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