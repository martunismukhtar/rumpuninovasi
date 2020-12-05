<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Admin_proyek extends CI_Controller {
 
    function __construct() {
        parent::__construct();
        require(APPPATH .'libraries/resizeimage.php');
    }
    
    public function index() {
        $data['middle'] = 'aproyek';
        $data['proyek'] = $this->db->query("select id, judul_id, deskripsi_id, icon from tbl_proyek limit 20");
        
        $data['program'] = $this->db->query("select id, judul_id as program from tbl_program g");
        
        $this->load->view('admin',$data);
    }
    
    
    function fedit(){
        $id=$this->input->get('id');
        
        $data['middle'] = 'editproyek';
        
        $data['proyek'] = $this->db->query("select id, program, icon, judul_id, deskripsi_id, judul_en, deskripsi_en from tbl_proyek p where id='".$id."'");
        
        $data['program'] = $this->db->query("select id, judul_id as program from tbl_program");
        
        $this->load->view('admin',$data);
        
    }
    function delete() {
        $id=$this->input->post('a');
        
        $getoldfile=$this->db->query("select file_foto, icon from tbl_proyek where id='".$id."'");
        if($getoldfile->num_rows()>0) {
            unlink('gudang/images/proyek/'.$getoldfile->row()->file_foto);
            unlink('gudang/images/proyek/resize/'.$getoldfile->row()->icon);
        }        
        
        $this->db->query("delete from tbl_proyek where id='".$id."'");
          
        echo json_encode(array('s_'=>1,'m_'=>'Data telah dihapus'));
        exit(0);
    }
    function simpan(){
        
        $program=$this->input->post('program');
        
        $judul_id=$this->input->post('judul-id');
        $deskripsi_id=$this->input->post('deskripsi-id');
        $lang_id=$this->input->post('lang-id');
        
        $judul_en=$this->input->post('judul-en');
        $deskripsi_en=$this->input->post('deskripsi-en');
        $lang_en=$this->input->post('lang-en');
//        
//        $des='{"id":{"judul":"'.$judul_id.'", "deskripsi":"'.$deskripsi_id.'"},"en":{"judul":"'.$judul_en.'", "deskripsi":"'.$deskripsi_en.'"}}';
//        
        $path = $_FILES['userFile']['name'] = $_FILES['filex']['name'];
        $extension = pathinfo($path, PATHINFO_EXTENSION);
        $_FILES['userFile']['type'] = $_FILES['filex']['type'];
        $_FILES['userFile']['tmp_name'] = $_FILES['filex']['tmp_name'];
        $_FILES['userFile']['error'] = $_FILES['filex']['error'];
        $_FILES['userFile']['size'] = $_FILES['filex']['size'];

        $nm=time().'-'.random_str(8, 'abcdefghijk123lmnopqrstuvwxyz');
        
        $changeFileName = $nm.'.'.strtolower($extension);

        $uploadPath = 'gudang/images/proyek/';
        $config['upload_path'] = $uploadPath;
        $config['file_ext_tolower'] = TRUE;
        $config['file_name'] = $changeFileName;
        $config['allowed_types'] = '*';
        $config['overwrite'] = TRUE;
        $this->load->library('upload', $config);
        $this->upload->initialize($config);  
        
        
        if($data['info_upload'] = $this->upload->do_upload('userFile')){
            
//            $this->db->query("insert into tbl_proyek(tgl_input, file_foto, program, des) values('".date('Y-m-d')."', '".$changeFileName."', '".$program."', '".$des."')");
            
            $this->db->query("insert into tbl_proyek(tgl_input, file_foto, icon, judul_id, deskripsi_id, judul_en, deskripsi_en, program) "
                        . "values('".date('Y-m-d')."', '".$nm.".jpg', '".$changeFileName."', '".$judul_id."', '".$deskripsi_id."', '".$judul_en."', '".$deskripsi_en."', '".$program."')");
                
            $resizeObj = new resize($uploadPath.$changeFileName);
                // *** 2) Resize image (options: exact, portrait, landscape, auto, crop)
            $resizeObj -> resizeImage(300, 250, 'exact');
                // *** 3) Save image
            $resizeObj -> saveImage($uploadPath.'resize/'.$nm.'.jpg', 1000);
        }
        
        $this->session->set_flashdata('msg', '<div class="alert alert-success">Data telah disimpan</div>');
        redirect('admin-proyek.html');
        
    }
   
    function simpanedit(){
        
        $idproyek=$this->input->post('idproyek');
        
        $program=$this->input->post('program');
        
        $idproyek_id=$this->input->post('id-proyek-id');
        $judul_id=$this->input->post('judul-id');
        $deskripsi_id=$this->input->post('deskripsi-id');
        
        $idproyek_en=$this->input->post('id-proyek-en');
        $judul_en=$this->input->post('judul-en');
        $deskripsi_en=$this->input->post('deskripsi-en');
          
//        $des='{"id":{"judul":"'.$judul_id.'", "deskripsi":"'.$deskripsi_id.'"},"en":{"judul":"'.$judul_en.'", "deskripsi":"'.$deskripsi_en.'"}}';
        
        if($_FILES['filex']['name']) {
            $path = $_FILES['userFile']['name'] = $_FILES['filex']['name'];
            $extension = pathinfo($path, PATHINFO_EXTENSION);
            $_FILES['userFile']['type'] = $_FILES['filex']['type'];
            $_FILES['userFile']['tmp_name'] = $_FILES['filex']['tmp_name'];
            $_FILES['userFile']['error'] = $_FILES['filex']['error'];
            $_FILES['userFile']['size'] = $_FILES['filex']['size'];

            $nm=time().'-'.random_str(8, 'abcdefghijk123lmnopqrstuvwxyz');
        
            $changeFileName = $nm.'.'.strtolower($extension);

            $uploadPath = 'gudang/images/proyek/';
            $config['upload_path'] = $uploadPath;
            $config['file_ext_tolower'] = TRUE;
            $config['file_name'] = $changeFileName;
            $config['allowed_types'] = '*';
            $config['overwrite'] = TRUE;
            $this->load->library('upload', $config);
            $this->upload->initialize($config);  
            
            if($data['info_upload'] = $this->upload->do_upload('userFile')){
            
                $getoldfile=$this->db->query("select file_foto, icon from tbl_proyek where id='".$idproyek."'");
                if($getoldfile->num_rows()>0) {
                    unlink('gudang/images/proyek/'.$getoldfile->row()->file_foto);
                    unlink('gudang/images/proyek/resize/'.$getoldfile->row()->icon);
                }

                
                $this->db->query("update tbl_proyek set icon= '".$nm.".jpg', file_foto='".$changeFileName."', judul_id='".$judul_id."', deskripsi_id='".$deskripsi_id."', "
                        . "judul_en='".$judul_en."', deskripsi_en='".$deskripsi_en."', program='".$program."' where id='".$idproyek."'");
                
                $resizeObj = new resize($uploadPath.$changeFileName);
                // *** 2) Resize image (options: exact, portrait, landscape, auto, crop)
                $resizeObj -> resizeImage(300, 250, 'exact');
                // *** 3) Save image
                $resizeObj -> saveImage($uploadPath.'resize/'.$changeFileName, 1000);
                
            } else {
                $this->db->query("update tbl_proyek set judul_id='".$judul_id."', deskripsi_id='".$deskripsi_id."', "
                        . "judul_en='".$judul_en."', deskripsi_en='".$deskripsi_en."', program='".$program."' where id='".$idproyek."'");
            }
        } else {
            $this->db->query("update tbl_proyek set judul_id='".$judul_id."', deskripsi_id='".$deskripsi_id."', "
                        . "judul_en='".$judul_en."', deskripsi_en='".$deskripsi_en."', program='".$program."' where id='".$idproyek."'");
        }
            
        
        
        $this->session->set_flashdata('msg', '<div class="alert alert-success">Data telah disimpan</div>');
        redirect('edit-proyek.html?id='.$idproyek);
    }
    

} 