<div class="row">
<?php
	if (isset($_GET['id_siswa'])) {
		$id_siswa = $_GET['id_siswa'];
	}
	else {
		die ("Error. No Kode Selected! ");	
	}
	
	if ($_POST['save'] == "save") {
		$kategori	=addslashes($_POST['kategori']);
		$topik		=addslashes($_POST['topik']);
		$judul		=addslashes($_POST['judul']);
		$angkatan	=$_POST['angkatan'];
		
		$tgl	=date("Y-m-d");
		$array_kata	=explode (" ", $judul);
	
		include "../../config/koneksi.php";
		//$cekjudul1	=mysqli_num_rows (mysqli_query($gathuk, "SELECT judul FROM tb_skripsi WHERE judul='$_POST[judul]'"));
		//$cekjudul2	=mysqli_num_rows (mysqli_query($gathuk, "SELECT judul FROM tb_skripsi WHERE judul LIKE '%$array_kata[4]%'"));
		
		if (empty($_POST['kategori']) || empty($_POST['topik']) || empty($_POST['judul'])) {
			$_SESSION['pesan'] = "icon:'error', title:'Oops ...!', text:'Please fill all column.', showConfirmButton:true, width:450, padding:'3em', timer: 17000, timerProgressBar:true";
			header("location:index.php?page=form-view-data-skripsi");
		}
		else if(empty($array_kata[3])) {
			$_SESSION['pesan'] = "icon:'error', title:'Oops ...!', text:'Judul terlalu pendek! Minimal 4 suku kata.', showConfirmButton:true, width:450, padding:'3em', timer: 17000, timerProgressBar:true";
			header("location:index.php?page=form-view-data-skripsi");
		}
		else if($cekjudul1 > 0) {
			$_SESSION['pesan'] = "icon:'error', title:'Oops ...!', text:'Judul yang Anda ajukan sudah terdapat di dalam Database. Silahkan pilih judul lainnya.', showConfirmButton:true, width:450, padding:'3em', timer: 17000, timerProgressBar:true";
			header("location:index.php?page=form-view-data-skripsi");
		}
		
		else if($cekjudul2 > 0) {
			$insert1 =mysqli_query($gathuk, "INSERT INTO tb_skripsi (id_siswa, tgl, kategori, topik, judul, angkatan) VALUES ('$id_siswa', '$tgl', '$kategori', '$topik', '$judul', '$angkatan')");
			
			if($insert1){
				$_SESSION['pesan'] = "icon:'warning', title:'Perhatian ...!', text:'Judul hampir sama dengan judul yang telah diajukan oleh Siswa lain. Tetapi judul tetap terkirim.', showConfirmButton:true, width:450, padding:'3em', timer: 17000, timerProgressBar:true";
				header("location:index.php?page=form-view-data-skripsi");
			}
			else {
				echo "<div class='register-logo'><b>Oops!</b> 404 Error Server.</div>";
			}
		}
		
		else{
			$insert2 =mysqli_query($gathuk, "INSERT INTO tb_skripsi (id_siswa, tgl, kategori, topik, judul, angkatan) VALUES ('$id_siswa', '$tgl', '$kategori', '$topik', '$judul', '$angkatan')");
			
			if($insert2){
				$_SESSION['pesan'] = "icon:'success', title:'Good ...!', text:'Pengajuan judul skripsi telah terkirim.', showConfirmButton:true, width:450, padding:'3em', timer: 17000, timerProgressBar:true";
				header("location:index.php?page=form-view-data-skripsi");
			}
			else {
				echo "<div class='register-logo'><b>Oops!</b> 404 Error Server.</div>";
			}
		}
	}
?>
</div>