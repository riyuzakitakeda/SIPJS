<div class="row">
<?php
	if ($_POST['save'] == "save") {
	$nama	=addslashes($_POST['nama']);
	
	include "../../config/koneksi.php";
	$ceknm	=mysqli_num_rows (mysqli_query($gathuk, "SELECT nama FROM tb_kategori WHERE nama='$_POST[nama]'"));
	
		if (empty($_POST['nama'])) {
			$_SESSION['pesan'] = "Oops! Please fill all column ...";
			header("location:index.php?page=form-view-data-kategori");
		}
		else if($ceknm > 0) {
			$_SESSION['pesan'] = "Oops! Duplikat nama ...";
			header("location:index.php?page=form-view-data-kategori");
		}
		
		else{
		$insert =mysqli_query($gathuk, "INSERT INTO tb_kategori (nama) VALUES ('$nama')");
		
			if($insert){
				$_SESSION['pesan'] = "Good! Insert master kategori success ...";
				header("location:index.php?page=form-view-data-kategori");
			}
			else {
				echo "<div class='register-logo'><b>Oops!</b> 404 Error Server.</div>";
			}
		}
	}
?>
</div>