<?php
include "../../../config/koneksi.php";

if (isset($_GET['id'])) {
    $id_skripsi = $_GET['id'];
    
    // Fetch skripsi details by id
    $stmt = mysqli_prepare($gathuk, "SELECT * FROM tb_skripsi WHERE id_skripsi = ?");
    mysqli_stmt_bind_param($stmt, 'i', $id_skripsi);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $data = mysqli_fetch_array($result);

    if ($data) {
        // Fetch student's information
        $stmt_student = mysqli_prepare($gathuk, "SELECT nama, npm, jurusan FROM tb_siswa WHERE id_siswa = ?");
        mysqli_stmt_bind_param($stmt_student, 'i', $data['id_siswa']);
        mysqli_stmt_execute($stmt_student);
        $result_student = mysqli_stmt_get_result($stmt_student);
        $tsis = mysqli_fetch_array($result_student);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi Skripsi</title>
</head>
<body>
    <h2>Verifikasi Skripsi</h2>
    <p><strong>Judul:</strong> <?php echo htmlspecialchars($data['judul']); ?></p>
    <p><strong>Nama Mahasiswa:</strong> <?php echo htmlspecialchars($tsis['nama']); ?></p>
    <p><strong>NPM:</strong> <?php echo htmlspecialchars($tsis['npm']); ?></p>
    <p><strong>Jurusan:</strong> <?php echo htmlspecialchars($tsis['jurusan']); ?></p>
</body>
</html>
<?php
    } else {
        echo "Data skripsi tidak ditemukan.";
    }
} else {
    echo "ID skripsi tidak valid.";
}
?>
