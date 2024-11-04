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
<h1 class="page-header">Data <small>Pengajuan Judul Skripsi <i class="fa fa-angle-right"></i>&nbsp;Approval</small></h1>
<!-- end page-header -->
<?php
	include "../../config/koneksi.php";
	$selDsn	=mysqli_query($gathuk, "SELECT * FROM tb_dosen WHERE nidn='$_SESSION[id_user]'");
	$sdsn	=mysqli_fetch_array($selDsn);
	$id_dosen	=$sdsn['id_dosen'];
	
	$query	=mysqli_query($gathuk, "SELECT * FROM tb_skripsi WHERE id_dosen2='$id_dosen' ORDER BY id_skripsi DESC");
?>
<div class="row">
	<!-- begin col-12 -->
    <div class="col-md-12">
		<!-- begin panel -->
		<div class="panel panel-default">
			<div class="panel-heading">
				<div class="panel-heading-btn">
					<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
					<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
					<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
					<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
				</div>
				<h4 class="panel-title">Results <span class="text-info"><?php echo mysqli_num_rows($query);?></span> rows for "Data Skripsi"</h4>
			</div>
			<div class="panel-body">
				<table id="data-table" class="table table-striped table-bordered nowrap" width="100%">
					<thead>
						<tr>
							<th width="4%">No</th>
							<th>Tanggal</th>
							<th>NPM</th>
							<th>Nama Mahasiswa</th>
							<th>Judul</th>
							<th>Approval</th>
							<th width="4%">Act</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$no=0;
							while($data	=mysqli_fetch_array($query)){
							list($y,$m,$d)	=explode ("-",$data['tgl']);
							$no++
						?>
						<tr>
							<td><?php echo $no?></td>
							<td><?php echo $d?>-<?php echo $m?>-<?php echo $y?></td>
							<td><?php $tamSis	=mysqli_query($gathuk, "SELECT * FROM tb_siswa WHERE id_siswa='$data[id_siswa]'");
									$tsis	=mysqli_fetch_array($tamSis);?>
								<a type="button" style="cursor:pointer;" data-toggle="modal" data-target="#Det<?php echo $data['id_skripsi'];?>" title="detail skripsi"><?=$tsis['npm']?></a>
							</td>
							<td><?php echo $tsis['nama']?></td>
							<td><?php echo $data['judul']?></td>
							<td><?php
								if ($data['approve_dosen2'] ==""){
									echo"Wait";	
								}
								else if ($data['approve_dosen2'] =="Y"){
									echo"Approved";	
								}
								else if ($data['approve_dosen2'] =="N"){
									echo"Not Approved";	
								}
								else{
									echo"Approved as Revisions";	
								}
								?>
							</td>
							<td class="text-center">
								<?php
								if ($data['approve_dosen2'] ==""){
									echo '<a type="button" class="btn btn-warning btn-icon btn-sm" data-toggle="modal" data-target="#App'.$data['id_skripsi'].'" title="Approval"><i class="ion-android-checkbox fa-lg"></i></a>';
								}
								else {
									echo '<a type="button" class="btn btn-default btn-icon btn-sm" href="javascript:;" title="Approval done"><i class="ion-android-checkbox fa-lg"></i></a>';
								}
								?>
							</td>
						</tr>
						<!-- #modal-detail -->
						<div id="Det<?php echo $data['id_skripsi'];?>" class="modal fade" role="dialog">
							<div class="modal-dialog modal-lg">
								<div class="modal-content">
									<div class="modal-header bg-silver">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="ion-close-circled"></i></button>
										<h5 class="modal-title"><i class="ion-ios-briefcase-outline text-danger"></i> &nbsp;Detail Data Pengajuan Judul Skripsi.</h5>
									</div>
									<div class="col-md-12">
										<div class="profile-section">
											<div class="col-md-12">
												<div class="modal-body">
													<label class="col-md-3"><b><u>Data Mahasiswa</u></b></label>
													<span class="col-md-9"></span>
												</div>
												<div class="modal-body">
													<label class="col-md-3">NPM</label>
													<span class="col-md-9">: <?=$tsis['npm']?></span>
												</div>
												<div class="modal-body">
													<label class="col-md-3">Nama Mahasiswa</label>
													<span class="col-md-9">: <?=$tsis['nama']?></span>	
												</div>
												<div class="modal-body">
													<label class="col-md-3">Jurusan</label>
													<span class="col-md-9">: <?=$tsis['jurusan']?></span>	
												</div>
												<div class="modal-body">
													<label class="col-md-3"><b><u>Data Skripsi</u></b></label>
													<span class="col-md-9"></span>	
												</div>
												<div class="modal-body">
													<label class="col-md-3">Kategori</label>
													<span class="col-md-9">: <?=$data['kategori']?></span>	
												</div>
												<div class="modal-body">
													<label class="col-md-3">Topik</label>
													<span class="col-md-9">: <?=$data['topik']?></span>	
												</div>
												<div class="modal-body">
													<label class="col-md-3">Judul</label>
													<span class="col-md-9">: <?=$data['judul']?></span>	
												</div>
												<div class="modal-body">
													<label class="col-md-3">Tahun Angkatan</label>
													<span class="col-md-9">: <?=$data['angkatan']?></span>	
												</div>
												<div class="modal-body">
													<label class="col-md-3">Berkas</label>
													<span class="col-md-9">: Proposal &nbsp;<?php
														if ($data['file_proposal'] ==""){
															echo"-.";	
														}
														else{
															echo"<a href='../../assets/berkas/";echo $data['file_proposal'];echo"' target='_blank'title='view'><i class='fa fa-file-pdf-o fa-lg text-warning'></i></a> .";	
														}
														?>
														Jurnal&nbsp;
														<?php
														if ($data['file_jurnal'] ==""){
															echo"-.";	
														}
														else{
															echo"<a href='../../assets/berkas/";echo $data['file_jurnal'];echo"' target='_blank'title='view'><i class='fa fa-file-pdf-o fa-lg text-warning'></i></a>";	
														}
														?>
													</span>	
												</div>
												<div class="modal-body">
													<label class="col-md-3"></label>
													<span class="col-md-9"></span>	
												</div>
												<div class="modal-body">
													<label class="col-md-3"><b><u>Status Prodi</u></b></label>
													<span class="col-md-9"></span>	
												</div>
												<div class="modal-body">
													<label class="col-md-3">Approval Prodi</label>
													<span class="col-md-9">: <?php
														if ($data['approve_prodi'] ==""){
															echo"Wait";	
														}
														else if ($data['approve_prodi'] =="Y"){
															echo"Approve";	
														}
														else{
															echo "Not Approved";
														}
														?>
													</span>	
												</div>
												<div class="modal-body">
													<label class="col-md-3">Catatan Prodi</label>
													<span class="col-md-9">: <?=$data['catatan_prodi']?></span>	
												</div>
												<div class="modal-body">
													<label class="col-md-3"><b><u>Status Dosen Pembimbing</u></b></label>
													<span class="col-md-9"></span>	
												</div>
												<div class="modal-body">
													<label class="col-md-3">NIDN</label>
													<span class="col-md-9">: <?php $tamDsn	=mysqli_query($gathuk, "SELECT * FROM tb_dosen WHERE id_dosen='$data[id_dosen2]'");
														$tdsn	=mysqli_fetch_array($tamDsn);
														echo $tdsn['nidn'];?>
													</span>	
												</div>
												<div class="modal-body">
													<label class="col-md-3">Nama Dosen</label>
													<span class="col-md-9">: <?=$tdsn['nama']?></span>	
												</div>
												<div class="modal-body">
													<label class="col-md-3">Approval Dosen</label>
													<span class="col-md-9">: <?php
															if ($data['approve_dosen2'] ==""){
																echo"";	
															}
															else if ($data['approve_dosen2'] =="Y"){
																echo"Approved";	
															}
															else if ($data['approve_dosen2'] =="N"){
																echo"Not Approved";	
															}
															else{
																echo"Approved as Revisions";	
															}
															?>
													</span>	
												</div>
												<div class="modal-body">
													<label class="col-md-3">Catatan Dosen 2</label>
													<span class="col-md-9">: <?=$data['catatan_dosen2']?></span>	
												</div>
												<br />
												<br />
											</div>
										</div>	
									</div>
									<div class="modal-footer no-margin-top"></div>
								</div>
							</div>
						</div>
						<!-- #modal-detail -->
						<div id="App<?php echo $data['id_skripsi']?>" class="modal fade" role="dialog">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title"><span class="label label-inverse"> # Approval</span> &nbsp; Pengajuan Judul Skripsi <u><?php echo $tsis['nama']?></u>.</h5>
									</div>
									<div class="col-sm-12">
										<div class="modal-body">
											<form action="index.php?page=approval-dosen2&id_skripsi=<?php echo $data['id_skripsi']?>" class="form-horizontal" method="POST" enctype="multipart/form-data">
												<div class="form-group col-sm-12">
													<label class="col-md-3 control-label">Approval</label>
													<div class="col-md-8">
														<select name="approve_dosen2" class="default-select2 form-control" style="width:100%" required >
															<option value="">...</option>
															<option value="Y">Approved</option>
															<option value="N">Not Approved</option>
															<option value="R">Approved as Revisions</option>
														</select>
													</div>
												</div>
												<div class="form-group col-sm-12">
													<label class="col-md-3 control-label">Catatan</label>
													<div class="col-md-8">
														<textarea type="text" name="catatan_dosen2" maxlength="255" class="form-control"></textarea>
													</div>
												</div>
												<div class="form-group col-sm-12">
													<label class="col-md-3 control-label"></label>
													<div class="col-md-8">
													</div>
												</div>
												<div class="form-group col-sm-12">
													<label class="col-md-3 control-label"></label>
													<div class="col-md-8">
														<button type="submit" name="edit" value="edit" class="btn btn-danger"><i class="ion-android-checkbox"></i>&nbsp;Submit</button>&nbsp;
														<a type="button" class="btn btn-default active" class="close" data-dismiss="modal" aria-hidden="true"><i class="ion-arrow-return-left"></i>&nbsp;Cancel</a>
													</div>
												</div>
											</form>
										</div>
									</div>
									<div class="modal-footer">
									</div>
								</div>
							</div>
						</div>
						<?php
							}
						?>
					</tbody>
				</table>
			</div>
		</div>
		<!-- end panel -->
	</div>
    <!-- end col-10 -->
</div>
<!-- end row -->
<script> // 500 = 0,5 s
	$(document).ready(function(){setTimeout(function(){$(".pesan").fadeIn('slow');}, 500);});
	setTimeout(function(){$(".pesan").fadeOut('slow');}, 7000);
</script>