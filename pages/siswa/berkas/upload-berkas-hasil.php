<div class="row">
<?php
	if (isset($_GET['id_berkas'])) {
		$id_berkas = $_GET['id_berkas'];
	}
	else {
		die ("Error. No Kode Selected! ");	
	}
	include "../../config/koneksi.php";
	$query	= mysqli_query($gathuk, "SELECT * FROM tb_berkas WHERE id_berkas='$id_berkas'");
	$hasil	= mysqli_fetch_array ($query);
				
	if ($_POST['edit'] == "edit") {
		$file		=$_FILES['file_hasil']['name'];
		$size		=$_FILES['file_hasil']['size'];
		
		$file_ext	= array('pdf');
		$max_size	= 5000000;
		$ext 		= strtolower(end(explode('.', $_FILES['file_hasil']['name'])));
		$ok_ext		= in_array($ext, $file_ext);
	
		$datename	=date("Ymd-His");
		$idname		=intval($id_berkas);
		$new_name	="HSL-"."$datename"."-"."$idname".".$ext";
	
		if (empty($_FILES['file_hasil']['name'])) {
			$_SESSION['pesan'] = "Oops! Please fill all column ...";
			header("location:index.php?page=form-view-data-berkas");
		}
		else if (!($ok_ext)){
			$_SESSION['pesan'] = "Oops! File extensions not available. Only PDF ...";
			header("location:index.php?page=form-view-data-berkas");
		}
		
		else if ($size > $max_size){
			$_SESSION['pesan'] = "Oops! File is too large. Max 5 MB ...";
			header("location:index.php?page=form-view-data-berkas");
		}
		
		else{
		$update= mysqli_query ($gathuk, "UPDATE tb_berkas SET file_hasil='$new_name' WHERE id_berkas='$id_berkas'");
			if($update){
				$_SESSION['pesan'] = "Good! Upload berkas hasil success ...";
				header("location:index.php?page=form-view-data-berkas");
			}
			else {
				echo "<div class='register-logo'><b>Oops!</b> 404 Error Server.</div>";
			}
			if (strlen($file)>0) {
				if (is_uploaded_file($_FILES['file_hasil']['tmp_name'])) {
					move_uploaded_file ($_FILES['file_hasil']['tmp_name'], "../../assets/berkas/".$new_name);
				}
			}
		}
	}
?>
</div>