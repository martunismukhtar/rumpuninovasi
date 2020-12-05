<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Produk extends CI_Controller {
 
    function __construct() {
        parent::__construct();
        $this->load->model('m_produk');
    }
    
    public function index() {
        $data['middle'] = 'produk';

        $this->load->view('layout',$data);
    }
   

} 