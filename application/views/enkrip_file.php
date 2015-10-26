<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Dashboard
            <small>Enrkipsi</small>
        </h1>
    </section>

    <section class="content">
        <div class="box">
            <div class="box-header with-border">
        </div>
        <div class="box-body">
            <div class="container" id="container">
                <div class="row">
                    <div class="col-sm-8 col-md-6 col-md-offset-2">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <center><h3>Enkripsi File</h3></center>
                            </div>
                            <div class="panel-body">
                                <form role="form" action="" enctype="multipart/form-data" method="post" name="form" id="form">
                                    <input type="hidden" name="mode" value="e" />
                                    <fieldset>
                                        <div class="row">
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12 col-md-10  col-md-offset-1 ">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="glyphicon glyphicon-file"></i>
                                                        </span>
                                                        <input class="required form-control" type="file" id="file" name="file">
                                                    </div>
                                                    <label class="warning">Max Size: 3MB</label>
                                                </div>
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="glyphicon glyphicon-lock"></i>
                                                        </span>
                                                        <input class="required form-control" placeholder="Password" id="pass" name="pass" type="password" value="">
                                                    </div>
                                                </div>

                                                <div id="errors"></div>
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                                <div class="panel-footer ">
                                    <input type="submit" name="enkripfile" class="btn btn-primary center-block" name="enkrip" value="Enkrip File">
                                </div>
                            </form>
                        </div>
                        <?php if (!empty($alert)){ ?>
                            <div class='alert alert-danger alert-error'>
                                <a href='#' class='close' data-dismiss='alert'>&times;</a>
                                <center>
                                    <?php echo $alert; ?>
                                </center>
                            </div>
                            <?php } elseif (!empty($success)) { ?>
                                <div class='alert alert-success'>
                                    <a href='#' class='close' data-dismiss='alert'>&times;</a>
                                    <center>
                                        <?php echo $success; ?>
                                    </center>
                                </div>
                                <?php }	?>
                            </div>
                        </div>
                    </div>
                </div><!-- /.box-body -->
                <div class="box-footer" style="height:50px;">
            </div><!-- /.box-footer-->
        </div><!-- /.box -->
    </section>
</div><!-- /.content-wrapper -->
