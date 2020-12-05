<?php $this->load->view('template/header_page'); ?>
<?php $this->load->view('template/menu_page'); ?>
<?php $this->load->view($content); ?>
<?php if($cekfile == TRUE)  {
  $this->load->view($file);
}
?>
<?php $this->load->view('template/footer_page'); ?>
