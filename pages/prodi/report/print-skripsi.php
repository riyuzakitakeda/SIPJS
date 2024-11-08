<?php
include "../../../config/koneksi.php";

// Check if 'id' is set in the URL
if (isset($_GET['id'])) {
    $id_skripsi = $_GET['id'];
    
    // Fetch skripsi data by id
    $stmt = mysqli_prepare($gathuk, "SELECT * FROM tb_skripsi WHERE id_skripsi = ?");
    mysqli_stmt_bind_param($stmt, 'i', $id_skripsi);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $data = mysqli_fetch_array($result);

    if ($data) {
        // Fetch student's information from tb_siswa
        $stmt_student = mysqli_prepare($gathuk, "SELECT nama, npm, jurusan FROM tb_siswa WHERE id_siswa = ?");
        mysqli_stmt_bind_param($stmt_student, 'i', $data['id_siswa']);
        mysqli_stmt_execute($stmt_student);
        $result_student = mysqli_stmt_get_result($stmt_student);
        $tsis = mysqli_fetch_array($result_student);

        // Fetch names of the lecturers (dosen) for id_dosen, id_dosen2, id_dosen3
        $dosen_names = [];
        // $dosen_ids = [$data['id_dosen'], $data['id_dosen2'], $data['id_dosen3']];
        $dosen_ids = [$data['id_dosen']];

        foreach ($dosen_ids as $id_dosen) {
            if ($id_dosen) {  // Check if id_dosen is not null
                $stmt_dosen = mysqli_prepare($gathuk, "SELECT nama FROM tb_dosen WHERE id_dosen = ?");
                mysqli_stmt_bind_param($stmt_dosen, 'i', $id_dosen);
                mysqli_stmt_execute($stmt_dosen);
                $result_dosen = mysqli_stmt_get_result($stmt_dosen);
                $dosen_data = mysqli_fetch_array($result_dosen);
                
                if ($dosen_data) {
                    $dosen_names[] = $dosen_data['nama'];
                }
            }
        }

        if ($tsis) {
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Permohonan Penerbitan SK Pembimbing Skripsi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0 auto;
            width: 85%;
            padding: 15px;
            font-family: "Times New Roman", Times, serif;
        }
        .header, .footer {
            text-align: center;
            margin-top: 5px;
        }
        .content {
            margin-top: 20px;
        }
        .signature {
            text-align: right;
            margin-top: 20px;
        }
        .info-table {
            width: 100%;
            margin-top: 10px;
        }
        .info-table td {
            padding: 0px;
            vertical-align: top;
        }
        @media print {
            .btn-print { display: none; }
        }
    </style>
    <!-- <script>
        window.onload = function() {
            window.print();
        }
    </script> -->
</head>
<body>

        <div class="header">
            <div class="d-flex" style="display: flex; align-items: center;">
                <!-- Logo Section -->
                <div class="xs-1" style="flex: 1; text-align: center;">
                    <img src="../../../assets/img/Logo_unm.jpg" alt="Logo UNM" style="max-width: 100px; height: auto;">
                </div>

                <!-- Institution Details Section -->
                <div class="xs-11" style="flex: 5; text-align: center;">
                    <p style="margin: 0; font-size: 15px;">KEMENTERIAN PENDIDIKAN, KEBUDAYAAN, RISET, DAN TEKNOLOGI</p>
                    <p style="margin: 0; font-size: 15px;">UNIVERSITAS NEGERI MAKASSAR (UNM)</p>
                    <p style="margin: 0; font-weight: bold;">FAKULTAS EKONOMI</p>
                    <div style="margin: 0; font-size: 10px;">
                    Alamat: Jalan Raya Pendidikan Makassar, Kode Pos - 90222<br>
                    Telepon: (0411) 889464 - 881244 Fax. (0411) 889464<br>
                    Laman: www.fe.unm.ac.id, Surel: tatausaha.fe@unm.ac.id<br>
                    </div>
                </div>
            </div>
        </div>

        <hr>
    <div class="content">
        <h4 style="text-align: center;">PERMOHONAN PENERBITAN SK PEMBIMBING SKRIPSI</h4>

        <p>Kepada Yth.<br>
        <b>Dekan Fakultas Ekonomi UNM</b><br>
        di<br>
        Makassar</p>

        Dengan Hormat,<br>
        Yang bertanda tangan di bawah ini:<br>

        <table class="info-table">
            <tr>
                <td><strong>Nama</strong></td>
                <td>: M. Ridwan Tikolllah, S.Pd., M.SA.</td>
            </tr>
            <tr>
                <td><strong>NIP</strong></td>
                <td>: 197510272000031001</td>
            </tr>
            <tr>
                <td><strong>Jurusan</strong></td>
                <td>: Ketua Jurusan Ilmu Akuntansi</td>
            </tr>
        </table>

        <p>Menerangkan bahwa mahasiswa atas nama:</p>

        <table class="info-table">
            <tr>
                <td><strong>Nama</strong></td>
                <td>: <?php echo htmlspecialchars($tsis['nama']); ?></td>
            </tr>
            <tr>
                <td><strong>NIM</strong></td>
                <td>: <?php echo htmlspecialchars($tsis['npm']); ?></td>
            </tr>
            <tr>
                <td><strong>Judul</strong></td>
                <td>: <?php echo htmlspecialchars($data['topik']); ?></td>
            </tr>
        </table>

        <p>Telah mengusulkan judul Skripsi dan telah disetujui oleh dosen Penasehat Akademik. Untuk itu kami memohon kepada Bapak untuk memberikan/menerbitkan SK Pembimbing Skripsi sesuai dengan Usulan Judul Skripsi (terlampir) kepada mahasiswa yang bersangkutan. Atas perhatiannya kami ucapkan terima kasih.</p>
    </div>

    <div class="signature">
        Makassar, <?php echo date('d F Y'); ?><br>
        Ketua Jurusan Ilmu Akuntansi<br>
        <?php foreach ($dosen_names as $nama_dosen) { ?>
            <img src="https://api.qrserver.com/v1/create-qr-code/?size=80x80&data=<?php echo urlencode('https://sipjs.online//pages/prodi/report/verify.php?id=' . $id_skripsi); ?>" alt="QR Code"><br>
            M. Ridwan Tikolllah, S.Pd., M.SA.<br>
            197510272000031001
        <?php } ?>
    </div>

</body>
</html>

<?php
        } else {
            echo "Student data not found!";
        }
    } else {
        echo "Skripsi data not found!";
    }
} else {
    echo "Invalid Request!";
}
?>
