<?php
	if (isset($_GET['id_setup'])) {
	$id_setup	= $_GET['id_setup'];
	
	include "../../config/koneksi.php";
	$query   =mysqli_query($gathuk, "SELECT * FROM tb_setup WHERE id_setup='$id_setup'");
	$data    =mysqli_fetch_array($query);
	}
	else {
		die ("Error. No ID Selected!");	
	}
?>
<!-- begin breadcrumb -->
<ol class="breadcrumb pull-right">
	<li>
		<?php
			if (isset($_SESSION['pesan']) && $_SESSION['pesan'] <> '') {
				echo "<span class='pesan'><div class='btn btn-sm btn-inverse m-b-10'><i class='fa fa-bell text-warning'></i>&nbsp; ".$_SESSION['pesan']." &nbsp; &nbsp; &nbsp;</div></span>";
			}
			$_SESSION['pesan'] ="";
		?>
	</li>
</ol>
<!-- end breadcrumb -->
<!-- begin page-header -->
<h1 class="page-header">Setup <small>Universitas</small></h1>
<!-- end page-header -->
<!-- begin row -->
<div class="row">
	<!-- begin col-12 -->
    <div class="col-sm-10 col-sm-offset-1">
		<!-- begin panel -->
		<div class="panel panel-default" data-sortable-id="form-stuff-1">
			<div class="panel-heading">
				<div class="panel-heading-btn">
					<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
					<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
					<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
					<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
				</div>
				<h4 class="panel-title">Form setup universitas</h4>
			</div>
			<div class="panel-body">
				<form action="index.php?page=setup-universitas&id_setup=<?=$id_setup?>" class="form-horizontal" method="POST" enctype="multipart/form-data" >
					<div class="form-group">
						<label class="col-md-3 control-label">Universitas</label>
						<div class="col-md-6">
							<input type="text" name="universitas" value="<?=$data['universitas']?>" maxlength="128" class="form-control" required />
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label">Kabupaten / Kota</label>
						<div class="col-md-6">
							<select name="kabkota" class="default-select2 form-control">
								<option value="Kabupaten" <?php echo ($data['kabkota']=='Kabupaten')?"selected":""; ?>>Kabupaten</option>    
								<option value="Kota" <?php echo ($data['kabkota']=='Kota')?"selected":""; ?>>Kota</option>    
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label">Nama Kabupaten / Kota</label>
						<div class="col-md-6">
							<input type="text" name="nama_kabkota" value="<?=$data['nama_kabkota']?>" maxlength="128" class="form-control" required />
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label">Alamat</label>
						<div class="col-md-6">
							<textarea type="text" name="alamat" maxlength="255" class="form-control" required><?=$data['alamat']?></textarea>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label">No. Telp</label>
						<div class="col-md-6">
							<input type="text" name="telp" value="<?=$data['telp']?>" maxlength="16" class="form-control" required />
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label">Website</label>
						<div class="col-md-6">
							<input type="text" name="web_url" value="<?=$data['web_url']?>" maxlength="128" class="form-control" />
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label">Email</label>
						<div class="col-md-6">
							<input type="text" name="email" value="<?=$data['email']?>" maxlength="128" class="form-control" />
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label"></label>
						<div class="col-md-6">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label"></label>
						<div class="col-md-6">
							<button type="submit" name="setup" value="setup" class="btn btn-danger" ><i class="fa fa-gear"></i>&nbsp;Setup</button>&nbsp;
							<a type="button" class="btn btn-default active" href="index.php?page=form-view-setup-universitas"><i class="ion-arrow-return-left"></i>&nbsp;Cancel</a>
						</div>
					</div>
				</form>
			</div>
		</div>
		<!-- end panel -->
	</div>
	<!-- end col-6 -->
</div>
<!-- end row -->
<script> // 500 = 0,5 s
	$(document).ready(function(){setTimeout(function(){$(".pesan").fadeIn('slow');}, 500);});
	setTimeout(function(){$(".pesan").fadeOut('slow');}, 7000);
</script>