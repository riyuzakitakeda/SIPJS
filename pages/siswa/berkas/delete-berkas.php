<div class="row">
<?php
include "../../config/koneksi.php";
if (isset($_GET['id_berkas'])) {
	$id_berkas = $_GET['id_berkas'];
	
	$query   =mysqli_query($gathuk, "SELECT * FROM tb_berkas WHERE id_berkas='$id_berkas'");
	$data    =mysqli_fetch_array($query);
	}
	else {
		die ("Error. No ID Selected! ");	
	}
	
	if (!empty($id_berkas) && $id_berkas != "") {
		$delete		=mysqli_query($gathuk, "DELETE FROM tb_berkas WHERE id_berkas='$id_berkas'");
		
			if($delete){
				unlink("../../assets/berkas/$data[file_ktm]");
				unlink("../../assets/berkas/$data[file_bayar]");
				unlink("../../assets/berkas/$data[file_proposal]");
				unlink("../../assets/berkas/$data[file_jurnal]");
				unlink("../../assets/berkas/$data[file_krs]");
				
				$_SESSION['pesan'] = "Good! Delete berkas $id_berkas success ...";
				header("location:index.php?page=form-view-data-berkas");
			}
			else {
				echo "<div class='register-logo'><b>Oops!</b> 404 Error Server.</div>";
			}
	}
	mysqli_close($gathuk);
?>
</div>