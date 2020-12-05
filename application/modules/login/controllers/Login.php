<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Login extends CI_Controller {
 
    function __construct() {
        parent::__construct();
        
    }
    
    public function index() {
//        $data['middle'] = 'login';
        $this->load->view('login');
    }
    
    function masuk(){
        $email=$this->input->post('email');
        $pwd=$this->input->post('password');
        
        $cek=$this->db->query("select exists(select 1 from tbl_user where email='".$email."' and pwd='".md5($pwd)."') as jrow ");
        if($cek->row()->jrow=='t') {
            $newdata = array(
               'email'  => $email
            );

            $this->session->set_userdata($newdata);
            redirect("admin-menu.html");
            
        } else {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger">'
               . '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'
                    . '<span aria-hidden="true">×</span></button>'
                    . '<strong>Error!</strong>'
                    . ' Anda tidak terdaftar</div>');
            // After that you need to used redirect function instead of load view such as 
            redirect("masuk");

        }
    }
    
    function keluar(){
        $this->session->sess_destroy();
        redirect("masuk");
    }
   

} 