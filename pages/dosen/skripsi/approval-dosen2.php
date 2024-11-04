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
	$approve_dosen2	=$_POST['approve_dosen2'];
	$catatan_dosen2	=addslashes($_POST['catatan_dosen2']);
	
		if (empty($_POST['approve_dosen2'])) {
			$_SESSION['pesan'] = "Oops! Please fill all column ...";
			header("location:index.php?page=form-view-data-skripsi");
		}
		
		else{
		$update= mysqli_query ($gathuk, "UPDATE tb_skripsi SET approve_dosen2='$approve_dosen2', catatan_dosen2='$catatan_dosen2' WHERE id_skripsi='$id_skripsi'");
			if($update){
				$_SESSION['pesan'] = "Good! Approval pengajuan judul skripsi success ...";
				header("location:index.php?page=form-view-data-skripsi2");
			}
			else {
				echo "<div class='register-logo'><b>Oops!</b> 404 Error Server.</div>";
			}
		}
	}
?>
</div>