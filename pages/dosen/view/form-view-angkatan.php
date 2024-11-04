<!-- begin page-header -->
<h1 class="page-header">Data <small>Judul Skripsi <i class="fa fa-angle-right"></i>&nbsp;By Tahun Angkatan</small></h1>
<!-- end page-header -->
<div class="profile-container">
	<!-- begin profile-section -->
	<div class="profile-section">
		<div class="panel-body">
			<form action="index.php?page=form-view-angkatan" class="form-horizontal" method="POST" enctype="multipart/form-data" >
				<div class="form-group">
					<label class="col-md-3 control-label">Pilih Tahun</label>
					<div class="col-md-4">
						<?php
							include "../../config/koneksi.php";
							echo '<select name="angkatan" class="default-select2 form-control" style="width:100%" required>';
								echo '<option value="">...</option>';    
								for($i=date("Y"); $i>=date("Y")-32;$i-=1){
									echo"<option value='$i'>$i</option>";
								}   
							echo '</select>';
						?>
					</div>
					<div class="col-md-3">
						<button type="submit" name="report" value="report" class="btn btn-danger"><i class="fa fa-search"></i>&nbsp;View</button> &nbsp;
						<a type="button" href="index.php?page=form-view-angkatan" class="btn btn-success"><i class="fa fa-refresh"></i>&nbsp;Refresh</a>
					</div>
				</div>
			</form>
		</div>
	</div>
	<!-- end profile-section -->
	<?php
	if (isset($_POST['report'])) {
		$angkatan	=$_POST['angkatan'];
		
		$query	=mysqli_query($gathuk, "SELECT * FROM tb_skripsi WHERE angkatan='$angkatan' ORDER BY tgl DESC");
		
		echo'
		<hr />
		<p>&nbsp;Menampilkan <u>'.mysqli_num_rows($query).'</u> data dengan tahun angkatan <b>'.$angkatan.'</b></p>
		<div class="row">
			<div class="panel-body">
				<table id="data-table" class="table table-striped table-bordered nowrap" width="100%">
					<thead>
						<tr>
							<th width="4%">No</th>
							<th>NPM</th>
							<th>Siswa</th>
							<th>Kategori</th>
							<th>Topik</th>
							<th>Judul</th>
						</tr>
					</thead>
					<tbody>';
							$no=0;
							while($data	=mysqli_fetch_array($query)){
							
							$tamSis	=mysqli_query($gathuk, "SELECT * FROM tb_siswa WHERE id_siswa='$data[id_siswa]'");
							$tsis	=mysqli_fetch_array($tamSis);
							$no++;
						echo'<tr>
							<td>'.$no.'</td>
							<td>'.$tsis['npm'].'</td>
							<td>'.$tsis['nama'].'</td>
							<td>'.$data['kategori'].'</td>
							<td>'.$data['topik'].'</td>
							<td>'.$data['judul'].'</td>
						</tr>';
							}
					echo'</tbody>
				</table>
			</div>
		</div>';
	}
	?>
</div>

<script> // 500 = 0,5 s
	$(document).ready(function(){setTimeout(function(){$(".pesan").fadeIn('slow');}, 500);});
	setTimeout(function(){$(".pesan").fadeOut('slow');}, 7000);
</script>