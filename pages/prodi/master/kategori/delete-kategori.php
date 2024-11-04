<div class="row">
<?php
include "../../config/koneksi.php";
if (isset($_GET['id_kategori'])) {
	$id_kategori = $_GET['id_kategori'];
	
	$query   =mysqli_query($gathuk, "SELECT * FROM tb_kategori WHERE id_kategori='$id_kategori'");
	$data    =mysqli_fetch_array($query);
	}
	else {
		die ("Error. No ID Selected! ");	
	}
	
	if (!empty($id_kategori) && $id_kategori != "") {
		$delete		=mysqli_query($gathuk, "DELETE FROM tb_kategori WHERE id_kategori='$id_kategori'");
			if($delete){
				$_SESSION['pesan'] = "Good! Delete master kategori success ...";
				header("location:index.php?page=form-view-data-kategori");
			}
			else {
				echo "<div class='register-logo'><b>Oops!</b> 404 Error Server.</div>";
			}
	}
	mysqli_close($gathuk);
?>
</div>