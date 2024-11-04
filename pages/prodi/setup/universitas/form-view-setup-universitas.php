<?php	
	include "../../config/koneksi.php";
	$query	=mysqli_query($gathuk, "SELECT * FROM tb_setup WHERE id_setup='1'");
	$data	=mysqli_fetch_array($query);	
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
	<li><a href="index.php?page=form-setup-universitas&id_setup=<?=$data['id_setup']?>" title="setup" class="btn btn-sm btn-danger m-b-10"><i class="fa fa-gear"></i> &nbsp;Setup</a></li>
</ol>
<!-- end breadcrumb -->
<!-- begin page-header -->
<h1 class="page-header">Setup <small>Universitas</small></h1>
<!-- end page-header -->
<div class="row">
	<div class="col-sm-10 col-sm-offset-1">
		<div class="tab-content">
			<!-- begin table -->
			<div class="table-responsive">
				<table class="table table-profile">
					<thead>
						<tr>
							<th><h5><span class="label label-inverse pull-right"> # Universitas </span></h5></th>
							<th>
								<h4><?=$data['universitas']?></h4>
							</th>
						</tr>
					</thead>
					<tbody>
						<tr class="highlight">
							<td class="field">Kabupaten / Kota</td>
							<td><?=$data['kabkota']?> <?=$data['nama_kabkota']?></td>
						</tr>
						<tr class="divider">
							<td colspan="2"></td>
						</tr>
						<tr>
							<td class="field">Alamat</td>
							<td><i class="fa fa-map-marker fa-lg m-r-5"></i> <?=$data['alamat']?></td>
						</tr>
						<tr>
							<td class="field">No. Telp</td>
							<td><?=$data['telp']?></td>
						</tr>
						<tr>
							<td class="field">Website</td>
							<td><?=$data['web_url']?></td>
						</tr>
						<tr>
							<td class="field">Email</td>
							<td><?=$data['email']?></td>
						</tr>
						<tr>
							<td colspan="2"><hr /></td>
						</tr>
					</tbody>
				</table>
			</div>
			<!-- end table -->
		</div>
	</div>
</div>
<script> // 500 = 0,5 s
	$(document).ready(function(){setTimeout(function(){$(".pesan").fadeIn('slow');}, 500);});
	setTimeout(function(){$(".pesan").fadeOut('slow');}, 7000);
</script>