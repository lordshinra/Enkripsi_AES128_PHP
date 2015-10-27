<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?php echo base_url('assets/images/default_pic.png') ?>" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
                <p><?php echo $this->session->userdata('username') ?></p>
            </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li <?php echo ($this->uri->segment(1)=="dashboard") ? 'class="active"' : ''; ?>><a href="<?php echo base_url()."dashboard"; ?>"><i class="fa fa-circle-o text-red"></i><span>Home</span></a></li>
            <li <?php echo ($this->uri->segment(1)=="myfiles") ? 'class="active"' : ''; ?>><a href="<?php echo base_url()."myfiles"; ?>"><i class="fa fa-circle-o text-red"></i><span>MyFiles</span></a></li>
            <li><a href="<?php echo base_url()."bantuan"; ?>"><i class="fa fa-circle-o text-red"></i><span>Bantuan</span></a></li>
            <li class="header">MENU ENKRIPSI</li>
            <li <?php echo ($this->uri->segment(1)=="enkripsi" && $this->uri->segment(2)=="file") ? 'class="active"' : ''; ?>><a href="<?php echo base_url()."enkripsi/file"; ?>"><i class="fa fa-circle-o text-blue"></i><span>Enkripsi File</span></a></li>
			<li <?php echo ($this->uri->segment(1)=="enkripsi" && $this->uri->segment(2)=="text") ? 'class="active"' : ''; ?>><a href="<?php echo base_url()."enkripsi/text"; ?>"><i class="fa fa-circle-o text-blue"></i>Enkripsi Text</span></a></li>
			<li <?php echo ($this->uri->segment(1)=="enkripsi" && $this->uri->segment(2)=="email") ? 'class="active"' : ''; ?>><a href="<?php echo base_url()."enkripsi/email"; ?>"><i class="fa fa-circle-o text-blue"></i>Enkripsi Email</span></a></li>
            <li class="header">MENU DEKRIPSI</li>
            <li <?php echo ($this->uri->segment(1)=="dekripsi" && $this->uri->segment(2)=="file") ? 'class="active"' : ''; ?>><a href="<?php echo base_url()."dekripsi/file"; ?>"><i class="fa fa-circle-o text-yellow"></i><span>Dekripsi File</span></a></li>
			<li <?php echo ($this->uri->segment(1)=="dekripsi" && $this->uri->segment(2)=="text") ? 'class="active"' : ''; ?>><a href="<?php echo base_url()."dekripsi/text"; ?>"><i class="fa fa-circle-o text-yellow"></i><span>Dekripsi Text</span></a></li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>

<!-- =============================================== -->
