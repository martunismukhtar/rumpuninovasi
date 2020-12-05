<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Admin_produk extends CI_Controller {
 
    function __construct() {
        parent::__construct();
        
    }
    
    public function index() {
        $data['middle'] = 'aproduk';
        $data['produk'] = $this->db->query("select id, cover, nama_file, judul_id, deskripsi_id, jenis_dokumen "
                . "from tbl_produk");
        
        $data['kegiatan'] = $this->db->query("select id, judul_id as keg from tbl_kegiatan g order by program, no_urut desc");
        
        $this->load->view('admin',$data);
    }
    
    public function dokumen() {
        $data['middle'] = 'adokumen';
        $data['kegiatan'] = $this->db->query('select * from tbl_produk');
        
        
        $this->load->view('admin',$data);
    }
    function delete(){
        $id=$this->input->post('a');
        $jenis_dokumen=$this->input->post('c');
        
        $getcover=$this->db->query("select cover, nama_file from tbl_produk where id='".$id."'");
        if($getcover->num_rows()>0) {
            unlink('gudang/images/produk/foto/'.$getcover->row()->cover);
        }
        
        if($jenis_dokumen==1) {
            unlink('gudang/images/produk/dokumen/'.$getcover->row()->nama_file);
        } else if($jenis_dokumen==3) {
            unlink('gudang/images/produk/video/'.$getcover->row()->nama_file);
        }
        
        $this->db->query("delete from tbl_produk where produk='".$id."'");
//        $this->db->query("delete from tbl_group_produk where id='".$id."'");
        
        echo json_encode(array('s_'=>1,'m_'=>'Data telah dihapus'));
        exit(0);
        
    }
    function fedit(){
        $id=$this->input->get('id');
        
        $data['middle'] = 'editproduk';
        
        $data['produk'] = $this->db->query("select id, cover, nama_file, kegiatan, jenis_dokumen, judul_id, deskripsi_id, judul_en, deskripsi_en from tbl_produk where id='".$id."'");
        
//        $data['produk_id'] = $this->db->query("select p.id, judul, deskripsi from tbl_group_produk g join tbl_produk p on g.id=p.produk where lang='id' and g.id='".$id."'");
//        $data['produk_en'] = $this->db->query("select p.id, judul, deskripsi from tbl_group_produk g join tbl_produk p on g.id=p.produk where lang='en' and g.id='".$id."'");
        
        $data['kegiatan'] = $this->db->query("select id, judul_id as keg from tbl_kegiatan g order by program, no_urut desc");
        
        $this->load->view('admin',$data);
        
    }
    
    function simpan(){
        $kegiatan=$this->input->post('kegiatan');
        
        $judul_id=$this->input->post('judul-id');
        $deskripsi_id=$this->input->post('deskripsi-id');
        $lang_id=$this->input->post('lang-id');
        
        $judul_en=$this->input->post('judul-en');
        $deskripsi_en=$this->input->post('deskripsi-en');
        $lang_en=$this->input->post('lang-en');
        
        $jenis_dok=$this->input->post('jenis_dok');
        
//        $this->db->query("insert into tbl_group_produk(tgl_input, kegiatan) values('".date('Y-m-d')."', '".$kegiatan."')");
//        
        
        $this->db->query("insert into tbl_produk(judul_id, deskripsi_id, judul_en, deskripsi_en, tgl_input, kegiatan) "
                . "values('".$judul_id."', '".$deskripsi_id."', '".$judul_en."', '".$deskripsi_en."', '".date('Y-m-d')."', '".$kegiatan."')");
        
//        $this->db->query("insert into tbl_produk(judul, deskripsi, lang, produk) values('".$judul_en."', '".$deskripsi_en."', '".$lang_en."', '".$getnextval_gp->row()->currval."')");        
        $getnextval_gp=$this->db->query("select currval('tbl_produk_id_seq')");
        
        if($jenis_dok==2) {
            $this->db->query("update tbl_produk set jenis_dokumen='".$jenis_dok."', nama_file='".$this->input->post('url')."' where id='".$getnextval_gp->row()->currval."'");
        } else {
            if($jenis_dok==1) {
                $uploadPath = 'gudang/images/produk/dokumen/';
            } else if($jenis_dok==3) {
                $uploadPath = 'gudang/images/produk/video/';
            }
        
            $path = $_FILES['userFile']['name'] = $_FILES['file']['name'];
            $extension = pathinfo($path, PATHINFO_EXTENSION);
            $_FILES['userFile']['type'] = $_FILES['file']['type'];
            $_FILES['userFile']['tmp_name'] = $_FILES['file']['tmp_name'];
            $_FILES['userFile']['error'] = $_FILES['file']['error'];
            $_FILES['userFile']['size'] = $_FILES['file']['size'];

            $nm=time().'-'.random_str(8, 'abcdefghijk123lmnopqrstuvwxyz');
        
            $changeFileName = $nm.'.'.strtolower($extension);

            $config['upload_path'] = $uploadPath;
            $config['file_ext_tolower'] = TRUE;
            $config['file_name'] = $changeFileName;
            $config['allowed_types'] = '*';
            $config['overwrite'] = TRUE;
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
        
            if($data['info_upload'] = $this->upload->do_upload('userFile')){
                $this->db->query("update tbl_produk set nama_file='".$changeFileName."', jenis_dokumen='".$jenis_dok."' where id='".$getnextval_gp->row()->currval."'");
            }
        }
        
        $path = $_FILES['userFile']['name'] = $_FILES['cover']['name'];
        $extension = pathinfo($path, PATHINFO_EXTENSION);
        $_FILES['userFile']['type'] = $_FILES['cover']['type'];
        $_FILES['userFile']['tmp_name'] = $_FILES['cover']['tmp_name'];
        $_FILES['userFile']['error'] = $_FILES['cover']['error'];
        $_FILES['userFile']['size'] = $_FILES['cover']['size'];

        $nm=time().'-'.random_str(8, 'abcdefghijk123lmnopqrstuvwxyz');
        
        $changeFileName = $nm.'.'.strtolower($extension);

        $uploadPath = 'gudang/images/produk/foto/';
        $config['upload_path'] = $uploadPath;
        $config['file_ext_tolower'] = TRUE;
        $config['file_name'] = $changeFileName;
        $config['allowed_types'] = '*';
        $config['overwrite'] = TRUE;
        $this->load->library('upload', $config);
        $this->upload->initialize($config);  
        
        if($data['info_upload'] = $this->upload->do_upload('userFile')){    
            $this->db->query("update tbl_produk set cover='".$changeFileName."' where id='".$getnextval_gp->row()->currval."'");
        }
        
        
        $this->session->set_flashdata('msg', '<div class="alert alert-success">Data telah disimpan</div>');
        redirect('admin-produk.html');
        
    }
   
    function simpanedit(){
        
        $kegiatan=$this->input->post('kegiatan');
        $idproduk=$this->input->post('id-produk');
        
        $id_id=$this->input->post('id-id');
        $judul_id=$this->input->post('judul-id');
        $deskripsi_id=$this->input->post('deskripsi-id');
        
        $id_en=$this->input->post('id-en');
        $judul_en=$this->input->post('judul-en');
        $deskripsi_en=$this->input->post('deskripsi-en');
        
//        echo "update tbl_produk set judul='".$judul_en."', deskripsi='".$deskripsi_en."' where id='".$id_en."'"; exit();
        
        $jenis_dok=$this->input->post('jenis_dok');
        
        $this->db->query("update tbl_produk set judul_id='".$judul_id."', deskripsi_id='".$deskripsi_id."', judul_en='".$judul_en."', deskripsi_en='".$deskripsi_en."',"
                . " tgl_input='".date('Y-m-d')."', kegiatan='".$kegiatan."' where id='".$idproduk."'");
                
        if($jenis_dok==2) {
            $this->db->query("update tbl_produk set jenis_dokumen='".$jenis_dok."', nama_file='".$this->input->post('url')."' where id='".$idproduk."'");
        } else {
            if($jenis_dok==1) {
                $uploadPath = 'gudang/images/produk/dokumen/';
            } else if($jenis_dok==3) {
                $uploadPath = 'gudang/images/produk/video/';
            }
        
            $path = $_FILES['userFile']['name'] = $_FILES['file']['name'];
            $extension = pathinfo($path, PATHINFO_EXTENSION);
            $_FILES['userFile']['type'] = $_FILES['file']['type'];
            $_FILES['userFile']['tmp_name'] = $_FILES['file']['tmp_name'];
            $_FILES['userFile']['error'] = $_FILES['file']['error'];
            $_FILES['userFile']['size'] = $_FILES['file']['size'];

            $nm=time().'-'.random_str(8, 'abcdefghijk123lmnopqrstuvwxyz');
        
            $changeFileName = $nm.'.'.strtolower($extension);

            $config['upload_path'] = $uploadPath;
            $config['file_ext_tolower'] = TRUE;
            $config['file_name'] = $changeFileName;
            $config['allowed_types'] = '*';
            $config['overwrite'] = TRUE;
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
        
            if($data['info_upload'] = $this->upload->do_upload('userFile')){
                $getoldfile=$this->db->query("select nama_file from tbl_produk where id='".$idproduk."'");
                if($getoldfile->num_rows()>0) {
                    unlink($uploadPath.$getoldfile->row()->nama_file);
                }
                
                $this->db->query("update tbl_produk set nama_file='".$changeFileName."', jenis_dokumen='".$jenis_dok."' where id='".$idproduk."'");
            }
        }
        
        $path = $_FILES['userFile']['name'] = $_FILES['cover']['name'];
        $extension = pathinfo($path, PATHINFO_EXTENSION);
        $_FILES['userFile']['type'] = $_FILES['cover']['type'];
        $_FILES['userFile']['tmp_name'] = $_FILES['cover']['tmp_name'];
        $_FILES['userFile']['error'] = $_FILES['cover']['error'];
        $_FILES['userFile']['size'] = $_FILES['cover']['size'];

        $nm=time().'-'.random_str(8, 'abcdefghijk123lmnopqrstuvwxyz');
        
        $changeFileName = $nm.'.'.strtolower($extension);

        $uploadPath = 'gudang/images/produk/foto/';
        $config['upload_path'] = $uploadPath;
        $config['file_ext_tolower'] = TRUE;
        $config['file_name'] = $changeFileName;
        $config['allowed_types'] = '*';
        $config['overwrite'] = TRUE;
        $this->load->library('upload', $config);
        $this->upload->initialize($config);  
        
        if($data['info_upload'] = $this->upload->do_upload('userFile')){    
            $getoldfile=$this->db->query("select cover from tbl_produk where id='".$idproduk."'");
            if($getoldfile->num_rows()>0) {
                unlink($uploadPath.$getoldfile->row()->nama_file);
            }
                
            $this->db->query("update tbl_produk set cover='".$changeFileName."' where id='".$idproduk."'");
        }
        
        $this->session->set_flashdata('msg', '<div class="alert alert-success">Data telah disimpan</div>');
        redirect('edit-produk.egp?id='.$idproduk);
    }
    

} 