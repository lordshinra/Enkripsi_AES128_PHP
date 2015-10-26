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
			<div class="myfiles">
				<center><h1>My Files</h1></center>
			<table class="table table-striped table-bordered">
				<tr>
					<th>No.</th>
					<th>ID</th>
					<th>Nama File</th>
					<th>Tanggal Upload</th>
					<th>Encrypt File</th>
				</tr>
				<?php
				$no = 1;
				foreach ($files as $value) {
				?>
					<tr>
						<td><?php echo $no ?></td>
						<td><?php echo $value['dokumen_id'] ?></td>
						<td><?php echo $value['nama_dokumen'] ?></td>
						<td><?php echo $value['tanggal'] ?></td>
						<td><a href="<?php echo base_url()."myfiles/download/".$value['id'];?>">Download</a></td>
					</tr>
				<?php
				$no++;
					}
				?>
			</table>
			</div>
        </div><!-- /.box-body -->
        <div class="box-footer" style="height:50px;">
        </div><!-- /.box-footer-->
        </div><!-- /.box -->
    </section>
</div><!-- /.content-wrapper -->
