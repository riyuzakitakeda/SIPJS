DROP TABLE tb_bdstudi;

CREATE TABLE `tb_bdstudi` (
  `id_bdstudi` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(128) NOT NULL,
  PRIMARY KEY (`id_bdstudi`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO tb_bdstudi VALUES("2","Akuntansi S1");
INSERT INTO tb_bdstudi VALUES("4","Pendidikan Akuntansi");
INSERT INTO tb_bdstudi VALUES("5","Akuntansi Terapan");



DROP TABLE tb_berkas;

CREATE TABLE `tb_berkas` (
  `id_berkas` int(11) NOT NULL AUTO_INCREMENT,
  `tgl` date NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `file_ktm` varchar(64) DEFAULT NULL,
  `file_bayar` varchar(64) DEFAULT NULL,
  `file_proposal` varchar(64) DEFAULT NULL,
  `file_hasil` varchar(64) DEFAULT NULL,
  `file_tutup` varchar(64) DEFAULT NULL,
  `file_jurnal` varchar(64) DEFAULT NULL,
  `file_krs` varchar(64) DEFAULT NULL,
  `approve_prodi` varchar(1) DEFAULT NULL,
  `catatan_prodi` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_berkas`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO tb_berkas VALUES("1","2024-10-16","32","KTM-20241016-174404-1.pdf","BYR-20241016-174419-1.pdf","PRO-20241016-174438-1.pdf","HSL-20241016-174444-1.pdf","TTP-20241016-174451-1.pdf","JUR-20241016-174500-1.pdf","KRS-20241016-174506-1.pdf","Y","svfsfsgfsfsgsf");



DROP TABLE tb_berkas_hasil;

CREATE TABLE `tb_berkas_hasil` (
  `id_berkas` int(11) NOT NULL AUTO_INCREMENT,
  `tgl` date NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `bpp` varchar(64) DEFAULT NULL,
  `per_pembimbing` varchar(64) DEFAULT NULL,
  `krs` varchar(64) DEFAULT NULL,
  `jurnal` varchar(64) DEFAULT NULL,
  `bukti_seminar` varchar(64) DEFAULT NULL,
  `suket_alquran` varchar(64) DEFAULT NULL,
  `sk_pembimbing` varchar(64) DEFAULT NULL,
  `bukti_konsumsi` varchar(64) DEFAULT NULL,
  `approve_prodi` varchar(1) DEFAULT NULL,
  `catatan_prodi` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_berkas`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO tb_berkas_hasil VALUES("11","2022-12-28","29","","","","","","","","","","");



DROP TABLE tb_berkas_ujian_tutup;

CREATE TABLE `tb_berkas_ujian_tutup` (
  `id_berkas` int(11) NOT NULL AUTO_INCREMENT,
  `tgl` date NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `bpp` varchar(64) DEFAULT NULL,
  `persetujuan` varchar(64) DEFAULT NULL,
  `krs` varchar(64) DEFAULT NULL,
  `jurnal` varchar(64) DEFAULT NULL,
  `bukti_seminar` varchar(64) DEFAULT NULL,
  `suket_alquran` varchar(64) DEFAULT NULL,
  `sk_pembimbing` varchar(64) DEFAULT NULL,
  `bukti_konsumsi` varchar(64) DEFAULT NULL,
  `alumni` varchar(64) DEFAULT NULL,
  `loogbook` varchar(64) DEFAULT NULL,
  `perbaikan` varchar(64) DEFAULT NULL,
  `approve_prodi` varchar(1) DEFAULT NULL,
  `catatan_prodi` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_berkas`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;




DROP TABLE tb_dosen;

CREATE TABLE `tb_dosen` (
  `id_dosen` int(11) NOT NULL AUTO_INCREMENT,
  `nidn` varchar(32) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `bdstudi` varchar(128) NOT NULL,
  PRIMARY KEY (`id_dosen`),
  UNIQUE KEY `nidn` (`nidn`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO tb_dosen VALUES("14","001","Ansel R, S.Kom, M.Kom","Ilmu Komputer");
INSERT INTO tb_dosen VALUES("15","002","Indra A, S.Kom","Robotika");
INSERT INTO tb_dosen VALUES("16","003","Juhariah, S.Kom","Akuntansi");



DROP TABLE tb_jurusan;

CREATE TABLE `tb_jurusan` (
  `id_jurusan` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(128) NOT NULL,
  PRIMARY KEY (`id_jurusan`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO tb_jurusan VALUES("3","Ilmu Akuntansi");



DROP TABLE tb_kategori;

CREATE TABLE `tb_kategori` (
  `id_kategori` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(128) NOT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO tb_kategori VALUES("1","Perpajakan");
INSERT INTO tb_kategori VALUES("2","Audit");
INSERT INTO tb_kategori VALUES("3","Akuntansi Manajemen");
INSERT INTO tb_kategori VALUES("6","Akuntansi Biaya");
INSERT INTO tb_kategori VALUES("7","Akuntansi Keuangan");
INSERT INTO tb_kategori VALUES("8","Akuntansi Sektor Publik");
INSERT INTO tb_kategori VALUES("9","Akuntansi Keperilakuan");
INSERT INTO tb_kategori VALUES("10","Sistem Informasi Akuntansi");



DROP TABLE tb_setup;

CREATE TABLE `tb_setup` (
  `id_setup` int(11) NOT NULL,
  `universitas` varchar(128) NOT NULL,
  `kabkota` varchar(16) NOT NULL,
  `nama_kabkota` varchar(128) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `telp` varchar(16) NOT NULL,
  `web_url` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  PRIMARY KEY (`id_setup`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO tb_setup VALUES("1","Universitas Negeri Makassar","Kota","Makassar","Jl. Raya Pendidikan No.22","08577676878","ghghjgjgk","hjvjhvj");



DROP TABLE tb_siswa;

CREATE TABLE `tb_siswa` (
  `id_siswa` int(11) NOT NULL AUTO_INCREMENT,
  `npm` varchar(32) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `jurusan` varchar(128) NOT NULL,
  PRIMARY KEY (`id_siswa`),
  UNIQUE KEY `npm` (`npm`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO tb_siswa VALUES("29","111","gendis Dhiya","Sistem Informasi");
INSERT INTO tb_siswa VALUES("30","112","Faula N","Arsitektur Komputer");
INSERT INTO tb_siswa VALUES("31","113","Abril Guntara","Sistem Analis");
INSERT INTO tb_siswa VALUES("32","1234567","Mahasiswa","Ilmu Akuntansi");



DROP TABLE tb_skripsi;

CREATE TABLE `tb_skripsi` (
  `id_skripsi` int(11) NOT NULL AUTO_INCREMENT,
  `id_siswa` int(11) NOT NULL,
  `tgl` date NOT NULL,
  `kategori` varchar(128) NOT NULL,
  `topik` varchar(255) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `angkatan` varchar(4) NOT NULL,
  `file_proposal` varchar(64) DEFAULT NULL,
  `file_jurnal` varchar(64) DEFAULT NULL,
  `approve_prodi` varchar(1) DEFAULT NULL,
  `catatan_prodi` varchar(255) DEFAULT NULL,
  `id_dosen` int(11) DEFAULT NULL,
  `id_dosen2` int(11) DEFAULT NULL,
  `id_dosen3` int(11) DEFAULT NULL,
  `approve_dosen` varchar(1) DEFAULT NULL,
  `approve_dosen2` varchar(1) DEFAULT NULL,
  `approve_dosen3` varchar(1) DEFAULT NULL,
  `catatan_dosen` varchar(255) DEFAULT NULL,
  `catatan_dosen2` varchar(255) DEFAULT NULL,
  `catatan_dosen3` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_skripsi`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO tb_skripsi VALUES("10","29","2022-12-28","Sistem Informasi","Sistem Informasi","Sistem Informasi Pengajuan Judul Skripsi","2022","","","Y","Dilanjutkan ke dosen","14","15","16","","Y","","","Ok lanjutkan","");
INSERT INTO tb_skripsi VALUES("11","30","2022-12-28","Hardware Programing","Hardware","Perakitan Komputer Untuk Menghasilkan Spesifikasi yang WOOW","2021","","","Y","Dilanjutkan ke dosen","14","15","16","","","","","","");
INSERT INTO tb_skripsi VALUES("12","31","2022-12-28","SPK","Analisa","Penggunaan Metode X Untuk Menganalisa Kinerja Motherboard pada PC","2021","","","Y","Dilanjutkan ke dosen","14","15","16","","","","","","");
INSERT INTO tb_skripsi VALUES("13","32","2024-10-16","Hardware Programing","fgfhfhfhjf ","fgfhfhfhjf bdgdbbgd fhfhgfhgd ghjhfhjffh","2024","SKR-PRO-20241016-174334-13.pdf","SKR-JUR-20241016-174346-13.pdf","Y","gbdbdbfdfsvszc","14","15","16","Y","Y","Y","dfdgdfg","","");



DROP TABLE tb_user;

CREATE TABLE `tb_user` (
  `id_user` varchar(32) NOT NULL,
  `nama_user` varchar(64) NOT NULL,
  `password` varchar(255) NOT NULL,
  `hak_akses` varchar(16) NOT NULL,
  `id_dosen` int(11) DEFAULT NULL,
  `id_siswa` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO tb_user VALUES("001","Ansel R, S.Kom, M.Kom","202cb962ac59075b964b07152d234b70","Dosen","14","");
INSERT INTO tb_user VALUES("002","Indra A, S.Kom","202cb962ac59075b964b07152d234b70","Dosen","15","");
INSERT INTO tb_user VALUES("003","Juhariah, S.Kom","202cb962ac59075b964b07152d234b70","Dosen","16","");
INSERT INTO tb_user VALUES("111","gendis Dhiya","202cb962ac59075b964b07152d234b70","Siswa","","29");
INSERT INTO tb_user VALUES("112","Faula N","202cb962ac59075b964b07152d234b70","Siswa","","30");
INSERT INTO tb_user VALUES("113","Abril Guntara","202cb962ac59075b964b07152d234b70","Siswa","","31");
INSERT INTO tb_user VALUES("1234567","Mahasiswa","202cb962ac59075b964b07152d234b70","Siswa","","32");
INSERT INTO tb_user VALUES("prodi","APP Prodi","202cb962ac59075b964b07152d234b70","Prodi","0","0");



