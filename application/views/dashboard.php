<!--tambahkan Header-->
<?php
$this->load->view('template/head');
?>
<!--tambahkan custom css disini-->
<?php
$this->load->view('template/topbar');
$this->load->view('template/sidebar');
?>

<!-- Main content -->
<?php
$this->load->view($contents);
?>

<!--tambahkan Footer-->
<?php
$this->load->view('template/foot');
?>

<!--tambahkan custom js disini-->
<?php
$this->load->view('template/js');
?>
