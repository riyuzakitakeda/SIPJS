<div class="row">
<?php
	if (isset($_GET['id_user'])) {
		$id_user = $_GET['id_user'];
	}
	else {
		die ("Error. No Kode Selected! ");	
	}
	
	$password	=md5("123");
	
	include "../../config/koneksi.php";
	$query	= mysqli_query($gathuk, "SELECT * FROM tb_user WHERE id_user='$id_user'");
	$hasil	= mysqli_fetch_array ($query);
				
	$reset= mysqli_query ($gathuk, "UPDATE tb_user SET password='$password' WHERE id_user='$id_user'");
	if($reset){
		$_SESSION['pesan'] = "Good! Reset password $hasil[id_user] success ...";
		header("location:index.php?page=form-view-data-user");
	}
	else {
		echo "<div class='register-logo'><b>Oops!</b> 404 Error Server.</div>";
	}	
?>
</div>