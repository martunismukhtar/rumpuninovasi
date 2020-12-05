<?php
class M_kegiatan extends CI_Model{
    
    function getfotokegiatan($kegiatan) {
        $s1=$this->db->query("select id, nama_file from tbl_dokumen_kegiatan where kegiatan='".$kegiatan."'");
        
        $li='';
        foreach ($s1->result() as $of) {
            $class=$kegiatan.$of->id;
            
            $li .='<div class="fileinput fileinput-new '.$class.'" data-provides="fileinput">
                <input type="hidden" name="idfotokegiatan[]" value="'.$of->id.'">
                <div class="fileinput-new thumbnail xfotomhs">
                <button type="button" class="close" onclick="hapusgambar(\''.$kegiatan.'\',\''.$of->id.'\',\''.$class.'\',\''.$of->nama_file.'\')" aria-hidden="true">×</button><a class="img-responsive" href="#" title="">
                <img style="width:350px !important;height: 250px;" src="gudang/images/kegiatan/foto/resize/'.$of->nama_file.'" alt="" ></a></div>
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
                </div> ';
        }
        
        for($ff=0;$ff<8-$s1->num_rows();$ff++) {
            $li .='<div class="fileinput fileinput-new" data-provides="fileinput">
                <div class="fileinput-new thumbnail xfotomhs">
                </div>
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
                </div> ';
        }
        
        return $li;
    } 
    
    function getdokumenproduk($produk){
        $s1=$this->db->query("select produk, dokumen, (select nama_file from tbl_dokumen_produk where id=j.dokumen) as dok from tbl_join_dokumen_produk j where produk='".$produk."'"
                . " and jenis_dokumen='3'");
        
        $li='';//<button type="button" class="close" onclick="hapusgambar(\''.$of->produk.'\',\''.$of->dokumen.'\',\''.$class.'\')" aria-hidden="true">×</button>
        foreach ($s1->result() as $of) {
            $class=$of->produk.$of->dokumen;
            
            $li .='<div class="fileinput fileinput-new '.$class.'" data-provides="fileinput">
                <input type="hidden" name="iddokumen[]" value="'.$of->dokumen.'">
                <div class="fileinput-preview fileinput-exists thumbnail" style="height: 250px; width: 350px !important; line-height: 250px;display:block;">'.$of->dok.'
                    <button type="button" class="close" onclick="hapusdokumen(\''.$of->produk.'\',\''.$of->dokumen.'\',\''.$class.'\',\''.$of->dok.'\')" aria-hidden="true">×</button></div>
                    <div class="user-edit-image-buttons">
                        <span class="btn btn-azure btn-file"><span class="fileinput-new"><i class="fa fa-picture"></i> Pilih image</span>
                        <span class="fileinput-exists"><i class="fa fa-picture"></i> Ganti</span>
                            <input type="file" name="file_upload[]"> 
                        </span>
                        <a href="#" class="btn fileinput-exists btn-red" data-dismiss="fileinput">
                            <i class="fa fa-times"></i> Hapus
                        </a>
                    </div>
                </div> ';
        }
        
        for($ff=1;$ff<8-$s1->num_rows();$ff++) {
            $li .='<div class="fileinput fileinput-new" data-provides="fileinput">
                <div class="fileinput-new thumbnail xfotomhs">
                </div>
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
                </div> ';
        }
        
        return $li;
    }
    
    function getvideoproduk($produk){
        $s1=$this->db->query("select produk, dokumen, (select nama_file from tbl_dokumen_produk where id=j.dokumen) as video from tbl_join_dokumen_produk j where produk='".$produk."'"
                . " and jenis_dokumen='2'");
        
        $li='';//<button type="button" class="close" onclick="hapusgambar(\''.$of->produk.'\',\''.$of->dokumen.'\',\''.$class.'\')" aria-hidden="true">×</button>
        foreach ($s1->result() as $of) {
            $class=$of->produk.$of->dokumen;
            
            $li .='<div class="fileinput fileinput-new '.$class.'" data-provides="fileinput">
                <input type="hidden" name="idvideo[]" value="'.$of->dokumen.'">
                <div class="fileinput-preview fileinput-exists thumbnail" style="height: 250px; width: 350px !important; line-height: 250px;display:block;">'.$of->video.'
                    <button type="button" class="close" onclick="hapusvideo(\''.$of->produk.'\',\''.$of->dokumen.'\',\''.$class.'\',\''.$of->video.'\')" aria-hidden="true">×</button></div>
                    <div class="user-edit-image-buttons">
                        <span class="btn btn-azure btn-file"><span class="fileinput-new"><i class="fa fa-picture"></i> Pilih image</span>
                        <span class="fileinput-exists"><i class="fa fa-picture"></i> Ganti</span>
                            <input type="file" name="file_upload[]"> 
                        </span>
                        <a href="#" class="btn fileinput-exists btn-red" data-dismiss="fileinput">
                            <i class="fa fa-times"></i> Hapus
                        </a>
                    </div>
                </div> ';
        }
        
        for($ff=1;$ff<8-$s1->num_rows();$ff++) {
            $li .='<div class="fileinput fileinput-new" data-provides="fileinput">
                <div class="fileinput-new thumbnail xfotomhs">
                </div>
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
                </div> ';
        }
        
        return $li;
    }
	
}