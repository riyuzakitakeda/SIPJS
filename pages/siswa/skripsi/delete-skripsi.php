<div class="row">
<?php
include "../../config/koneksi.php";
if (isset($_GET['id_skripsi'])) {
	$id_skripsi = $_GET['id_skripsi'];
	
	$query   =mysqli_query($gathuk, "SELECT * FROM tb_skripsi WHERE id_skripsi='$id_skripsi'");
	$data    =mysqli_fetch_array($query);
	}
	else {
		die ("Error. No ID Selected! ");	
	}
	
	if (!empty($id_skripsi) && $id_skripsi != "") {
		$delete		=mysqli_query($gathuk, "DELETE FROM tb_skripsi WHERE id_skripsi='$id_skripsi'");
		
			if($delete){
				unlink("../../assets/berkas/$data[file_proposal]");
				unlink("../../assets/berkas/$data[file_jurnal]");
				
				$_SESSION['pesan'] = "icon:'success', title:'Good ...!', text:'Delete pengajuan judul skripsi $id_skripsi success.', showConfirmButton:true, width:450, padding:'3em', timer: 17000, timerProgressBar:true";
				header("location:index.php?page=form-view-data-skripsi");
			}
			else {
				echo "<div class='register-logo'><b>Oops!</b> 404 Error Server.</div>";
			}
	}
	mysqli_close($gathuk);
?>
</div>