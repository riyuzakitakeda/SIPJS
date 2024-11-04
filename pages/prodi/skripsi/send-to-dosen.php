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
				
	if ($_POST['edit'] == "edit") {
	$id_dosen	=$_POST['id_dosen'];
	$id_dosen2	=$_POST['id_dosen2'];
	
		if (empty($_POST['id_dosen'])) {
			$_SESSION['pesan'] = "Oops! Please fill all column ...";
			header("location:index.php?page=form-view-data-skripsi");
		}
		
		else{
		$update= mysqli_query ($gathuk, "UPDATE tb_skripsi SET id_dosen='$id_dosen', id_dosen2='$id_dosen2' WHERE id_skripsi='$id_skripsi'");
			if($update){
				$_SESSION['pesan'] = "Berhasil! Dosen pembimbing telah diajukan";
				header("location:index.php?page=form-view-data-skripsi");
			}
			else {
				echo "<div class='register-logo'><b>Oops!</b> 404 Error Server.</div>";
			}
		}
	}
?>
</div>