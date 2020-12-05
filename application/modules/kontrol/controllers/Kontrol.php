<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Kontrol extends CI_Controller {
 
    function __construct() {
        parent::__construct();
        
    }
    
    public function index() {
        $data['middle'] = 'kontrol';
        $data['kontrol'] = $this->db->query("select slug, controller, case when jenis='1' then 'view' when jenis='2' then 'input' "
                . "when jenis='3' then 'edit' when jenis='4' then 'delete' end as jenis, "
                . "id from app_routes");
        
//        $data['controller'] = $this->db->query("select id, slug from app_routes where jenis='1'");
        
        $this->load->view('admin',$data);
    }
    
    function get(){
        $menu = $this->db->query("select slug, controller, case when jenis='1' then 'view' when jenis='2' then 'input' "
                . "when jenis='3' then 'edit' when jenis='4' then 'delete' end as jenis, "
                . "id from app_routes");
        
        $html='';
        $no=1;
        foreach($menu->result() as $op){
            $html .='<tr>
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
        
        echo json_encode(array('html'=>$html,'tp_'=>''));
    }
    function simpan(){
        $slug=$this->input->post('slug');
        $controller=$this->input->post('controller');
        $jenis=$this->input->post('jenis');
        
        if(empty($slug)) {
            echo json_encode(array('s_'=>0,'m_'=>'Masukkan slug','cls'=>'has-error',
             'target'=>''));
            exit(0);
        } 
        
        if(empty($controller)) {
            echo json_encode(array('s_'=>0,'m_'=>'Masukkan controller','cls'=>'has-error',
             'target'=>''));
            exit(0);
        } 
        
        $cek=$this->db->query("select slug from app_routes where slug='".$slug."'");
        if($cek->num_rows()>0) {
            echo json_encode(array('s_'=>0,'m_'=>'Duplikasi data'));
            exit(0);
        } else {
            
            $this->db->query("insert into app_routes(slug, controller, jenis) values('".$slug."', '".$controller."', '".$jenis."')");
            echo json_encode(array('s_'=>1,'m_'=>'Data telah disimpan'));
            exit(0);
        }
        
    }
    
    function simpanedit(){
        $id=$this->input->post('id');
        $slug=$this->input->post('slug');
        $controller=$this->input->post('controller');
        $jenis=$this->input->post('jenis');
        
        $this->db->query("update app_routes set slug='".$slug."', controller='".$controller."', jenis='".$jenis."' where id='".$id."'");
        
        echo json_encode(array('s_'=>1,'m_'=>'Data telah disimpan'));
        exit(0);
    }
    
    function fedit(){
        $id=$this->input->post('a');
        $mm=$this->db->query("select * from app_routes where id='".$id."'");
        
        $form='';
        
        foreach($mm->result() as $obj){
            $form .='<div class="row ">'
                . '<div class="col-lg-12 col-md-12">'
                    . '<div class="panel panel-white">'
                        
                    . '<div class="panel-body">'
                        . '<form role="form" class="fedit">'
                            . '<div style="display: none;" class="dataTables_processing loadingsimpan" >'
                                .'<div class="alert alert-danger" role="alert">Sedang menyimpan data</div>'
                                .'</div>'
                
                .'<div class="row">'
                    .'<div class="col-md-12">'
                        .'<div class="form-group">'
                            .'<label class="control-label">'
                                .'Slug <span class="symbol required" aria-required="true"></span>'
                            .'</label>'
                            .'<input type="text" value="'.$obj->slug.'" class="form-control" name="slug">'
                            .'<input type="hidden" value="'.$obj->id.'" name="id">'
                        .'</div>'
			
			.'<div class="form-group">'
                            .'<label class="control-label">'
                                .'Controller <span class="symbol required" aria-required="true"></span>'
                            .'</label>'
                            .'<input type="text" value="'.$obj->controller.'" class="form-control" name="controller">'
                        .'</div>'
                        			
                        .'<div class="form-group">'
                            .'<label class="control-label">'
                                .'Jenis <span class="symbol required" aria-required="true"></span>'
                            .'</label>'
                            .'<select class="form-control select2" name="jenis" style="width: 100%;">'
                                .'<option selected="selected">--Pilih--</option>';
                                $jenis=array('View','Input', 'Edit', 'Delete');
                                for($h=0;$h<4;$h++) {
                                    if($obj->jenis==($h+1)) {
                                        $form .='<option value="'.($h+1).'" selected>'.$jenis[$h].'</option>';
                                    } else {
                                        $form .='<option value="'.($h+1).'">'.$jenis[$h].'</option>';
                                    }
                                }
                                
                                $form .='</select>'
			.'</div>'
                    .'</div>'
                    
                   
                    
		.'</div><div class="row">'
                    .'<div class="col-md-12">'
                        .'<div>'
                            .'<span class="symbol required" aria-required="true"></span> Field yang wajib diisi'
                            .'<hr>'
			.'</div>'
                    .'</div>'
                .'</div>'
		.'<div class="row">'

                    .'<div class="col-md-4">'
                        .'<button class="btn btn-primary btn-sm pull-left btnedit" data-loading-text="<i class=\'fa fa-circle-o-notch fa-spin\'></i> Sedang menyimpan data" type="submit">'
                            .'Simpan <i class="fa fa-arrow-circle-left"></i>'
                        .'</button>'
                    .'</div>'
		.'</div></form></div></div></div>';
        }
        echo json_encode(array('msg'=>$form));
    }
   
    function delete(){
        $id=$this->input->post('a');
        
        $cekexist=$this->db->query("select route from tbl_menu where route='".$id."'");
        if($cekexist->num_rows()>0) {
            echo json_encode(array('s_'=>0,'m_'=>'Data tidak dapat dihapus, digunakan di tabel menu'));
            exit(0);
        } else {
            $this->db->query("delete from app_routes where id='".$id."'");
            
            echo json_encode(array('s_'=>1,'m_'=>'Data telah dihapus'));
            exit(0);
        }
        
    }
} 