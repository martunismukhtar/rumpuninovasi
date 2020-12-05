<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Program extends CI_Controller {
 
    function __construct() {
        parent::__construct();
        
    }
    
    public function index() {
        $data['middle'] = 'program';
        $data['program'] = $this->db->query("select id, judul_".getlang()." as judul, deskripsi_".getlang()." as deskripsi, icon, file_foto from tbl_program");
        $this->load->view('layout',$data);
    }
    

} 