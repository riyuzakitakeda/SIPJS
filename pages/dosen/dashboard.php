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
	<li><a href="javascript:;" class="btn btn-sm btn-danger m-b-10"><i class="ion-android-calendar fa-lg"></i> &nbsp; <?php echo date("d F Y")?></a></li>
</ol>
<!-- end breadcrumb -->
<!-- begin page-header -->
<h1 class="page-header m-b-40">Welcome <small>back lecturer</small></h1>
<!-- end page-header -->
<?php
	include "../../config/koneksi.php";
	$selDsn	=mysqli_query($gathuk, "SELECT * FROM tb_dosen WHERE nidn='$_SESSION[id_user]'");
	$sdsn	=mysqli_fetch_array($selDsn);
	$id_dosen	=$sdsn['id_dosen'];
?>
<div class="row m-b-40">
	<div class="col-sm-6 col-sm-offset-3 m-t-40">
		<ul class="nav nav-tabs">
			<li class="active"><a data-toggle="tab"><span class="visible-xs">Profile</span><span class="hidden-xs"><i class="ion-ios-person fa-lg text-primary"></i> Your Profile</span></a></li>
		</ul>
		<div class="tab-content">
			<div class="tab-pane fade active in" id="profile">
				<!-- begin profile-container -->
				<div class="profile-container">
                <!-- begin profile-section -->
					<div class="profile-section">
						<div class="profile-info">
								<!-- begin table -->
								<div class="table-responsive">
									<table class="table table-profile">
										<thead>
											<tr>
												<th><h5><span class="label label-inverse pull-right"> # Nama </span></h5></th>
												<th>
													<h4><?=strtoupper($sdsn['nama'])?></h4>
												</th>
											</tr>
										</thead>
										<tbody>
											<tr class="highlight">
												<td class="field">NIDN</td>
												<td><?=$sdsn['nidn']?></td>
											</tr>
											<tr class="divider">
												<td colspan="2"></td>
											</tr>
											<tr>
												<td class="field">Bidang Studi</td>
												<td><?=$sdsn['bdstudi']?></td>
											</tr>
										</tbody>
									</table>
								</div>
								<!-- end table -->
							</div>
						<hr />
					</div>
					<!-- end profile-section -->
				</div>
				<!-- end profile-container -->
			</div>
		</div>
	</div>
</div>

<script> // 500 = 0,5 s
	$(document).ready(function(){setTimeout(function(){$(".pesan").fadeIn('slow');}, 500);});
	setTimeout(function(){$(".pesan").fadeOut('slow');}, 7000);
</script>