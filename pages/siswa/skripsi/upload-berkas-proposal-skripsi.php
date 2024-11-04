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
		$file		=$_FILES['file_proposal']['name'];
		$size		=$_FILES['file_proposal']['size'];
		
		$file_ext	= array('pdf');
		$max_size	= 2000000;
		$ext 		= strtolower(end(explode('.', $_FILES['file_proposal']['name'])));
		$ok_ext		= in_array($ext, $file_ext);
	
		$datename	=date("Ymd-His");
		$idname		=intval($id_skripsi);
		$new_name	="SKR-PRO-"."$datename"."-"."$idname".".$ext";
	
		if (empty($_FILES['file_proposal']['name'])) {
			$_SESSION['pesan'] = "icon:'error', title:'Oops ...!', text:'Please fill all column.', showConfirmButton:true, width:450, padding:'3em', timer: 17000, timerProgressBar:true";
			header("location:index.php?page=detail-data-skripsi&id_skripsi=$id_skripsi");
		}
		else if (!($ok_ext)){
			$_SESSION['pesan'] = "icon:'error', title:'Oops ...!', text:'File extensions not available. Only PDF.', showConfirmButton:true, width:450, padding:'3em', timer: 17000, timerProgressBar:true";
			header("location:index.php?page=detail-data-skripsi&id_skripsi=$id_skripsi");
		}
		
		else if ($size > $max_size){
			$_SESSION['pesan'] = "icon:'warning', title:'Oops ...!', text:'File is too large. Max 2 MB.', showConfirmButton:true, width:450, padding:'3em', timer: 17000, timerProgressBar:true";
			header("location:index.php?page=detail-data-skripsi&id_skripsi=$id_skripsi");
		}
		
		else{
		$update= mysqli_query ($gathuk, "UPDATE tb_skripsi SET file_proposal='$new_name' WHERE id_skripsi='$id_skripsi'");
			if($update){
				$_SESSION['pesan'] = "icon:'success', title:'Good ...!', text:'Upload berkas judul proposal success.', showConfirmButton:true, width:450, padding:'3em', timer: 17000, timerProgressBar:true";
				header("location:index.php?page=detail-data-skripsi&id_skripsi=$id_skripsi");
			}
			else {
				echo "<div class='register-logo'><b>Oops!</b> 404 Error Server.</div>";
			}
			if (strlen($file)>0) {
				if (is_uploaded_file($_FILES['file_proposal']['tmp_name'])) {
					move_uploaded_file ($_FILES['file_proposal']['tmp_name'], "../../assets/berkas/".$new_name);
				}
			}
		}
	}
?>
</div>