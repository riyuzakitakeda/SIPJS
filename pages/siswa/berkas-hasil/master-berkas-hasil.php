<div class="row">
<?php
	if (isset($_GET['id_siswa'])) {
		$id_siswa = $_GET['id_siswa'];
	}
	else {
		die ("Error. No Kode Selected! ");	
	}
	
	if ($_POST['save'] == "save") {
		$tgl	=date("Y-m-d");
	
		include "../../config/koneksi.php";
		$insert =mysqli_query($gathuk, "INSERT INTO tb_berkas_hasil (id_siswa, tgl) VALUES ('$id_siswa', '$tgl')");
		
		if($insert){
			$_SESSION['pesan'] = "Good! Buat folder berkas hasil persyaratan success ...";
			header("location:index.php?page=form-view-data-berkas-hasil");
		}
		else {
			echo "<div class='register-logo'><b>Oops!</b> 404 Error Server.</div>";
		}
	}
?>
</div>