<div class="row">
<?php
	if (isset($_GET['id_dosen'])) {
		$id_dosen = $_GET['id_dosen'];
	}
	else {
		die ("Error. No Kode Selected! ");	
	}
	include "../../config/koneksi.php";
	$query	= mysqli_query($gathuk, "SELECT * FROM tb_dosen WHERE id_dosen='$id_dosen'");
	$hasil	= mysqli_fetch_array ($query);
		$notno	=$hasil['nidn'];
				
	if ($_POST['edit'] == "edit") {
	$nidn	=$_POST['nidn'];
	$nama	=addslashes($_POST['nama']);
	$bdstudi	=addslashes($_POST['bdstudi']);
	
	$cekno	=mysqli_num_rows (mysqli_query($gathuk, "SELECT nidn FROM tb_dosen WHERE nidn='$_POST[nidn]' AND nidn!='$notno'"));
	
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
		$update= mysqli_query ($gathuk, "UPDATE tb_dosen SET nidn='$nidn',nama='$nama', bdstudi='$bdstudi' WHERE id_dosen='$id_dosen'");
		
		$updateusr= mysqli_query ($gathuk, "UPDATE tb_user SET id_user='$nidn',nama_user='$nama' WHERE id_dosen='$id_dosen'");
		
			if($update){
				$_SESSION['pesan'] = "Ubah data dosen berhasil";
				header("location:index.php?page=form-view-data-dosen");
			}
			else {
				echo "<div class='register-logo'><b>Oops!</b> 404 Error Server.</div>";
			}
		}
	}
?>
</div>