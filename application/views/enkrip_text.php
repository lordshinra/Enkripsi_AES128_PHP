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
                        <div class="panel panel-success">
                            <div class="panel-heading">
                                <center><h3>Enkrip Text</h3></center>
                            </div>
                            <div class="panel-body">
                                <form role="form" action="" method="post" name="form" id="form">
                                    <input type="hidden" name="mode" value="et" />
                                    <fieldset>
                                        <div class="row">
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12 col-md-10  col-md-offset-1 ">
                                                <div class="form-group">
                                                    <textarea name="text" class="form-control" rows="5" style="width:100%;resize:none"></textarea>
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
                                    <input type="submit" class="btn btn-success center-block" name="enkriptext" value="Enkrip Text">
                                </div>
                            </form>
                        </div>
                        <?php
                        if (!empty($cipher)){
                            ?>
                            <textarea name="result" class="form-control default-cursor" rows="5" style="width:100%;resize:none" readonly><?php echo $cipher ?></textarea>
                            <?php
                        }
                        ?>
                        </div>
                    </div>
                </div>
            </div><!-- /.box-body -->
            <div class="box-footer" style="height:50px;">
            </div><!-- /.box-footer-->
        </div><!-- /.box -->
    </section>
</div><!-- /.content-wrapper -->
