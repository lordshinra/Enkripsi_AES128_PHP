<!-- jQuery -->
<script src="<?php echo base_url('assets/js/jquery.min.js') ?>"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>
<script src="<?php echo base_url('assets/AdminLTE/dist/js/app.js') ?>" type="text/javascript"></script>
<!-- Menu Toggle Script -->
<script>
$("#menu-toggle").click(function(e) {
    e.preventDefault();
    $("#wrapper").toggleClass("toggled");
});
</script>
