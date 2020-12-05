<?php
class M_produk extends CI_Model{
    
    function getdokumen() {
        $dd='';
        $gg=$this->db->query("select id, cover, nama_file, judul_".getlang()." as judul, deskripsi_".getlang()." as deskripsi from tbl_produk where "
                . "jenis_dokumen='1' order by id desc ");
        foreach ($gg->result() as $oo){
            
             $dd .='<div class="row" style="margin-left:0px;">
                 <div class="col-md-2" style="padding-left:0px;">
                    <a class="img-responsive" href="#" title="">'
                    . '<img style="width:100%;height:120px;" src="gudang/images/produk/foto/'.$oo->cover.'" alt=" "></a>
                </div>
                <div class="col-md-9 col-sm-9" style="padding-left:0px;">
                    <h3 style="margin-top: 0px;">'.$oo->judul.'</h3>
                    '.$oo->deskripsi.'
                    <a class="blog-more-btn" href="gudang/images/produk/dokumen/'.$oo->nama_file.'">Unduh file <i class="fa fa-long-arrow-right"></i></a>   
                </div>
                </div>
                <hr>';
             
        }
        return $dd;
    } 
    function getvideo() {
        $dd='';
        $gg=$this->db->query("select id, cover, nama_file, judul_".getlang()." as judul, deskripsi_".getlang()." as deskripsi from tbl_produk where jenis_dokumen='3' order by id desc");
        foreach ($gg->result() as $oo){
            $dd .="<h3>".$oo->judul."</h3>";
//            $dd .="<br>";
            $dd .=$oo->deskripsi;
            $dd .="<br>";
//            $dd .='<a href="gudang/images/produk/video/'.$oo->nama_file.'"><img style="width:55px;height:55px;" src="gudang/images/produk/foto/'.$oo->cover.'" class="img-responsive" alt="Cinque Terre"></a>';
            $dd .='<video width="520" height="440" src="gudang/images/produk/video/'.$oo->nama_file.'" controls></video>';
            $dd .="<hr>";
        }
        return $dd;
    } 
    
    function getsi(){
        $gg=$this->db->query("select id, cover, nama_file, judul_".getlang()." as judul, deskripsi_".getlang()." as deskripsi from tbl_produk where jenis_dokumen='2' order by id desc");
        $dd='';
        foreach($gg->result() as $opp){
            $dd .='<div class="row" style="margin-left:0px;">
                    <div class="col-md-2" style="padding-left:0px;">
                        <a class="img-responsive" href="#" title="">'
                            . '<img style="width:100%;height:120px;" src="gudang/images/produk/foto/'.$opp->cover.'" alt=" "></a>
                    </div>
                    <div class="col-md-9 col-sm-9" style="padding-left:0px;">
                        <h3 style="margin-top: 0px;"><a href="http://'.$opp->nama_file.'" target="_blank">'.$opp->judul.'</a></h3>
                        '.$opp->deskripsi.'
                    </div>
            </div><hr>';
        }
        
        return $dd;
    }
	
}