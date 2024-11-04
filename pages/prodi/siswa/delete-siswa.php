<div class="row">
<?php
include "../../config/koneksi.php";
if (isset($_GET['id_siswa'])) {
	$id_siswa = $_GET['id_siswa'];
	
	$query   =mysqli_query($gathuk, "SELECT * FROM tb_siswa WHERE id_siswa='$id_siswa'");
	$data    =mysqli_fetch_array($query);
	}
	else {
		die ("Error. No ID Selected! ");	
	}
	
	if (!empty($id_siswa) && $id_siswa != "") {
		$delete		=mysqli_query($gathuk, "DELETE FROM tb_siswa WHERE id_siswa='$id_siswa'");
		$delusr		=mysqli_query($gathuk, "DELETE FROM tb_user WHERE id_siswa='$id_siswa'");
			if($delete){
				$_SESSION['pesan'] = "Hapus data mahasiswa berhasil";
				header("location:index.php?page=form-view-data-siswa");
			}
			else {
				echo "<div class='register-logo'><b>Oops!</b> 404 Error Server.</div>";
			}
	}
	mysqli_close($gathuk);
?>
</div>