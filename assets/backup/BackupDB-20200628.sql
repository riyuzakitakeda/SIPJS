DROP TABLE tb_bdstudi;

CREATE TABLE `tb_bdstudi` (
  `id_bdstudi` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(128) NOT NULL,
  PRIMARY KEY (`id_bdstudi`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

INSERT INTO tb_bdstudi VALUES("1","Ilmu Komputer");
INSERT INTO tb_bdstudi VALUES("2","Akuntansi");
INSERT INTO tb_bdstudi VALUES("3","Robotika");



DROP TABLE tb_berkas;

CREATE TABLE `tb_berkas` (
  `id_berkas` int(11) NOT NULL AUTO_INCREMENT,
  `tgl` date NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `file_ktm` varchar(64) DEFAULT NULL,
  `file_bayar` varchar(64) DEFAULT NULL,
  `file_proposal` varchar(64) DEFAULT NULL,
  `file_jurnal` varchar(64) DEFAULT NULL,
  `file_krs` varchar(64) DEFAULT NULL,
  `approve_prodi` varchar(1) DEFAULT NULL,
  `catatan_prodi` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_berkas`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

INSERT INTO tb_berkas VALUES("1","2020-06-24","1","KTM-20200624-220522-1.pdf","BYR-20200624-220531-1.pdf","PRO-20200624-220549-1.pdf","JUR-20200624-220555-1.pdf","KRS-20200624-220559-1.pdf","Y","Lanjutkan");
INSERT INTO tb_berkas VALUES("2","2020-06-24","3","KTM-20200624-221028-2.pdf","BYR-20200624-221049-2.pdf","PRO-20200624-221056-2.pdf","","KRS-20200624-221103-2.pdf","","");
INSERT INTO tb_berkas VALUES("3","2020-06-24","4","KTM-20200624-221328-3.pdf","","PRO-20200624-221340-3.pdf","","KRS-20200624-221349-3.pdf","N","Tunggu Bukti Bayar");
INSERT INTO tb_berkas VALUES("4","2020-06-25","4","KTM-20200625-150041-4.pdf","BYR-20200625-150057-4.pdf","","JUR-20200625-150104-4.pdf","KRS-20200625-150109-4.pdf","Y","Lanjut...");
INSERT INTO tb_berkas VALUES("5","2020-06-25","15","KTM-20200625-203142-5.pdf","BYR-20200625-203146-5.pdf","PRO-20200625-203152-5.pdf","","KRS-20200625-203157-5.pdf","Y","-");
INSERT INTO tb_berkas VALUES("6","2020-06-26","2","KTM-20200626-215935-6.pdf","BYR-20200626-215942-6.pdf","PRO-20200626-215948-6.pdf","","KRS-20200626-215953-6.pdf","","");
INSERT INTO tb_berkas VALUES("7","2020-06-26","6","KTM-20200626-220642-7.pdf","BYR-20200626-220648-7.pdf","","","KRS-20200626-220653-7.pdf","","");
INSERT INTO tb_berkas VALUES("8","2020-06-26","7","KTM-20200626-221115-8.pdf","BYR-20200626-221122-8.pdf","PRO-20200626-221127-8.pdf","","","","");



DROP TABLE tb_dosen;

CREATE TABLE `tb_dosen` (
  `id_dosen` int(11) NOT NULL AUTO_INCREMENT,
  `nidn` varchar(32) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `bdstudi` varchar(128) NOT NULL,
  PRIMARY KEY (`id_dosen`),
  UNIQUE KEY `nidn` (`nidn`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

INSERT INTO tb_dosen VALUES("1","0103107805","Lismardiana, ST.,MM.,M.Kom","Ilmu Komputer");
INSERT INTO tb_dosen VALUES("2","9901121937","Tulus Sihaloho, M.Kom","Ilmu Komputer");
INSERT INTO tb_dosen VALUES("3","0118078901","Dede Prabowo Wiguna, M.Si","Ilmu Komputer");
INSERT INTO tb_dosen VALUES("4","0103107231","Lastiana Dewi, S.Kom","Ilmu Komputer");
INSERT INTO tb_dosen VALUES("5","8803107801","Budi Hermawan, MM","Akuntansi");
INSERT INTO tb_dosen VALUES("6","5703107802","Ahmad Dodi Kurnia, ST., M.Kom","Robotika");
INSERT INTO tb_dosen VALUES("7","0103107445","Heru Santoso, ST","Robotika");
INSERT INTO tb_dosen VALUES("8","0105107232","Irene Kumala \'Ana, MM., SE","Akuntansi");
INSERT INTO tb_dosen VALUES("9","0127078902","Andika Purba, S.Kom","Ilmu Komputer");
INSERT INTO tb_dosen VALUES("10","1103107261","George Indra, M.Kom","Robotika");
INSERT INTO tb_dosen VALUES("11","1103107265","Listiawan Sudradjat, M.Kom","Ilmu Komputer");
INSERT INTO tb_dosen VALUES("13","1103108261","Setyo Prakoso, ST., M.Kom","Robotika");



DROP TABLE tb_jurusan;

CREATE TABLE `tb_jurusan` (
  `id_jurusan` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(128) NOT NULL,
  PRIMARY KEY (`id_jurusan`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

INSERT INTO tb_jurusan VALUES("1","Teknik Informatika");
INSERT INTO tb_jurusan VALUES("2","Sistem Informasi");
INSERT INTO tb_jurusan VALUES("3","Sistem Analis");
INSERT INTO tb_jurusan VALUES("4","Arsitektur Komputer");



DROP TABLE tb_kategori;

CREATE TABLE `tb_kategori` (
  `id_kategori` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(128) NOT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

INSERT INTO tb_kategori VALUES("1","Hardware Programing");
INSERT INTO tb_kategori VALUES("2","Sistem Pakar");
INSERT INTO tb_kategori VALUES("3","Sistem Informasi");
INSERT INTO tb_kategori VALUES("4","SIG");
INSERT INTO tb_kategori VALUES("5","SPK");



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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO tb_setup VALUES("1","Politeknik Cilacap","Kabupaten","Cilacap","Jl. Raya Pesanggrahan No. 20B. Kesugihan Cilacap - 53274","082137801536","www.rajaputramedia.com","rajaputramedia@gmail.com");



DROP TABLE tb_siswa;

CREATE TABLE `tb_siswa` (
  `id_siswa` int(11) NOT NULL AUTO_INCREMENT,
  `npm` varchar(32) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `jurusan` varchar(128) NOT NULL,
  PRIMARY KEY (`id_siswa`),
  UNIQUE KEY `npm` (`npm`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

INSERT INTO tb_siswa VALUES("1","16211006","Atifa Zahra Anum","Sistem Informasi");
INSERT INTO tb_siswa VALUES("2","16211008","Darmawati","Sistem Informasi");
INSERT INTO tb_siswa VALUES("3","16211009","Delvia Rani BR Bangun","Sistem Informasi");
INSERT INTO tb_siswa VALUES("4","16211017","Jepi Pranata Pinem","Sistem Informasi");
INSERT INTO tb_siswa VALUES("5","16211029","Sepianus Ndaraha","Sistem Informasi");
INSERT INTO tb_siswa VALUES("6","16211010","Budi Raharja","Arsitektur Komputer");
INSERT INTO tb_siswa VALUES("7","16211012","Rere Sukma UM","Sistem Analis");
INSERT INTO tb_siswa VALUES("8","16211013","Putrie Derma Hanum","Teknik Informatika");
INSERT INTO tb_siswa VALUES("9","16211014","Retno Pinasih","Teknik Informatika");
INSERT INTO tb_siswa VALUES("10","16211015","Fahri Taruma Hulu","Teknik Informatika");
INSERT INTO tb_siswa VALUES("11","16211018","Febrian We","Sistem Analis");
INSERT INTO tb_siswa VALUES("12","16211020","Galih Poernomo","Arsitektur Komputer");
INSERT INTO tb_siswa VALUES("13","16211021","Setiawan Iwan","Sistem Informasi");
INSERT INTO tb_siswa VALUES("14","16211024","Teresia Ginting","Sistem Informasi");
INSERT INTO tb_siswa VALUES("15","16211027","Dody Permana Putra","Teknik Informatika");
INSERT INTO tb_siswa VALUES("16","16211030","Jaka Firmansyah","Sistem Analis");
INSERT INTO tb_siswa VALUES("17","16211031","Safira Sanu","Sistem Informasi");
INSERT INTO tb_siswa VALUES("18","16211033","Ineke Putri","Sistem Analis");
INSERT INTO tb_siswa VALUES("19","16211035","Darlin Herwanto","Arsitektur Komputer");
INSERT INTO tb_siswa VALUES("20","16211037","Agus Sal\'im","Sistem Analis");
INSERT INTO tb_siswa VALUES("21","16211038","Yayan Ginting","Sistem Analis");
INSERT INTO tb_siswa VALUES("22","16211039","David Prihartanto","Teknik Informatika");
INSERT INTO tb_siswa VALUES("23","16211040","Surya Cendana F","Sistem Informasi");
INSERT INTO tb_siswa VALUES("24","16211041","Welas Kinasih L","Teknik Informatika");
INSERT INTO tb_siswa VALUES("25","16211042","Widia Sri Dewi","Sistem Analis");
INSERT INTO tb_siswa VALUES("26","16211043","Anjas Kurniawan M","Arsitektur Komputer");
INSERT INTO tb_siswa VALUES("27","16211044","Hery Dwi Jadjanto","Teknik Informatika");



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
  `approve_dosen` varchar(1) DEFAULT NULL,
  `catatan_dosen` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_skripsi`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

INSERT INTO tb_skripsi VALUES("1","1","2019-06-26","Sistem Informasi","Sistem Informasi RS","Sistem Informasi Manajemen RSUD BAndung","2013","SKR-PRO-20200626-215826-1.pdf","SKR-JUR-20200626-215842-1.pdf","Y","-","9","","");
INSERT INTO tb_skripsi VALUES("2","2","2019-06-26","Sistem Informasi","Sistem Informasi Pegawai","Aplikasi Sistem Informasi Kepegawaian Dinas PU","2006","SKR-PRO-20200626-220035-2.pdf","SKR-JUR-20200626-220042-2.pdf","Y","Lanjutkan","10","","");
INSERT INTO tb_skripsi VALUES("3","3","2020-06-26","Sistem Informasi","Sistem Informasi RS","Sistem Informasi Manajemen RSUD Cilacap","2013","","","N","Spesifisikan lagi","","","");
INSERT INTO tb_skripsi VALUES("4","4","2020-06-26","Sistem Informasi","Sistem Informasi Manajemen","Sistem Informasi Manajemen Karyawan","","","","","","","","");
INSERT INTO tb_skripsi VALUES("5","15","2020-06-26","Sistem Informasi","Sistem Informasi Pegawai","Sistem Informasi Pegawai Berbasis Web PT Garuda Raya","2014","","","Y","-","6","","");
INSERT INTO tb_skripsi VALUES("6","6","2020-06-26","Hardware Programing","Keamanan Rumah","Rekayasa Pembuka Pintu Otomatis Sensor Wajah","2013","","","Y","-","7","","");
INSERT INTO tb_skripsi VALUES("7","7","2020-06-26","Sistem Pakar","Analisa XFC Metode","Analisa Perubahan Cuaca dengan Metode XFC","2014","","","Y","-","5","","");



DROP TABLE tb_user;

CREATE TABLE `tb_user` (
  `id_user` varchar(32) NOT NULL,
  `nama_user` varchar(64) NOT NULL,
  `password` varchar(255) NOT NULL,
  `hak_akses` varchar(16) NOT NULL,
  `id_dosen` int(11) DEFAULT NULL,
  `id_siswa` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO tb_user VALUES("0103107805","Lismardiana, ST.,MM.,M.Kom","202cb962ac59075b964b07152d234b70","Dosen","1","");
INSERT INTO tb_user VALUES("0105107232","Irene Kumala \'Ana, MM., SE","202cb962ac59075b964b07152d234b70","Dosen","8","");
INSERT INTO tb_user VALUES("0118078901","Dede Prabowo Wiguna, M.Si","202cb962ac59075b964b07152d234b70","Dosen","3","");
INSERT INTO tb_user VALUES("0127078902","Andika Purba, S.Kom","202cb962ac59075b964b07152d234b70","Dosen","9","");
INSERT INTO tb_user VALUES("16211006","Atifa Zahra Anum","202cb962ac59075b964b07152d234b70","Siswa","","1");
INSERT INTO tb_user VALUES("16211008","Darmawati","202cb962ac59075b964b07152d234b70","Siswa","","2");
INSERT INTO tb_user VALUES("16211009","Delvia Rani BR Bangun","202cb962ac59075b964b07152d234b70","Siswa","","3");
INSERT INTO tb_user VALUES("16211010","Budi Raharja","202cb962ac59075b964b07152d234b70","Siswa","","6");
INSERT INTO tb_user VALUES("16211012","Rere Sukma UM","202cb962ac59075b964b07152d234b70","Siswa","","7");
INSERT INTO tb_user VALUES("16211013","Putrie Derma Hanum","202cb962ac59075b964b07152d234b70","Siswa","","8");
INSERT INTO tb_user VALUES("16211015","Fahri Taruma Hulu","202cb962ac59075b964b07152d234b70","Siswa","","10");
INSERT INTO tb_user VALUES("16211017","Jepi Pranata Pinem","202cb962ac59075b964b07152d234b70","Siswa","","4");
INSERT INTO tb_user VALUES("16211018","Febrian We","202cb962ac59075b964b07152d234b70","Siswa","","11");
INSERT INTO tb_user VALUES("16211020","Galih Poernomo","202cb962ac59075b964b07152d234b70","Siswa","","12");
INSERT INTO tb_user VALUES("16211021","Setiawan Iwan","202cb962ac59075b964b07152d234b70","Siswa","","13");
INSERT INTO tb_user VALUES("16211024","Teresia Ginting","202cb962ac59075b964b07152d234b70","Siswa","","14");
INSERT INTO tb_user VALUES("16211027","Dody Permana Putra","202cb962ac59075b964b07152d234b70","Siswa","","15");
INSERT INTO tb_user VALUES("16211030","Jaka Firmansyah","202cb962ac59075b964b07152d234b70","Siswa","","16");
INSERT INTO tb_user VALUES("16211033","Ineke Putri","202cb962ac59075b964b07152d234b70","Siswa","","18");
INSERT INTO tb_user VALUES("16211035","Darlin Herwanto","202cb962ac59075b964b07152d234b70","Siswa","","19");
INSERT INTO tb_user VALUES("16211037","Agus Sal\'im","202cb962ac59075b964b07152d234b70","Siswa","","20");
INSERT INTO tb_user VALUES("16211038","Yayan Ginting","202cb962ac59075b964b07152d234b70","Siswa","","21");
INSERT INTO tb_user VALUES("16211039","David Prihartanto","202cb962ac59075b964b07152d234b70","Siswa","","22");
INSERT INTO tb_user VALUES("16211040","Surya Cendana F","202cb962ac59075b964b07152d234b70","Siswa","","23");
INSERT INTO tb_user VALUES("16211041","Welas Kinasih L","202cb962ac59075b964b07152d234b70","Siswa","","24");
INSERT INTO tb_user VALUES("16211044","Hery Dwi Jadjanto","202cb962ac59075b964b07152d234b70","Siswa","","27");
INSERT INTO tb_user VALUES("5703107802","Ahmad Dodi Kurnia, ST., M.Kom","202cb962ac59075b964b07152d234b70","Dosen","6","");
INSERT INTO tb_user VALUES("8803107801","Budi Hermawan, MM","202cb962ac59075b964b07152d234b70","Dosen","5","");
INSERT INTO tb_user VALUES("9901121937","Tulus Sihaloho, M.Kom","202cb962ac59075b964b07152d234b70","Dosen","2","");
INSERT INTO tb_user VALUES("prodi","APP Prodi","202cb962ac59075b964b07152d234b70","Prodi","0","0");



