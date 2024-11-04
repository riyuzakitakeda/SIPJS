<div class="row">
<?php
include "../../config/koneksi.php";
if (isset($_GET['id_dosen'])) {
	$id_dosen = $_GET['id_dosen'];
	
	$query   =mysqli_query($gathuk, "SELECT * FROM tb_dosen WHERE id_dosen='$id_dosen'");
	$data    =mysqli_fetch_array($query);
	}
	else {
		die ("Error. No ID Selected! ");	
	}
	
	if (!empty($id_dosen) && $id_dosen != "") {
		$delete		=mysqli_query($gathuk, "DELETE FROM tb_dosen WHERE id_dosen='$id_dosen'");
		$delusr		=mysqli_query($gathuk, "DELETE FROM tb_user WHERE id_dosen='$id_dosen'");
			if($delete){
				$_SESSION['pesan'] = "Hapus data dosen berhasil";
				header("location:index.php?page=form-view-data-dosen");
			}
			else {
				echo "<div class='register-logo'><b>Oops!</b> 404 Error Server.</div>";
			}
	}
	mysqli_close($gathuk);
?>
</div>