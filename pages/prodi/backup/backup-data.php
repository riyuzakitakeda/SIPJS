<?php
	include "../../config/koneksi.php";
    $backupAlert = '';
    $tables = array();
    $result = mysqli_query($gathuk, "SHOW TABLES");
    if (!$result) {
        $backupAlert = 'Error found.<br/>ERROR : ' . mysqli_error($gathuk) . 'ERROR NO :' . mysqli_errno($gathuk);
    }
	else {
        while ($row = mysqli_fetch_row($result)) {
            $tables[] = $row[0];
        }
        mysqli_free_result($result);

        $return = '';
        foreach ($tables as $table) {

            $result = mysqli_query($gathuk, "SELECT * FROM " . $table);
            if (!$result) {
                $backupAlert = 'Error found.<br/>ERROR : ' . mysqli_error($gathuk) . 'ERROR NO :' . mysqli_errno($gathuk);
            }
			else {
                $num_fields = mysqli_num_fields($result);
                if (!$num_fields) {
                    $backupAlert = 'Error found.<br/>ERROR : ' . mysqli_error($gathuk) . 'ERROR NO :' . mysqli_errno($gathuk);
                }
				else {
                    $return .= 'DROP TABLE ' . $table . ';';
                    $row2 = mysqli_fetch_row(mysqli_query($gathuk, 'SHOW CREATE TABLE ' . $table));
                    if (!$row2) {
                        $backupAlert = 'Error found.<br/>ERROR : ' . mysqli_error($gathuk) . 'ERROR NO :' . mysqli_errno($gathuk);
                    }
					else {
                        $return .= "\n\n" . $row2[1] . ";\n\n";
                        for ($i = 0; $i < $num_fields; $i++) {
                            while ($row = mysqli_fetch_row($result)) {
                                $return .= 'INSERT INTO ' . $table . ' VALUES(';
                                for ($j = 0; $j < $num_fields; $j++) {
                                    $row[$j] = addslashes($row[$j]);
                                    if (isset($row[$j])) {
                                        $return .= '"' . $row[$j] . '"';
                                    } else {
                                        $return .= '""';
                                    }
                                    if ($j < $num_fields - 1) {
                                        $return .= ',';
                                    }
                                }
                                $return .= ");\n";
                            }
                        }
                        $return .= "\n\n\n";
                    }

                    $backup_file = 'BackupDB-' . date("Ymd") . '.sql';
                    //$handle = fopen("{$backup_file}", 'w+');
					$handle = fopen('../../assets/backup/'.$backup_file, 'w+');
                    fwrite($handle, $return);
                    fclose($handle);
                    $backupAlert = 'Backup Database Berhasil !';
                }
            }
        }
    }
?>

<!-- begin page-header -->
<h1 class="page-header">Backup <small>Database </small></h1>
<!-- end page-header -->
<div class="profile-container">
	<!-- begin profile-section -->
	<div class="profile-section">
		<div class="panel-body">
			<div class="form-group">
				<p align="center"><?php echo $backupAlert?> Please download file ...</p>
			</div>
			<div class="form-group">
				<br />
			</div>
			<div class="form-group">
				<p align="center">
					<a type="button" href="../../assets/backup/<?=$backup_file?>" title="Download" class="btn btn-success"><i class="fa-lg ion-ios-cloud-download-outline"></i> &nbsp;Download</a>
				</p>
			</div>
		</div>
	</div>
	<!-- end profile-section -->
</div>