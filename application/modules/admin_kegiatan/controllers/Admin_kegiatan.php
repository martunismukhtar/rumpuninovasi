<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Admin_kegiatan extends CI_Controller {
 
    function __construct() {
        parent::__construct();
        $this->load->model('m_kegiatan');
        require(APPPATH .'libraries/resizeimage.php');
    }
    
    public function index() {
        $data['middle'] = 'akegiatan';
        $data['kegiatan'] = $this->db->query("select id, judul_id, deskripsi_id, icon from tbl_kegiatan order by no_urut desc limit 20");
        
        $data['program'] = $this->db->query("select id, judul_id as judul from tbl_program p");
        
        $this->load->view('admin',$data);
    }
    function getproyek(){
        $program=$this->input->post('a');
        $proyek=$this->db->query("select id, judul_id as proyek from tbl_proyek g where program='".$program."'");
        $opt='<option value="">--Pilih--</option>';
        foreach ($proyek->result() as $oo) {
            $opt .='<option value="'.$oo->id.'">'.$oo->proyek.'</option>';
        }
        echo json_encode(array('msg'=>$opt));
    }
    function edit(){
        $id=$this->input->get('id');
        $data['middle'] = 'editkegiatan';
        $data['kegiatan'] = $this->db->query("select g.id, program, proyek, (select judul_id from tbl_program where program=g.id) as jprogram, 
  to_char(tgl_mulai, 'DD/MM/YYYY') as tgl_mulai, to_char(tgl_akhir, 'DD/MM/YYYY') as tgl_akhir, no_urut, judul_id, deskripsi_id, judul_en, deskripsi_en from tbl_kegiatan g where g.id='".$id."'");
        
//        $data['produk'] = $this->db->query("select id from tbl_group_produk where kegiatan='".$id."'");
        
        $data['program'] = $this->db->query("select id, judul_id as judul from tbl_program p");
        
        $data['proyek']=$this->db->query("select id, judul_id as proyek from tbl_proyek ");
        
//        $data['produk_id'] = $this->db->query("select id, deskripsi from tbl_produk where lang='id' and produk=(select id from tbl_group_produk where kegiatan='".$id."')");
//        $data['produk_en'] = $this->db->query("select id, deskripsi from tbl_produk where lang='en' and produk=(select id from tbl_group_produk where kegiatan='".$id."')");
//        $data['foto'] = $this->db->query("select kegiatan, dokumen, (select nama_file from tbl_dokumen_kegiatan where id=j.dokumen) as nama_file from tbl_join_dokumen_kegiatan j "
//                . "where jenis_dokumen='1' and kegiatan='".$id."'");
//        $data['video'] = $this->db->query("select kegiatan, dokumen, (select nama_file from tbl_dokumen_kegiatan where id=j.dokumen) as nama_file from tbl_join_dokumen_kegiatan j "
//                . "where jenis_dokumen='2' and kegiatan='".$id."'");
//        $data['dokumen'] = $this->db->query("select kegiatan, dokumen, (select nama_file from tbl_dokumen_kegiatan where id=j.dokumen) as nama_file from tbl_join_dokumen_kegiatan j "
//                . "where jenis_dokumen='3'  and kegiatan='".$id."'");
//        
        $this->load->view('admin',$data);
    }
    function delete_gambar(){
        $kegiatan=$this->input->post('a');
        $dokumen=$this->input->post('b');
        $foto=$this->input->post('d');
        
        unlink('gudang/images/kegiatan/foto/'.$foto);
        unlink('gudang/images/kegiatan/foto/resize/'.$foto);
        $this->db->query("delete from tbl_dokumen_kegiatan where nama_file='".$foto."'");
          
        echo json_encode(array('s_'=>1,'m_'=>'Data telah dihapus'));
        exit(0);
        
    }
    function delete_dokumen_produk(){
        $produk=$this->input->post('a');
        $dokumen=$this->input->post('b');
        $dok=$this->input->post('d');
        
        unlink('gudang/images/produk/dokumen/'.$dok);
        
        $this->db->query("delete from tbl_dokumen_produk where nama_file='".$dok."'");
        $this->db->query("delete from tbl_join_dokumen_produk where dokumen='".$dokumen."' and produk='".$produk."'");
//        
        echo json_encode(array('s_'=>1,'m_'=>'Data telah dihapus'));
        exit(0);
    }
    function delete_video_produk(){
        $produk=$this->input->post('a');
        $dokumen=$this->input->post('b');
        $dok=$this->input->post('d');
        
        unlink('gudang/images/produk/video/'.$dok);
        
        $this->db->query("delete from tbl_dokumen_produk where nama_file='".$dok."'");
        $this->db->query("delete from tbl_join_dokumen_produk where dokumen='".$dokumen."' and produk='".$produk."'");
//        
        echo json_encode(array('s_'=>1,'m_'=>'Data telah dihapus'));
        exit(0);
    }
    
    function delete_kegiatan() {
        $kegiatan=$this->input->post('a');

        $getoldfile=$this->db->query("select id, nama_file, icon from tbl_dokumen_kegiatan where kegiatan='".$kegiatan."'");
        if($getoldfile->num_rows()>0) {
            foreach($getoldfile->result() as $pp){
                unlink('gudang/images/kegiatan/foto/'.$pp->nama_file);
                unlink('gudang/images/kegiatan/foto/resize/'.$pp->icon);
                $this->db->query("delete from tbl_dokumen_kegiatan where id='".$pp->id."'");
            }
        }
        
        $this->db->query("delete from tbl_kegiatan where id='".$kegiatan."'");
        
        echo json_encode(array('s_'=>1,'m_'=>'Data telah dihapus'));
        exit(0);
    }
    
    function formattgldb($tgl){
        $ex=explode('/', $tgl);
        
        $dd=$ex[2].'-'.$ex[1].'-'.$ex[0];
        return preg_replace('/\s+/', '', $dd);
        
    }
    
    function getnourutkegiatan($program){
        $cek=$this->db->query("select no_urut from tbl_group_kegiatan where program='".$program."'");
        if($cek->num_rows()>0) {
            return $cek->row()->no_urut+1;
        } else {
            return 1;
        }
        
    }
    
    function simpan(){
        
        $judul_id=$this->input->post('judul-id');
        $deskripsi_id=$this->input->post('deskripsi-id');
        $lang_id=$this->input->post('lang-id');
        
        $judul_en=$this->input->post('judul-en');
        $deskripsi_en=$this->input->post('deskripsi-en');
        $lang_en=$this->input->post('lang-en');
        
        $program=$this->input->post('program');
        $proyek=$this->input->post('proyek');
        $tanggal_mulai=$this->input->post('tanggal_mulai');
        $tanggal_akhir=$this->input->post('tanggal_akhir');
        $no_urut=$this->input->post('no_urut');
        
//        $no_urut=$this->getnourutkegiatan($program);
        
//        $des='{"id":{"judul":"'.$judul_id.'", "deskripsi":"'.$deskripsi_id.'"},"en":{"judul":"'.$judul_en.'", "deskripsi":"'.$deskripsi_en.'"}}';
        
        $this->db->query("insert into tbl_kegiatan(program, proyek, tgl_mulai, tgl_akhir, no_urut, judul_id, deskripsi_id, judul_en, deskripsi_en) "
            . "values('".$program."', '".$proyek."', '".$this->formattgldb($tanggal_mulai)."', '".$this->formattgldb($tanggal_akhir)."', '".$no_urut."', "
            . "'".$judul_id."', '".$deskripsi_id."', '".$judul_en."', '".$deskripsi_en."')");
        
        $getnextval_kegiatan=$this->db->query("select currval('tbl_kegiatan_id_seq')");
        
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
                
                $this->db->query("insert into tbl_dokumen_kegiatan(nama_file, icon, kegiatan, jenis_dokumen) values('".$changeFileName."', '".$nm.".jpg', '".$getnextval_kegiatan->row()->currval."', '1')");
                
                
                $resizeObj = new resize($uploadPath.$changeFileName);
                
                $resizeObj -> resizeImage(300, 250, 'exact');
                
                $resizeObj -> saveImage($uploadPath.'resize/'.$nm.'.jpg', 1000);
                
            }
        }
       
        $this->session->set_flashdata('msg', '<div class="alert alert-success">Data telah disimpan</div>');
        redirect('admin-kegiatan.html');
        
    }
   
    function simpanedit(){
        
        $program=$this->input->post('program');
        $proyek=$this->input->post('proyek');
        $kegiatan=$this->input->post('kegiatan');
        
        $tanggal_mulai=$this->input->post('tanggal_mulai');
        $tanggal_akhir=$this->input->post('tanggal_akhir');
        $no_urut=$this->input->post('no_urut');
        
        $judul_id=$this->input->post('judul-id');
        $deskripsi_id=$this->input->post('deskripsi-id');
        $lang_id=$this->input->post('lang-id');
        
        $judul_en=$this->input->post('judul-en');
        $deskripsi_en=$this->input->post('deskripsi-en');
        $lang_en=$this->input->post('lang-en');
        
        $idfotokegiatan=$this->input->post('idfotokegiatan');
        
        
//        $des='{"id":{"judul":"'.$judul_id.'", "deskripsi":"'.$deskripsi_id.'"},"en":{"judul":"'.$judul_en.'", "deskripsi":"'.$deskripsi_en.'"}}';
        
        $this->db->query("update tbl_kegiatan set proyek='".$proyek."', program='".$program."', tgl_mulai='".$this->formattgldb($tanggal_mulai)."', "
                . "tgl_akhir='".$this->formattgldb($tanggal_akhir)."', no_urut='".$no_urut."', judul_id='".$judul_id."', deskripsi_id='".$deskripsi_id."', "
                . "judul_en='".$judul_en."', deskripsi_en='".$deskripsi_en."' where id='".$kegiatan."'");
        
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
                
                if(!empty($idfotokegiatan[$f])) {
                    $getoldfoto=$this->db->query("select nama_file from tbl_dokumen_kegiatan where id='".$idfotokegiatan[$f]."'");
                    
                    if($getoldfoto->num_rows()>0) {
                        unlink('gudang/images/kegiatan/foto/'.$getoldfoto->row()->nama_file);
                    }
                    
                    $this->db->query("update tbl_dokumen_kegiatan set nama_file='".$changeFileName."', icon='".$nm.".jpg' where id='".$idfotokegiatan[$f]."'");

                } else {
                    
                    $this->db->query("insert into tbl_dokumen_kegiatan(nama_file, icon, kegiatan, jenis_dokumen) values('".$changeFileName."', '".$nm.".jpg', '".$kegiatan."', '1')");
                
                
                }
                
//                require(APPPATH .'libraries/resizeimage.php');
                
                $resizeObj = new resize($uploadPath.$changeFileName);
                // *** 2) Resize image (options: exact, portrait, landscape, auto, crop)
                $resizeObj -> resizeImage(300, 250, 'exact');
                // *** 3) Save image
                $resizeObj -> saveImage($uploadPath.'resize/'.$nm.'.jpg', 1000);
                
            }
        }
        
        $this->session->set_flashdata('msg', '<div class="alert alert-success">Data telah disimpan</div>');
        redirect('admin-edit-kegiatan?id='.$kegiatan);
    }

} 