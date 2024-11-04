<div class="row">
<?php
	if (isset($_GET['id_setup'])) {
	$id_setup = $_GET['id_setup'];
	}
	else {
		die ("Error. No Kode Selected! ");	
	}
	include "../../config/koneksi.php";
	$setup	= mysqli_query($gathuk, "SELECT * FROM tb_setup WHERE id_setup='$id_setup'");
	$hasil	= mysqli_fetch_array ($setup);
				
	if ($_POST['setup'] == "setup") {
	$universitas	=addslashes($_POST['universitas']);
	$kabkota	=$_POST['kabkota'];
	$nama_kabkota	=addslashes($_POST['nama_kabkota']);
	$alamat		=addslashes($_POST['alamat']);
	$telp		=$_POST['telp'];
	$web_url	=$_POST['web_url'];
	$email		=$_POST['email'];
	
		if (empty($_POST['universitas']) || empty($_POST['alamat']) || empty($_POST['nama_kabkota'])) {
			$_SESSION['pesan'] = "Oops! Please fill all column ...";
			header("location:index.php?page=form-setup-universitas&id_setup=$id_setup");
		}
		else{
		$update= mysqli_query ($gathuk, "UPDATE tb_setup SET universitas='$universitas', kabkota='$kabkota', nama_kabkota='$nama_kabkota', alamat='$alamat', telp='$telp', web_url='$web_url', email='$email' WHERE id_setup='$id_setup'");
			if($update){
				$_SESSION['pesan'] = "Good! setup universitas success ...";
				header("location:index.php?page=form-view-setup-universitas");
			}
			else {
				echo "<div class='register-logo'><b>Oops!</b> 404 Error Server.</div>";
			}
		}
	}
?>
</div>