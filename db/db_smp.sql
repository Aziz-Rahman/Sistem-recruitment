-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 25, 2016 at 09:58 AM
-- Server version: 10.0.17-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_smp`
--

-- --------------------------------------------------------

--
-- Table structure for table `agama`
--

CREATE TABLE `agama` (
  `id_agama` int(2) NOT NULL,
  `agama` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `agama`
--

INSERT INTO `agama` (`id_agama`, `agama`) VALUES
(1, 'Islam'),
(2, 'Kristen'),
(3, 'Katolik'),
(4, 'Budha'),
(5, 'Hindu');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` double NOT NULL,
  `nama_kelas` varchar(15) NOT NULL,
  `level` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `nama_kelas`, `level`) VALUES
(1, 'SMP-7A', 'SMP-7'),
(2, 'SMP-7B', 'SMP-7'),
(3, 'SMP-8A', 'SMP-8');

-- --------------------------------------------------------

--
-- Table structure for table `mata_pelajaran`
--

CREATE TABLE `mata_pelajaran` (
  `id_mapel` int(11) NOT NULL,
  `kode_mapel` varchar(20) NOT NULL,
  `mapel` varchar(100) NOT NULL,
  `level` enum('1','2','3') NOT NULL,
  `keterangan` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mata_pelajaran`
--

INSERT INTO `mata_pelajaran` (`id_mapel`, `kode_mapel`, `mapel`, `level`, `keterangan`) VALUES
(1, 'Mtk-mp', 'Matematika', '1', 'Mantep nih ');

-- --------------------------------------------------------

--
-- Table structure for table `orang_tua`
--

CREATE TABLE `orang_tua` (
  `id_orang_tua` int(11) NOT NULL,
  `nama_ayah` varchar(50) NOT NULL,
  `tempat_lahir_ayah` varchar(50) NOT NULL,
  `tanggal_lahir_ayah` date DEFAULT NULL,
  `id_agama_ayah` int(2) NOT NULL,
  `kewarganegaraan_ayah` int(2) NOT NULL,
  `id_pendidikan_ayah` int(3) NOT NULL,
  `id_pekerjaan_ayah` int(3) NOT NULL,
  `penghasilan_ayah` varchar(20) NOT NULL,
  `alamat_ayah` varchar(225) NOT NULL,
  `no_telp_ayah` varchar(15) NOT NULL,
  `ket_hidup_ayah` varchar(100) NOT NULL,
  `nama_ibu` varchar(50) NOT NULL,
  `tempat_lahir_ibu` varchar(50) NOT NULL,
  `tanggal_lahir_ibu` date DEFAULT NULL,
  `id_agama_ibu` int(2) NOT NULL,
  `kewarganegaraan_ibu` varchar(2) NOT NULL,
  `id_pendidikan_ibu` int(3) NOT NULL,
  `id_pekerjaan_ibu` int(3) NOT NULL,
  `penghasilan_ibu` varchar(20) NOT NULL,
  `alamat_ibu` varchar(225) NOT NULL,
  `no_telp_ibu` varchar(15) NOT NULL,
  `ket_hidup_ibu` varchar(100) NOT NULL,
  `nama_wali` varchar(50) NOT NULL,
  `tempat_lahir_wali` varchar(50) NOT NULL,
  `tanggal_lahir_wali` date DEFAULT NULL,
  `id_agama_wali` int(2) NOT NULL,
  `kewarganegaraan_wali` varchar(2) NOT NULL,
  `id_pendidikan_wali` int(3) NOT NULL,
  `id_pekerjaan_wali` int(3) NOT NULL,
  `penghasilan_wali` varchar(20) NOT NULL,
  `alamat_wali` varchar(225) NOT NULL,
  `no_telp_wali` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pengguna_kelas`
--

CREATE TABLE `pengguna_kelas` (
  `id` double NOT NULL,
  `nis` int(7) NOT NULL,
  `id_kelas` double NOT NULL,
  `nik` varchar(10) NOT NULL,
  `ta` varchar(9) NOT NULL,
  `tgl` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengguna_kelas`
--

INSERT INTO `pengguna_kelas` (`id`, `nis`, `id_kelas`, `nik`, `ta`, `tgl`) VALUES
(1, 1600361, 1, '1507079', '2016/2017', '2016-09-07'),
(2, 1600355, 1, '1507079', '2016/2017', '2016-09-07'),
(3, 1600366, 1, '1507079', '2016/2017', '2016-09-07'),
(4, 1600368, 1, '1507079', '2016/2017', '2016-09-07'),
(5, 1600372, 1, '1507079', '2016/2017', '2016-09-07'),
(6, 1600365, 1, '1507079', '2016/2017', '2016-09-07'),
(7, 1600373, 1, '1507079', '2016/2017', '2016-09-07'),
(8, 1600374, 1, '1507079', '2016/2017', '2016-09-07'),
(9, 1600377, 1, '1507079', '2016/2017', '2016-09-07'),
(10, 1320005, 1, '1507079', '2016/2017', '2016-09-07'),
(11, 1320019, 1, '1507079', '2016/2017', '2016-09-07'),
(12, 1320014, 1, '1507079', '2016/2017', '2016-09-07'),
(13, 1320018, 1, '1507079', '2016/2017', '2016-09-07'),
(14, 1320001, 1, '1507079', '2016/2017', '2016-09-07'),
(15, 1320006, 1, '1507079', '2016/2017', '2016-09-07'),
(16, 1320017, 1, '1507079', '2016/2017', '2016-09-07'),
(17, 1320011, 1, '1507079', '2016/2017', '2016-09-07'),
(18, 1320021, 1, '1507079', '2016/2017', '2016-09-07'),
(19, 1600348, 2, '1507088', '2016/2017', '2016-09-07'),
(20, 1600350, 2, '1507088', '2016/2017', '2016-09-07'),
(21, 1600345, 2, '1507088', '2016/2017', '2016-09-07'),
(22, 1600354, 2, '1507088', '2016/2017', '2016-09-07'),
(23, 1600363, 2, '1507088', '2016/2017', '2016-09-07'),
(24, 1600369, 2, '1507088', '2016/2017', '2016-09-07'),
(25, 1600375, 2, '1507088', '2016/2017', '2016-09-07'),
(26, 1600376, 2, '1507088', '2016/2017', '2016-09-07'),
(27, 1320010, 2, '1507088', '2016/2017', '2016-09-07'),
(28, 1320008, 2, '1507088', '2016/2017', '2016-09-07'),
(29, 1320009, 2, '1507088', '2016/2017', '2016-09-07'),
(30, 1320003, 2, '1507088', '2016/2017', '2016-09-07'),
(31, 1320002, 2, '1507088', '2016/2017', '2016-09-07'),
(32, 1320013, 2, '1507088', '2016/2017', '2016-09-07'),
(33, 1320012, 2, '1507088', '2016/2017', '2016-09-07'),
(34, 1420001, 2, '1507088', '2016/2017', '2016-09-07'),
(35, 1320016, 2, '1507088', '2016/2017', '2016-09-07'),
(36, 1500401, 3, '1607126', '2016/2017', '2016-09-07'),
(37, 1500402, 3, '1607126', '2016/2017', '2016-09-07'),
(38, 1500403, 3, '1607126', '2016/2017', '2016-09-07'),
(39, 1500404, 3, '1607126', '2016/2017', '2016-09-07'),
(40, 1500406, 3, '1607126', '2016/2017', '2016-09-07'),
(41, 1500407, 3, '1607126', '2016/2017', '2016-09-07'),
(42, 1500410, 3, '1607126', '2016/2017', '2016-09-07'),
(43, 1500412, 3, '1607126', '2016/2017', '2016-09-07'),
(44, 1500416, 3, '1607126', '2016/2017', '2016-09-07'),
(45, 1500418, 3, '1607126', '2016/2017', '2016-09-07'),
(46, 1500419, 3, '1607126', '2016/2017', '2016-09-07'),
(47, 1500420, 3, '1607126', '2016/2017', '2016-09-07'),
(48, 1500421, 3, '1607126', '2016/2017', '2016-09-07'),
(49, 1500423, 3, '1607126', '2016/2017', '2016-09-07'),
(50, 1500426, 3, '1607126', '2016/2017', '2016-09-07'),
(51, 1500427, 3, '1607126', '2016/2017', '2016-09-07'),
(52, 1500430, 3, '1607126', '2016/2017', '2016-09-07'),
(53, 1500432, 3, '1607126', '2016/2017', '2016-09-07');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `nis` varchar(10) NOT NULL,
  `nisn` varchar(50) NOT NULL,
  `nama_siswa` varchar(50) NOT NULL,
  `nama_panggilan` varchar(20) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `id_agama` int(2) NOT NULL,
  `kewarganegaraan` enum('1','2') NOT NULL COMMENT '1 = wni, 2 = wna',
  `anak_ke` varchar(20) NOT NULL,
  `jml_saudara_kandung` varchar(20) NOT NULL,
  `jml_saudara_tiri` varchar(20) NOT NULL,
  `jml_saudara_angkat` varchar(20) NOT NULL,
  `status_anak` enum('0','1','2','3') NOT NULL COMMENT '0 = lengkap , 1 = yatim, 2 = piatu, 3 = yatim piatu',
  `bahasa_sehari_hari` varchar(50) NOT NULL,
  `alamat` varchar(225) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `tinggal_dengan` enum('1','2','3','4') NOT NULL COMMENT '1 = ortu, 2 = saudara, 3 = asrama, 4 = kost',
  `jarak_rumah` varchar(20) NOT NULL,
  `gol_darah` varchar(5) NOT NULL,
  `pernah_sakit` varchar(100) NOT NULL,
  `kelainan_jasmani` varchar(100) NOT NULL,
  `tinggi_berat_badan` varchar(50) NOT NULL,
  `id_orang_tua` int(11) NOT NULL,
  `lulus_dari` varchar(70) NOT NULL,
  `tanggal_lulus` date DEFAULT NULL,
  `no_sttb` varchar(50) NOT NULL,
  `lama_belajar` varchar(20) NOT NULL,
  `pindah_dari_sekolah` varchar(70) NOT NULL,
  `alasan_pindah` varchar(100) NOT NULL,
  `diterima_ditingkat` varchar(20) NOT NULL,
  `kelompok` varchar(50) NOT NULL,
  `jurusan` varchar(70) NOT NULL,
  `tanggal_diterima` date DEFAULT NULL,
  `hobi_kesenian` varchar(100) NOT NULL,
  `olah_raga` varchar(100) NOT NULL,
  `organisasi` varchar(100) NOT NULL,
  `lain_lain` varchar(100) NOT NULL,
  `tahun1` varchar(15) NOT NULL,
  `tk1` varchar(50) NOT NULL,
  `dari1` varchar(50) NOT NULL,
  `tahun2` varchar(15) NOT NULL,
  `tk2` varchar(50) NOT NULL,
  `dari2` varchar(50) NOT NULL,
  `tahun3` varchar(15) NOT NULL,
  `tk3` varchar(50) NOT NULL,
  `dari3` varchar(50) NOT NULL,
  `tanggal_meninggalkan` date DEFAULT NULL,
  `alasan_meninggalkan` varchar(100) NOT NULL,
  `tahun_tamat_belajar` varchar(15) NOT NULL,
  `no_sttb2` varchar(50) NOT NULL,
  `melanjutkan_di` varchar(70) NOT NULL,
  `tanggal_mulai_kerja` date DEFAULT NULL,
  `nama_perusahaan` varchar(100) NOT NULL,
  `penghasilan` varchar(30) NOT NULL,
  `foto` varchar(30) NOT NULL,
  `status_siswa` enum('1','2') NOT NULL COMMENT '1 = aktif, 2 - tidak aktif'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`nis`, `nisn`, `nama_siswa`, `nama_panggilan`, `jenis_kelamin`, `tempat_lahir`, `tgl_lahir`, `id_agama`, `kewarganegaraan`, `anak_ke`, `jml_saudara_kandung`, `jml_saudara_tiri`, `jml_saudara_angkat`, `status_anak`, `bahasa_sehari_hari`, `alamat`, `no_telp`, `tinggal_dengan`, `jarak_rumah`, `gol_darah`, `pernah_sakit`, `kelainan_jasmani`, `tinggi_berat_badan`, `id_orang_tua`, `lulus_dari`, `tanggal_lulus`, `no_sttb`, `lama_belajar`, `pindah_dari_sekolah`, `alasan_pindah`, `diterima_ditingkat`, `kelompok`, `jurusan`, `tanggal_diterima`, `hobi_kesenian`, `olah_raga`, `organisasi`, `lain_lain`, `tahun1`, `tk1`, `dari1`, `tahun2`, `tk2`, `dari2`, `tahun3`, `tk3`, `dari3`, `tanggal_meninggalkan`, `alasan_meninggalkan`, `tahun_tamat_belajar`, `no_sttb2`, `melanjutkan_di`, `tanggal_mulai_kerja`, `nama_perusahaan`, `penghasilan`, `foto`, `status_siswa`) VALUES
('1320001', '', 'Celine Anggana', '', 'L', '', '2004-02-09', 0, '1', '', '', '', '', '0', '', '', '', '1', '', '', '', '', '', 0, '', NULL, '', '', '', '', '', '', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, '', '', '', '', NULL, '', '', '', '1'),
('1320002', '', 'Cellin Purnawan', '', 'L', '', '2004-12-09', 0, '1', '', '', '', '', '0', '', '', '', '1', '', '', '', '', '', 0, '', NULL, '', '', '', '', '', '', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, '', '', '', '', NULL, '', '', '', '1'),
('1320003', '', 'Ellen Angeline Tsai', '', 'L', '', '2004-05-28', 0, '1', '', '', '', '', '0', '', '', '', '1', '', '', '', '', '', 0, '', NULL, '', '', '', '', '', '', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, '', '', '', '', NULL, '', '', '', '1'),
('1320005', '', 'Felix Liu', '', 'L', '', '2004-05-08', 0, '1', '', '', '', '', '0', '', '', '', '1', '', '', '', '', '', 0, '', NULL, '', '', '', '', '', '', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, '', '', '', '', NULL, '', '', '', '1'),
('1320006', '', 'Fiona Theodora Budiman', '', 'L', '', '2004-10-10', 0, '1', '', '', '', '', '0', '', '', '', '1', '', '', '', '', '', 0, '', NULL, '', '', '', '', '', '', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, '', '', '', '', NULL, '', '', '', '1'),
('1320008', '', 'Harllicent Tjoellin', '', 'L', '', '2004-08-09', 0, '1', '', '', '', '', '0', '', '', '', '1', '', '', '', '', '', 0, '', NULL, '', '', '', '', '', '', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, '', '', '', '', NULL, '', '', '', '1'),
('1320009', '', 'Jane Angeline', '', 'L', '', '2004-12-22', 0, '1', '', '', '', '', '0', '', '', '', '1', '', '', '', '', '', 0, '', NULL, '', '', '', '', '', '', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, '', '', '', '', NULL, '', '', '', '1'),
('1320010', '', 'Jennifer', '', 'L', '', '2003-07-27', 0, '1', '', '', '', '', '0', '', '', '', '1', '', '', '', '', '', 0, '', NULL, '', '', '', '', '', '', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, '', '', '', '', NULL, '', '', '', '1'),
('1320011', '', 'Johnson Christian Winata', '', 'L', '', '2004-04-05', 0, '1', '', '', '', '', '0', '', '', '', '1', '', '', '', '', '', 0, '', NULL, '', '', '', '', '', '', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, '', '', '', '', NULL, '', '', '', '1'),
('1320012', '', 'Joshua', '', 'L', '', '2004-02-16', 0, '1', '', '', '', '', '0', '', '', '', '1', '', '', '', '', '', 0, '', NULL, '', '', '', '', '', '', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, '', '', '', '', NULL, '', '', '', '1'),
('1320013', '', 'Laticia Kimberly Tanto', '', 'L', '', '2004-08-25', 0, '1', '', '', '', '', '0', '', '', '', '1', '', '', '', '', '', 0, '', NULL, '', '', '', '', '', '', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, '', '', '', '', NULL, '', '', '', '1'),
('1320014', '', 'Michael Darian Susanto', '', 'L', '', '2004-03-20', 0, '1', '', '', '', '', '0', '', '', '', '1', '', '', '', '', '', 0, '', NULL, '', '', '', '', '', '', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, '', '', '', '', NULL, '', '', '', '1'),
('1320016', '', 'Navelia Xelestine Tanto', '', 'L', '', '2004-10-25', 0, '1', '', '', '', '', '0', '', '', '', '1', '', '', '', '', '', 0, '', NULL, '', '', '', '', '', '', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, '', '', '', '', NULL, '', '', '', '1'),
('1320017', '', 'Peter Kurnianto', '', 'L', '', '2004-05-06', 0, '1', '', '', '', '', '0', '', '', '', '1', '', '', '', '', '', 0, '', NULL, '', '', '', '', '', '', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, '', '', '', '', NULL, '', '', '', '1'),
('1320018', '', 'Richard Jansent Sunggono', '', 'L', '', '2004-03-19', 0, '1', '', '', '', '', '0', '', '', '', '1', '', '', '', '', '', 0, '', NULL, '', '', '', '', '', '', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, '', '', '', '', NULL, '', '', '', '1'),
('1320019', '', 'Richie Vincent Effendi', '', 'L', '', '2004-09-28', 0, '1', '', '', '', '', '0', '', '', '', '1', '', '', '', '', '', 0, '', NULL, '', '', '', '', '', '', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, '', '', '', '', NULL, '', '', '', '1'),
('1320021', '', 'Vellycia Velika Nirwana', '', 'L', '', '2004-11-27', 0, '1', '', '', '', '', '0', '', '', '', '1', '', '', '', '', '', 0, '', NULL, '', '', '', '', '', '', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, '', '', '', '', NULL, '', '', '', '1'),
('1420001', '', 'Andri Dharmawan Suwandi', '', 'L', '', '2004-09-29', 0, '1', '', '', '', '', '0', '', '', '', '1', '', '', '', '', '', 0, '', NULL, '', '', '', '', '', '', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, '', '', '', '', NULL, '', '', '', '1'),
('1500401', '', 'Jihan Nila Safira', '', 'L', '', '2004-09-03', 0, '1', '', '', '', '', '0', '', '', '', '1', '', '', '', '', '', 0, '', NULL, '', '', '', '', '', '', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, '', '', '', '', NULL, '', '', '', '1'),
('1500402', '', 'Calvin Christian R.', '', 'L', '', '2003-02-07', 0, '1', '', '', '', '', '0', '', '', '', '1', '', '', '', '', '', 0, '', NULL, '', '', '', '', '', '', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, '', '', '', '', NULL, '', '', '', '1'),
('1500403', '', 'William Antonio', '', 'L', '', '2003-11-06', 0, '1', '', '', '', '', '0', '', '', '', '1', '', '', '', '', '', 0, '', NULL, '', '', '', '', '', '', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, '', '', '', '', NULL, '', '', '', '1'),
('1500404', '', 'Marchell Joeng Hans', '', 'L', '', '2002-12-28', 0, '1', '', '', '', '', '0', '', '', '', '1', '', '', '', '', '', 0, '', NULL, '', '', '', '', '', '', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, '', '', '', '', NULL, '', '', '', '1'),
('1500406', '', 'Victoria Vivian Lim', '', 'L', '', '2003-07-26', 0, '1', '', '', '', '', '0', '', '', '', '1', '', '', '', '', '', 0, '', NULL, '', '', '', '', '', '', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, '', '', '', '', NULL, '', '', '', '1'),
('1500407', '', 'Vincent', '', 'L', '', '2003-01-26', 0, '1', '', '', '', '', '0', '', '', '', '1', '', '', '', '', '', 0, '', NULL, '', '', '', '', '', '', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, '', '', '', '', NULL, '', '', '', '1'),
('1500410', '', 'Melvin Khang', '', 'L', '', '2004-03-17', 0, '1', '', '', '', '', '0', '', '', '', '1', '', '', '', '', '', 0, '', NULL, '', '', '', '', '', '', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, '', '', '', '', NULL, '', '', '', '1'),
('1500412', '', 'Stefan Garnett Harmasi', '', 'L', '', '2003-03-22', 0, '1', '', '', '', '', '0', '', '', '', '1', '', '', '', '', '', 0, '', NULL, '', '', '', '', '', '', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, '', '', '', '', NULL, '', '', '', '1'),
('1500416', '', 'Michael Rio A.', '', 'L', '', '2003-08-17', 0, '1', '', '', '', '', '0', '', '', '', '1', '', '', '', '', '', 0, '', NULL, '', '', '', '', '', '', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, '', '', '', '', NULL, '', '', '', '1'),
('1500418', '', 'Jonika Patricia', '', 'L', '', '2004-10-08', 0, '1', '', '', '', '', '0', '', '', '', '1', '', '', '', '', '', 0, '', NULL, '', '', '', '', '', '', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, '', '', '', '', NULL, '', '', '', '1'),
('1500419', '', 'Nathanael Brilliant', '', 'L', '', '2003-04-14', 0, '1', '', '', '', '', '0', '', '', '', '1', '', '', '', '', '', 0, '', NULL, '', '', '', '', '', '', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, '', '', '', '', NULL, '', '', '', '1'),
('1500420', '', 'Lucky', '', 'L', '', '2003-06-15', 0, '1', '', '', '', '', '0', '', '', '', '1', '', '', '', '', '', 0, '', NULL, '', '', '', '', '', '', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, '', '', '', '', NULL, '', '', '', '1'),
('1500421', '', 'Michelline Ang Riawan', '', 'L', '', '2002-12-10', 0, '1', '', '', '', '', '0', '', '', '', '1', '', '', '', '', '', 0, '', NULL, '', '', '', '', '', '', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, '', '', '', '', NULL, '', '', '', '1'),
('1500423', '', 'Aprilina', '', 'L', '', '2003-04-06', 0, '1', '', '', '', '', '0', '', '', '', '1', '', '', '', '', '', 0, '', NULL, '', '', '', '', '', '', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, '', '', '', '', NULL, '', '', '', '1'),
('1500426', '', 'Ervan Marson', '', 'L', '', '2001-07-20', 0, '1', '', '', '', '', '0', '', '', '', '1', '', '', '', '', '', 0, '', NULL, '', '', '', '', '', '', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, '', '', '', '', NULL, '', '', '', '1'),
('1500427', '', 'Agustinus', '', 'L', '', '2002-06-04', 0, '1', '', '', '', '', '0', '', '', '', '1', '', '', '', '', '', 0, '', NULL, '', '', '', '', '', '', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, '', '', '', '', NULL, '', '', '', '1'),
('1500430', '', 'Alexandra Felicia Tanawa', '', 'L', '', '2003-08-06', 0, '1', '', '', '', '', '0', '', '', '', '1', '', '', '', '', '', 0, '', NULL, '', '', '', '', '', '', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, '', '', '', '', NULL, '', '', '', '1'),
('1500432', '', 'Valerie Lawrence', '', 'L', '', '2003-03-29', 0, '1', '', '', '', '', '0', '', '', '', '1', '', '', '', '', '', 0, '', NULL, '', '', '', '', '', '', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, '', '', '', '', NULL, '', '', '', '1'),
('1600345', '', 'Carlsson Sung', '', 'L', '', '2003-11-24', 0, '1', '', '', '', '', '0', '', '', '', '1', '', '', '', '', '', 0, '', NULL, '', '', '', '', '', '', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, '', '', '', '', NULL, '', '', '', '1'),
('1600348', '', 'Cecilya Juang', '', 'L', '', '2004-05-24', 0, '1', '', '', '', '', '0', '', '', '', '1', '', '', '', '', '', 0, '', NULL, '', '', '', '', '', '', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, '', '', '', '', NULL, '', '', '', '1'),
('1600350', '', 'Sadha Khanti Dewi', '', 'L', '', '2004-08-12', 0, '1', '', '', '', '', '0', '', '', '', '1', '', '', '', '', '', 0, '', NULL, '', '', '', '', '', '', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, '', '', '', '', NULL, '', '', '', '1'),
('1600354', '', 'Michael Widada', '', 'L', '', '2004-10-23', 0, '1', '', '', '', '', '0', '', '', '', '1', '', '', '', '', '', 0, '', NULL, '', '', '', '', '', '', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, '', '', '', '', NULL, '', '', '', '1'),
('1600355', '', 'Jennifer Marcelyn Cen', '', 'L', '', '2004-12-02', 0, '1', '', '', '', '', '0', '', '', '', '1', '', '', '', '', '', 0, '', NULL, '', '', '', '', '', '', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, '', '', '', '', NULL, '', '', '', '1'),
('1600361', '', 'Vallencio Tamrin Junior', '', 'L', '', '2004-12-30', 0, '1', '', '', '', '', '0', '', '', '', '1', '', '', '', '', '', 0, '', NULL, '', '', '', '', '', '', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, '', '', '', '', NULL, '', '', '', '1'),
('1600363', '', 'Luh Elisa Sinthya Dewi', '', 'L', '', '2005-01-13', 0, '1', '', '', '', '', '0', '', '', '', '1', '', '', '', '', '', 0, '', NULL, '', '', '', '', '', '', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, '', '', '', '', NULL, '', '', '', '1'),
('1600365', '', 'Emilyma Setiawan', '', 'L', '', '2004-11-09', 0, '1', '', '', '', '', '0', '', '', '', '1', '', '', '', '', '', 0, '', NULL, '', '', '', '', '', '', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, '', '', '', '', NULL, '', '', '', '1'),
('1600366', '', 'Albert Robinson', '', 'L', '', '2005-02-27', 0, '1', '', '', '', '', '0', '', '', '', '1', '', '', '', '', '', 0, '', NULL, '', '', '', '', '', '', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, '', '', '', '', NULL, '', '', '', '1'),
('1600368', '', 'Kallista Angelia Onggo', '', 'L', '', '2004-03-05', 0, '1', '', '', '', '', '0', '', '', '', '1', '', '', '', '', '', 0, '', NULL, '', '', '', '', '', '', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, '', '', '', '', NULL, '', '', '', '1'),
('1600369', '', 'Harvey Weinstein', '', 'L', '', '2004-09-29', 0, '1', '', '', '', '', '0', '', '', '', '1', '', '', '', '', '', 0, '', NULL, '', '', '', '', '', '', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, '', '', '', '', NULL, '', '', '', '1'),
('1600372', '', 'Viola Susilo', '', 'L', '', '2004-03-30', 0, '1', '', '', '', '', '0', '', '', '', '1', '', '', '', '', '', 0, '', NULL, '', '', '', '', '', '', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, '', '', '', '', NULL, '', '', '', '1'),
('1600373', '', 'Ferdi Juniyansah', '', 'L', '', '2004-09-17', 0, '1', '', '', '', '', '0', '', '', '', '1', '', '', '', '', '', 0, '', NULL, '', '', '', '', '', '', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, '', '', '', '', NULL, '', '', '', '1'),
('1600374', '', 'Anthony Kingston Bert', '', 'L', '', '2004-10-05', 0, '1', '', '', '', '', '0', '', '', '', '1', '', '', '', '', '', 0, '', NULL, '', '', '', '', '', '', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, '', '', '', '', NULL, '', '', '', '1'),
('1600375', '', 'Leandro Satyawira Tionanda', '', 'L', '', '2004-10-14', 0, '1', '', '', '', '', '0', '', '', '', '1', '', '', '', '', '', 0, '', NULL, '', '', '', '', '', '', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, '', '', '', '', NULL, '', '', '', '1'),
('1600376', '', 'Mellvin Angriawan', '', 'L', '', '2004-06-05', 0, '1', '', '', '', '', '0', '', '', '', '1', '', '', '', '', '', 0, '', NULL, '', '', '', '', '', '', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, '', '', '', '', NULL, '', '', '', '1'),
('1600377', '', 'Brian', '', 'L', '', '2004-03-11', 0, '1', '', '', '', '', '0', '', '', '', '1', '', '', '', '', '', 0, '', NULL, '', '', '', '', '', '', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, '', '', '', '', NULL, '', '', '', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tahun_ajaran`
--

CREATE TABLE `tahun_ajaran` (
  `id_ta` int(11) NOT NULL,
  `ta` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tahun_ajaran`
--

INSERT INTO `tahun_ajaran` (`id_ta`, `ta`) VALUES
(1, '2010/2011'),
(2, '2011/2012'),
(3, '2012/2013'),
(4, '2013/2014'),
(5, '2014/2015'),
(6, '2015/2016'),
(7, '2016/2017');

-- --------------------------------------------------------

--
-- Table structure for table `temp_kelas`
--

CREATE TABLE `temp_kelas` (
  `id` int(2) NOT NULL,
  `nis` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_akses`
--

CREATE TABLE `user_akses` (
  `kd_user` varchar(20) NOT NULL,
  `nik` varchar(10) NOT NULL,
  `nama_user` varchar(40) NOT NULL,
  `level` varchar(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(45) NOT NULL,
  `tanggal_input` date NOT NULL,
  `tanggal_online` datetime DEFAULT NULL,
  `aktif` enum('N','Y') NOT NULL,
  `online` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_akses`
--

INSERT INTO `user_akses` (`kd_user`, `nik`, `nama_user`, `level`, `email`, `password`, `tanggal_input`, `tanggal_online`, `aktif`, `online`) VALUES
('u1', '18121742', 'Kasnawi', 'Admin', 'kasnawi20@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '2016-06-03', '2016-06-14 22:16:25', 'Y', 1),
('u2', '11150746', 'Wanda Adit S', 'Administrator', 'wanda@gmail.com', 'fcea920f7412b5da7be0cf42b8c93759', '2016-06-08', '2016-09-07 09:08:55', 'Y', NULL),
('u5', '1234567', 'Iyong', '', 'iyong@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '2016-06-06', '2016-06-15 08:26:41', 'N', 1);

-- --------------------------------------------------------

--
-- Table structure for table `warganegara`
--

CREATE TABLE `warganegara` (
  `IDwn` int(11) NOT NULL,
  `WargaNegara` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `warganegara`
--

INSERT INTO `warganegara` (`IDwn`, `WargaNegara`) VALUES
(1, 'Warga Negara Indonesia'),
(2, 'Warga Negara Asing');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agama`
--
ALTER TABLE `agama`
  ADD PRIMARY KEY (`id_agama`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `mata_pelajaran`
--
ALTER TABLE `mata_pelajaran`
  ADD PRIMARY KEY (`id_mapel`);

--
-- Indexes for table `orang_tua`
--
ALTER TABLE `orang_tua`
  ADD PRIMARY KEY (`id_orang_tua`);

--
-- Indexes for table `pengguna_kelas`
--
ALTER TABLE `pengguna_kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`nis`);

--
-- Indexes for table `tahun_ajaran`
--
ALTER TABLE `tahun_ajaran`
  ADD PRIMARY KEY (`id_ta`);

--
-- Indexes for table `temp_kelas`
--
ALTER TABLE `temp_kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_akses`
--
ALTER TABLE `user_akses`
  ADD PRIMARY KEY (`kd_user`);

--
-- Indexes for table `warganegara`
--
ALTER TABLE `warganegara`
  ADD PRIMARY KEY (`IDwn`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agama`
--
ALTER TABLE `agama`
  MODIFY `id_agama` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` double NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `mata_pelajaran`
--
ALTER TABLE `mata_pelajaran`
  MODIFY `id_mapel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `orang_tua`
--
ALTER TABLE `orang_tua`
  MODIFY `id_orang_tua` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pengguna_kelas`
--
ALTER TABLE `pengguna_kelas`
  MODIFY `id` double NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
--
-- AUTO_INCREMENT for table `tahun_ajaran`
--
ALTER TABLE `tahun_ajaran`
  MODIFY `id_ta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `temp_kelas`
--
ALTER TABLE `temp_kelas`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `warganegara`
--
ALTER TABLE `warganegara`
  MODIFY `IDwn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
