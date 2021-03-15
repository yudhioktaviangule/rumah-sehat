

CREATE TABLE `tb_diagnosa` (
  `id_diagnosa` varchar(50) NOT NULL,
  `icd` varchar(50) NOT NULL,
  `diagnosa` text NOT NULL
);


INSERT INTO `tb_diagnosa` (`id_diagnosa`, `icd`, `diagnosa`) VALUES
('0e833e22-e014-4625-9aba-f63ab970dc8b', 'A-12', 'Penyakit Covid-19'),
('502f918b-5a75-4aac-b500-eeedcf2a8879', 'A-01', 'Penyakit Kanker'),
('65ff57dc-8dca-4d08-a859-c258d4a6a880', 'A-10', 'Penyakit Stroke'),
('ab26aa9c-c726-4a2d-a6c8-f1ef458d7b5a', 'A-11', 'Penyakit Kolera'),
('d0e10485-31a6-41d4-9931-ebf71dd1ca2e', 'A-09', 'Penyakit tipez'),
('e19e7cd0-d63b-4c71-be23-c80273e7e4de', 'A-02', 'Penyakit Hepatitis'),
('e52e1798-d6e5-4785-8730-256e4c1cd621', 'A-03', 'Penyakit Jantung');

-- --------------------------------------------------------

--
-- Table structure for table `tb_dokter`
--

CREATE TABLE `tb_dokter` (
  `id_dokter` varchar(50) NOT NULL,
  `nama_dokter` varchar(80) NOT NULL,
  `jenis_kelamin` enum('laki-laki','perempuan') NOT NULL,
  `alamat` text NOT NULL,
  `spesialis` varchar(100) NOT NULL
);

--
-- Dumping data for table `tb_dokter`
--

INSERT INTO `tb_dokter` (`id_dokter`, `nama_dokter`, `jenis_kelamin`, `alamat`, `spesialis`) VALUES
('1a83e0ba-0b6a-415c-88f2-8943f8b07006', 'Dr. Muh. Nur Salam', 'laki-laki', 'Jl. Skarda N No.27 A', 'Psikologi'),
('aa075909-80c7-407d-b89e-dcf2d39a3ff2', 'Dr. Fathur Rahman', 'laki-laki', 'Jl. Sungguminasa', 'USG'),
('bb509f44-bd5c-44b0-a81c-7220d4148c18', 'Dr. Ariska Sarif', 'perempuan', 'Jl. Baraka Enrekang', 'Jantung');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kunjungan`
--

CREATE TABLE `tb_kunjungan` (
  `id` bigint NOT NULL,
  `nomor` varchar(50) NOT NULL,
  `id_pasien` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `id_poli` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tanggal` date NOT NULL,
  `id_user` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
);

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
  `jenis_pasien` enum('bpjs','non bpjs') NOT NULL
);

--
-- Dumping data for table `tb_pasien`
--

INSERT INTO `tb_pasien` (`id_pasien`, `no_rekam`, `nama_pasien`, `tempat_lahir`, `tgl_lahir`, `jenis_kelamin`, `alamat`, `no_kepesertaan`, `no_sep`, `jenis_pasien`) VALUES
('3c812b87-3421-4426-91e7-c31f178dd279', 'PK2021030001', 'Salam', 'Ujung Pandang', '1990-02-20', 'Laki-Laki', 'asassa', '16032021-0001', '1234', 'bpjs');

-- --------------------------------------------------------

--
-- Table structure for table `tb_periksa`
--

CREATE TABLE `tb_periksa` (
  `id` int NOT NULL,
  `id_pasien` varchar(50) NOT NULL,
  `id_dokter` varchar(50) NOT NULL,
  `id_diagnosa` varchar(50) NOT NULL,
  `id_poli` varchar(50) NOT NULL,
  `tindakan` longtext NOT NULL,
  `tanggal` date NOT NULL
);

-- --------------------------------------------------------

--
-- Table structure for table `tb_poliklinik`
--

CREATE TABLE `tb_poliklinik` (
  `id_poli` varchar(50) NOT NULL,
  `nama_poli` varchar(50) NOT NULL
);

--
-- Dumping data for table `tb_poliklinik`
--

INSERT INTO `tb_poliklinik` (`id_poli`, `nama_poli`) VALUES
('449aaf41-346b-47fa-a489-95da327aa606', 'Kanker'),
('65bbd90a-8d93-47fd-8356-cd4eebb33c67', 'USG'),
('9a91d114-a64f-4185-9e6b-b80711f6822c', 'Covid-20');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` varchar(50) NOT NULL,
  `nama_user` varchar(80) NOT NULL,
  `ruangan` varchar(10) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` enum('admin','pelaporan','fo','dokter') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'admin'
);

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nama_user`, `ruangan`, `username`, `password`, `level`) VALUES
('129e369e9b1d0165c0ac41b433fe0e0447937680', 'Yudhi Oktavian', '101', 'yudhi', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'fo'),
('6c8ce31d-56fd-11eb-9b42-e86a64599d34', 'salam', 'satu', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_diagnosa`
--
ALTER TABLE `tb_diagnosa`
  ADD PRIMARY KEY (`id_diagnosa`);

--
-- Indexes for table `tb_dokter`
--
ALTER TABLE `tb_dokter`
  ADD PRIMARY KEY (`id_dokter`);

--
-- Indexes for table `tb_kunjungan`
--
ALTER TABLE `tb_kunjungan`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `indx_no_kunj` (`nomor`),
  ADD KEY `kunjungan_pasien_rel` (`id_pasien`),
  ADD KEY `kunjungan_poli_rel` (`id_poli`),
  ADD KEY `kunjungan_user` (`id_user`);

--
-- Indexes for table `tb_pasien`
--
ALTER TABLE `tb_pasien`
  ADD PRIMARY KEY (`id_pasien`),
  ADD UNIQUE KEY `pasien_kepesertaan` (`no_kepesertaan`);

--
-- Indexes for table `tb_periksa`
--
ALTER TABLE `tb_periksa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_diagnosa` (`id_diagnosa`),
  ADD KEY `id_poli` (`id_poli`),
  ADD KEY `id_pasien` (`id_pasien`);

--
-- Indexes for table `tb_poliklinik`
--
ALTER TABLE `tb_poliklinik`
  ADD PRIMARY KEY (`id_poli`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_kunjungan`
--
ALTER TABLE `tb_kunjungan`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_periksa`
--
ALTER TABLE `tb_periksa`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_kunjungan`
--
ALTER TABLE `tb_kunjungan`
  ADD CONSTRAINT `kunjungan_pasien_rel` FOREIGN KEY (`id_pasien`) REFERENCES `tb_pasien` (`id_pasien`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kunjungan_poli_rel` FOREIGN KEY (`id_poli`) REFERENCES `tb_poliklinik` (`id_poli`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kunjungan_user` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
