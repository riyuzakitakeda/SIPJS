<div class="row">
<?php
	if (isset($_GET['id_siswa'])) {
		$id_siswa = $_GET['id_siswa'];
	}
	else {
		die ("Error. No Kode Selected! ");	
	}
	include "../../config/koneksi.php";
	$query	= mysqli_query($gathuk, "SELECT * FROM tb_siswa WHERE id_siswa='$id_siswa'");
	$hasil	= mysqli_fetch_array ($query);
		$notno	=$hasil['npm'];
				
	if ($_POST['edit'] == "edit") {
	$npm	=$_POST['npm'];
	$nama	=addslashes($_POST['nama']);
	$jurusan	=addslashes($_POST['jurusan']);
	
	$cekno	=mysqli_num_rows (mysqli_query($gathuk, "SELECT npm FROM tb_siswa WHERE npm='$_POST[npm]' AND npm!='$notno'"));
	
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
		$update= mysqli_query ($gathuk, "UPDATE tb_siswa SET npm='$npm',nama='$nama', jurusan='$jurusan' WHERE id_siswa='$id_siswa'");
		
		$updateusr= mysqli_query ($gathuk, "UPDATE tb_user SET id_user='$npm',nama_user='$nama' WHERE id_siswa='$id_siswa'");
		
			if($update){
				$_SESSION['pesan'] = "Edit data mahasiswa berhasil";
				header("location:index.php?page=form-view-data-siswa");
			}
			else {
				echo "<div class='register-logo'><b>Oops!</b> 404 Error Server.</div>";
			}
		}
	}
?>
</div>