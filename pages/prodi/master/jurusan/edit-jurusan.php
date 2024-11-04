<div class="row">
<?php
	if (isset($_GET['id_jurusan'])) {
		$id_jurusan = $_GET['id_jurusan'];
	}
	else {
		die ("Error. No Kode Selected! ");	
	}
	include "../../config/koneksi.php";
	$query	= mysqli_query($gathuk, "SELECT * FROM tb_jurusan WHERE id_jurusan='$id_jurusan'");
	$hasil	= mysqli_fetch_array ($query);
		$notnm	=$hasil['nama'];
				
	if ($_POST['edit'] == "edit") {
	$nama	=addslashes($_POST['nama']);
	
	$ceknm	=mysqli_num_rows (mysqli_query($gathuk, "SELECT nama FROM tb_jurusan WHERE nama='$_POST[nama]' AND nama!='$notnm'"));
		
		if (empty($_POST['nama'])) {
			$_SESSION['pesan'] = "Oops! Please fill all column ...";
			header("location:index.php?page=form-view-data-jurusan");
		}
		else if($ceknm > 0) {
			$_SESSION['pesan'] = "Oops! Duplikat nama ...";
			header("location:index.php?page=form-view-data-jurusan");
		}
		
		else{
		$update= mysqli_query ($gathuk, "UPDATE tb_jurusan SET nama='$nama' WHERE id_jurusan='$id_jurusan'");
			if($update){
				$_SESSION['pesan'] = "Good! Edit master jurusan success ...";
				header("location:index.php?page=form-view-data-jurusan");
			}
			else {
				echo "<div class='register-logo'><b>Oops!</b> 404 Error Server.</div>";
			}
		}
	}
?>
</div>