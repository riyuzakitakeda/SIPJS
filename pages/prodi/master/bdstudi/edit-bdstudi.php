<div class="row">
<?php
	if (isset($_GET['id_bdstudi'])) {
		$id_bdstudi = $_GET['id_bdstudi'];
	}
	else {
		die ("Error. No Kode Selected! ");	
	}
	include "../../config/koneksi.php";
	$query	= mysqli_query($gathuk, "SELECT * FROM tb_bdstudi WHERE id_bdstudi='$id_bdstudi'");
	$hasil	= mysqli_fetch_array ($query);
		$notnm	=$hasil['nama'];
				
	if ($_POST['edit'] == "edit") {
	$nama	=addslashes($_POST['nama']);
	
	$ceknm	=mysqli_num_rows (mysqli_query($gathuk, "SELECT nama FROM tb_bdstudi WHERE nama='$_POST[nama]' AND nama!='$notnm'"));
		
		if (empty($_POST['nama'])) {
			$_SESSION['pesan'] = "Oops! Please fill all column ...";
			header("location:index.php?page=form-view-data-bdstudi");
		}
		else if($ceknm > 0) {
			$_SESSION['pesan'] = "Oops! Duplikat nama ...";
			header("location:index.php?page=form-view-data-bdstudi");
		}
		
		else{
		$update= mysqli_query ($gathuk, "UPDATE tb_bdstudi SET nama='$nama' WHERE id_bdstudi='$id_bdstudi'");
			if($update){
				$_SESSION['pesan'] = "Good! Edit master bidang studi success ...";
				header("location:index.php?page=form-view-data-bdstudi");
			}
			else {
				echo "<div class='register-logo'><b>Oops!</b> 404 Error Server.</div>";
			}
		}
	}
?>
</div>