<div class="row">
<?php
	if (isset($_GET['id_kategori'])) {
		$id_kategori = $_GET['id_kategori'];
	}
	else {
		die ("Error. No Kode Selected! ");	
	}
	include "../../config/koneksi.php";
	$query	= mysqli_query($gathuk, "SELECT * FROM tb_kategori WHERE id_kategori='$id_kategori'");
	$hasil	= mysqli_fetch_array ($query);
		$notnm	=$hasil['nama'];
				
	if ($_POST['edit'] == "edit") {
	$nama	=addslashes($_POST['nama']);
	
	$ceknm	=mysqli_num_rows (mysqli_query($gathuk, "SELECT nama FROM tb_kategori WHERE nama='$_POST[nama]' AND nama!='$notnm'"));
		
		if (empty($_POST['nama'])) {
			$_SESSION['pesan'] = "Oops! Please fill all column ...";
			header("location:index.php?page=form-view-data-kategori");
		}
		else if($ceknm > 0) {
			$_SESSION['pesan'] = "Oops! Duplikat nama ...";
			header("location:index.php?page=form-view-data-kategori");
		}
		
		else{
		$update= mysqli_query ($gathuk, "UPDATE tb_kategori SET nama='$nama' WHERE id_kategori='$id_kategori'");
			if($update){
				$_SESSION['pesan'] = "Good! Edit master kategori success ...";
				header("location:index.php?page=form-view-data-kategori");
			}
			else {
				echo "<div class='register-logo'><b>Oops!</b> 404 Error Server.</div>";
			}
		}
	}
?>
</div>