<?php
	if (isset($_SESSION['pesan']) && $_SESSION['pesan'] <> '') {
		echo "<script type='text/javascript'>Swal.fire({";echo $_SESSION['pesan'];echo"});</script>";
	}
	$_SESSION['pesan'] ="";
?>
<!-- begin breadcrumb -->
<ol class="breadcrumb pull-right">
	<li><a class="btn btn-sm btn-danger m-b-10" data-toggle="modal" data-target="#AddMaster"><i class="fa fa-plus-circle"></i> &nbsp;Ajukan Judul</a></li>
</ol>
<!-- end breadcrumb -->
<!-- begin page-header -->
<h1 class="page-header">Data <small>Pengajuan Judul Skripsi&nbsp;</small></h1>
<!-- end page-header -->
<?php
	include "../../config/koneksi.php";
	$selSis	=mysqli_query($gathuk, "SELECT * FROM tb_siswa WHERE npm='$_SESSION[id_user]'");
	$ssis	=mysqli_fetch_array($selSis);
	$id_siswa	=$ssis['id_siswa'];
	
	$query	=mysqli_query($gathuk, "SELECT * FROM tb_skripsi WHERE id_siswa='$id_siswa' ORDER BY id_skripsi DESC");
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
				<h4 class="panel-title">Results <span class="text-info"><?php echo mysqli_num_rows($query);?></span> rows for "Data Pengajuan Judul"</h4>
			</div>
			<div class="panel-body">
				<table id="data-table" class="table table-striped table-bordered nowrap" width="100%">
					<thead>
						<tr>
							<th width="4%">No</th>
							<th>Tanggal</th>
							<th>Kategori</th>
							<th>Topik</th>
							<th>Judul Skripsi</th>
							<th width="10%">Action</th>
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
							<td><?php echo $data['kategori']?></td>
							<td><?php echo $data['topik']?></td>
							<td><?php echo $data['judul']?></td>
							<td class="text-center">
								<a type="button" class="btn btn-success btn-icon btn-sm" href="index.php?page=detail-data-skripsi&id_skripsi=<?=$data['id_skripsi']?>" title="detail"><i class="fa fa-folder-open-o fa-lg"></i></a>
								<a type="button" class="btn btn-info btn-icon btn-sm" data-toggle="modal" data-target="#Edit<?php echo $data['id_skripsi']?>" title="edit"><i class="fa fa-pencil fa-lg"></i></a>
								<?php
								if ($data['approve_prodi'] ==""){
									echo '<a type="button" class="btn btn-danger btn-icon btn-sm" data-toggle="modal" data-target="#Del'.$data['id_skripsi'].'" title="delete"><i class="fa fa-trash-o fa-lg"></i></a>';
								}
								else {
									echo '<a type="button" class="btn btn-default btn-icon btn-sm" href="javascript:;" title="processed"><i class="fa fa-trash-o fa-lg"></i></a>';
								}
								?>
							</td>
						</tr>
						<!-- #modal-dialog -->
						<div id="Edit<?php echo $data['id_skripsi']?>" class="modal fade" role="dialog">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
										<h4 class="modal-title"><i class="ion-ios-gear text-danger"></i> Edit Data Pengajuan Judul Skripsi</h4>
									</div>
									<div class="col-sm-12">
										<div class="modal-body">
											<form action="index.php?page=edit-skripsi&id_skripsi=<?php echo $data['id_skripsi']?>" class="form-horizontal" method="POST" enctype="multipart/form-data">
												<div class="form-group col-sm-12">
													<label class="col-md-3 control-label">Kategori</label>
													<div class="col-md-8">
														<?php
															$eselKat = mysqli_query($gathuk, "SELECT * FROM tb_kategori ORDER BY nama");        
															echo '<select name="kategori" class="default-select2 form-control" style="width:100%" required>';    
															echo '<option value="'.$data['kategori'].'">'.$data['kategori'].'</option>';    
																while ($erowkat = mysqli_fetch_array($eselKat)) {    
																echo '<option value="'.$erowkat['nama'].'">'.$erowkat['nama'].'</option>';    
																}    
															echo '</select>';
														?>
													</div>
												</div>
												<div class="form-group col-sm-12">
													<label class="col-md-3 control-label">Topik</label>
													<div class="col-md-8">
														<input type="text" name="topik" maxlength="255" value="<?=$data['topik']?>" class="form-control" required />
													</div>
												</div>
												<div class="form-group col-sm-12">
													<label class="col-md-3 control-label">Judul Skripsi</label>
													<div class="col-md-8">
														<textarea type="text" name="judul" maxlength="255" class="form-control" required><?=$data['judul']?></textarea>
													</div>
												</div>
												<div class="form-group col-sm-12">
													<label class="col-md-3 control-label">Angkatan</label>
													<div class="col-md-8">
														<?php
															echo '<select name="angkatan" class="default-select2 form-control" style="width:100%">';
															echo '<option value="'.$data['angkatan'].'">'.$data['angkatan'].'</option>';    
															for($ei=date("Y"); $ei>=date("Y")-32;$ei-=1){
																echo"<option value='$ei'>$ei</option>";
															}   
															echo '</select>';
														?>
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
														<button type="submit" name="edit" value="edit" class="btn btn-danger"><i class="fa fa-edit"></i>&nbsp;Ubah</button>&nbsp;
														<a type="button" class="btn btn-default active" class="close" data-dismiss="modal" aria-hidden="true"><i class="ion-arrow-return-left"></i>&nbsp;Batal</a>
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
						<div id="Del<?php echo $data['id_skripsi']?>" class="modal fade" role="dialog">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title"><span class="label label-inverse"> # Delete</span> &nbsp; Are you sure you want to delete Pengajuan Judul <u><?php echo $data['id_skripsi']?></u> from Database?</h5>
									</div>
									<div class="modal-body" align="center">
										<a href="index.php?page=delete-skripsi&id_skripsi=<?=$data['id_skripsi']?>" class="btn btn-danger">&nbsp; &nbsp;YES&nbsp; &nbsp;</a>
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
				<h4 class="modal-title"><i class="ion-ios-gear text-danger"></i> Data Pengajuan Judul Skripsi</h4>
			</div>
			<div class="col-sm-12">
				<div class="modal-body">
					<form action="index.php?page=master-skripsi&id_siswa=<?=$id_siswa?>" id="swal" class="form-horizontal" method="POST" enctype="multipart/form-data">
						<p align="center" class="m-b-20"><b>Sebelum Anda melakukan pengajuan judul skripsi, mohon untuk mengirimkan berkas persyaratan terlebih dahulu ke Prodi.<br />Apabila Prodi sudah melakukan aproval, silahkan kirim judul pada form ini!</b></p>
						<hr />
						<div class="form-group">
							<label class="col-md-3 control-label">Kategori</label>
							<div class="col-md-8">
								<?php
									$selKat = mysqli_query($gathuk, "SELECT * FROM tb_kategori ORDER BY nama");        
									echo '<select name="kategori" class="default-select2 form-control" style="width:100%" required>';    
									echo '<option value="">...</option>';    
										while ($rowkat = mysqli_fetch_array($selKat)) {    
										echo '<option value="'.$rowkat['nama'].'">'.$rowkat['nama'].'</option>';    
										}    
									echo '</select>';
								?>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Topik</label>
							<div class="col-md-8">
								<input type="text" name="topik" maxlength="255" class="form-control" required />
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Judul Skripsi</label>
							<div class="col-md-8">
								<textarea type="text" name="judul" maxlength="255" class="form-control" required></textarea>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Angkatan</label>
							<div class="col-md-8">
								<?php
									echo '<select name="angkatan" class="default-select2 form-control" style="width:100%">';
									echo '<option value="">...</option>';    
									for($i=date("Y"); $i>=date("Y")-32;$i-=1){
										echo"<option value='$i'>$i</option>";
									}   
									echo '</select>';
								?>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label"></label>
							<div class="col-md-8">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label"></label>
							<div class="col-md-8">
								<button type="submit" name="save" value="save" class="btn btn-danger"><i class="fa fa-floppy-o"></i>&nbsp;Save</button>&nbsp;
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
<script> // 500 = 0,5 s
	$(document).ready(function(){setTimeout(function(){$(".pesan").fadeIn('slow');}, 500);});
	setTimeout(function(){$(".pesan").fadeOut('slow');}, 7000);
</script>