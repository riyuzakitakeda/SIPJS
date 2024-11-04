<!-- begin page-header -->
<h1 class="page-header">Data <small>Siswa Dibimbing&nbsp;</small></h1>
<!-- end page-header -->
<div class="profile-container">
	<div class="row">
			<div class="panel-body">
				<table id="data-table" class="table table-striped table-bordered nowrap" width="100%">
					<thead>
						<tr>
							<th width="4%">No</th>
							<th>NPM</th>
							<th>Siswa</th>
							<th>Jurusan</th>
							<th>Judul Skripsi</th>
						</tr>
					</thead>
					<tbody>
							<?php
							include "../../config/koneksi.php";
							$selDsn	=mysqli_query($gathuk, "SELECT * FROM tb_dosen WHERE nidn='$_SESSION[id_user]'");
							$sdsn	=mysqli_fetch_array($selDsn);
							$id_dosen	=$sdsn['id_dosen'];
	
							$query	=mysqli_query($gathuk, "SELECT * FROM tb_skripsi WHERE id_dosen='$id_dosen' AND (approve_dosen='Y' OR approve_dosen='R') ORDER BY tgl DESC");
							$no=0;
							while($data	=mysqli_fetch_array($query)){
							
							$tamSis	=mysqli_query($gathuk, "SELECT * FROM tb_siswa WHERE id_siswa='$data[id_siswa]'");
							$tsis	=mysqli_fetch_array($tamSis);
							$no++;
							?>
						<tr>
							<td><?php echo $no?></td>
							<td><?php echo $tsis['npm']?></td>
							<td><?php echo $tsis['nama']?></td>
							<td><?php echo $tsis['jurusan']?></td>
							<td><?php echo $data['judul']?></td>
						</tr>
							<?php
							}
							?>
					</tbody>
				</table>
			</div>
	</div>
</div>