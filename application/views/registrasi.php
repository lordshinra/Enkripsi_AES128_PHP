<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <meta charset="utf-8">
  <title>Dashboard Publisher</title>
  <meta name="generator" content="Bootply" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <link href="<?php echo base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url('assets/css/AdminLTE.min.css') ?>" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url('assets/font-awesome-4.3.0/css/font-awesome.min.css') ?>" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
		<!--[if lt IE 9]>
			<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
      <![endif]-->
      <link href="<?php echo base_url()."assets"; ?>/css/styles.css" rel="stylesheet">
    </head>

    <body class="hold-transition login-page">
    <div class="login-box">
      <div class="login-logo">
        <a href="#"><b>Aplikasi</b> Enkripsi</a>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">Login untuk memulai sesi</p>
        <form id="loginform" role="form" method="post" action="<?php echo base_url()."registrasi/cekregistrasi"; ?>">
          <div class="form-group has-feedback">
            <input id="login-username" type="text" class="form-control" name="username" placeholder="Username">
            <span class="fa fa-user-secret form-control-feedback" style="line-height: 35px;"></span>
          </div>
          <div class="form-group has-feedback">
            <input id="login-email" type="text" class="form-control" name="email" placeholder="Email">
            <span class="fa fa-envelope form-control-feedback" style="line-height: 35px;"></span>
          </div>
          <div class="form-group has-feedback">
            <input id="login-password" type="password" class="form-control" name="password" placeholder="Password">
            <span class="fa fa-lock form-control-feedback" style="line-height: 35px;"></span>
          </div>
          <div class="row">
            <div class="col-xs-4">
              <button type="submit" name="registrasi" class="btn btn-info btn-block btn-flat">Registrasi</button>
            </div><!-- /.col -->
            <div class="col-xs-4 pull-right">
              <a href="<?php echo base_url()."login"; ?>" class="btn btn-primary btn-block btn-flat">Login</a>
            </div><!-- /.col -->
          </div>
        </form>
        <div style="padding-top:10px; text-align:center;"  class="form-group">
        <?php echo "<label for='password' class='control-label' style='color:red'>".$this->session->flashdata('pesan')."</label>" ?>
        </div>
      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

    <!-- script references -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
    <script src="<?php echo base_url()."assets"; ?>/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url()."assets"; ?>/js/scripts.js"></script>
  </body>
    </html>
