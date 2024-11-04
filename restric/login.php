<div class="row">
<?php
	include "config/koneksi.php";
	$id_user		= $_POST['id_user'];
	$password		= md5($_POST['password']);
	$op 			= $_GET['op'];

	if($op=="in"){
		$sql = mysqli_query($gathuk, "SELECT * FROM tb_user WHERE id_user='$id_user' AND password='$password'");
		if(mysqli_num_rows($sql)==1){
			$qry = mysqli_fetch_array($sql);
			$_SESSION['id_user']	= $qry['id_user'];
			$_SESSION['nama_user']	= $qry['nama_user'];
			$_SESSION['hak_akses']	= $qry['hak_akses'];
			
			if($qry['hak_akses']=="Prodi"){
				$_SESSION['pesan'] = "Login Berhasil!";
				header("location:pages/prodi/");
			}
			else if($qry['hak_akses']=="Siswa"){
				$_SESSION['pesan'] = "Login Berhasil!";
				header("location:pages/siswa/");
			}
			else if($qry['hak_akses']=="Dosen"){
				$_SESSION['pesan'] = "Login Berhasil!";
				header("location:pages/dosen/");
			}
		}
		else{
			$_SESSION['pesan'] = "Login Gagal! Username & password tidak sesuai";
			header("location:./");
		}
	}
	else if($op=="out"){
		unset($_SESSION['id_user']);
		unset($_SESSION['hak_akses']);
		header("location:./");
	}
?>
</div>