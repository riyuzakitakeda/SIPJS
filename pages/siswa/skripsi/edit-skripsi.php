<div class="row">
<?php
	if (isset($_GET['id_skripsi'])) {
		$id_skripsi = $_GET['id_skripsi'];
	}
	else {
		die ("Error. No Kode Selected! ");	
	}
	include "../../config/koneksi.php";
	$query	= mysqli_query($gathuk, "SELECT * FROM tb_skripsi WHERE id_skripsi='$id_skripsi'");
	$hasil	= mysqli_fetch_array ($query);
		$notjd	=$hasil['judul'];
				
	if ($_POST['edit'] == "edit") {
		$kategori	=addslashes($_POST['kategori']);
		$topik		=addslashes($_POST['topik']);
		$judul		=addslashes($_POST['judul']);
		$angkatan	=$_POST['angkatan'];
		
		$array_kata	=explode (" ", $judul);
			
		$cekjudul1	=mysqli_num_rows (mysqli_query($gathuk, "SELECT judul FROM tb_skripsi WHERE judul='$_POST[judul]' AND judul!='$notjd'"));
		$cekjudul2	=mysqli_num_rows (mysqli_query($gathuk, "SELECT judul FROM tb_skripsi WHERE judul LIKE '%$array_kata[4]%' AND judul!='$notjd'"));
	
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
			$update1= mysqli_query ($gathuk, "UPDATE tb_skripsi SET kategori='$kategori', topik='$topik', judul='$judul', angkatan='$angkatan' WHERE id_skripsi='$id_skripsi'");
			
			if($update1){
				$_SESSION['pesan'] = "icon:'warning', title:'Perhatian ...!', text:'Judul hampir sama dengan judul yang telah diajukan oleh Siswa lain. Tetapi edit judul tetap terkirim.', showConfirmButton:true, width:450, padding:'3em', timer: 17000, timerProgressBar:true";
				header("location:index.php?page=form-view-data-skripsi");
			}
			else {
				echo "<div class='register-logo'><b>Oops!</b> 404 Error Server.</div>";
			}
		}
		
		else{
		$update2= mysqli_query ($gathuk, "UPDATE tb_skripsi SET kategori='$kategori', topik='$topik', judul='$judul', angkatan='$angkatan' WHERE id_skripsi='$id_skripsi'");
		
			if($update2){
				$_SESSION['pesan'] = "icon:'success', title:'Good ...!', text:'Edit pengajuan judul skripsi telah terkirim.', showConfirmButton:true, width:450, padding:'3em', timer: 17000, timerProgressBar:true";
				header("location:index.php?page=form-view-data-skripsi");
			}
			else {
				echo "<div class='register-logo'><b>Oops!</b> 404 Error Server.</div>";
			}
		}
	}
?>
</div>