<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class About extends CI_Controller {
 
    function __construct() {
        parent::__construct();
        
    }
    
    public function index() {
        $data['middle'] = 'about';
        
        
        $data['deskripsi'] = $this->db->query("select id, judul, deskripsi,(select nama_file from tbl_foto_lembaga where id=d.foto) as file_foto "
                . "from tbl_deskripsi_lembaga d where lang='".getlang()."'");
        $data['rentang_inovasi'] = $this->db->query("select * from tbl_rentang_inovasi where lang='".getlang()."'");
        $data['filosofi_lembaga'] = $this->db->query("select * from tbl_filosofi_lembaga where lang='".getlang()."'");
        
        $this->load->view('layout',$data);
    }
   

} 