<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Slide extends CI_Controller {
 
    function __construct() {
        parent::__construct();
        
    }
    
    public function index() {
        $data['middle'] = 'slide';
        $data['slide'] = $this->db->query("select * from tbl_slide");
        $this->load->view('admin',$data);
    }
    
    function feditslide(){
        $id=$this->input->get('id');
        $data['middle'] = 'editslide';
        $data['slide'] = $this->db->query("select * from tbl_slide where id='".$id."'");
        $this->load->view('admin',$data);
    }
    
    function hstatic(){
        $data['middle'] = 'static';
        $data['slide'] = $this->db->query("select * from tbl_background_static");
        $this->load->view('admin',$data);
    }
    
    function simpanhstatic(){
        $judul=$this->input->post('judul');
        $deskripsi=$this->input->post('deskripsi');
        
        if(empty($judul)) {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger">Masukkan judul</div>');
            redirect('admin-background-static.html');   
        }
        if(empty($deskripsi)) {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger">Masukkan deskripsi</div>');
            redirect('admin-background-static.html');   
        }
        
        $this->db->query("insert into tbl_background_static(judul, deskripsi) values('".$judul."', '".$deskripsi."')");
            
        $path = $_FILES['userFile']['name'] = $_FILES['filex']['name'];
        $extension = pathinfo($path, PATHINFO_EXTENSION);
        $_FILES['userFile']['type'] = $_FILES['filex']['type'];
        $_FILES['userFile']['tmp_name'] = $_FILES['filex']['tmp_name'];
        $_FILES['userFile']['error'] = $_FILES['filex']['error'];
        $_FILES['userFile']['size'] = $_FILES['filex']['size'];

        $nm=time().'-'.random_str(8, 'abcdefghijk123lmnopqrstuvwxyz');
        
        $changeFileName = $nm.'.'.strtolower($extension);
                
        $uploadPath = 'gudang/images/slides/';
        $config['upload_path'] = $uploadPath;
        $config['file_ext_tolower'] = TRUE;
        $config['file_name'] = $changeFileName;
        $config['allowed_types'] = '*';
        $config['overwrite'] = TRUE;
        $this->load->library('upload', $config);
        $this->upload->initialize($config);  
        
        if($data['info_upload'] = $this->upload->do_upload('userFile')){
            
            $getnextval=$this->db->query("select currval('tbl_background_static_id_seq')");
                    
            $this->db->query("update tbl_background_static set nama_file='".$changeFileName."' where id ='".$getnextval->row()->currval."'");
        }
        
        
        $this->session->set_flashdata('msg', '<div class="alert alert-success">Data telah disimpan</div>');
        redirect('admin-background-static.html');
    }
    
    function simpaneditslide(){
        $id=$this->input->post('id');
        $judul=$this->input->post('judul');
        $deskripsi=$this->input->post('deskripsi');
        $oldfile=$this->input->post('oldfile');

        
        if($_FILES['filex']['name']){
            
                $path = $_FILES['userFile']['name'] = $_FILES['filex']['name'];
                $extension = pathinfo($path, PATHINFO_EXTENSION);
                $_FILES['userFile']['type'] = $_FILES['filex']['type'];
                $_FILES['userFile']['tmp_name'] = $_FILES['filex']['tmp_name'];
                $_FILES['userFile']['error'] = $_FILES['filex']['error'];
                $_FILES['userFile']['size'] = $_FILES['filex']['size'];

                $nm=time().'-'.random_str(8, 'abcdefghijk123lmnopqrstuvwxyz');
        
                $changeFileName = $nm.'.'.strtolower($extension);
                
                $uploadPath = 'gudang/images/slides/';
                $config['upload_path'] = $uploadPath;
                $config['file_ext_tolower'] = TRUE;
                $config['file_name'] = $changeFileName;
                $config['allowed_types'] = '*';
                $config['overwrite'] = TRUE;
                $this->load->library('upload', $config);
                $this->upload->initialize($config);  
        
                if($data['info_upload'] = $this->upload->do_upload('userFile')){
                    
                    unlink('gudang/images/slides/'.$oldfile);
                    
                    $this->db->query("update tbl_slide set judul='".$judul."', deskripsi='".$deskripsi."',file_foto='".$changeFileName."'  where id='".$id."'");
                    
                    
                }
        } else {
            
            $this->db->query("update tbl_slide set judul='".$judul."', deskripsi='".$deskripsi."' where id='".$id."'");
            
            
        }
        
        $this->session->set_flashdata('msg', '<div class="alert alert-success">Data telah disimpan</div>');
        redirect('admin-edit-slide?id='.$id);
            
    }
    
    function simpan(){
        $judul=$this->input->post('judul');
        $deskripsi=$this->input->post('deskripsi');
        
        $jcount=count($_FILES['filex']['name']);
        
        for($f=0;$f<$jcount;$f++) {
            
            if($_FILES['filex']['name'][$f]){
                $this->db->query("insert into tbl_slide(judul, deskripsi) values('".$judul[$f]."', '".$deskripsi[$f]."')");
            
                $path = $_FILES['userFile']['name'] = $_FILES['filex']['name'][$f];
                $extension = pathinfo($path, PATHINFO_EXTENSION);
                $_FILES['userFile']['type'] = $_FILES['filex']['type'][$f];
                $_FILES['userFile']['tmp_name'] = $_FILES['filex']['tmp_name'][$f];
                $_FILES['userFile']['error'] = $_FILES['filex']['error'][$f];
                $_FILES['userFile']['size'] = $_FILES['filex']['size'][$f];

                $nm=time().'-'.random_str(8, 'abcdefghijk123lmnopqrstuvwxyz');
        
                $changeFileName = $nm.'.'.strtolower($extension);
                
                $uploadPath = 'gudang/images/slides/';
                $config['upload_path'] = $uploadPath;
                $config['file_ext_tolower'] = TRUE;
                $config['file_name'] = $changeFileName;
                $config['allowed_types'] = '*';
                $config['overwrite'] = TRUE;
                $this->load->library('upload', $config);
                $this->upload->initialize($config);  
        
                if($data['info_upload'] = $this->upload->do_upload('userFile')){
                
                    $getnextval=$this->db->query("select currval('tbl_slide_id_seq')");
                    
                    $this->db->query("update tbl_slide set file_foto='".$changeFileName."' where id ='".$getnextval->row()->currval."'");
                
                }
            }
            
        }
        
        $this->session->set_flashdata('msg', '<div class="alert alert-success">Data telah disimpan</div>');
        redirect('admin-slide.html');
    }
   
    function delete(){
        $id=$this->input->post('a');
        
        $this->db->query("delete from tbl_slide where id='".$id."'");
        
        echo json_encode(array('s_'=>1,'m_'=>'Data telah dihapus'));
        exit(0);
//        $this->session->set_flashdata('msg', '<div class="alert alert-success">Data telah dihapus</div>');
//        redirect('admin-slide.html');
    }

} 