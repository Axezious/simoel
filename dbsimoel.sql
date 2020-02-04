-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 08, 2018 at 12:08 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbsimoel`
--

-- --------------------------------------------------------

--
-- Table structure for table `driver`
--

CREATE TABLE `driver` (
  `idDriver` int(11) NOT NULL,
  `idJadwal` int(11) NOT NULL,
  `namaDriver` varchar(100) NOT NULL,
  `ktp` int(50) NOT NULL,
  `alamat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `driver`
--

INSERT INTO `driver` (`idDriver`, `idJadwal`, `namaDriver`, `ktp`, `alamat`) VALUES
(1, 1, 'Ahmad Faiz', 13245689, ''),
(3, 0, 'Sutejo', 2147483647, 'Jalan Margonda Raya No.151'),
(4, 0, 'Suratno', 213987238, 'Jalan Kp.Baru '),
(5, 0, 'Iqbal', 12312312, 'Jalan Kramat Banget'),
(6, 0, 'Wahyudi', 12312312, 'Jalan Sawangan Indah No.121'),
(7, 0, 'Surti', 1298317281, '');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `idJadwal` int(11) NOT NULL,
  `idDriver` int(11) NOT NULL,
  `idKendaraan` int(11) NOT NULL,
  `tujuan` varchar(100) NOT NULL,
  `tglBerangkat` varchar(100) NOT NULL,
  `kepentingan` varchar(100) NOT NULL,
  `idPegawai` int(11) NOT NULL,
  `lamaWaktu` int(11) NOT NULL,
  `statusPerjalanan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`idJadwal`, `idDriver`, `idKendaraan`, `tujuan`, `tglBerangkat`, `kepentingan`, `idPegawai`, `lamaWaktu`, `statusPerjalanan`) VALUES
(1, 1, 1, 'Mangga Dua', '27-11-2018', 'Beli Alat ', 1, 1, 'Terjadwal'),
(2, 1, 6, 'Mangga Dua', '24-11-2018', 'Beli Alat ', 2, 1, 'Terjadwal'),
(3, 1, 3, 'Mangga Dua', '29-11-2018', 'Beli Alat ', 1, 1, 'Terjadwal'),
(4, 5, 4, 'Mangga Dua', '24-11-2018', 'Beli Alat ', 2, 1, 'Terjadwal'),
(5, 5, 2, 'Depok', '24-11-2018', 'Kepo', 2, 4, 'Terjadwal'),
(6, 6, 4, 'Mangga Dua', '07-11-2018', 'Kepo', 1, 4, 'Terjadwal');

-- --------------------------------------------------------

--
-- Table structure for table `kendaraan`
--

CREATE TABLE `kendaraan` (
  `idKendaraan` int(11) NOT NULL,
  `namaKendaraan` varchar(20) NOT NULL,
  `merkKendaraan` varchar(20) NOT NULL,
  `bahanBakar` varchar(15) NOT NULL,
  `tglPajak` varchar(15) NOT NULL,
  `platKendaraan` varchar(11) NOT NULL,
  `statusKendaraan` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kendaraan`
--

INSERT INTO `kendaraan` (`idKendaraan`, `namaKendaraan`, `merkKendaraan`, `bahanBakar`, `tglPajak`, `platKendaraan`, `statusKendaraan`) VALUES
(1, 'Mobilio', 'Honda', 'Pertalite', '2022-10-01', 'B3333ELT', ''),
(2, 'Fortuner', 'Toyota', 'Pertalite', '2019-02-01', 'B2031BXT', ''),
(3, 'Agya', 'Toyota', 'Pertalite', '2010-09-07', 'B 12 TUY', ''),
(4, 'Elf', 'Suzuki', 'Solar', '2010-09-07', 'B3333EYE', ''),
(5, 'Ignis', 'Suzuki', 'Pertalite', '2020-08-10', 'B2022EGP', ''),
(6, 'Carrera', 'Porsche', 'Pertamax Turbo', '2020-08-10', 'B 1 JKT', ''),
(7, 'Sienta', 'Toyota', 'Pertalite', '2019-02-01', 'B 2341 UY', '');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `idPegawai` int(11) NOT NULL,
  `namaPegawai` varchar(50) NOT NULL,
  `jabatanPegawai` varchar(20) NOT NULL,
  `statusPegawai` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`idPegawai`, `namaPegawai`, `jabatanPegawai`, `statusPegawai`) VALUES
(1, 'Syarifudin', 'Kepala Bengkel', 'aktif'),
(2, 'Syafii', 'Teknisi', 'aktif');

-- --------------------------------------------------------

--
-- Table structure for table `pemeliharaan`
--

CREATE TABLE `pemeliharaan` (
  `idPemeliharaan` int(11) NOT NULL,
  `idKendaraan` int(11) NOT NULL,
  `oliMesin` varchar(100) NOT NULL,
  `airRadiator` varchar(100) NOT NULL,
  `kondisiRem` varchar(100) NOT NULL,
  `kondisiAccu` varchar(100) NOT NULL,
  `kondisiLampu` varchar(100) NOT NULL,
  `statusPemeliharaan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemeliharaan`
--

INSERT INTO `pemeliharaan` (`idPemeliharaan`, `idKendaraan`, `oliMesin`, `airRadiator`, `kondisiRem`, `kondisiAccu`, `kondisiLampu`, `statusPemeliharaan`) VALUES
(1, 1, 'ok', 'ok', 'ok', 'ok', 'ok', 'Layak Jalan');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `iduser` int(2) NOT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `lastlogin` datetime DEFAULT NULL,
  `stuser` int(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`iduser`, `username`, `password`, `lastlogin`, `stuser`) VALUES
(1, 'administrator', 'e10adc3949ba59abbe56e057f20f883e', NULL, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `driver`
--
ALTER TABLE `driver`
  ADD PRIMARY KEY (`idDriver`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`idJadwal`);

--
-- Indexes for table `kendaraan`
--
ALTER TABLE `kendaraan`
  ADD PRIMARY KEY (`idKendaraan`);

--
-- Indexes for table `pemeliharaan`
--
ALTER TABLE `pemeliharaan`
  ADD PRIMARY KEY (`idPemeliharaan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`iduser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `driver`
--
ALTER TABLE `driver`
  MODIFY `idDriver` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `idJadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pemeliharaan`
--
ALTER TABLE `pemeliharaan`
  MODIFY `idPemeliharaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `iduser` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
