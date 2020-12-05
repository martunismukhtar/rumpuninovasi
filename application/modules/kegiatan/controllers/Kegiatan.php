<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Kegiatan extends CI_Controller {
 
    function __construct() {
        parent::__construct();
        
    }
    
    public function index() {
        $proyek=$this->input->get('proyek');
        $where='';
        $wherek='';
        if($proyek) {
            $where .=" and id='".$proyek."'";
            $wherek .=" and proyek='".$proyek."'";
            $data['proyek'] = $this->db->query("select judul_".getlang()." as judul, deskripsi_".getlang()." as deskripsi from tbl_proyek where id='".$proyek."'");
            
        } else {
            $data['proyek'] ='';
        }
        
        $data['kegiatan'] = $this->db->query("select id, judul_".getlang()." as judul, deskripsi_".getlang()." as deskripsi, k.no_urut, program from tbl_kegiatan k "
                . " where true $wherek order by program, k.no_urut");
        $data['middle'] = 'kegiatan';
        
        
        $this->load->view('layout',$data);
    }

    function detail_kegiatan(){
        $kegiatan=$this->input->get('kegiatan');
        
        $data['kegiatan'] = $this->db->query("select id, judul_".getlang()." as judul, deskripsi_".getlang()." as deskripsi, no_urut, program "
                . "from tbl_kegiatan where id='".$kegiatan."'");
        
        $data['foto'] = $this->db->query("select nama_file from tbl_dokumen_kegiatan where jenis_dokumen='1' and kegiatan='".$kegiatan."'");
        
//        $data['video'] = $this->db->query("select (select nama_file from tbl_dokumen_kegiatan where id=j.dokumen) as nama_file from "
//                . "tbl_join_dokumen_kegiatan j where jenis_dokumen='2' and kegiatan='".$kegiatan."'");
//        
//        $data['dokumen'] = $this->db->query("select (select nama_file from tbl_dokumen_kegiatan where id=j.dokumen) as nama_file from "
//                . "tbl_join_dokumen_kegiatan j where jenis_dokumen='3' and kegiatan='".$kegiatan."'");
        
        $data['middle'] = 'dkegiatan';
        $this->load->view('layout',$data);
    }

} 