<div class="row">
<?php
	if ($_POST['save'] == "save") {
	$nidn	=$_POST['nidn'];
	$nama	=addslashes($_POST['nama']);
	$bdstudi	=addslashes($_POST['bdstudi']);
	
	include "../../config/koneksi.php";
	$cekno	=mysqli_num_rows (mysqli_query($gathuk, "SELECT nidn FROM tb_dosen WHERE nidn='$_POST[nidn]'"));
	
	$cekno1	=mysqli_num_rows (mysqli_query($gathuk, "SELECT npm FROM tb_siswa WHERE npm='$_POST[nidn]'"));
	
		if (empty($_POST['nidn']) || empty($_POST['nama']) || empty($_POST['bdstudi'])) {
			$_SESSION['pesan'] = "Error! Mohon untuk mengisi semua field";
			header("location:index.php?page=form-view-data-dosen");
		}
		else if($cekno > 0) {
			$_SESSION['pesan'] = "Error! NIDN sudah ada";
			header("location:index.php?page=form-view-data-dosen");
		}
		else if($cekno1 > 0) {
			$_SESSION['pesan'] = "Error! Duplikat NPM vs NIDN";
			header("location:index.php?page=form-view-data-dosen");
		}
		
		else{
		$insert =mysqli_query($gathuk, "INSERT INTO tb_dosen (nidn, nama, bdstudi) VALUES ('$nidn', '$nama', '$bdstudi')");
		
			if($insert){
				$_SESSION['pesan'] = "Tambah data dosen berhasil";
				header("location:index.php?page=form-view-data-dosen");
			}
			else {
				echo "<div class='register-logo'><b>Oops!</b> 404 Error Server.</div>";
			}
		}
	}
?>
</div>