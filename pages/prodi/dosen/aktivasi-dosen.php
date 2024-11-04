<div class="row">
<?php
	if (isset($_GET['id_dosen'])) {
		$id_dosen = $_GET['id_dosen'];
	}
	else {
		die ("Error. No Kode Selected! ");	
	}
	
	$password	=md5("123");
	$hak_akses	="Dosen";
	
	include "../../config/koneksi.php";
	$query	= mysqli_query($gathuk, "SELECT * FROM tb_dosen WHERE id_dosen='$id_dosen'");
	$data	= mysqli_fetch_array ($query);
	$nama_user	=addslashes($data['nama']);
				
	$aktivasi =mysqli_query($gathuk, "INSERT INTO tb_user (id_user, nama_user, password, hak_akses, id_dosen) VALUES ('$data[nidn]', '$nama_user', '$password', '$hak_akses', '$id_dosen')");
	if($aktivasi){
		$_SESSION['pesan'] = "Aktivasi login dosen $data[nidn] berhasil";
		header("location:index.php?page=form-view-data-dosen");
	}
	else {
		echo "<div class='register-logo'><b>Oops!</b> 404 Error Server.</div>";
	}	
?>
</div>