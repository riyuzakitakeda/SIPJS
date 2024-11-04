<div class="row">
<?php
	if ($_POST['save'] == "save") {
	$npm	=$_POST['npm'];
	$nama	=addslashes($_POST['nama']);
	$jurusan	=addslashes($_POST['jurusan']);
	
	include "../../config/koneksi.php";
	$cekno	=mysqli_num_rows (mysqli_query($gathuk, "SELECT npm FROM tb_siswa WHERE npm='$_POST[npm]'"));
	
	$cekno1	=mysqli_num_rows (mysqli_query($gathuk, "SELECT nidn FROM tb_dosen WHERE nidn='$_POST[npm]'"));
	
		if (empty($_POST['npm']) || empty($_POST['nama']) || empty($_POST['jurusan'])) {
			$_SESSION['pesan'] = "Error! Mohon untuk mengisi semua field";
			header("location:index.php?page=form-view-data-siswa");
		}
		else if($cekno > 0) {
			$_SESSION['pesan'] = "Error! NPM sudah ada";
			header("location:index.php?page=form-view-data-siswa");
		}
		else if($cekno1 > 0) {
			$_SESSION['pesan'] = "Error! Duplikat NPM vs NIDN";
			header("location:index.php?page=form-view-data-siswa");
		}
		
		else{
		$insert =mysqli_query($gathuk, "INSERT INTO tb_siswa (npm, nama, jurusan) VALUES ('$npm', '$nama', '$jurusan')");
		
			if($insert){
				$_SESSION['pesan'] = "Good! Insert data siswa success ...";
				header("location:index.php?page=form-view-data-siswa");
			}
			else {
				echo "<div class='register-logo'><b>Oops!</b> 404 Error Server.</div>";
			}
		}
	}
?>
</div>