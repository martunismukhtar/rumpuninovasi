<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Admin_header extends CI_Controller {
 
    function __construct() {
        parent::__construct();
        
    }
    
    public function index() {
        $data['middle'] = 'header';
        $this->load->view('admin',$data);
    }
    
    function simpan(){
        $judul_tentang_kami=$this->input->post('judul_tentang_kami');
        $deskripsi_tentang_kami=$this->input->post('deskripsi_tentang_kami');
        
        if(!empty($judul_tentang_kami)) {
            
        }
        
        $judul_program=$this->input->post('judul_program');
        $deskripsi_program=$this->input->post('deskripsi_program');
        
        $judul_kegiatan=$this->input->post('judul_kegiatan');
        $deskripsi_kegiatan=$this->input->post('deskripsi_kegiatan');
        
        $judul_kegiatan=$this->input->post('judul_kegiatan');
        $deskripsi_kegiatan=$this->input->post('deskripsi_kegiatan');
        
        $judul_produk=$this->input->post('judul_produk');
        $deskripsi_produk=$this->input->post('deskripsi_produk');
        
        $jcount=count($judul);
        
        for($f=0;$f<$jcount;$f++) {
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
        
        $this->session->set_flashdata('msg', '<div class="alert alert-success">Data telah disimpan</div>');
        redirect('admin-slide.html');
    }
   

} 