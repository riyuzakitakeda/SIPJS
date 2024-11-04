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
	<li><a class="btn btn-sm btn-danger m-b-10" data-toggle="modal" data-target="#AddMaster"><i class="fa fa-plus-circle"></i> &nbsp;Add Jurusan</a></li>
</ol>
<!-- end breadcrumb -->
<!-- begin page-header -->
<h1 class="page-header">Master <small>Data Jurusan&nbsp;</small></h1>
<!-- end page-header -->
<?php
	include "../../config/koneksi.php";
	$query	=mysqli_query($gathuk, "SELECT * FROM tb_jurusan ORDER BY id_jurusan DESC");
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
				<h4 class="panel-title">Results <span class="text-info"><?php echo mysqli_num_rows($query);?></span> rows for "Data Jurusan"</h4>
			</div>
			<div class="panel-body">
				<table id="data-table" class="table table-striped table-bordered nowrap" width="100%">
					<thead>
						<tr>
							<th width="5%">No</th>
							<th>Nama Jurusan</th>
							<th width="10%">Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$no=0;
							while($data	=mysqli_fetch_array($query)){
							$no++
						?>
						<tr>
							<td><?php echo $no?></td>
							<td><?php echo $data['nama']?></td>
							<td class="text-center">
								<a type="button" class="btn btn-info btn-icon btn-sm" data-toggle="modal" data-target="#Edit<?php echo $data['id_jurusan']?>" title="edit"><i class="fa fa-pencil fa-lg"></i></a>
								<a type="button" class="btn btn-danger btn-icon btn-sm" data-toggle="modal" data-target="#Del<?php echo $data['id_jurusan']?>" title="delete"><i class="fa fa-trash-o fa-lg"></i></a>
							</td>
						</tr>
						<!-- #modal-dialog -->
						<div id="Edit<?php echo $data['id_jurusan']?>" class="modal fade" role="dialog">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
										<h4 class="modal-title"><i class="ion-ios-gear text-danger"></i> Edit Data Jurusan</h4>
									</div>
									<div class="col-sm-12">
										<div class="modal-body">
											<form action="index.php?page=edit-jurusan&id_jurusan=<?php echo $data['id_jurusan']?>" class="form-horizontal" method="POST" enctype="multipart/form-data">
												<div class="form-group col-sm-12">
													<label class="col-md-3 control-label">Nama Jurusan</label>
													<div class="col-md-8">
														<input type="text" name="nama" maxlength="128" value="<?=$data['nama']?>" class="form-control" required />
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
														<button type="submit" name="edit" value="edit" class="btn btn-danger"><i class="fa fa-edit"></i>&nbsp;Edit</button>&nbsp;
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
						<div id="Del<?php echo $data['id_jurusan']?>" class="modal fade" role="dialog">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title"><span class="label label-inverse"> # Delete</span> &nbsp; Are you sure you want to delete <u><?php echo $data['nama']?></u> from Database?</h5>
									</div>
									<div class="modal-body" align="center">
										<a href="index.php?page=delete-jurusan&id_jurusan=<?=$data['id_jurusan']?>" class="btn btn-danger">&nbsp; &nbsp;YES&nbsp; &nbsp;</a>
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
				<h4 class="modal-title"><i class="ion-ios-gear text-danger"></i> Master Data Jurusan</h4>
			</div>
			<div class="col-sm-12">
				<div class="modal-body">
					<form action="index.php?page=master-jurusan" class="form-horizontal" method="POST" enctype="multipart/form-data">
						<div class="form-group">
							<label class="col-md-3 control-label">Nama Jurusan</label>
							<div class="col-md-8">
								<input type="text" name="nama" maxlength="128" class="form-control" required />
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