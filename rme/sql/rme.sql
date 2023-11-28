-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2023 at 02:42 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rme`
--

-- --------------------------------------------------------

--
-- Table structure for table `m_cara_bayar`
--

CREATE TABLE `m_cara_bayar` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `m_gedung`
--

CREATE TABLE `m_gedung` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `m_jasa`
--

CREATE TABLE `m_jasa` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `m_kelas_rawat`
--

CREATE TABLE `m_kelas_rawat` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `m_konfig`
--

CREATE TABLE `m_konfig` (
  `id` int(11) NOT NULL,
  `konfig` varchar(255) NOT NULL,
  `nilai` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `m_konversi`
--

CREATE TABLE `m_konversi` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `m_lantai`
--

CREATE TABLE `m_lantai` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `m_login`
--

CREATE TABLE `m_login` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `m_lokasi`
--

CREATE TABLE `m_lokasi` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `m_lorong`
--

CREATE TABLE `m_lorong` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `m_pasien`
--

CREATE TABLE `m_pasien` (
  `id` int(11) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `nomor_rekam_medis` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `m_pegawai`
--

CREATE TABLE `m_pegawai` (
  `id` int(11) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `nomor_rekam_medis` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `m_ruang`
--

CREATE TABLE `m_ruang` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `m_satuan`
--

CREATE TABLE `m_satuan` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `m_tempat_tidur`
--

CREATE TABLE `m_tempat_tidur` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `r_agama`
--

CREATE TABLE `r_agama` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `r_jenis_kelamin`
--

CREATE TABLE `r_jenis_kelamin` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `t_pasien_alergi`
--

CREATE TABLE `t_pasien_alergi` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `t_pasien_anamnesis`
--

CREATE TABLE `t_pasien_anamnesis` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `t_pasien_fisik`
--

CREATE TABLE `t_pasien_fisik` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `t_pasien_keperawatan`
--

CREATE TABLE `t_pasien_keperawatan` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `t_pasien_laboratorium`
--

CREATE TABLE `t_pasien_laboratorium` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `t_pasien_medis`
--

CREATE TABLE `t_pasien_medis` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `t_pasien_obat`
--

CREATE TABLE `t_pasien_obat` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `t_pasien_persetujuan`
--

CREATE TABLE `t_pasien_persetujuan` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `t_pasien_psikologis`
--

CREATE TABLE `t_pasien_psikologis` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `t_pasien_radiologi`
--

CREATE TABLE `t_pasien_radiologi` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `t_pasien_rawat_darurat`
--

CREATE TABLE `t_pasien_rawat_darurat` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `t_pasien_rawat_inap`
--

CREATE TABLE `t_pasien_rawat_inap` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `t_pasien_rawat_jalan`
--

CREATE TABLE `t_pasien_rawat_jalan` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `m_cara_bayar`
--
ALTER TABLE `m_cara_bayar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_gedung`
--
ALTER TABLE `m_gedung`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_jasa`
--
ALTER TABLE `m_jasa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_kelas_rawat`
--
ALTER TABLE `m_kelas_rawat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_konfig`
--
ALTER TABLE `m_konfig`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_konversi`
--
ALTER TABLE `m_konversi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_lantai`
--
ALTER TABLE `m_lantai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_login`
--
ALTER TABLE `m_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_lokasi`
--
ALTER TABLE `m_lokasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_lorong`
--
ALTER TABLE `m_lorong`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_pasien`
--
ALTER TABLE `m_pasien`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_pegawai`
--
ALTER TABLE `m_pegawai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_ruang`
--
ALTER TABLE `m_ruang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_satuan`
--
ALTER TABLE `m_satuan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_tempat_tidur`
--
ALTER TABLE `m_tempat_tidur`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `r_agama`
--
ALTER TABLE `r_agama`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `r_jenis_kelamin`
--
ALTER TABLE `r_jenis_kelamin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_pasien_alergi`
--
ALTER TABLE `t_pasien_alergi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_pasien_anamnesis`
--
ALTER TABLE `t_pasien_anamnesis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_pasien_fisik`
--
ALTER TABLE `t_pasien_fisik`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_pasien_keperawatan`
--
ALTER TABLE `t_pasien_keperawatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_pasien_laboratorium`
--
ALTER TABLE `t_pasien_laboratorium`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_pasien_medis`
--
ALTER TABLE `t_pasien_medis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_pasien_obat`
--
ALTER TABLE `t_pasien_obat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_pasien_persetujuan`
--
ALTER TABLE `t_pasien_persetujuan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_pasien_psikologis`
--
ALTER TABLE `t_pasien_psikologis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_pasien_radiologi`
--
ALTER TABLE `t_pasien_radiologi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_pasien_rawat_darurat`
--
ALTER TABLE `t_pasien_rawat_darurat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_pasien_rawat_inap`
--
ALTER TABLE `t_pasien_rawat_inap`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_pasien_rawat_jalan`
--
ALTER TABLE `t_pasien_rawat_jalan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `m_cara_bayar`
--
ALTER TABLE `m_cara_bayar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `m_gedung`
--
ALTER TABLE `m_gedung`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `m_jasa`
--
ALTER TABLE `m_jasa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `m_kelas_rawat`
--
ALTER TABLE `m_kelas_rawat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `m_konfig`
--
ALTER TABLE `m_konfig`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `m_konversi`
--
ALTER TABLE `m_konversi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `m_lantai`
--
ALTER TABLE `m_lantai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `m_login`
--
ALTER TABLE `m_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `m_lokasi`
--
ALTER TABLE `m_lokasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `m_lorong`
--
ALTER TABLE `m_lorong`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `m_pasien`
--
ALTER TABLE `m_pasien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `m_pegawai`
--
ALTER TABLE `m_pegawai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `m_ruang`
--
ALTER TABLE `m_ruang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `m_satuan`
--
ALTER TABLE `m_satuan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `m_tempat_tidur`
--
ALTER TABLE `m_tempat_tidur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `r_agama`
--
ALTER TABLE `r_agama`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `r_jenis_kelamin`
--
ALTER TABLE `r_jenis_kelamin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_pasien_alergi`
--
ALTER TABLE `t_pasien_alergi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_pasien_anamnesis`
--
ALTER TABLE `t_pasien_anamnesis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_pasien_fisik`
--
ALTER TABLE `t_pasien_fisik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_pasien_keperawatan`
--
ALTER TABLE `t_pasien_keperawatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_pasien_laboratorium`
--
ALTER TABLE `t_pasien_laboratorium`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_pasien_medis`
--
ALTER TABLE `t_pasien_medis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_pasien_obat`
--
ALTER TABLE `t_pasien_obat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_pasien_persetujuan`
--
ALTER TABLE `t_pasien_persetujuan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_pasien_psikologis`
--
ALTER TABLE `t_pasien_psikologis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_pasien_radiologi`
--
ALTER TABLE `t_pasien_radiologi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_pasien_rawat_darurat`
--
ALTER TABLE `t_pasien_rawat_darurat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_pasien_rawat_inap`
--
ALTER TABLE `t_pasien_rawat_inap`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_pasien_rawat_jalan`
--
ALTER TABLE `t_pasien_rawat_jalan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
