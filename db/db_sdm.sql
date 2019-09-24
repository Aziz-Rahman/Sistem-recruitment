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
-- Database: `db_sdm`
--

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `nik` varchar(10) NOT NULL,
  `karyawan` varchar(30) NOT NULL,
  `telepon` varchar(13) NOT NULL,
  `email` varchar(30) NOT NULL,
  `alamat` text NOT NULL,
  `agama` varchar(15) NOT NULL,
  `tempat_lahir` varchar(25) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`nik`, `karyawan`, `telepon`, `email`, `alamat`, `agama`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`) VALUES
('1104001', 'Rusmin Sadikin', '', 'jm_sadikin@yahoo.co.id', '', 'KRISTEN', '', '0000-00-00', 'P'),
('1111002', 'Agung Anggiyawan', '', '', '', 'ISLAM', '', '1992-11-26', 'P'),
('1112003', 'Yudha Defri Andriyawan', '', '', '', 'ISLAM', '', '1991-12-08', 'P'),
('1207007', 'Yanah Sahudin ( Ali )', '', '', '', 'ISLAM', '', '1985-01-07', 'P'),
('1207008', 'Gisella Anasthasia.S.', '', 'gisella@gmail.com', '', 'KRISTEN', '', '1992-10-17', 'W'),
('1207009', 'Magdalena S.P.M, S.E', '', 'kurnidaleno04@gmail.com', '', 'KATHOLIK', '', '1973-05-18', 'W'),
('1208029', 'Aprila Windiarti, A.Md', '', 'aprila@gmail.com', '', 'ISLAM', '', '1982-04-10', 'W'),
('1208030', 'Ayu Sri Hartati, S.Pd', '', 'ayu@gmail.com', '', 'ISLAM', '', '1988-07-02', 'W'),
('1307014', 'Widayati, S.Ag.', '', 'widayati86@gmail.com', '', 'BUDHA', '', '1986-07-24', 'W'),
('1307015', 'Fransiska Murtini, S.Pd.', '', 'murtini@gmail.com', '', 'KATHOLIK', '', '1969-02-24', 'W'),
('1307016', 'Nuning Febriyanti, S.Pd.', '', 'nuning_febriyanti@yahoo.com', '', 'KATHOLIK', '', '1980-02-13', 'W'),
('1307018', 'Siti Farikhah, S.S.', '', 'siti@gmail.ocm', '', 'ISLAM', '', '1988-10-16', 'W'),
('1307021', 'Fenny, S.Th', '', 'fennyferdinand@gmail.com', '', 'KRISTEN', '', '1983-12-28', 'W'),
('1307023', 'Helmi, S.S', '', 'helmiasuszen5@gmail.com', '', 'KRISTEN', '', '1985-08-06', 'W'),
('1307027', 'Muhamad Safei ( Hasan )', '', '', '', 'ISLAM', '', '1985-10-25', 'P'),
('1308028', 'Dedy Wijaya, S.Si', '', 'dedy@gmail.com', '', 'KRISTEN', '', '1980-04-12', 'P'),
('1309031', 'Wahyu Dhammayanti, S.PdB', '', 'dhammacapriconus@gmail.com', '', 'BUDHA', '', '1990-01-07', 'W'),
('1309032', 'Tri Yuniati, S.PdB', '', 'yuniehiema@gmail.com', '', 'BUDHA', '', '1990-06-14', 'W'),
('1309033', 'Uripah ( Siva )', '', '', '', 'ISLAM', '', '1976-01-21', 'W'),
('1310035', 'Gunawan', '', '', '', 'ISLAM', '', '1991-05-22', 'P'),
('1310037', 'Nasirun, S.S', '', 'nasirun@gmail.com', '', 'ISLAM', '', '1984-02-09', 'P'),
('1310038', 'Acim Suganda', '', '', '', 'ISLAM', '', '1972-04-11', 'P'),
('1311039', 'Novita Indri', '', 'novitaindry84@gmail.com', '', 'ISLAM', '', '1984-02-21', 'W'),
('1407041', 'Adelia', '81219847883', 'adelia1751@gmail.com', 'Perumahan Cinta Kasih Tzu Chi Blok A14 / 5B , Cengkareng Timur, Jakarta Barat 11730', 'ISLAM', 'Jakarta', '1995-12-11', 'W'),
('1407045', 'Dewi Kartikawati S.Pd', '', 'dewikartikawati2001@gmail.com', '', 'KRISTEN', '', '1978-04-15', 'W'),
('1407046', 'Kardiman, S.Kom', '', 'kardiman@gmail.com', '', 'BUDHA', '', '1981-05-17', 'P'),
('1407048', 'Marsudianto S.Ag', '', 'marsudianto_73@yahoo.com', '', 'ISLAM', '', '1973-08-02', 'P'),
('1407049', 'Hendra Santoso Lo, AAC', '', 'hendralo28@gmail.com', '', 'BUDHA', '', '1990-05-28', 'P'),
('1407052', 'Lusiana Sri Sulastri S.Pd', '', 'lusiana.sri80@gmail.com', '', 'KATHOLIK', '', '1980-11-15', 'W'),
('1407054', 'Joni, S.S', '', 'joni@gmail.com', '', 'BUDHA', '', '1980-04-14', 'P'),
('1407055', 'Elisabet Arum Puspita, S.Pt', '', 'elisabet@gmail.com', '', 'KATHOLIK', '', '1988-11-07', 'W'),
('1407056', 'Lucia Eni Nugraheni, S.Pd', '', 'eni@gmail.com', '', 'KATHOLIK', '', '1978-08-28', 'W'),
('1407057', 'Maria Luki Susanti, S.Pd', '', 'marialukisusanti@gmail.com', '', 'KATHOLIK', '', '1980-05-02', 'W'),
('1407061', 'Ria Maria carolina', '', 'ria@gmail.com', '', 'KATHOLIK', '', '1967-09-13', 'W'),
('1408065', 'Sri Wahyuni ( Caecilia )', '', 'caecilia@gmail.com', '', 'KATHOLIK', '', '1967-06-12', 'W'),
('1502066', 'Nilla Fitrianty', '', 'nillafitrianty@gmail.com', '', 'KRISTEN', '', '1981-08-05', 'W'),
('1502068', 'Maesaroh', '', '', '', 'ISLAM', '', '1986-01-14', 'W'),
('1504069', 'Dra. Vitryani Pryadarsina, M.P', '', 'vitripry@yahoo.com', '', 'KRISTEN', '', '1967-01-05', 'W'),
('1504070', 'Sandy', '', 'sandy@gmail.com', '', 'ISLAM', '', '0000-00-00', 'P'),
('1504071', 'Xin Yubao', '', 'xin@gmail.com', '', '', '', '0000-00-00', 'P'),
('1505072', 'Darmawan Widjaja', '', 'darmawan_widjaja@yahoo.com', '', 'KRISTEN', '', '1972-12-12', 'P'),
('1507073', 'Bianca Raine Sim', '', 'biancasim23@gmail.com', '', 'KRISTEN', '', '1974-03-23', 'W'),
('1507074', 'Maria Theresia', '', 'maria@gmail.com', '', 'KRISTEN', '', '1991-03-05', 'W'),
('1507076', 'Sisca', '', 'siscahere@gmail.com', '', 'KRISTEN', '', '1995-06-09', 'W'),
('1507078', 'Anes', '', 'anescheix@gmail.com', '', 'KRISTEN', '', '1993-06-23', 'P'),
('1507079', 'Vera Astarina', '', 'aghasthashe@yahoo.co.id', '', 'ISLAM', '', '1988-02-15', 'W'),
('1507080', 'Agus Panut Santoso', '', 'agus@gmail.com', '', 'ISLAM', '', '1983-08-07', 'P'),
('1507081', 'Annie Kristiani, S.Pd', '', 'annie@gmail.com', '', 'KATHOLIK', '', '1974-12-30', 'W'),
('1507082', 'Erni Hertaty Sihombing, S.Th', '', 'erni@gmail.com', '', 'KRISTEN', '', '1973-03-04', 'W'),
('1507085', 'Retno Hari Endang Listyorini. ', '', 'inkririn@gmail.com', '', 'KATHOLIK', '', '1972-01-08', 'W'),
('1507086', 'Wily Vitina', '', 'wily@gmail.com', '', 'BUDHA', '', '1989-01-01', 'W'),
('1507087', 'Yuli Nugraeni. S.Pd', '', 'y.nugraheni@ymail.com', '', 'KATHOLIK', '', '1970-08-01', 'W'),
('1507088', 'Martha Elselina lingga, S.si', '', 'martha@gmail.com', '', '', '', '0000-00-00', ''),
('1507089', 'Yessi Widiasty', '', 'sisiloyessi@gmail.com', '', 'KRISTEN', '', '1992-06-10', 'W'),
('1507090', 'Asanih ', '', '', '', 'ISLAM', '', '1975-08-17', 'W'),
('1507091', 'Samuel Seirama Gea', '', 'samuel@gmail.com', '', 'KATHOLIK', '', '1987-08-17', 'P'),
('1508092', 'Valdino Van Room', '', 'valdino@gmail.com', '', 'KRISTEN', '', '1990-08-18', 'P'),
('1508093', 'Zakaria Sim', '', 'zakaria@gmail.com', '', 'BUDHA', '', '1988-06-27', 'P'),
('1508094', 'Oey Iyong', '', 'iyong@gmail.com', '', 'BUDHA', '', '1982-04-06', 'P'),
('1512095', 'Turasih', '', '', '', 'ISLAM', '', '1982-10-16', 'W'),
('1601096', 'Bong Chun Ying', '', 'chun.ying65@yahoo.com', '', 'KRISTEN', '', '1980-06-04', 'P'),
('1601097', 'Nana Sagi', '', 'sagin1002@gmail.com', '', 'KATHOLIK', '', '1989-12-17', 'W'),
('1601098', 'Erwin Tanzil', '', 'erwin@gmail.com', '', 'BUDHA', '', '1984-10-10', 'P'),
('1601099', 'Zakarias Kurniadi Nurchayo', '', 'zakarias@gmail.com', '', 'KATHOLIK', '', '1974-11-16', 'P'),
('1601100', 'Andreas Noverdi', '', 'noverdiandreas89@gmail.com', '', '', '', '0000-00-00', 'P'),
('1601101', 'Suwanda Aditya Saputra', '', 'wanda@gmail.com', '', 'KRISTEN', '', '1987-08-30', 'P'),
('1602102', 'Edward Lawanto', '', 'shiva_lines@yahoo.com', '', 'KATHOLIK', '', '1985-03-13', 'P'),
('1602120', 'Andy Gea', '', 'andy@gmail.com', '', 'ISLAM', '', '1988-11-19', 'P'),
('1603103', 'Yuliana S.Pd.', '', 'yuliana@gmail.com', '', '', '', '0000-00-00', ''),
('1606104', 'Kasnawi', '', 'awieks@gmail.com', '', 'KRISTEN', '', '1988-11-03', 'P'),
('1607105', 'Anita Octavia', '', 'anita@gmail.com', '', 'ISLAM', '', '1988-11-04', 'P'),
('1607106', 'Umandara', '', 'umandara.budiman@gmail.com', '', 'ISLAM', '', '1988-11-05', 'P'),
('1607107', 'Elsye Lim', '', 'elsye.lim5588@gmail.com', '', 'ISLAM', '', '1988-11-06', 'P'),
('1607108', 'Adelina Oktavia', '', 'adel_linna@ymail.com', '', 'ISLAM', '', '1988-11-07', 'P'),
('1607109', 'Martina Tampubolon', '', 'martina@gmail.com', '', 'ISLAM', '', '1988-11-08', 'P'),
('1607110', 'Lidwina Elly M', '', 'lidwina@gmail.com', '', 'ISLAM', '', '1988-11-09', 'P'),
('1607111', 'Eko Sastro Winoto', '', 'eko@gmail.com', '', 'ISLAM', '', '1988-11-10', 'P'),
('1607112', 'Anton Wijaya', '', 'anton@gmail.com', '', 'BUDHA', '', '1992-05-05', 'P'),
('1607113', 'Gratianus Sumardin Gea', '', 'gratianus@gmail.com', '', 'KRISTEN', '', '1982-03-07', 'P'),
('1607114', 'Xiong Jing (Nancy)', '', 'xiong@gmail.com', '', 'ISLAM', '', '1988-11-16', 'P'),
('1607115', 'Arnancy', '', 'nancyarn.dm@gmail.com', '', 'ISLAM', '', '1988-11-20', 'P'),
('1607116', 'Susanti', '', 'susanti@gmail.com', '', 'ISLAM', '', '1988-11-15', 'P'),
('1607117', 'Merlisa ', '', 'merlisa@gmail.com', '', 'ISLAM', '', '1988-11-13', 'P'),
('1607118', 'Yuniar Cresentia', '', 'yuniar@gmail.com', '', 'BUDHA', '', '1998-01-28', 'W'),
('1607119', 'Mei Audina', '', 'mei@gmail.com', '', 'BUDHA', '', '1998-05-12', 'W'),
('1607120', 'Rajelaksmi', '', 'rajelaksmi@gmail.com', '', 'BUDHA', '', '1966-10-10', 'W'),
('1607121', 'Noviany', '', 'noviany@gmail.com', '', 'ISLAM', '', '1988-11-14', 'P'),
('1607122', 'Deis Natasyah, Spd', '', 'deisnatasyah@gmail.com', '', 'KATHOLIK', '', '1988-11-21', 'P'),
('1607123', 'Stefanus Liga', '', 'stefanus@gmail.com', '', 'ISLAM', '', '1988-11-18', 'P'),
('1607124', 'Sally Claveria', '', 'sally@gmail.com', '', 'ISLAM', '', '1988-11-17', 'P'),
('1607125', 'Kahesa Yeremia', '', 'kahesa@gmail.com', '', 'ISLAM', '', '1988-11-12', 'P'),
('1607126', 'Bernadeta Wiwin', '', 'bwr32009@yahoo.com', '', 'ISLAM', '', '1988-11-11', 'P'),
('1607127', 'Petrus Hari Kurniawan', '', 'petrus@gmail.com', '', 'KATHOLIK', '', '0000-00-00', 'P'),
('1607129', 'Endang Hermansyah, S.Ag', '', 'usmet36@gmail.com', '', 'ISLAM', '', '1988-11-02', 'P'),
('1607130', 'Robert Hendry', '', 'robert@gmail.com', '', 'KRISTEN', '', '1992-02-22', 'P'),
('1607131', 'Fepson Ronald Sitompul', '', '', '', '', '', '0000-00-00', 'P'),
('1608132', 'Warniah', '', 'warniah@gmail.com', '', '', '', '0000-00-00', 'W');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`nik`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
