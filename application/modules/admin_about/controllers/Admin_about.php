<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Admin_about extends CI_Controller {
 
    function __construct() {
        parent::__construct();
        
    }
    
    public function index() {
        $data['middle'] = 'about';
        $data['deskripsi_id'] = $this->db->query("select * from tbl_deskripsi_lembaga where lang='id'");
        $data['deskripsi_en'] = $this->db->query("select * from tbl_deskripsi_lembaga where lang='en'");
        $data['foto'] = $this->db->query("select * from tbl_foto_lembaga");
        $this->load->view('admin',$data);
    }
    
    
    /* deskripis lembaga*/
    
    function simpan_deskripsi(){
        $foto=$this->input->post('foto');
        $id_id=$this->input->post('id-id');
        $judul_id=$this->input->post('judul-id');
        $deskripsi_id=$this->input->post('deskripsi-id');
        $lang_id=$this->input->post('lang-id');
        
        $id_en=$this->input->post('id-en');
        $judul_en=$this->input->post('judul-en');
        $deskripsi_en=$this->input->post('deskripsi-en');
        $lang_en=$this->input->post('lang-en');
        
        
        
        if($_FILES['file_upload']['name']) {
            
            //delete old image
            
            $path = $_FILES['userFile']['name'] = $_FILES['file_upload']['name'];
            $extension = pathinfo($path, PATHINFO_EXTENSION);
            $_FILES['userFile']['type'] = $_FILES['file_upload']['type'];
            $_FILES['userFile']['tmp_name'] = $_FILES['file_upload']['tmp_name'];
            $_FILES['userFile']['error'] = $_FILES['file_upload']['error'];
            $_FILES['userFile']['size'] = $_FILES['file_upload']['size'];

            $nm='deskrpisi'.random_str(8, 'abcdefghijk123lmnopqrstuvwxyz');
        
            $changeFileName = $nm.'.'.strtolower($extension);

            $uploadPath = 'gudang/images/deskripsi/';
            $config['upload_path'] = $uploadPath;
            $config['file_ext_tolower'] = TRUE;
            $config['file_name'] = $changeFileName;
            $config['allowed_types'] = '*';
            $config['overwrite'] = TRUE;
            $this->load->library('upload', $config);
            $this->upload->initialize($config);  
        
            $this->load->library('Resizeimage');
            
            if($data['info_upload'] = $this->upload->do_upload('userFile')){
                if($foto) {
                    
                    $get=$this->db->query("select nama_file from tbl_foto_lembaga where id='".$foto."'");
                    
                    if($get->num_rows()>0) {
                        unlink('gudang/images/deskripsi/'.$get->row()->nama_file);
                    }
                    
                    $this->db->query("update tbl_deskripsi_lembaga set judul='".$judul_id."', deskripsi='".$deskripsi_id."', lang='".$lang_id."' where id='".$id_id."'");
                    
                    $this->db->query("update tbl_deskripsi_lembaga set judul='".$judul_en."', deskripsi='".$deskripsi_en."', lang='".$lang_en."' where id='".$id_en."'");
                    
                    $this->db->query("update tbl_foto_lembaga set nama_file='".$changeFileName."' where id='".$foto."'");
                    
                } else {
                    
                    $this->db->query("insert into tbl_foto_lembaga(nama_file) values('".$changeFileName."')");
                    $getnextval=$this->db->query("select currval('tbl_foto_lembaga_id_seq')");
                    
                    $exid=$this->db->query("select lang from tbl_deskripsi_lembaga where lang='".$lang_id."'");
                    if($exid->num_rows()>0) {
                        $this->db->query("update tbl_deskripsi_lembaga set judul='".$judul_id."', deskripsi='".$deskripsi_id."', "
                                . "lang='".$lang_id."', foto='".$getnextval->row()->currval."' where id='".$id_id."'");
                    } else {
                        $this->db->query("insert into tbl_deskripsi_lembaga(judul, deskripsi, lang, foto) "
                                . "values('".$judul_id."', '".$deskripsi_id."', '".$lang_id."', '".$getnextval->row()->currval."')");
                    }
                    
                    $exen=$this->db->query("select lang from tbl_deskripsi_lembaga where lang='".$lang_en."'");
                    if($exen->num_rows()>0) {
                        $this->db->query("update tbl_deskripsi_lembaga set judul='".$judul_en."', deskripsi='".$deskripsi_en."', "
                                . "lang='".$lang_en."', foto='".$getnextval->row()->currval."' where id='".$id_en."'");
                    } else {
                        $this->db->query("insert into tbl_deskripsi_lembaga(judul, deskripsi, lang, foto) "
                                . "values('".$judul_en."', '".$deskripsi_en."', '".$lang_en."', '".$getnextval->row()->currval."')");
                    }
                    
                }
                
                
            }
        
        } else {
            $this->db->query("update tbl_deskripsi_lembaga set judul='".$judul_id."', deskripsi='".$deskripsi_id."', lang='".$lang_id."' where id='".$id_id."'");
                    
            $this->db->query("update tbl_deskripsi_lembaga set judul='".$judul_en."', deskripsi='".$deskripsi_en."', lang='".$lang_en."' where id='".$id_en."'");
        
        }
        
        $this->session->set_flashdata('msg', '<div class="alert alert-success">Data telah disimpan</div>');
            
        redirect('admin-deskripsi-lembaga.html');
        
        
    }
   
    function deskripsi_lembaga(){
        $data['middle'] = 'deskripsi';
        $data['deskripsi_id'] = $this->db->query("select * from tbl_deskripsi_lembaga where lang='id'");
        $data['deskripsi_en'] = $this->db->query("select * from tbl_deskripsi_lembaga where lang='en'");
        $data['foto'] = $this->db->query("select * from tbl_foto_lembaga");
        $this->load->view('admin',$data);
    }
    
    function fedit_deskripsi(){
        $id=$this->input->get('id');
        $data['deskripsi'] = $this->db->query("select id, judul, deskripsi,(select nama_file from tbl_foto_lembaga where id=d.foto) as file_foto, foto, lang from "
                . "tbl_deskripsi_lembaga d where id='".$id."'");
        $data['middle'] = 'e_deskripsi';
        $this->load->view('admin',$data);
    }
    
    function simpaneditdeskripsi(){
        $id=$this->input->post('id');
        $judul=$this->input->post('judul');
        $deskripsi=$this->input->post('deskripsi');
        $lang=$this->input->post('lang');
        $foto=$this->input->post('foto');
        
        if($_FILES['file_upload']['name']) {
            
            //delete old image
            
            
            $path = $_FILES['userFile']['name'] = $_FILES['file_upload']['name'];
            $extension = pathinfo($path, PATHINFO_EXTENSION);
            $_FILES['userFile']['type'] = $_FILES['file_upload']['type'];
            $_FILES['userFile']['tmp_name'] = $_FILES['file_upload']['tmp_name'];
            $_FILES['userFile']['error'] = $_FILES['file_upload']['error'];
            $_FILES['userFile']['size'] = $_FILES['file_upload']['size'];

            $nm='deskrpisi'.random_str(8, 'abcdefghijk123lmnopqrstuvwxyz');
        
            $changeFileName = $nm.'.'.strtolower($extension);

            $uploadPath = 'gudang/images/deskripsi/';
            $config['upload_path'] = $uploadPath;
            $config['file_ext_tolower'] = TRUE;
            $config['file_name'] = $changeFileName;
            $config['allowed_types'] = '*';
            $config['overwrite'] = TRUE;
            $this->load->library('upload', $config);
            $this->upload->initialize($config);  
        
            if($data['info_upload'] = $this->upload->do_upload('userFile')){
                if($foto) {
                    
                    $get=$this->db->query("select nama_file from tbl_foto_lembaga where id='".$foto."'");
                    
                    if($get->num_rows()>0) {
                        unlink('gudang/images/deskripsi/'.$get->row()->nama_file);
                    }
                    
                    $this->db->query("update tbl_deskripsi_lembaga set judul='".$judul."', deskripsi='".$deskripsi."', lang='".$lang."' where id='".$id."'");
                    
                    $this->db->query("update tbl_foto_lembaga set nama_file='".$changeFileName."' id='".$foto."'");
                    
                } else {
                    
                    $this->db->query("insert into tbl_foto_lembaga(nama_file) values('".$changeFileName."')");
                    $getnextval=$this->db->query("select currval('tbl_foto_lembaga_id_seq')");
                    $this->db->query("update tbl_deskripsi_lembaga set judul='".$judul."', deskripsi='".$deskripsi."', lang='".$lang."', foto='".$getnextval->row()->currval."' where id='".$id."'");
                    
                }
                
                
            }
        
        } else {
            $this->db->query("update tbl_deskripsi_lembaga set judul='".$judul."', deskripsi='".$deskripsi."', lang='".$lang."' where id='".$id."'");
        
        }
        
        
        $this->session->set_flashdata('msg', '<div class="alert alert-success">Data telah disimpan</div>');
            
        redirect('fedit-deskripsi?id='.$id);
    }
    
    /*filosofi lembaga*/
    function filosofi_lembaga(){
        $data['middle'] = 'filosofi';
        $data['filosofi_id'] = $this->db->query("select * from tbl_filosofi_lembaga where lang='id'");
        $data['filosofi_en'] = $this->db->query("select * from tbl_filosofi_lembaga where lang='en'");
        $data['foto'] = $this->db->query("select * from tbl_foto_lembaga");
        $this->load->view('admin',$data);
    }
    
    function simpan_filosofi(){
        $judul_id=$this->input->post('judul-id');
        $filosofi_id=$this->input->post('filosofi-id');
        $idfilosofi_id=$this->input->post('idfilosofi-id');
        $lang_id=$this->input->post('lang-in');
        
        
        $judul_en=$this->input->post('judul-en');
        $filosofi_en=$this->input->post('filosofi-en');
        $idfilosofi_en=$this->input->post('idfilosofi-en');
        $lang_en=$this->input->post('lang-en');
//         echo count($judul_id);
//         
//         echo $idfilosofi_id[2];
        if($idfilosofi_id) {
            
            for($id=0;$id<count($judul_id);$id++) {
                if($idfilosofi_id[$id]) {
                    $this->db->query("update tbl_filosofi_lembaga set judul='".$judul_id[$id]."', deskripsi='".$filosofi_id[$id]."' where id='".$idfilosofi_id[$id]."'");
                }
                
            }
            
        } else {
            for($id=0;$id<count($judul_id);$id++) {
                if($judul_id[$id]) {
                    $this->db->query("insert into tbl_filosofi_lembaga(judul, deskripsi, lang) values('".$judul_id[$id]."', '".$filosofi_id[$id]."', '".$lang_id."')");
                }
            }
        }
        
        if($idfilosofi_en) {
            
            for($en=0;$en<count($judul_en);$en++) {
                
                if($judul_en[$en]) {
                    $this->db->query("update tbl_filosofi_lembaga set judul='".$judul_en[$en]."', deskripsi='".$filosofi_en[$en]."' where id='".$idfilosofi_en[$en]."'");
                }
                
            }
            
        } else {
            for($iad=0;$iad<count($judul_en);$iad++) {
                if($judul_en[$iad]) {
                    $this->db->query("insert into tbl_filosofi_lembaga(judul, deskripsi, lang) values('".$judul_en[$iad]."', '".$filosofi_en[$iad]."', '".$lang_en."')");
                }
            }
        }
        
        $this->session->set_flashdata('msg', '<div class="alert alert-success">Data telah disimpan</div>');
            
        redirect('admin-filosofi-lembaga.html');
        
    }
    
    /*Rentang Inovasi*/
    function rentang_inovasi(){
    
        $data['middle'] = 'rentang';
        $data['rentang_id'] = $this->db->query("select * from tbl_rentang_inovasi where lang='id'");
        $data['rentang_en'] = $this->db->query("select * from tbl_rentang_inovasi where lang='en'");
        $data['foto'] = $this->db->query("select * from tbl_foto_lembaga");
        $this->load->view('admin',$data);
    
    }
    
    function simpan_rentang(){
        $judul_id=$this->input->post('judul-id');
        $rentang_id=$this->input->post('rentang-id');
        $idrentang_id=$this->input->post('idrentang-id');
        $lang_id=$this->input->post('lang-in');
        
        $judul_en=$this->input->post('judul-en');
        $rentang_en=$this->input->post('rentang-en');
        $idrentang_en=$this->input->post('idrentang-en');
        $lang_en=$this->input->post('lang-en');
        
//         echo count($judul_id);
//         
//         echo $idfilosofi_id[2];
        if($idrentang_id) {
            
            for($id=0;$id<count($judul_id);$id++) {
                if($judul_id[$id]) {
                    $this->db->query("update tbl_rentang_inovasi set judul='".$judul_id[$id]."', deskripsi='".$rentang_id[$id]."' where id='".$idrentang_id[$id]."'");
                }
                
            }
            
        } else {
            for($id=0;$id<count($judul_id);$id++) {
                if($judul_id[$id]) {
                    $this->db->query("insert into tbl_rentang_inovasi(judul, deskripsi, lang) values('".$judul_id[$id]."', '".$rentang_id[$id]."', '".$lang_id."')");
                }
            }
        }
        
        if($idrentang_en) {
            
            for($id=0;$id<count($judul_en);$id++) {
                if($judul_en[$id]) {
                    $this->db->query("update tbl_rentang_inovasi set judul='".$judul_en[$id]."', deskripsi='".$rentang_en[$id]."' where id='".$idrentang_en[$id]."'");
                }
                
            }
            
        } else {
            
            for($id=0;$id<count($judul_en);$id++) {
                if($judul_en[$id]) {
//                    var_dump($judul_en);
                    $this->db->query("insert into tbl_rentang_inovasi(judul, deskripsi, lang) values('".$judul_en[$id]."', '".$rentang_en[$id]."', '".$lang_en."')");
                }
                
            }
        }
        
//        var_dump($judul_en);
        
//        echo count($judul_en);
        $this->session->set_flashdata('msg', '<div class="alert alert-success">Data telah disimpan</div>');
            
        redirect('admin-rentang-inovasi.html');
    }
} 