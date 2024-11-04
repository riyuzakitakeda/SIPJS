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
<h1 class="page-header">Data <small>Berkas Persyaratan <i class="fa fa-angle-right"></i>&nbsp;Approval</small></h1>
<!-- end page-header -->
<?php
	include "../../config/koneksi.php";	
	$query	=mysqli_query($gathuk, "SELECT * FROM tb_berkas ORDER BY id_berkas DESC");
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
							<th width="4%">No</th>
							<th>Tgl</th>
							<th>Siswa</th>
							<th>KTM</th>
							<th>Bayar</th>
							<th>Proposal</th>
							<th>Hasil</th>
							<th>Ujian Tutup</th>
							<th>Jurnal</th>
							<th>KRS</th>
							<th>Status</th>
							<th>Catatan Prodi</th>
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
									$tsis	=mysqli_fetch_array($tamSis);
									echo $tsis['nama'];
								?>
							</td>
							<td><?php
								if ($data['file_ktm'] ==""){
									echo"-";	
								}
								else{
									echo"<a href='../../assets/berkas/";echo $data['file_ktm'];echo"' target='_blank'title='view'><i class='fa fa-file-pdf-o fa-lg text-warning'></i></a>";	
								}
								?>
							</td>
							<td><?php
								if ($data['file_bayar'] ==""){
									echo"-";	
								}
								else{
									echo"<a href='../../assets/berkas/";echo $data['file_bayar'];echo"' target='_blank'title='view'><i class='fa fa-file-pdf-o fa-lg text-warning'></i></a>";	
								}
								?>
							</td>
							<td><?php
								if ($data['file_proposal'] ==""){
									echo"-";	
								}
								else{
									echo"<a href='../../assets/berkas/";echo $data['file_proposal'];echo"' target='_blank'title='view'><i class='fa fa-file-pdf-o fa-lg text-warning'></i></a>";	
								}
								?>
							</td>
							<td><?php
								if ($data['file_hasil'] ==""){
									echo"-";	
								}
								else{
									echo"<a href='../../assets/berkas/";echo $data['file_hasil'];echo"' target='_blank'title='view'><i class='fa fa-file-pdf-o fa-lg text-warning'></i></a>";	
								}
								?>
							</td>
							<td><?php
								if ($data['file_tutup'] ==""){
									echo"-";	
								}
								else{
									echo"<a href='../../assets/berkas/";echo $data['file_tutup'];echo"' target='_blank'title='view'><i class='fa fa-file-pdf-o fa-lg text-warning'></i></a>";	
								}
								?>
							</td>
							<td><?php
								if ($data['file_jurnal'] ==""){
									echo"-";	
								}
								else{
									echo"<a href='../../assets/berkas/";echo $data['file_jurnal'];echo"' target='_blank'title='view'><i class='fa fa-file-pdf-o fa-lg text-warning'></i></a>";	
								}
								?>
							</td>
							<td><?php
								if ($data['file_krs'] ==""){
									echo"-";	
								}
								else{
									echo"<a href='../../assets/berkas/";echo $data['file_krs'];echo"' target='_blank'title='view'><i class='fa fa-file-pdf-o fa-lg text-warning'></i></a>";	
								}
								?>
							</td>
							<td><?php
								if ($data['approve_prodi'] ==""){
									echo"Wait";	
								}
								else {
									echo $data['approve_prodi'];
								}
								?>
							</td>
							<td><?php echo $data['catatan_prodi']?></td>
							<td class="text-center">
								<?php
								if ($data['approve_prodi'] ==""){
									echo '<a type="button" class="btn btn-warning btn-icon btn-sm" data-toggle="modal" data-target="#App'.$data['id_berkas'].'" title="Approval"><i class="ion-android-checkbox fa-lg"></i></a>';
								}
								else {
									echo '<a type="button" class="btn btn-default btn-icon btn-sm" href="javascript:;" title="Done"><i class="ion-android-checkbox fa-lg"></i></a>';
								}
								?>
							</td>
						</tr>
						<div id="App<?php echo $data['id_berkas']?>" class="modal fade" role="dialog">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title"><span class="label label-inverse"> # Approval</span> &nbsp; Berkas Persyaratan <u><?php echo $tsis['nama']?></u>.</h5>
									</div>
									<div class="col-sm-12">
										<div class="modal-body">
											<form action="index.php?page=approval-berkas&id_berkas=<?php echo $data['id_berkas']?>" class="form-horizontal" method="POST" enctype="multipart/form-data">
												<div class="form-group col-sm-12">
													<label class="col-md-3 control-label">Approval</label>
													<div class="col-md-8">
														<select name="approve_prodi" class="default-select2 form-control" style="width:100%" required >
															<option value="">...</option>
															<option value="Y">Terima</option>
															<option value="N">Tolak</option>
														</select>
													</div>
												</div>
												<div class="form-group col-sm-12">
													<label class="col-md-3 control-label">Catatan Prodi</label>
													<div class="col-md-8">
														<textarea type="text" name="catatan_prodi" maxlength="255" class="form-control"></textarea>
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