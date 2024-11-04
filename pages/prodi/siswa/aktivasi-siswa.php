<div class="row">
<?php
	if (isset($_GET['id_siswa'])) {
		$id_siswa = $_GET['id_siswa'];
	}
	else {
		die ("Error. No Kode Selected! ");	
	}
	
	$password	=md5("123");
	$hak_akses	="Siswa";
	
	include "../../config/koneksi.php";
	$query	= mysqli_query($gathuk, "SELECT * FROM tb_siswa WHERE id_siswa='$id_siswa'");
	$data	= mysqli_fetch_array ($query);
	$nama_user	=addslashes($data['nama']);
	
	$aktivasi =mysqli_query($gathuk, "INSERT INTO tb_user (id_user, nama_user, password, hak_akses, id_siswa) VALUES ('$data[npm]', '$nama_user', '$password', '$hak_akses', '$id_siswa')");
	if($aktivasi){
		$_SESSION['pesan'] = "Aktivasi login mahasiswa $data[npm] berhasil";
		header("location:index.php?page=form-view-data-siswa");
	}
	else {
		echo "<div class='register-logo'><b>Oops!</b> 404 Error Server.</div>";
	}	
?>
</div>