<div class="row">
<?php
	if (isset($_GET['id_user'])) {
		$id_user = $_GET['id_user'];
	}
	else {
		die ("Error. No ID Selected! ");	
	}
	include "../../config/koneksi.php";

	if ($_POST['change'] == "change") {
	$password_lama	= md5($_POST['password_lama']);
	$password_baru	= md5($_POST['password_baru']);
	$confirm_password	= md5($_POST['confirm_password']);
	
	//cek old password
	$old =mysqli_query($gathuk, "SELECT * FROM tb_user WHERE id_user='$id_user' AND password='$password_lama'");
	$cek = mysqli_num_rows ($old);
	
		if (empty($_POST['password_lama']) || empty($_POST['password_baru']) || empty($_POST['confirm_password'])) {
			$_SESSION['pesan'] = "Sebaiknya ISI setiap kolom yang tersedia!";
			header("location:index.php?page=form-ganti-password");
		}
		else if (! $cek >= 1) {
			$_SESSION['pesan'] = "Oops! Password Wrong ...";
			header("location:index.php?page=form-ganti-password");
		}
		else if (($_POST['password_baru']) != ($_POST['confirm_password'])) {
			$_SESSION['pesan'] = "Oops! Confirm Password Failed ...";
			header("location:index.php?page=form-ganti-password");
		}
		else{
		$changep =mysqli_query($gathuk, "UPDATE tb_user SET password='$password_baru' WHERE id_user='$id_user'");
		
			if($changep){
				$_SESSION['pesan'] = "Change Password Success!";
				header("location:./");
			}
			else {
				echo "<div class='register-logo'><b>Oops!</b> 404 Error Server.</div>";
			}
		}
	}
?>
</div>