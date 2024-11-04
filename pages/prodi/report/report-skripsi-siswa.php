<!-- begin breadcrumb -->
<ol class="breadcrumb pull-right">
	<li><a href="../../pages/prodi/report/print-report-skripsi-siswa.php" target="_blank" class="btn btn-sm btn-danger m-b-10" title="Cetak PDF"><i class="fa fa-print"></i> &nbsp;Cetak</a></li>
</ol>
<!-- end breadcrumb -->
<!-- begin page-header -->
<h1 class="page-header">Report <small>Pengajuan Skripsi Siswa</small></h1>
<!-- end page-header -->
<div class="row">
	<div class="col-md-12">
	<!-- begin profile-section -->
	<div class="panel panel-default" data-sortable-id="form-stuff-1">
		<div class="panel-body">
				<table id="data-table" class="table table-striped table-bordered nowrap" width="100%">
					<thead>
						<tr>
							<th width="4%">No</th>
							<th>NPM</th>
							<th>Nama Siswa</th>
							<th>Kategori</th>
							<th>Topik</th>
							<th>Judul</th>
						</tr>
					</thead>
					<tbody>
						<?php
							include "../../config/koneksi.php";
							$no=0;
							$query	=mysqli_query($gathuk, "SELECT * FROM tb_skripsi ORDER BY tgl DESC");
							while($data	=mysqli_fetch_array($query)){
							$no++
						?>
						<tr>
							<td><?php echo $no?></td>
							<td><?php $tamSis	=mysqli_query($gathuk, "SELECT * FROM tb_siswa WHERE id_siswa='$data[id_siswa]'");
									$tsis	=mysqli_fetch_array($tamSis);
									echo $tsis['npm'];
								?>
							</td>
							<td><?php echo $tsis['nama'];?></a></td>
							<td><?php echo $data['kategori'];?></a></td>
							<td><?php echo $data['topik']?></td>
							<td><?php echo $data['judul']?></td>
						</tr>
						<?php
							}
						?>
					</tbody>
				</table>
		</div>
	</div>
	<!-- end profile-section -->
	</div>
</div>