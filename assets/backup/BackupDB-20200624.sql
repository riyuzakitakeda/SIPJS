DROP TABLE berkas;

CREATE TABLE `berkas` (
  `id_berkas` varchar(10) NOT NULL,
  `id_nim` varchar(10) NOT NULL,
  `file1` varchar(200) NOT NULL,
  `file2` varchar(200) NOT NULL,
  `file3` varchar(200) NOT NULL,
  `jurnal` varchar(200) NOT NULL,
  `file4` varchar(200) NOT NULL,
  `approve_prodi` varchar(12) NOT NULL,
  `cat_prodi` varchar(255) NOT NULL,
  PRIMARY KEY (`id_berkas`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE dosen;

CREATE TABLE `dosen` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nip` varchar(20) NOT NULL,
  `nama_dosen` varchar(40) NOT NULL,
  `bd_studi` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

INSERT INTO dosen VALUES("4","0103107805","Lismardiana, ST.,M.Kom","Ilmu Komputer");
INSERT INTO dosen VALUES("5","9901121937","Tulus Sihaloho, M.Kom","Ilmu Komputer");
INSERT INTO dosen VALUES("6","0118078901","Dede Prabowo Wiguna, M.Si","Ilmu Komputer");



DROP TABLE kategori;

CREATE TABLE `kategori` (
  `id_skripsi` varchar(10) NOT NULL,
  `kategori_skripsi` varchar(20) NOT NULL,
  `topik` varchar(40) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `isi` varchar(200) NOT NULL,
  `jurnal` varchar(200) NOT NULL,
  `approve_prodi` varchar(12) NOT NULL,
  `status` varchar(20) NOT NULL,
  `nama_siswa` varchar(60) NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  `angkatan` varchar(10) NOT NULL,
  `tahun_pengajuan` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE login;

CREATE TABLE `login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nim_asuser` varchar(20) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `password` varchar(20) NOT NULL,
  `level` varchar(15) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=158 DEFAULT CHARSET=latin1;

INSERT INTO login VALUES("0","prodi","Prodi Ilkom Unpak","prodi","Prodi");
INSERT INTO login VALUES("152","0118078901","Dede Prabowo Wiguna, M.Si","dosen","Dosen");
INSERT INTO login VALUES("151","9901121937","Tulus Sihaloho, M.Kom","dosen","Dosen");
INSERT INTO login VALUES("150","0103107805","Lismardiana, ST.,M.Kom","dosen","Dosen");
INSERT INTO login VALUES("153","16211006","Atifa Zahra Anum","siswa","Siswa");
INSERT INTO login VALUES("154","16211008","Darmawati","siswa","Siswa");
INSERT INTO login VALUES("155","16211009","Delvia Rani BR Bangun","siswa","Siswa");
INSERT INTO login VALUES("156","16211017","Jepi Pranata Pinem","siswa","Siswa");
INSERT INTO login VALUES("157","16211029","Sepianus Ndaraha","siswa","Siswa");



DROP TABLE siswa;

CREATE TABLE `siswa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nim` varchar(10) NOT NULL,
  `nama_siswa` varchar(40) NOT NULL,
  `jurusan` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

INSERT INTO siswa VALUES("5","16211006","Atifa Zahra Anum","SIstem Informasi");
INSERT INTO siswa VALUES("6","16211008","Darmawati","SIstem Informasi");
INSERT INTO siswa VALUES("7","16211009","Delvia Rani BR Bangun","SIstem Informasi");
INSERT INTO siswa VALUES("8","16211017","Jepi Pranata Pinem","SIstem Informasi");
INSERT INTO siswa VALUES("9","16211029","Sepianus Ndaraha","SIstem Informasi");



DROP TABLE skripsi;

CREATE TABLE `skripsi` (
  `id_skripsi` varchar(10) NOT NULL,
  `id_nim` varchar(10) NOT NULL,
  `nama_siswa` varchar(40) NOT NULL,
  `jurusan` varchar(20) NOT NULL,
  `kategori_skripsi` varchar(20) NOT NULL,
  `topik` varchar(255) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `isi` varchar(200) NOT NULL,
  `jurnal` varchar(200) NOT NULL,
  `approve_prodi` varchar(12) NOT NULL,
  `approve_dosen` varchar(20) NOT NULL,
  `approve_dosen2` varchar(20) NOT NULL,
  `id_dosen` varchar(10) NOT NULL,
  `id_dosen2` varchar(10) NOT NULL,
  `cat_dosen` varchar(160) NOT NULL,
  `cat_dosen2` varchar(160) NOT NULL,
  `cat_prodi` varchar(200) NOT NULL,
  PRIMARY KEY (`id_skripsi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE tb_bdstudi;

CREATE TABLE `tb_bdstudi` (
  `id_bdstudi` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(128) NOT NULL,
  PRIMARY KEY (`id_bdstudi`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

INSERT INTO tb_bdstudi VALUES("1","Ilmu Komputer");
INSERT INTO tb_bdstudi VALUES("2","Akuntansi");
INSERT INTO tb_bdstudi VALUES("3","Robotika");



DROP TABLE tb_dosen;

CREATE TABLE `tb_dosen` (
  `id_dosen` int(11) NOT NULL AUTO_INCREMENT,
  `nidn` varchar(32) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `bdstudi` varchar(128) NOT NULL,
  PRIMARY KEY (`id_dosen`),
  UNIQUE KEY `nidn` (`nidn`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

INSERT INTO tb_dosen VALUES("1","0103107805","Lismardiana, ST.,MM.,M.Kom","Ilmu Komputer");
INSERT INTO tb_dosen VALUES("2","9901121937","Tulus Sihaloho, M.Kom","Ilmu Komputer");
INSERT INTO tb_dosen VALUES("3","0118078901","Dede Prabowo Wiguna, M.Si","Ilmu Komputer");
INSERT INTO tb_dosen VALUES("4","0103107231","Lastiana Dewi, S.Kom","Ilmu Komputer");
INSERT INTO tb_dosen VALUES("5","8803107801","Budi Hermawan, MM","Akuntansi");
INSERT INTO tb_dosen VALUES("6","5703107802","Ahmad Dodi Kurnia, ST., M.Kom","Robotika");
INSERT INTO tb_dosen VALUES("7","0103107445","Heru Santoso, ST","Robotika");
INSERT INTO tb_dosen VALUES("8","0105107232","Irene Kumala, MM., SE","Akuntansi");
INSERT INTO tb_dosen VALUES("9","0127078902","Andika Purba, S.Kom","Ilmu Komputer");
INSERT INTO tb_dosen VALUES("10","1103107261","George Indra, M.Kom","Robotika");
INSERT INTO tb_dosen VALUES("11","1103107265","Listiawan Sudradjat, M.Kom","Ilmu Komputer");



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
INSERT INTO tb_siswa VALUES("20","16211037","Agus Salim","Sistem Analis");
INSERT INTO tb_siswa VALUES("21","16211038","Yayan Ginting","Sistem Analis");
INSERT INTO tb_siswa VALUES("22","16211039","David Prihartanto","Teknik Informatika");
INSERT INTO tb_siswa VALUES("23","16211040","Surya Cendana F","Sistem Informasi");
INSERT INTO tb_siswa VALUES("24","16211041","Welas Kinasih L","Teknik Informatika");
INSERT INTO tb_siswa VALUES("25","16211042","Widia Sri Dewi","Sistem Analis");
INSERT INTO tb_siswa VALUES("26","16211043","Anjas Kurniawan M","Arsitektur Komputer");
INSERT INTO tb_siswa VALUES("27","16211044","Hery Dwi Jadjanto","Teknik Informatika");



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
INSERT INTO tb_user VALUES("0118078901","Dede Prabowo Wiguna, M.Si","202cb962ac59075b964b07152d234b70","Dosen","3","");
INSERT INTO tb_user VALUES("0127078902","Andika Purba, S.Kom","202cb962ac59075b964b07152d234b70","Dosen","9","");
INSERT INTO tb_user VALUES("16211006","Atifa Zahra Anum","202cb962ac59075b964b07152d234b70","Siswa","","1");
INSERT INTO tb_user VALUES("16211008","Darmawati","202cb962ac59075b964b07152d234b70","Siswa","","2");
INSERT INTO tb_user VALUES("16211009","Delvia Rani BR Bangun","202cb962ac59075b964b07152d234b70","Siswa","","3");
INSERT INTO tb_user VALUES("16211012","Rere Sukma UM","202cb962ac59075b964b07152d234b70","Siswa","","7");
INSERT INTO tb_user VALUES("16211013","Putrie Derma Hanum","202cb962ac59075b964b07152d234b70","Siswa","","8");
INSERT INTO tb_user VALUES("16211015","Fahri Taruma Hulu","202cb962ac59075b964b07152d234b70","Siswa","","10");
INSERT INTO tb_user VALUES("16211018","Febrian We","202cb962ac59075b964b07152d234b70","Siswa","","11");
INSERT INTO tb_user VALUES("16211020","Galih Poernomo","202cb962ac59075b964b07152d234b70","Siswa","","12");
INSERT INTO tb_user VALUES("16211021","Setiawan Iwan","202cb962ac59075b964b07152d234b70","Siswa","","13");
INSERT INTO tb_user VALUES("16211024","Teresia Ginting","202cb962ac59075b964b07152d234b70","Siswa","","14");
INSERT INTO tb_user VALUES("16211027","Dody Permana Putra","202cb962ac59075b964b07152d234b70","Siswa","","15");
INSERT INTO tb_user VALUES("16211030","Jaka Firmansyah","202cb962ac59075b964b07152d234b70","Siswa","","16");
INSERT INTO tb_user VALUES("16211033","Ineke Putri","202cb962ac59075b964b07152d234b70","Siswa","","18");
INSERT INTO tb_user VALUES("16211035","Darlin Herwanto","202cb962ac59075b964b07152d234b70","Siswa","","19");
INSERT INTO tb_user VALUES("16211038","Yayan Ginting","202cb962ac59075b964b07152d234b70","Siswa","","21");
INSERT INTO tb_user VALUES("16211039","David Prihartanto","202cb962ac59075b964b07152d234b70","Siswa","","22");
INSERT INTO tb_user VALUES("16211040","Surya Cendana F","202cb962ac59075b964b07152d234b70","Siswa","","23");
INSERT INTO tb_user VALUES("16211041","Welas Kinasih L","202cb962ac59075b964b07152d234b70","Siswa","","24");
INSERT INTO tb_user VALUES("16211044","Hery Dwi Jadjanto","202cb962ac59075b964b07152d234b70","Siswa","","27");
INSERT INTO tb_user VALUES("5703107802","Ahmad Dodi Kurnia, ST., M.Kom","202cb962ac59075b964b07152d234b70","Dosen","6","");
INSERT INTO tb_user VALUES("8803107801","Budi Hermawan, MM","202cb962ac59075b964b07152d234b70","Dosen","5","");
INSERT INTO tb_user VALUES("9901121937","Tulus Sihaloho, M.Kom","202cb962ac59075b964b07152d234b70","Dosen","2","");
INSERT INTO tb_user VALUES("prodi","APP Prodi","202cb962ac59075b964b07152d234b70","Prodi","0","0");



