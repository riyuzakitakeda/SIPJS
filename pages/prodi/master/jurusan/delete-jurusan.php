<div class="row">
<?php
include "../../config/koneksi.php";
if (isset($_GET['id_jurusan'])) {
	$id_jurusan = $_GET['id_jurusan'];
	
	$query   =mysqli_query($gathuk, "SELECT * FROM tb_jurusan WHERE id_jurusan='$id_jurusan'");
	$data    =mysqli_fetch_array($query);
	}
	else {
		die ("Error. No ID Selected! ");	
	}
	
	if (!empty($id_jurusan) && $id_jurusan != "") {
		$delete		=mysqli_query($gathuk, "DELETE FROM tb_jurusan WHERE id_jurusan='$id_jurusan'");
			if($delete){
				$_SESSION['pesan'] = "Good! Delete master jurusan success ...";
				header("location:index.php?page=form-view-data-jurusan");
			}
			else {
				echo "<div class='register-logo'><b>Oops!</b> 404 Error Server.</div>";
			}
	}
	mysqli_close($gathuk);
?>
</div>