<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Proyek extends CI_Controller {
 
    function __construct() {
        parent::__construct();
        
    }
    
    public function index() {
        $program=$this->input->get('program');
        
        $data['middle'] = 'proyek';
        
        $where='';
        $wherep='';
        if($program) {
            $where .=" and program='".$program."'";
            $wherep .=" and id='".$program."'";
            $data['program'] = $this->db->query("select id, judul_".getlang()." as judul, deskripsi_".getlang()." as deskripsi, icon, file_foto from tbl_program where true $wherep");
        } else {
            $data['program'] = '';
        }
        $data['proyek'] = $this->db->query("select id, judul_".getlang()." as judul, deskripsi_".getlang()." as deskripsi, icon, file_foto"
                . " from tbl_proyek  where true $where");
        
        $this->load->view('layout',$data);
    }
    
    function daftar_kegiatan(){
        $proyek=$this->input->get('proyek');
        
        $data['middle'] = 'kegiatan';
        $data['proyek'] = $this->db->query("select judul, deskripsi from tbl_proyek where lang='".getlang()."' and proyek='".$proyek."'");
        
        $data['kegiatan'] = $this->db->query("select g.id, judul, deskripsi, no_urut, program from tbl_kegiatan k join tbl_group_kegiatan g on g.id=k.kegiatan "
                . "where proyek='".$proyek."' and lang='".getlang()."'");
        $this->load->view('layout',$data);
        
    }
    

} 