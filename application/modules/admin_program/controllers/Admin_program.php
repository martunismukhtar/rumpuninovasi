<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Admin_program extends CI_Controller {
 
    function __construct() {
        parent::__construct();
        require(APPPATH .'libraries/resizeimage.php');
    }
    
    public function index() {
        $data['middle'] = 'aprogram';
        $data['program'] = $this->db->query("select id, judul_id, deskripsi_id, icon from tbl_program limit 20");
        
        $this->load->view('admin',$data);
    }
    
    function fedit(){
        $id=$this->input->get('id');
        $data['middle'] = 'editprogram';
        
//        $data['program'] = $this->db->query("select id, file_foto, des->'id'->>'judul' as judulid, des->'id'->>'deskripsi' as deskripsiid, 
//   des->'en'->>'judul' as judulen, des->'en'->>'deskripsi' as deskripsien from tbl_program p where id='".$id."'");
        
        $data['program'] = $this->db->query("select id, icon, judul_id, deskripsi_id, judul_en, deskripsi_en from tbl_program where id='".$id."'");
//        $data['des_program_id'] = $this->db->query("select judul, deskripsi from tbl_deskripsi_program where program='".$id."' and lang='id'");
//        $data['des_program_en'] = $this->db->query("select judul, deskripsi from tbl_deskripsi_program where program='".$id."' and lang='en'");
        
        $this->load->view('admin',$data);
    }
    
    function simpan(){       
        $judul_id=$this->input->post('judul-id');
        $deskripsi_id=$this->input->post('deskripsi-id');
        $lang_id=$this->input->post('lang-id');
                
        $judul_en=$this->input->post('judul-en');
        $deskripsi_en=$this->input->post('deskripsi-en');
        $lang_en=$this->input->post('lang-en');
        
        if($_FILES['file_upload']['name']) {
            $path = $_FILES['userFile']['name'] = $_FILES['file_upload']['name'];
            $extension = pathinfo($path, PATHINFO_EXTENSION);
            $_FILES['userFile']['type'] = $_FILES['file_upload']['type'];
            $_FILES['userFile']['tmp_name'] = $_FILES['file_upload']['tmp_name'];
            $_FILES['userFile']['error'] = $_FILES['file_upload']['error'];
            $_FILES['userFile']['size'] = $_FILES['file_upload']['size'];

            $nm=time().'-'.random_str(8, 'abcdefghijk123lmnopqrstuvwxyz');
        
            $changeFileName = $nm.'.'.strtolower($extension);

            $uploadPath = 'gudang/images/program/';
            $config['upload_path'] = $uploadPath;
            $config['file_ext_tolower'] = TRUE;
            $config['file_name'] = $changeFileName;
            $config['allowed_types'] = '*';
            $config['overwrite'] = TRUE;
            $this->load->library('upload', $config);
            $this->upload->initialize($config);  
        
            if($data['info_upload'] = $this->upload->do_upload('userFile')){
                
                $this->db->query("insert into tbl_program(tgl_input, file_foto, icon, judul_id, deskripsi_id, judul_en, deskripsi_en) "
                        . "values('".date('Y-m-d')."', '".$nm.".jpg', '".$changeFileName."', '".$judul_id."', '".$deskripsi_id."', '".$judul_en."', '".$deskripsi_en."')");
                
//                $getidprogram=$this->db->query("SELECT currval('tbl_program_id_seq') AS id");
//                
//                $this->db->query("insert into tbl_deskripsi_program(program, judul, deskripsi, lang) values('".$getidprogram->row()->id."', '".$judul_id."', '".$deskripsi_id."','id')");
//                $this->db->query("insert into tbl_deskripsi_program(program, judul, deskripsi, lang) values('".$getidprogram->row()->id."', '".$judul_en."', '".$deskripsi_en."','en')");
                
                $resizeObj = new resize($uploadPath.$changeFileName);
                // *** 2) Resize image (options: exact, portrait, landscape, auto, crop)
                $resizeObj -> resizeImage(300, 250, 'exact');
                // *** 3) Save image
                
                $resizeObj -> saveImage($uploadPath.'resize/'.$nm.'.jpg', 1000);
                
            }
            
            $this->session->set_flashdata('msg', '<div class="alert alert-success">Data telah disimpan</div>');
            redirect('admin-program.html');   
        } else {
            
            $this->session->set_flashdata('msg', '<div class="alert alert-danger">Data gagal disimpan, periksa kembali kelengkapan data</div>');
            
            redirect('admin-program.html');   
        }
        
    }
   
    function simpanedit(){
        $idprogram=$this->input->post('idprogram');
        
        $judul_id=$this->input->post('judul-id');
        $deskripsi_id=$this->input->post('deskripsi-id');
        $lang_id=$this->input->post('lang-id');
        
        $judul_en=$this->input->post('judul-en');
        $deskripsi_en=$this->input->post('deskripsi-en');
        $lang_en=$this->input->post('lang-en');
        
//        echo $deskripsi_en;
//        exit();
//        $des='{"id":{"judul":"'.$judul_id.'", "deskripsi":"'.preg_replace('/\s+/', ' ', $deskripsi_id).'"},"en":{"judul":"'.$judul_en.'", "deskripsi":"'.preg_replace('/\s+/', ' ', $deskripsi_en).'"}}';
        
        if($_FILES['file_upload']['name']) {
            
            $get=$this->db->query("select file_foto, icon from tbl_program where id='".$idprogram."'");
            if($get->num_rows()>0) {
                unlink('gudang/images/program/'.$get->row()->file_foto);
                unlink('gudang/images/program/resize/'.$get->row()->icon);
            }
            
            $path = $_FILES['userFile']['name'] = $_FILES['file_upload']['name'];
            $extension = pathinfo($path, PATHINFO_EXTENSION);
            $_FILES['userFile']['type'] = $_FILES['file_upload']['type'];
            $_FILES['userFile']['tmp_name'] = $_FILES['file_upload']['tmp_name'];
            $_FILES['userFile']['error'] = $_FILES['file_upload']['error'];
            $_FILES['userFile']['size'] = $_FILES['file_upload']['size'];

            $nm=time().'-'.random_str(8, 'abcdefghijk123lmnopqrstuvwxyz');
        
            $changeFileName = $nm.'.'.strtolower($extension);

            $uploadPath = 'gudang/images/program/';
            $config['upload_path'] = $uploadPath;
            $config['file_ext_tolower'] = TRUE;
            $config['file_name'] = $changeFileName;
            $config['allowed_types'] = '*';
            $config['overwrite'] = TRUE;
            $this->load->library('upload', $config);
            $this->upload->initialize($config);  
        
            
            if($data['info_upload'] = $this->upload->do_upload('userFile')){
                
                $this->db->query("update tbl_program set icon= '".$nm.".jpg', file_foto='".$changeFileName."', judul_id='".$judul_id."', deskripsi_id='".$deskripsi_id."', "
                        . "judul_en='".$judul_en."', deskripsi_en='".$deskripsi_en."' where id='".$idprogram."'");
                
//                $this->db->query("update tbl_deskripsi_program set judul= '".$judul_id."', deskripsi='".$deskripsi_id."' where program='".$idprogram."' and lang='id'");
//                $this->db->query("update tbl_deskripsi_program set judul= '".$judul_en."', deskripsi='".$deskripsi_en."' where program='".$idprogram."' and lang='en'");
                                
                $resizeObj = new resize($uploadPath.$changeFileName);
                // *** 2) Resize image (options: exact, portrait, landscape, auto, crop)
                $resizeObj -> resizeImage(300, 250, 'exact');
                // *** 3) Save image
                $resizeObj -> saveImage($uploadPath.'resize/'.$nm.'.jpg', 1000);
                
            }
            
            $this->session->set_flashdata('msg', '<div class="alert alert-success">Data telah disimpan</div>');
            redirect('admin-edit-program?id='.$idprogram);   
        } else {
            
            $this->db->query("update tbl_program set judul_id='".$judul_id."', deskripsi_id='".$deskripsi_id."', "
                        . "judul_en='".$judul_en."', deskripsi_en='".$deskripsi_en."' where id='".$idprogram."'");
//            $this->db->query("update tbl_program set icon= '".$nm.".jpg', file_foto='".$changeFileName."' where id='".$idprogram."'");
//                
//            $this->db->query("update tbl_deskripsi_program set judul= '".$judul_id."', deskripsi='".$deskripsi_id."' where program='".$idprogram."' and lang='id'");
//            $this->db->query("update tbl_deskripsi_program set judul= '".$judul_en."', deskripsi='".$deskripsi_en."' where program='".$idprogram."' and lang='en'");
            
//            $this->db->query("update tbl_program set des='".$des."' where id='".$idprogram."'");
            
            $this->session->set_flashdata('msg', '<div class="alert alert-success">Data telah disimpan</div>');
            
            redirect('admin-edit-program?id='.$idprogram); 
        }
    }
    
    function delete(){
        $id=$this->input->post('a');
        
        $getfoto=$this->db->query("select file_foto, icon from tbl_program where id='".$id."'");
//        
        if($getfoto->num_rows()>0) {
            unlink('gudang/images/program/'.$getfoto->row()->file_foto);
            unlink('gudang/images/program/resize/'.$getfoto->row()->icon);
        }
        
        
        $this->db->query("delete from tbl_program where id='".$id."'");
        
        echo json_encode(array('s_'=>1,'m_'=>'Data telah dihapus !!!'));
        exit(0);
        
    }

} 