

CREATE TABLE `tb_diagnosa` (
  `id_diagnosa` varchar(50) NOT NULL,
  `icd` varchar(50) NOT NULL,
  `diagnosa` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



INSERT INTO `tb_diagnosa` (`id_diagnosa`, `icd`, `diagnosa`) VALUES
('0e833e22-e014-4625-9aba-f63ab970dc8b', 'A-12', 'Penyakit Covid-19'),
('502f918b-5a75-4aac-b500-eeedcf2a8879', 'A-01', 'Penyakit Kanker'),
('65ff57dc-8dca-4d08-a859-c258d4a6a880', 'A-10', 'Penyakit Stroke'),
('ab26aa9c-c726-4a2d-a6c8-f1ef458d7b5a', 'A-11', 'Penyakit Kolera'),
('d0e10485-31a6-41d4-9931-ebf71dd1ca2e', 'A-09', 'Penyakit tipez'),
('e19e7cd0-d63b-4c71-be23-c80273e7e4de', 'A-02', 'Penyakit Hepatitis'),
('e52e1798-d6e5-4785-8730-256e4c1cd621', 'A-03', 'Penyakit Jantung');


CREATE TABLE `tb_dokter` (
  `id_dokter` varchar(50) NOT NULL,
  `nama_dokter` varchar(80) NOT NULL,
  `jenis_kelamin` enum('laki-laki','perempuan') NOT NULL,
  `alamat` text NOT NULL,
  `spesialis` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_dokter`
--

INSERT INTO `tb_dokter` (`id_dokter`, `nama_dokter`, `jenis_kelamin`, `alamat`, `spesialis`) VALUES
('1a83e0ba-0b6a-415c-88f2-8943f8b07006', 'Dr. Muh. Nur Salam', 'laki-laki', 'Jl. Skarda N No.27 A', 'Psikologi'),
('aa075909-80c7-407d-b89e-dcf2d39a3ff2', 'Dr. Fathur Rahman', 'laki-laki', 'Jl. Sungguminasa', 'USG'),
('bb509f44-bd5c-44b0-a81c-7220d4148c18', 'Dr. Ariska Sarif', 'perempuan', 'Jl. Baraka Enrekang', 'Jantung');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pasien`
--

CREATE TABLE `tb_pasien` (
  `id_pasien` varchar(50) NOT NULL,
  `no_rekam` varchar(30) NOT NULL,
  `nama_pasien` varchar(80) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jenis_kelamin` enum('Laki-Laki','Perempuan') NOT NULL,
  `alamat` text NOT NULL,
  `no_kepesertaan` varchar(50) NOT NULL,
  `no_sep` varchar(50) NOT NULL,
  `id_poli` varchar(50) NOT NULL,
  `jenis_pasien` enum('bpjs','non bpjs') NOT NULL,
  `id_dokter` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pasien`
--

INSERT INTO `tb_pasien` (`id_pasien`, `no_rekam`, `nama_pasien`, `tempat_lahir`, `tgl_lahir`, `jenis_kelamin`, `alamat`, `no_kepesertaan`, `no_sep`, `id_poli`, `jenis_pasien`, `id_dokter`) VALUES
('8b494342-295b-4eb3-9938-b1764ead00ce', '123', 'Iqbal', 'Gowa', '2021-02-08', 'Perempuan', 'gowa', '456', '789', '449aaf41-346b-47fa-a489-95da327aa606', 'bpjs', 'aa075909-80c7-407d-b89e-dcf2d39a3ff2');

-- --------------------------------------------------------

--
-- Table structure for table `tb_poliklinik`
--

CREATE TABLE `tb_poliklinik` (
  `id_poli` varchar(50) NOT NULL,
  `nama_poli` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_poliklinik`
--

INSERT INTO `tb_poliklinik` (`id_poli`, `nama_poli`) VALUES
('449aaf41-346b-47fa-a489-95da327aa606', 'Kanker'),
('65bbd90a-8d93-47fd-8356-cd4eebb33c67', 'USG'),
('9a91d114-a64f-4185-9e6b-b80711f6822c', 'Covid-20');



CREATE TABLE `tb_user` (
  `id_user` varchar(50) NOT NULL,
  `nama_user` varchar(80) NOT NULL,
  `ruangan` varchar(10) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` enum('1','2','3') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO `tb_user` (`id_user`, `nama_user`, `ruangan`, `username`, `password`, `level`) VALUES
('6c8ce31d-56fd-11eb-9b42-e86a64599d34', 'salam', 'satu', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', '1');


CREATE TABLE `tb_periksa` (
  `id` int(11) NOT NULL,
  `id_pasien` varchar(50) NOT NULL,
  `id_dokter` varchar(50) NOT NULL,
  `id_diagnosa` varchar(50) NOT NULL,
  `id_poli` varchar(50) NOT NULL,
  `tindakan` longtext NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `tb_diagnosa`
  ADD PRIMARY KEY (`id_diagnosa`);

ALTER TABLE `tb_dokter`
  ADD PRIMARY KEY (`id_dokter`);

ALTER TABLE `tb_pasien`
  ADD PRIMARY KEY (`id_pasien`);

ALTER TABLE `tb_poliklinik`
  ADD PRIMARY KEY (`id_poli`);

ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

ALTER TABLE `tb_periksa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_diagnosa` (`id_diagnosa`),
  ADD KEY `id_dokter` (`id_dokter`),
  ADD KEY `id_poli` (`id_poli`),
  ADD KEY `id_pasien` (`id_pasien`);

ALTER TABLE `tb_periksa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
  
ALTER TABLE `tb_periksa`
  ADD CONSTRAINT `tb_periksa_ibfk_1` FOREIGN KEY (`id_diagnosa`) REFERENCES `tb_diagnosa` (`id_diagnosa`),
  ADD CONSTRAINT `tb_periksa_ibfk_2` FOREIGN KEY (`id_dokter`) REFERENCES `tb_dokter` (`id_dokter`),
  ADD CONSTRAINT `tb_periksa_ibfk_3` FOREIGN KEY (`id_poli`) REFERENCES `tb_poliklinik` (`id_poli`),
  ADD CONSTRAINT `tb_periksa_ibfk_4` FOREIGN KEY (`id_pasien`) REFERENCES `tb_pasien` (`id_pasien`);
COMMIT;