<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Admin_menu extends CI_Controller {
 
    function __construct() {
        parent::__construct();
        
    }
    
    public function index() {
        $data['middle'] = 'menu';
        $data['menu'] = $this->db->query("select id, judul, case when lang ='id' then 'Indonesia' else 'Inggris' end as bahasa, (select slug from app_routes where id=m.route) as slug from tbl_menu m"
                . " order by bahasa, judul");
        
        $data['controller'] = $this->db->query("select id, slug from app_routes where jenis='1'");
        
        $this->load->view('admin',$data);
    }
    
    function simpan(){
        $judul=$this->input->post('judul');
        
        $controller=$this->input->post('controller');
        $lang=$this->input->post('lang');
        
        if(empty($judul)) {
            echo json_encode(array('s_'=>0,'m_'=>'Masukkan judul','cls'=>'has-error',
             'target'=>''));
            exit(0);
        } 
        if(empty($controller)) {
            echo json_encode(array('s_'=>0,'m_'=>'Pilih controller','cls'=>'has-error',
             'target'=>''));
            exit(0);
        } 
        
        if(empty($lang)) {
            echo json_encode(array('s_'=>0,'m_'=>'Pilih bahasa','cls'=>'has-error',
             'target'=>''));
            exit(0);
        } 
        
        
        $this->db->query("insert into tbl_menu(judul, parent, lang, route) values('".$judul."', 0, '".$lang."', '".$controller."')");
        echo json_encode(array('s_'=>1,'m_'=>'Data telah disimpan'));
        exit(0);
        
    }
   
    function fedit(){
        $id=$this->input->post('a');
        $mm=$this->db->query("select * from tbl_menu where id='".$id."'");
        
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
                                .'Nama <span class="symbol required" aria-required="true"></span>'
                            .'</label>'
                            .'<input type="text" value="'.$obj->judul.'" class="form-control" name="judul">'
                            .'<input type="hidden" value="'.$obj->id.'" name="id">'
                        .'</div>'
			
			.'<div class="form-group">'
                            .'<label class="control-label">'
                                .'Nama <span class="symbol required" aria-required="true"></span>'
                            .'</label>'
                            .'<select class="form-control select2" name="controller" style="width: 100%;">
                                <option selected="selected">--Pilih--</option>';
            
                                $controller = $this->db->query("select id, slug from app_routes where jenis='1'");
                                foreach($controller->result() as $occ){
                                    if($occ->id==$obj->route) {
                                        $form .='<option value="'.$occ->id.'" selected>'.$occ->slug.'</option>';
                                    } else {
                                        $form .='<option value="'.$occ->id.'">'.$occ->slug.'</option>';
                                    }
                                    
                                }
                        
                        
                            $form .='</select>'
                        .'</div>'
                        			
                        .'<div class="form-group">'
                            .'<label class="control-label">'
                                .'Bahasa <span class="symbol required" aria-required="true"></span>'
                            .'</label>'
                            .'<select class="form-control select2" name="lang" style="width: 100%;">'
                                .'<option selected="selected">--Pilih--</option>';
                                if($obj->lang=='id') {
                                    $form .='<option value="id" selected>Indonesia</option>'
                                        .'<option value="en">English</option>';
                                } else {
                                    $form .='<option value="id">Indonesia</option>'
                                    .'<option value="en" selected>English</option>';
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
    
    function get(){
        $menu = $this->db->query("select id, judul, case when lang ='id' then 'Indonesia' else 'Inggris' end as bahasa, (select slug from app_routes where id=m.route) as slug from tbl_menu m"
                . " order by bahasa, judul");
        
        $html='';
        $no=1;
        foreach($menu->result() as $op){
            $html .='<tr>
                <td>'.$no.'</td>
                <td>'.$op->judul.'</td>
                <td>'.$op->bahasa.'</td>
                <td>'.$op->slug.'</td>    
                <td><div class="visible-md visible-lg hidden-sm hidden-xs">
                    <a href="javascript:edit(\''.$op->id.'\');" class="btn btn-transparent btn-xs" tooltip-placement="top" tooltip="Edit"><i class="fa fa-pencil"></i></a>
                    <a href="javascript:hapus(\''.$op->id.'\');" class="btn btn-transparent btn-xs tooltips" tooltip-placement="top" tooltip="Remove"><i class="fa fa-times fa fa-white"></i></a>
                </div></td>
            </tr>';
            $no++;
        }
        
        echo json_encode(array('html'=>$html,'tp_'=>''));
    }
    
    function simpanedit(){
        $id=$this->input->post('id');
        $judul=$this->input->post('judul');
        $controller=$this->input->post('controller');
        $lang=$this->input->post('lang');
        
        $this->db->query("update tbl_menu set judul='".$judul."', route='".$controller."', lang='".$lang."' where id='".$id."'");
        echo json_encode(array('s_'=>1,'m_'=>'Data telah disimpan'));
        exit(0);
    }
    
    function delete(){
        $id=$this->input->post('a');
        
        $this->db->query("delete from tbl_menu where id='".$id."'");
        echo json_encode(array('s_'=>1,'m_'=>'Data telah dihapus'));
        exit(0);
    }
    

} 