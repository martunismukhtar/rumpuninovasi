<?php
class M_kegiatan extends CI_Model{
    
    function getfotokegiatan($kegiatan) {
        $s1=$this->db->query("select kegiatan, dokumen, (select nama_file from tbl_dokumen_kegiatan where id=j.dokumen) as foto from tbl_join_dokumen_kegiatan j where kegiatan='".$kegiatan."'");
        
        $li='';
        foreach ($s1->result() as $of) {
            $li .='<div class="fileinput fileinput-new" data-provides="fileinput">
                <div class="fileinput-new thumbnail xfotomhs"><a class="img-responsive" href="#" title="">
                <img style="width:100%;" src="gudang/images/kegiata/foto/'.$of->foto.'" alt=" "></a></div>
                <div class="fileinput-preview fileinput-exists thumbnail" style="width:350px !important;height: 250px;"></div>
                    <div class="user-edit-image-buttons">
                        <span class="btn btn-azure btn-file"><span class="fileinput-new"><i class="fa fa-picture"></i> Pilih image</span>
                        <span class="fileinput-exists"><i class="fa fa-picture"></i> Ganti</span>
                            <input type="file" name="file_upload[]"> 
                        </span>
                        <a href="#" class="btn fileinput-exists btn-red" data-dismiss="fileinput">
                            <i class="fa fa-times"></i> Hapus
                        </a>
                    </div>
                </div>';
        }
        
        return $li;
    } 
	
}