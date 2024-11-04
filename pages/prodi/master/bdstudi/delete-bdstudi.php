<div class="row">
<?php
include "../../config/koneksi.php";
if (isset($_GET['id_bdstudi'])) {
	$id_bdstudi = $_GET['id_bdstudi'];
	
	$query   =mysqli_query($gathuk, "SELECT * FROM tb_bdstudi WHERE id_bdstudi='$id_bdstudi'");
	$data    =mysqli_fetch_array($query);
	}
	else {
		die ("Error. No ID Selected! ");	
	}
	
	if (!empty($id_bdstudi) && $id_bdstudi != "") {
		$delete		=mysqli_query($gathuk, "DELETE FROM tb_bdstudi WHERE id_bdstudi='$id_bdstudi'");
			if($delete){
				$_SESSION['pesan'] = "Good! Delete master bidang studi success ...";
				header("location:index.php?page=form-view-data-bdstudi");
			}
			else {
				echo "<div class='register-logo'><b>Oops!</b> 404 Error Server.</div>";
			}
	}
	mysqli_close($gathuk);
?>
</div>