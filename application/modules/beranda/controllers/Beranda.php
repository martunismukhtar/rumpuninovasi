<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Beranda extends CI_Controller {
 
    function __construct() {
        parent::__construct();
        
    }
    
    public function index() {
//        $data['middle'] = 'beranda';
//        $this->load->view('layout',$data);
        $lang=$this->input->get('lang');
        
        if($lang) {
            $newdata = array(
                'bahasa'  => $lang
            );
        } else {
            $newdata = array(
                'bahasa'  => 'id'
            );
        }
        
        $this->session->set_userdata($newdata);
        
        
        $data['slide'] = $this->db->query("select * from tbl_slide ");
        $data['des'] = $this->db->query("select id, judul, deskripsi,(select nama_file from tbl_foto_lembaga where id=d.foto) as file_foto "
                . "from tbl_deskripsi_lembaga d where lang='".$this->session->userdata('bahasa')."'");
        
//        $data['kegiatan'] = $this->db->query("select * from tbl_kegiatan where lang='".$this->session->userdata('bahasa')."'");
        
        $data['kegiatan']=$this->db->query("select id, judul_".getlang()." as judul, deskripsi_".getlang()." as deskripsi, k.no_urut, program from tbl_kegiatan k "
                . " order by program, k.no_urut limit 5");
        
        
        $data['proyek'] = $this->db->query("select id, judul_".getlang()." as judul, deskripsi_".getlang()." as deskripsi, icon, file_foto"
                . " from tbl_proyek order by id desc limit 5");
        
        $data['produk'] = $this->db->query("select id, cover, nama_file from tbl_produk where jenis_dokumen='1' order by id desc limit 5");
          
        $this->load->view('beranda', $data);
    }
   

} 