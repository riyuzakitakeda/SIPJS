<?php
	if (isset($_SESSION['pesan']) && $_SESSION['pesan'] <> '') {
		echo "<script type='text/javascript'>Swal.fire({";echo $_SESSION['pesan'];echo"});</script>";
	}
	$_SESSION['pesan'] ="";
	
	if (isset($_GET['id_skripsi'])) {
	$id_skripsi = $_GET['id_skripsi'];
	}
	include "../../config/koneksi.php";
	$query   =mysqli_query($gathuk, "SELECT * FROM tb_skripsi WHERE id_skripsi='$id_skripsi'");
	$data    =mysqli_fetch_array($query);
	list($y,$m,$d)	=explode ("-",$data['tgl']);
?>
<!-- begin breadcrumb -->
<ol class="breadcrumb pull-right">
	<li><a href="index.php?page=form-view-data-skripsi" title="back" class="btn btn-sm btn-white m-b-10"><i class="fa fa-step-backward"></i> &nbsp;Back</a></li>
</ol>
<!-- end breadcrumb -->
<!-- begin page-header -->
<h1 class="page-header">Detail <small>Judul Skripsi</small></h1>
<!-- end page-header -->
<!-- begin row -->
<div class="row">
	<div class="col-md-9">
		<ul class="nav nav-tabs">
			<li class="active"><a href="#profile" data-toggle="tab"><span class="visible-xs">Skripsi</span><span class="hidden-xs"><i class="ion-university fa-lg text-danger"></i> Skripsi</span></a></li>
			<li class=""><a href="#proposal" data-toggle="tab"><span class="visible-xs">Proposal / Jurnal</span><span class="hidden-xs"><i class="ion-ios-paper fa-lg text-success"></i> Proposal / Jurnal</span></a></li>
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
												<th><h5><span class="label label-inverse pull-right"> # Detail Judul </span></h5></th>
												<th>
													<h4><?=strtoupper($data['kategori'])?></h4>
												</th>
											</tr>
										</thead>
										<tbody>
											<tr class="highlight">
												<td class="field">Tanggal</td>
												<td><?=$d?>-<?=$m?>-<?=$y?></td>
											</tr>
											<tr class="divider">
												<td colspan="2"></td>
											</tr>
											<tr>
												<td class="field">Kategori</td>
												<td><?=$data['kategori']?></td>
											</tr>
											<tr>
												<td class="field">Topik</td>
												<td><?=$data['topik']?></td>
											</tr>
											<tr>
												<td class="field">Judul</td>
												<td><?=$data['judul']?></td>
											</tr>
											<tr>
												<td class="field">Tahun Angkatan</td>
												<td><?=$data['angkatan']?></td>
											</tr>
											<tr>
												<td class="field">Berkas Judul Proposal</td>
												<td><?php
													if ($data['file_proposal'] ==""){
														echo"-";	
													}
													else{
														echo"<a href='../../assets/berkas/";echo $data['file_proposal'];echo"' target='_blank'title='view'><i class='fa fa-file-pdf-o fa-lg text-warning'></i></a>";	
													}
													?>
												</td>
											</tr>
											<tr>
												<td class="field">Berkas Jurnal</td>
												<td><?php
													if ($data['file_jurnal'] ==""){
														echo"-";	
													}
													else{
														echo"<a href='../../assets/berkas/";echo $data['file_jurnal'];echo"' target='_blank'title='view'><i class='fa fa-file-pdf-o fa-lg text-warning'></i></a>";	
													}
													?>
												</td>
											</tr>
											<tr class="divider">
												<td colspan="2"></td>
											</tr>
											<tr>
												<td class="field">Dosen Pembimbing </td>
												<td><?php
													$tamDsn	=mysqli_query($gathuk, "SELECT * FROM tb_dosen WHERE id_dosen='$data[id_dosen]'");
														$tdsn	=mysqli_fetch_array($tamDsn);
														echo $tdsn['nama'];
													?>
												</td>
											</tr>
											<tr>
												<td class="field">NIDN</td>
												<td><strong><?php echo $tdsn['nidn'];?></strong></td>
											</tr>

											<tr>
												<td class="field">Dosen Pembimbing 2</td>
												<td><?php
													$tamDsn	=mysqli_query($gathuk, "SELECT * FROM tb_dosen WHERE id_dosen='$data[id_dosen2]'");
														$tdsn	=mysqli_fetch_array($tamDsn);
														echo $tdsn['nama'];
													?>
												</td>
											</tr>
											<tr>
												<td class="field">NIDN</td>
												<td><strong><?php echo $tdsn['nidn'];?></strong></td>
											</tr>

											<tr>
												<td colspan="2"><hr /></td>
											</tr>
											<tr>
												<td class="field">Catatan Prodi</td>
												<td><?php echo $data['catatan_prodi'];?></td>
											</tr>
											<tr>
												<td class="field">Catatan Dosen 1</td>
												<td><?php echo $data['catatan_dosen'];?></td>
											</tr>
											<tr>
												<td class="field">Catatan Dosen 2</td>
												<td><?php echo $data['catatan_dosen2'];?></td>
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
			<div class="tab-pane fade" id="proposal">
				<div class="profile-container">
					<div class="profile-section">
						<div class="profile-info">
							<div class="table-responsive">
								<table class="table table-profile">
									<tbody>
										<tr>
											<td class="field">Berkas Judul Proposal</td>
											<td>: <?php
													if ($data['file_proposal'] ==""){
														echo"-";	
													}
													else{
														echo"<a href='../../assets/berkas/";echo $data['file_proposal'];echo"' target='_blank'title='view'><i class='fa fa-file-pdf-o fa-lg text-warning'></i></a>";	
													}
													?> &nbsp;
													<a type="button" class="pull-right" data-toggle="modal" data-target="#Prop<?php echo $data['id_skripsi']?>" title="upload berkas proposal" style="cursor:pointer"><i class="ion-navigate fa-lg text-success"></i> Upload</a>
											</td>
										</tr>
										<tr>
											<td class="field">Berkas Jurnal</td>
											<td>: <?php
													if ($data['file_jurnal'] ==""){
														echo"-";	
													}
													else{
														echo"<a href='../../assets/berkas/";echo $data['file_jurnal'];echo"' target='_blank'title='view'><i class='fa fa-file-pdf-o fa-lg text-warning'></i></a>";	
													}
													?> &nbsp;
													<a type="button" class="pull-right" data-toggle="modal" data-target="#Jur<?php echo $data['id_skripsi']?>" title="upload berkas jurnal" style="cursor:pointer"><i class="ion-navigate fa-lg text-success"></i> Upload</a>
											</td>
										</tr>
									</tbody>
								</table>
								<!-- #modal-dialog -->
								<div id="Prop<?php echo $data['id_skripsi']?>" class="modal fade" role="dialog">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
												<h4 class="modal-title"><i class="ion-ios-gear text-danger"></i> Ganti / Upload Berkas Judul Proposal</h4>
											</div>
											<div class="col-sm-12">
												<div class="modal-body">
													<form action="index.php?page=upload-berkas-proposal-skripsi&id_skripsi=<?php echo $data['id_skripsi']?>" class="form-horizontal" method="POST" enctype="multipart/form-data">
														<div class="form-group col-sm-12">
															<label class="col-md-3 control-label">Pilih File</label>
															<div class="col-md-8">
																<input type="file" name="file_proposal" maxlength="255" class="form-control" required />
															</div>
														</div>
														<div class="form-group col-sm-12">
															<label class="col-md-3 control-label"></label>
															<div class="col-md-8">
																<p>* PDF. Max size 2 MB</p>
															</div>
														</div>
														<div class="form-group col-sm-12">
															<label class="col-md-3 control-label"></label>
															<div class="col-md-8">
																<button type="submit" name="edit" value="edit" class="btn btn-danger"><i class="fa fa-upload"></i>&nbsp;Upload</button>&nbsp;
																<a type="button" class="btn btn-default active" class="close" data-dismiss="modal" aria-hidden="true"><i class="ion-arrow-return-left"></i>&nbsp;Cancel</a>
															</div>
														</div>
													</form>
												</div>
											</div>
											<div class="modal-footer no-margin-top">
											</div>
										</div>
									</div>
								</div>
								<!-- #modal-dialog -->
								<div id="Jur<?php echo $data['id_skripsi']?>" class="modal fade" role="dialog">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
												<h4 class="modal-title"><i class="ion-ios-gear text-danger"></i> Ganti / Upload Berkas Jurnal</h4>
											</div>
											<div class="col-sm-12">
												<div class="modal-body">
													<form action="index.php?page=upload-berkas-jurnal-skripsi&id_skripsi=<?php echo $data['id_skripsi']?>" class="form-horizontal" method="POST" enctype="multipart/form-data">
														<div class="form-group col-sm-12">
															<label class="col-md-3 control-label">Pilih File</label>
															<div class="col-md-8">
																<input type="file" name="file_jurnal" maxlength="255" class="form-control" required />
															</div>
														</div>
														<div class="form-group col-sm-12">
															<label class="col-md-3 control-label"></label>
															<div class="col-md-8">
																<p>* PDF. Max size 2 MB</p>
															</div>
														</div>
														<div class="form-group col-sm-12">
															<label class="col-md-3 control-label"></label>
															<div class="col-md-8">
																<button type="submit" name="edit" value="edit" class="btn btn-danger"><i class="fa fa-upload"></i>&nbsp;Upload</button>&nbsp;
																<a type="button" class="btn btn-default active" class="close" data-dismiss="modal" aria-hidden="true"><i class="ion-arrow-return-left"></i>&nbsp;Cancel</a>
															</div>
														</div>
													</form>
												</div>
											</div>
											<div class="modal-footer no-margin-top">
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<hr />
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-3">
		<div class="panel panel-inverse overflow-hidden">
			<div class="panel-heading">
				<h3 class="panel-title">
					<a class="accordion-toggle accordion-toggle-styled" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
					    <i class="fa fa-plus-circle pull-right"></i> 
						<i class="ion-filing fa-lg text-warning"></i> &nbsp;Status Approval
					</a>
				</h3>
			</div>
			<div id="collapseOne" class="panel-collapse collapse in">
				<div class="panel-body">
					<h5><span class="label label-primary"> # Prodi </span></h5>
					<p><?php
						if ($data['approve_prodi'] ==""){
							echo"Waiting";	
						}
						else if ($data['approve_prodi'] =="Y"){
							echo"<i class='ion-ios-checkmark-outline text-success'></i> Approve";	
						}
							else{
							echo "<i class='ion-ios-close-outline text-danger'></i> Not Approved";
						}
						?>
					</p>
					<br />
					<h5><span class="label label-primary"> # Dosen Pembimbing 1</span></h5>
					<p><?php
						if ($data['approve_dosen'] ==""){
							echo"";	
						}
						else if ($data['approve_dosen'] =="Y"){
							echo"<i class='ion-ios-checkmark-outline text-success'></i> Approved";	
						}
						else if ($data['approve_dosen'] =="N"){
							echo "<i class='ion-ios-close-outline text-danger'></i> Not Approved";
						}
						else{
							echo "<i class='ion-ios-checkmark-outline text-warning'></i> Approved as Revisions";
						}
						?>
					</p>

					<h5><span class="label label-primary"> # Dosen Pembimbing 2</span></h5>
					<p><?php
						if ($data['approve_dosen2'] ==""){
							echo"";	
						}
						else if ($data['approve_dosen2'] =="Y"){
							echo"<i class='ion-ios-checkmark-outline text-success'></i> Approved";	
						}
						else if ($data['approve_dosen'] =="N"){
							echo "<i class='ion-ios-close-outline text-danger'></i> Not Approved";
						}
						else{
							echo "<i class='ion-ios-checkmark-outline text-warning'></i> Approved as Revisions";
						}
						?>
					</p>
				</div>
			</div>
		</div>
	</div>
</div>
				
<script> // 500 = 0,5 s
	$(document).ready(function(){setTimeout(function(){$(".pesan").fadeIn('slow');}, 500);});
	setTimeout(function(){$(".pesan").fadeOut('slow');}, 7000);
</script>