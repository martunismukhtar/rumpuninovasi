<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

function random_str($length, $keyspace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ') {
    $str = '';
    $max = mb_strlen($keyspace, '8bit') - 1;
    for ($i = 0; $i < $length; ++$i) {
        $str .= $keyspace[random_int(0, $max)];
    }
    return $str;
}
    
function getstaticback(){
    $CI = & get_instance();
    $CI->load->database();
    
    $s1=$CI->db->query("select * from tbl_background_static");
    
    return $s1;
    
}

function menu() {
    $CI = & get_instance();
    $CI->load->database();
    
    $bahasa = $CI->session->userdata('bahasa');
    if(!$bahasa) {
        $bahasa='id';
    }
    
    $s1=$CI->db->query("select judul, (select slug from app_routes where id=m.route) as link from tbl_menu m where lang='".$bahasa."' order by urutan");
    $li='';
    foreach($s1->result() as $om){
       $li .='<li><a href="'.$om->link.'">'.$om->judul.'</a></li>';
    }
    return $li;
}

function getlang(){
    
    $CI = & get_instance();
    if($CI->session->userdata('bahasa')) {
       return $CI->session->userdata('bahasa');
    } else {
        return 'id';
    }
}

function limit_text($text, $max_length){
    $tags   = array();
    $result = "";

    $is_open   = false;
    $grab_open = false;
    $is_close  = false;
    $in_double_quotes = false;
    $in_single_quotes = false;
    $tag = "";

    $i = 0;
    $stripped = 0;

    $stripped_text = strip_tags($text);

    while ($i < strlen($text) && $stripped < strlen($stripped_text) && $stripped < $max_length)
    {
        $symbol  = $text[$i];
        $result .= $symbol;

        switch ($symbol)
        {
           case '<':
                $is_open   = true;
                $grab_open = true;
                break;

           case '"':
               if ($in_double_quotes)
                   $in_double_quotes = false;
               else
                   $in_double_quotes = true;

            break;

            case "'":
              if ($in_single_quotes)
                  $in_single_quotes = false;
              else
                  $in_single_quotes = true;

            break;

            case '/':
                if ($is_open && !$in_double_quotes && !$in_single_quotes)
                {
                    $is_close  = true;
                    $is_open   = false;
                    $grab_open = false;
                }

                break;

            case ' ':
                if ($is_open)
                    $grab_open = false;
                else
                    $stripped++;

                break;

            case '>':
                if ($is_open)
                {
                    $is_open   = false;
                    $grab_open = false;
                    array_push($tags, $tag);
                    $tag = "";
                }
                else if ($is_close)
                {
                    $is_close = false;
                    array_pop($tags);
                    $tag = "";
                }

                break;

            default:
                if ($grab_open || $is_close)
                    $tag .= $symbol;

                if (!$is_open && !$is_close)
                    $stripped++;
        }

        $i++;
    }

    while ($tags)
        $result .= "</".array_pop($tags).">";

    return $result;
}