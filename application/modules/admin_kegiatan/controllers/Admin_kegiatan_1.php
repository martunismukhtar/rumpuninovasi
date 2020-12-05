<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Admin_kegiatan extends CI_Controller {
 
    function __construct() {
        parent::__construct();
        
    }
    
    public function index() {
        $data['middle'] = 'akegiatan';
        $data['kegiatan'] = $this->db->query('select * from tbl_kegiatan');
        $data['program'] = $this->db->query('select id, judul from tbl_program');
        
        $this->load->view('admin',$data);
    }
    
    function edit(){
        $id=$this->input->get('id');
        $data['middle'] = 'editkegiatan';
        $data['kegiatan'] = $this->db->query("select * from tbl_kegiatan where id='".$id."'");
        $data['program'] = $this->db->query('select id, judul from tbl_program');
        $data['foto'] = $this->db->query("select kegiatan, dokumen, (select nama_file from tbl_dokumen_kegiatan where id=j.dokumen) as nama_file from tbl_join_dokumen_kegiatan j "
                . "where jenis_dokumen='1' and kegiatan='".$id."'");
        $data['video'] = $this->db->query("select kegiatan, dokumen, (select nama_file from tbl_dokumen_kegiatan where id=j.dokumen) as nama_file from tbl_join_dokumen_kegiatan j "
                . "where jenis_dokumen='2' and kegiatan='".$id."'");
        $data['dokumen'] = $this->db->query("select kegiatan, dokumen, (select nama_file from tbl_dokumen_kegiatan where id=j.dokumen) as nama_file from tbl_join_dokumen_kegiatan j "
                . "where jenis_dokumen='3'  and kegiatan='".$id."'");
        
        $this->load->view('admin',$data);
    }
    
    function simpan(){
        
        $judul_id=$this->input->post('judul-id');
        $deskripsi_id=$this->input->post('deskripsi-id');
        $lang_id=$this->input->post('lang-id');
        
        $judul_en=$this->input->post('judul-en');
        $deskripsi_en=$this->input->post('deskripsi-en');
        $lang_en=$this->input->post('lang-en');
        
        $program=$this->input->post('program');
        
//        if(empty($program)) {
//            $this->session->set_flashdata('msg', '<div class="alert alert-danger">Pilih program</div>');
//            redirect('admin-kegiatan.html');   
//        }
//        
//        if(empty($judul)) {
//            $this->session->set_flashdata('msg', '<div class="alert alert-danger">Masukkan judul</div>');
//            redirect('admin-kegiatan.html');   
//        }
//        if(empty($kegiatan)) {
//            $this->session->set_flashdata('msg', '<div class="alert alert-danger">Masukkan deskripsi</div>');
//            redirect('admin-kegiatan.html');   
//        }
        
        $this->db->query("insert into tbl_kegiatan(judul, deskripsi, program, lang) values('".$judul_id."', '".$deskripsi_id."', '".$program."', '".$lang_id."')");
        $getnextval_id=$this->db->query("select currval('tbl_kegiatan_id_seq')");
        
        $this->db->query("insert into tbl_kegiatan(judul, deskripsi, program, lang) values('".$judul_en."', '".$deskripsi_en."', '".$program."', '".$lang_en."')");        
        $getnextval_en=$this->db->query("select currval('tbl_kegiatan_id_seq')");
        
        $jfoto=count($_FILES['file_upload']['name']);
        
        for($f=0;$f<$jfoto;$f++){
            $path = $_FILES['userFile']['name'] = $_FILES['file_upload']['name'][$f];
            $extension = pathinfo($path, PATHINFO_EXTENSION);
            $_FILES['userFile']['type'] = $_FILES['file_upload']['type'][$f];
            $_FILES['userFile']['tmp_name'] = $_FILES['file_upload']['tmp_name'][$f];
            $_FILES['userFile']['error'] = $_FILES['file_upload']['error'][$f];
            $_FILES['userFile']['size'] = $_FILES['file_upload']['size'][$f];

            $nm=time().'-'.random_str(8, 'abcdefghijk123lmnopqrstuvwxyz');
        
            $changeFileName = $nm.'.'.strtolower($extension);

            $uploadPath = 'gudang/images/kegiatan/foto/';
            $config['upload_path'] = $uploadPath;
            $config['file_ext_tolower'] = TRUE;
            $config['file_name'] = $changeFileName;
            $config['allowed_types'] = '*';
            $config['overwrite'] = TRUE;
            $this->load->library('upload', $config);
            $this->upload->initialize($config);  
        
            if($data['info_upload'] = $this->upload->do_upload('userFile')){
                
                $this->db->query("insert into tbl_dokumen_kegiatan(nama_file) values('".$changeFileName."')");
                //tbl_dokumen_kegiatan_id_seq
                $getnextval_dok=$this->db->query("select currval('tbl_dokumen_kegiatan_id_seq')");
                $this->db->query("insert into tbl_join_dokumen_kegiatan(kegiatan, dokumen, jenis_dokumen) values('".$getnextval_id->row()->currval."','".$getnextval_dok->row()->currval."', '1')");
                
                $this->db->query("insert into tbl_join_dokumen_kegiatan(kegiatan, dokumen, jenis_dokumen) values('".$getnextval_en->row()->currval."','".$getnextval_dok->row()->currval."', '1')");
                
            }
        }
        
        $jvideo=count($_FILES['video']['name']);
        
        for($v=0;$v<$jvideo;$v++){
            $path = $_FILES['userFile']['name'] = $_FILES['video']['name'][$v];
            $extension = pathinfo($path, PATHINFO_EXTENSION);
            $_FILES['userFile']['type'] = $_FILES['video']['type'][$v];
            $_FILES['userFile']['tmp_name'] = $_FILES['video']['tmp_name'][$v];
            $_FILES['userFile']['error'] = $_FILES['video']['error'][$v];
            $_FILES['userFile']['size'] = $_FILES['video']['size'][$v];

            $nm=time().'-'.random_str(8, 'abcdefghijk123lmnopqrstuvwxyz');
        
            $changeFileName = $nm.'.'.strtolower($extension);

            $uploadPath = 'gudang/images/kegiatan/video/';
            $config['upload_path'] = $uploadPath;
            $config['file_ext_tolower'] = TRUE;
            $config['file_name'] = $changeFileName;
            $config['allowed_types'] = '*';
            $config['overwrite'] = TRUE;
            $this->load->library('upload', $config);
            $this->upload->initialize($config);  
        
            if($data['info_upload'] = $this->upload->do_upload('userFile')){
                
                $this->db->query("insert into tbl_dokumen_kegiatan(nama_file) values('".$changeFileName."')");
                
                $getnextval_dok=$this->db->query("select currval('tbl_dokumen_kegiatan_id_seq')");
                $this->db->query("insert into tbl_join_dokumen_kegiatan(kegiatan, dokumen, jenis_dokumen) values('".$getnextval_id->row()->currval."','".$getnextval_dok->row()->currval."', '2')");
                
                $this->db->query("insert into tbl_join_dokumen_kegiatan(kegiatan, dokumen, jenis_dokumen) values('".$getnextval_en->row()->currval."','".$getnextval_dok->row()->currval."', '2')");
                
                
            }
        }
        
        $jdok=count($_FILES['dokumen']['name']);
        for($d=0;$f<$jdok;$d++){
            $path = $_FILES['userFile']['name'] = $_FILES['dokumen']['name'][$d];
            $extension = pathinfo($path, PATHINFO_EXTENSION);
            $_FILES['userFile']['type'] = $_FILES['dokumen']['type'][$d];
            $_FILES['userFile']['tmp_name'] = $_FILES['dokumen']['tmp_name'][$d];
            $_FILES['userFile']['error'] = $_FILES['dokumen']['error'][$d];
            $_FILES['userFile']['size'] = $_FILES['dokumen']['size'][$d];

            $nm=time().'-'.random_str(8, 'abcdefghijk123lmnopqrstuvwxyz');
        
            $changeFileName = $nm.'.'.strtolower($extension);

            $uploadPath = 'gudang/images/kegiatan/dokumen/';
            $config['upload_path'] = $uploadPath;
            $config['file_ext_tolower'] = TRUE;
            $config['file_name'] = $changeFileName;
            $config['allowed_types'] = '*';
            $config['overwrite'] = TRUE;
            $this->load->library('upload', $config);
            $this->upload->initialize($config);  
        
            if($data['info_upload'] = $this->upload->do_upload('userFile')){
                
                $this->db->query("insert into tbl_dokumen_kegiatan(nama_file) values('".$changeFileName."')");
                
                $getnextval_dok=$this->db->query("select currval('tbl_dokumen_kegiatan_id_seq')");
                $this->db->query("insert into tbl_join_dokumen_kegiatan(kegiatan, dokumen, jenis_dokumen) values('".$getnextval_id->row()->currval."','".$getnextval_dok->row()->currval."', '3')");
                
                $this->db->query("insert into tbl_join_dokumen_kegiatan(kegiatan, dokumen, jenis_dokumen) values('".$getnextval_en->row()->currval."','".$getnextval_dok->row()->currval."', '3')");
                
                
            }
        }
        
        $this->session->set_flashdata('msg', '<div class="alert alert-success">Data telah disimpan</div>');
        redirect('admin-kegiatan.html');
        
    }
   
    function simpanedit(){
        $id=$this->input->post('id');
        $judul=$this->input->post('judul');
        $program=$this->input->post('program');
        $kegiatan=$this->input->post('deskripsi');
        $idfoto=$this->input->post('idfoto');
        $idvideo=$this->input->post('idvideo');
        $iddokumen=$this->input->post('iddokumen');
        
        if(empty($program)) {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger">Pilih program</div>');
            redirect('admin-edit-kegiatan?id='.$id);
        }
        
        if(empty($judul)) {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger">Masukkan judul</div>');
            redirect('admin-edit-kegiatan?id='.$id);   
        }
        if(empty($kegiatan)) {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger">Masukkan deskripsi</div>');
            redirect('admin-edit-kegiatan?id='.$id);
        }
        
        $this->db->query("update tbl_kegiatan set judul='".$judul."', deskripsi='".$kegiatan."', program='".$program."' where id='".$id."'");
//        
//        $getnextval=$this->db->query("select currval('tbl_kegiatan_id_seq')");
        
        $jfoto=count($_FILES['file_upload']['name']);
        
        for($f=0;$f<$jfoto;$f++){
            
            
            $path = $_FILES['userFile']['name'] = $_FILES['file_upload']['name'][$f];
            $extension = pathinfo($path, PATHINFO_EXTENSION);
            $_FILES['userFile']['type'] = $_FILES['file_upload']['type'][$f];
            $_FILES['userFile']['tmp_name'] = $_FILES['file_upload']['tmp_name'][$f];
            $_FILES['userFile']['error'] = $_FILES['file_upload']['error'][$f];
            $_FILES['userFile']['size'] = $_FILES['file_upload']['size'][$f];

            $nm=time().'-'.random_str(8, 'abcdefghijk123lmnopqrstuvwxyz');
        
            $changeFileName = $nm.'.'.strtolower($extension);

            $uploadPath = 'gudang/images/kegiatan/foto/';
            $config['upload_path'] = $uploadPath;
            $config['file_ext_tolower'] = TRUE;
            $config['file_name'] = $changeFileName;
            $config['allowed_types'] = '*';
            $config['overwrite'] = TRUE;
            $this->load->library('upload', $config);
            $this->upload->initialize($config);  
        
            if($data['info_upload'] = $this->upload->do_upload('userFile')){
                
                if($idfoto[$f]) {
                    $cek=$this->db->query("select nama_file from tbl_dokumen_kegiatan where id='".$idfoto[$f]."'");
                    if($cek->num_rows()>0) {
                        unlink('gudang/images/kegiatan/foto/'.$cek->row()->nama_file);
                    }
                    $this->db->query("update tbl_dokumen_kegiatan set nama_file='".$changeFileName."' where id='".$idfoto[$f]."'");
                } else {
                    $this->db->query("insert into tbl_dokumen_kegiatan(nama_file, jenis_dokumen, kegiatan) values('".$changeFileName."', '1', '".$id."')");
                }
                
                
            }
        }
        
        $jvideo=count($_FILES['video']['name']);
        
        for($v=0;$v<$jvideo;$v++){
            $path = $_FILES['userFile']['name'] = $_FILES['video']['name'][$v];
//            $extension = pathinfo($path, PATHINFO_EXTENSION);
            $_FILES['userFile']['type'] = $_FILES['video']['type'][$v];
            $_FILES['userFile']['tmp_name'] = $_FILES['video']['tmp_name'][$v];
            $_FILES['userFile']['error'] = $_FILES['video']['error'][$v];
            $_FILES['userFile']['size'] = $_FILES['video']['size'][$v];

            $nm=time().'-'.random_str(8, 'abcdefghijk123lmnopqrstuvwxyz');
        
            $changeFileName = $nm.'-'.$_FILES['video']['name'][$v];

            $uploadPath = 'gudang/images/kegiatan/video/';
            $config['upload_path'] = $uploadPath;
            $config['file_ext_tolower'] = TRUE;
            $config['file_name'] = $changeFileName;
            $config['allowed_types'] = '*';
            $config['overwrite'] = TRUE;
            $this->load->library('upload', $config);
            $this->upload->initialize($config);  
        
            if($data['info_upload'] = $this->upload->do_upload('userFile')){
                
                
                if($idvideo[$v]) {
                    $cek=$this->db->query("select nama_file from tbl_dokumen_kegiatan where id='".$idfoto[$v]."'");
                    if($cek->num_rows()>0) {
                        unlink('gudang/images/kegiatan/video/'.$cek->row()->nama_file);
                    }
                    $this->db->query("update tbl_dokumen_kegiatan set nama_file='".$changeFileName."' where id='".$idvideo[$v]."'");
                } else {
                    $this->db->query("insert into tbl_dokumen_kegiatan(nama_file, jenis_dokumen, kegiatan) values('".$changeFileName."', '2', '".$id."')");
                }
                
            } 
        }
       
        $jdok=count($_FILES['dokumen']['name']);

        for($d=0;$d<$jdok;$d++){
            
            $path = $_FILES['userFile']['name'] = $_FILES['dokumen']['name'][$d];
            $_FILES['userFile']['type'] = $_FILES['dokumen']['type'][$d];
            $_FILES['userFile']['tmp_name'] = $_FILES['dokumen']['tmp_name'][$d];
            $_FILES['userFile']['error'] = $_FILES['dokumen']['error'][$d];
            $_FILES['userFile']['size'] = $_FILES['dokumen']['size'][$d];

            $nm=time().'-'.random_str(8, 'abcdefghijk123lmnopqrstuvwxyz');
        
            $changeFileName = $nm.'-'.$_FILES['dokumen']['name'][$d];

            $uploadPath = 'gudang/images/kegiatan/dokumen/';
            $config['upload_path'] = $uploadPath;
            $config['file_ext_tolower'] = TRUE;
            $config['file_name'] = $changeFileName;
            $config['allowed_types'] = '*';
            $config['overwrite'] = TRUE;
            $this->load->library('upload', $config);
            $this->upload->initialize($config);  
        
            if($data['info_upload'] = $this->upload->do_upload('userFile')){
                $ddd .=$_FILES['dokumen']['name'][$d];
                if($iddokumen[$d]) {
                    $cek=$this->db->query("select nama_file from tbl_dokumen_kegiatan where id='".$iddokumen[$d]."'");
                    if($cek->num_rows()>0) {
                        unlink('gudang/images/kegiatan/dokumen/'.$cek->row()->nama_file);
                    }
                    $this->db->query("update tbl_dokumen_kegiatan set nama_file='".$changeFileName."' where id='".$iddokumen[$d]."'");
                } else {
                    $this->db->query("insert into tbl_dokumen_kegiatan(nama_file, jenis_dokumen, kegiatan) values('".$changeFileName."', '3', '".$id."')");
                }
                
                
            }
        }
        
        $this->session->set_flashdata('msg', '<div class="alert alert-success">Data telah disimpan</div>');
        redirect('admin-edit-kegiatan?id='.$id);
    }

} 