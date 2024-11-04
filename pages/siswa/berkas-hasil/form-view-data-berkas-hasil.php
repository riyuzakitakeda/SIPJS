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
	<li><a class="btn btn-sm btn-danger m-b-10" data-toggle="modal" data-target="#AddMaster"><i class="fa fa-plus-circle"></i> &nbsp;Add Berkas</a></li>
</ol>
<!-- end breadcrumb -->
<!-- begin page-header -->
<h1 class="page-header">Data <small>Berkas Hasil&nbsp;</small></h1>
<!-- end page-header -->
<?php
	include "../../config/koneksi.php";
	$selSis	=mysqli_query($gathuk, "SELECT * FROM tb_siswa WHERE npm='$_SESSION[id_user]'");
	$ssis	=mysqli_fetch_array($selSis);
	$id_siswa	=$ssis['id_siswa'];
	
	$query	=mysqli_query($gathuk, "SELECT * FROM tb_berkas_hasil WHERE id_siswa='$id_siswa' ORDER BY id_berkas DESC");
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
				<h4 class="panel-title">Results <span class="text-info"><?php echo mysqli_num_rows($query);?></span> rows for "Data Berkas"</h4>
			</div>
			<div class="panel-body">
				<table id="data-table" class="table table-striped table-bordered nowrap" width="100%">
					<thead>
						<tr>
							<th width="5%">No</th>
							<th>Tanggal</th>
							<th>BPP</th>
							<th>Perse Pembimbing</th>
							<th>KRS</th>
							<th>Jurnal</th>
							<th>Pemba Seminar</th>
							<th>Suket Alquran</th>
							<th>SK Pembibing</th>
							<th>Pemba Konsumsi</th>
							<th>Status</th>
							<th>Catatan Prodi</th>
							<th width="5%">Action</th>
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
							<td><?php
								if ($data['bpp'] ==""){
									echo"-";	
								}
								else{
									echo"<a href='../../assets/berkas-hasil/";echo $data['bpp'];echo"' target='_blank'title='view'><i class='fa fa-file-pdf-o fa-lg text-warning'></i></a>";	
								}
								?>&nbsp;
								<a type="button" class="pull-right" data-toggle="modal" data-target="#Bpp<?php echo $data['id_berkas']?>" title="upload berkas BPP" style="cursor:pointer">Upload</a>
							</td>
							<td><?php
								if ($data['per_pembimbing'] ==""){
									echo"-";	
								}
								else{
									echo"<a href='../../assets/berkas-hasil/";echo $data['per_pembimbing'];echo"' target='_blank'title='view'><i class='fa fa-file-pdf-o fa-lg text-warning'></i></a>";	
								}
								?>&nbsp;
								<a type="button" class="pull-right" data-toggle="modal" data-target="#Bayar<?php echo $data['id_berkas']?>" title="upload berkas persetujuan pembimbing" style="cursor:pointer">Upload</a>
							</td>
							<td><?php
								if ($data['krs'] ==""){
									echo"-";	
								}
								else{
									echo"<a href='../../assets/berkas-hasil/";echo $data['krs'];echo"' target='_blank'title='view'><i class='fa fa-file-pdf-o fa-lg text-warning'></i></a>";	
								}
								?>&nbsp;
								<a type="button" class="pull-right" data-toggle="modal" data-target="#Proposal<?php echo $data['id_berkas']?>" title="upload berkas krs" style="cursor:pointer">Upload</a>
							</td>
							<td><?php
								if ($data['jurnal'] ==""){
									echo"-";	
								}
								else{
									echo"<a href='../../assets/berkas-hasil/";echo $data['jurnal'];echo"' target='_blank'title='view'><i class='fa fa-file-pdf-o fa-lg text-warning'></i></a>";	
								}
								?>&nbsp;
								<a type="button" class="pull-right" data-toggle="modal" data-target="#Jurnal<?php echo $data['id_berkas']?>" title="upload berkas jurnal" style="cursor:pointer">Upload</a>
							</td>
							<td><?php
								if ($data['bukti_seminar'] ==""){
									echo"-";	
								}
								else{
									echo"<a href='../../assets/berkas-hasil/";echo $data['bukti_seminar'];echo"' target='_blank'title='view'><i class='fa fa-file-pdf-o fa-lg text-warning'></i></a>";	
								}
								?>&nbsp;
								<a type="button" class="pull-right" data-toggle="modal" data-target="#Krs<?php echo $data['id_berkas']?>" title="upload berkas bukti seminar" style="cursor:pointer">Upload</a>
							</td>
							<td><?php
								if ($data['suket_alquran'] ==""){
									echo"-";	
								}
								else{
									echo"<a href='../../assets/berkas-hasil/";echo $data['suket_alquran'];echo"' target='_blank'title='view'><i class='fa fa-file-pdf-o fa-lg text-warning'></i></a>";	
								}
								?>&nbsp;
								<a type="button" class="pull-right" data-toggle="modal" data-target="#Suket<?php echo $data['id_berkas']?>" title="upload berkas bukti suket Alquran" style="cursor:pointer">Upload</a>
							</td>
							<td><?php
								if ($data['sk_pembimbing'] ==""){
									echo"-";	
								}
								else{
									echo"<a href='../../assets/berkas-hasil/";echo $data['sk_pembimbing'];echo"' target='_blank'title='view'><i class='fa fa-file-pdf-o fa-lg text-warning'></i></a>";	
								}
								?>&nbsp;
								<a type="button" class="pull-right" data-toggle="modal" data-target="#Krs<?php echo $data['id_berkas']?>" title="upload berkas bukti sk pembimbing" style="cursor:pointer">Upload</a>
							</td>
							<td><?php
								if ($data['bukti_konsumsi'] ==""){
									echo"-";	
								}
								else{
									echo"<a href='../../assets/berkas-hasil/";echo $data['bukti_konsumsi'];echo"' target='_blank'title='view'><i class='fa fa-file-pdf-o fa-lg text-warning'></i></a>";	
								}
								?>&nbsp;
								<a type="button" class="pull-right" data-toggle="modal" data-target="#Krs<?php echo $data['id_berkas']?>" title="upload berkas bukti konsumsi" style="cursor:pointer">Upload</a>
							</td>
							<td><?php
								if ($data['approve_prodi'] ==""){
									echo"Waiting";	
								}
								else if ($data['approve_prodi'] =="Y"){
									echo"Approved";	
								}
								else {
									echo"Not Approved";	
								}
								?>
							</td>
							<td><?php echo $data['catatan_prodi']?></td>
							<td class="text-center">
								<?php
								if ($data['approve_prodi'] ==""){
									echo '<a type="button" class="btn btn-danger btn-icon btn-sm" data-toggle="modal" data-target="#Del'.$data['id_berkas'].'" title="delete"><i class="fa fa-trash-o fa-lg"></i></a>';
								}
								else {
									echo '<a type="button" class="btn btn-default btn-icon btn-sm" href="javascript:;" title="processed"><i class="fa fa-trash-o fa-lg"></i></a>';
								}
								?>
							</td>
						</tr>
						<!-- #modal-dialog -->
						<div id="Bpp<?php echo $data['id_berkas']?>" class="modal fade" role="dialog">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
										<h4 class="modal-title"><i class="ion-ios-gear text-danger"></i> Ganti / Upload Berkas BPP</h4>
									</div>
									<div class="col-sm-12">
										<div class="modal-body">
											<form action="index.php?page=upload-berkas-ktm&id_berkas=<?php echo $data['id_berkas']?>" class="form-horizontal" method="POST" enctype="multipart/form-data">
												<div class="form-group col-sm-12">
													<label class="col-md-3 control-label">Pilih File</label>
													<div class="col-md-8">
														<input type="file" name="file_ktm" maxlength="255" class="form-control" required />
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
						<div id="Bayar<?php echo $data['id_berkas']?>" class="modal fade" role="dialog">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
										<h4 class="modal-title"><i class="ion-ios-gear text-danger"></i> Ganti / Upload Bukti Pembayaran</h4>
									</div>
									<div class="col-sm-12">
										<div class="modal-body">
											<form action="index.php?page=upload-berkas-bayar&id_berkas=<?php echo $data['id_berkas']?>" class="form-horizontal" method="POST" enctype="multipart/form-data">
												<div class="form-group col-sm-12">
													<label class="col-md-3 control-label">Pilih File</label>
													<div class="col-md-8">
														<input type="file" name="file_bayar" maxlength="255" class="form-control" required />
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
						<div id="Proposal<?php echo $data['id_berkas']?>" class="modal fade" role="dialog">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
										<h4 class="modal-title"><i class="ion-ios-gear text-danger"></i> Ganti / Upload Berkas Proposal</h4>
									</div>
									<div class="col-sm-12">
										<div class="modal-body">
											<form action="index.php?page=upload-berkas-proposal&id_berkas=<?php echo $data['id_berkas']?>" class="form-horizontal" method="POST" enctype="multipart/form-data">
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
						<div id="Jurnal<?php echo $data['id_berkas']?>" class="modal fade" role="dialog">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
										<h4 class="modal-title"><i class="ion-ios-gear text-danger"></i> Ganti / Upload Berkas Jurnal</h4>
									</div>
									<div class="col-sm-12">
										<div class="modal-body">
											<form action="index.php?page=upload-berkas-jurnal&id_berkas=<?php echo $data['id_berkas']?>" class="form-horizontal" method="POST" enctype="multipart/form-data">
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
						<!-- #modal-dialog -->
						<div id="Krs<?php echo $data['id_berkas']?>" class="modal fade" role="dialog">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
										<h4 class="modal-title"><i class="ion-ios-gear text-danger"></i> Ganti / Upload Berkas KRS</h4>
									</div>
									<div class="col-sm-12">
										<div class="modal-body">
											<form action="index.php?page=upload-berkas-krs&id_berkas=<?php echo $data['id_berkas']?>" class="form-horizontal" method="POST" enctype="multipart/form-data">
												<div class="form-group col-sm-12">
													<label class="col-md-3 control-label">Pilih File</label>
													<div class="col-md-8">
														<input type="file" name="file_krs" maxlength="255" class="form-control" required />
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
						<div id="Del<?php echo $data['id_berkas']?>" class="modal fade" role="dialog">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title"><span class="label label-inverse"> # Delete</span> &nbsp; Are you sure you want to delete Berkas <u><?php echo $data['id_berkas']?></u> from Database?</h5>
									</div>
									<div class="modal-body" align="center">
										<a href="index.php?page=delete-berkas&id_berkas=<?=$data['id_berkas']?>" class="btn btn-danger">&nbsp; &nbsp;YES&nbsp; &nbsp;</a>
									</div>
									<div class="modal-footer">
										<a href="javascript:;" class="btn btn-sm btn-white" data-dismiss="modal">Cancel</a>
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
<!-- modal master-->
<div id="AddMaster" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title"><i class="ion-ios-gear text-danger"></i> Data Berkas</h4>
			</div>
			<div class="col-sm-12">
				<div class="modal-body">
					<form action="index.php?page=master-berkas-hasil&id_siswa=<?=$id_siswa?>" class="form-horizontal" method="POST" enctype="multipart/form-data">
						<p class="m-b-20 text-center">Buat Folder Berkas Hasil!</p>
						<p class="m-b-20 text-center"><button type="submit" name="save" value="save" class="btn btn-danger"><i class="fa fa-edit"></i>&nbsp;YES</button></p>
					</form>
				</div>
				<div class="modal-footer">
				</div>
			</div>
			<div class="modal-footer no-margin-top">
			</div>
		</div>
	</div>
</div>
<script> // 500 = 0,5 s
	$(document).ready(function(){setTimeout(function(){$(".pesan").fadeIn('slow');}, 500);});
	setTimeout(function(){$(".pesan").fadeOut('slow');}, 7000);
</script>