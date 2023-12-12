-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.25-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table idcard_kartu.layout_kartu
CREATE TABLE IF NOT EXISTS `layout_kartu` (
  `id_layout_kartu` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `nama_layout` varchar(255) DEFAULT NULL COMMENT 'Untuk identifikasi kartu, misal kartu untuk mahasiswa',
  `panjang` decimal(10,3) DEFAULT NULL,
  `lebar` decimal(10,3) DEFAULT NULL,
  `background_depan` varchar(255) DEFAULT NULL COMMENT 'Background kartu',
  `background_belakang` varchar(255) DEFAULT NULL,
  `berlaku_jenis` enum('custom_text','periode') DEFAULT NULL,
  `berlaku_custom_text` varchar(255) DEFAULT NULL,
  `berlaku_periode_tahun` tinyint(4) DEFAULT NULL COMMENT 'Masa berlaku kartu, misal 4 tahun kedepan',
  `gunakan` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id_layout_kartu`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table idcard_kartu.layout_kartu: ~1 rows (approximately)
INSERT INTO `layout_kartu` (`id_layout_kartu`, `nama_layout`, `panjang`, `lebar`, `background_depan`, `background_belakang`, `berlaku_jenis`, `berlaku_custom_text`, `berlaku_periode_tahun`, `gunakan`) VALUES
	(1, 'Kartu Mahasiswa', 8.560, 5.396, 'kartu_depan.png', 'kartu_belakang.png', 'custom_text', 'Berlaku selama menjadi siswa', 0, 1);

-- Dumping structure for table idcard_kartu.mahasiswa
CREATE TABLE IF NOT EXISTS `mahasiswa` (
  `id_mahasiswa` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) DEFAULT NULL,
  `email` char(255) DEFAULT NULL,
  `npm` varchar(255) DEFAULT NULL,
  `tempat_lahir` varchar(255) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `prodi` varchar(255) DEFAULT NULL,
  `fakultas` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `foto` varchar(50) DEFAULT NULL,
  `qrcode_text` varchar(255) DEFAULT NULL,
  `tgl_input` date DEFAULT NULL,
  `id_user_input` mediumint(8) unsigned DEFAULT NULL,
  `tgl_edit` date DEFAULT NULL,
  `id_user_edit` mediumint(8) unsigned DEFAULT NULL,
  PRIMARY KEY (`id_mahasiswa`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table idcard_kartu.mahasiswa: ~19 rows (approximately)
INSERT INTO `mahasiswa` (`id_mahasiswa`, `nama`, `email`, `npm`, `tempat_lahir`, `tgl_lahir`, `prodi`, `fakultas`, `alamat`, `foto`, `qrcode_text`, `tgl_input`, `id_user_input`, `tgl_edit`, `id_user_edit`) VALUES
	(1, 'Wicaksono Catur', 'wicaksono.catur@yopmail.com', '55555', 'Solo', '1998-03-11', 'Sistem Informasi Modern', 'Teknik Informatika', 'Jl. Kencur No. 19, Sukoharjo', 'Wicaksono Catur.png', NULL, '2020-03-28', 1, '2020-11-15', 1),
	(2, 'Dinda Ayuninda', 'dinda.ayuninda@yopmail.com', '222222', 'Semarang', '1999-10-10', 'Sistem Informasi Modern', 'Teknik Informatika', 'Jl. Pemuda, No. 02, Semarang', 'Dinda Ayuninda.png', NULL, '2020-11-15', 1, NULL, NULL),
	(3, 'Sony Haryanto', 'sony.haryanto@yopmail.com', '22222', 'Surabaya', '1997-02-01', 'Sistem Perangkat Lunak', 'Teknik Informatika', 'Jl. Kenanga No, 137, Surabaya', 'Sony Haryanto.png', '', '2020-11-15', 2, '2021-01-29', 2),
	(4, 'Budi Kurniawan', 'budi.kurniawan@yopmail.com', '77777', 'Jakarta', '2000-07-05', 'Desain Kreatif', 'Desain Komunikasi Visual', 'Jl. Anggrek No. 09, Jakarta', 'Budi Kurniawan.png', NULL, '2020-11-15', 2, NULL, NULL),
	(5, 'Santi Anggraeni', 'santi.anggraeni@yopmail.com', '11111', 'Medan', '2001-02-01', 'Desain Kreatif', 'Desain Komunikasi Visual', 'Jl. Tori No. 19, Medan', 'Santi Anggraeni.png', NULL, '2020-11-15', 2, NULL, NULL),
	(6, 'Bima Siregar', 'bima.siregar@yopmail.com', '12345', 'Medan', '2002-07-05', 'Desain Kreatif', 'Desain Komunikasi Visual', 'Jl. Delima N0.07 Medan', 'Bima Siregar.png', NULL, '2020-11-15', 1, NULL, NULL),
	(7, 'Intan Nurwiyati', 'intan.nurwiyati@yopmail.com', '12345', 'Semarang', '2001-03-12', 'Sistem Informasi Modern', 'Teknik Informatika', 'Jl. Imam Bonjol No. 72, Semarang', 'Intan Nurwiyati.png', '', '2020-11-15', 1, '2022-11-05', 1),
	(8, 'Tendi Anshori', 'tendi.anshori@yopmail.com', '12345', 'Banyuwangi', '2001-08-06', 'Desain Kreatif', 'Desain Komunikasi Visual', 'Jl. Semarak No. 03, Banyuwangi', 'Tendi Anshori.png', 'Tendi Anshori', '2020-11-15', 1, '2021-06-28', 1),
	(9, 'Anton Junaedi', 'anton.junaedi@yopmail.com', '12345', 'Serang', '2000-05-22', 'Desain Kreatif', 'Desain Komunikasi Visual', 'Jl. Sidorang No. 15, Serang', 'Anton Junaedi.png', NULL, '2020-11-15', 1, NULL, NULL),
	(10, 'Ahmad Basuki', 'ahmad.basuki@yopmail.com', '55555', 'Surakarta', '2000-03-10', 'Sistem Informasi Modern', 'Teknik Informatika', 'Jl. Bendar No. 77, Surakarta', 'Ahmad Basuki.png', NULL, '2020-11-15', 1, NULL, NULL),
	(11, 'Dinda Fitrianti', 'dinda.fitrianti@yopmail.com', '12345', 'Jakarta', '2001-03-03', 'Desain Kreatif', 'Desain Komunikasi Visual', 'Jl. P. Diponegoro No. 01, Jakarta', 'Dinda Fitrianti.png', NULL, '2020-11-15', 2, NULL, NULL),
	(12, 'Ahmad Fathoni', 'ahmad.fathoni@yopmail.com', '234545', 'Jember', '2000-07-04', 'Sistem Informasi Modern', 'Teknik Informatika', 'Jl. Ahmad Dahlan No. 03, Jember', 'Ahmad Fathoni.png', NULL, '2020-11-15', 2, NULL, NULL),
	(13, 'Boni Simanjuntak', 'boni.simanjuntak@yopmail.com', '55555', 'Semarang', '2000-07-05', 'Desain Kreatif', 'Desain Komunikasi Visual', 'Jl. Bistamar No. 33, Semarang', 'Boni Simanjuntak.png', NULL, '2020-11-15', 1, NULL, NULL),
	(14, 'Tanti Irawati', 'tanti.irawati@yopmail.com', '22233', 'Sukoharjo', '2000-09-05', 'Desain Kreatif', 'Desain Komunikasi Visual', 'Jl. Bersinar No. 77, Sukoharjo', 'Tanti Irawati.png', NULL, '2020-11-15', 1, NULL, NULL),
	(15, 'Dendi Suandi', 'dendi.suandi@yopmail.com', '33554', 'Jakarta', '2000-11-25', 'Desain Kreatif', 'Desain Komunikasi Visual', 'Jl. Semanggi No. 10, Jakarta', 'Dendi Suandi.png', NULL, '2020-11-15', 1, NULL, NULL),
	(16, 'Fransisco Brian', 'fransisco.brian@yopmail.com', '333445', 'Medan', '2000-04-04', 'Sistem Informasi Modern', 'Teknik Informatika', 'Jl. Sinapan No. 117, Medan', 'Fransisco Brian.png', NULL, '2020-11-21', 1, '2020-11-21', 1),
	(17, 'Budi Susanto', 'budi.susanto@yopmail.com', '44332', 'Jakarta', '2001-02-01', 'Desain Kreatif', 'Desain Komunikasi Visual', 'Jl. Tentara Pelajar No. 13, Jakarta', 'Budi Susanto.png', NULL, '2020-11-21', 1, NULL, NULL),
	(18, 'Budiman', 'budiman.jaya@gmail.com', '324543', 'Jakarta', '2001-02-04', 'Sistem Informasi Moden', 'Teknik Informatika', 'Jl. Diponegoro No. 71, Semarang', NULL, NULL, NULL, NULL, NULL, NULL),
	(19, 'Wahyu Jatmiko', 'wahyu.jatmiko.oke@gmail.com', '345432', 'Surakarta', '2002-04-05', 'Desain Grafis', 'Desain Komunikasi Visual', 'Jl. Arjuna No. 14, Surakarta', NULL, NULL, NULL, NULL, NULL, NULL);

-- Dumping structure for table idcard_kartu.menu
CREATE TABLE IF NOT EXISTS `menu` (
  `id_menu` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `nama_menu` varchar(50) NOT NULL,
  `class` varchar(50) DEFAULT NULL,
  `url` varchar(50) DEFAULT NULL,
  `id_module` smallint(5) unsigned DEFAULT NULL,
  `id_parent` smallint(5) unsigned DEFAULT NULL,
  `aktif` tinyint(1) NOT NULL DEFAULT 1,
  `new` tinyint(1) NOT NULL DEFAULT 0,
  `urut` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id_menu`) USING BTREE,
  KEY `menu_module` (`id_module`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT COMMENT='Tabel menu aplikasi';

-- Dumping data for table idcard_kartu.menu: ~21 rows (approximately)
INSERT INTO `menu` (`id_menu`, `nama_menu`, `class`, `url`, `id_module`, `id_parent`, `aktif`, `new`, `urut`) VALUES
	(1, 'User', 'fas fa-users', 'user', 5, 8, 1, 0, 1),
	(2, 'Assign Role', 'fas fa-link', '#', 0, 8, 1, 0, 5),
	(3, 'User Role', 'fas fa-user-tag', 'user-role', 7, 2, 1, 0, 1),
	(4, 'Module', 'fas fa-network-wired', 'module', 2, 8, 1, 0, 2),
	(5, 'Module Role', 'fas fa-desktop', 'module-role', 3, 2, 1, 0, 2),
	(6, 'Menu', 'fas fa-clone', 'menu', 1, 8, 1, 0, 4),
	(7, 'Menu Role', 'fas fa-folder-minus', 'menu-role', 8, 2, 1, 0, 3),
	(8, 'Website', 'fas fa-globe', '#', 1, 0, 1, 0, 1),
	(17, 'Role', 'fas fa-briefcase', 'role', 4, 8, 1, 0, 3),
	(18, 'Setting Website', 'fas fa-cog', 'setting-web', 16, 8, 1, 0, 7),
	(20, 'Layout Setting', 'fas fa-brush', 'setting', 15, 8, 1, 0, 8),
	(21, 'Tanda Tangan', 'fas fa-pen-nib', 'tandatangan', 12, NULL, 1, 0, 5),
	(22, 'Universitas', 'fas fa-university', 'universitas', 10, NULL, 1, 0, 3),
	(23, 'Setting QR Code', 'fas fa-qrcode', 'setting-qrcode', 17, NULL, 1, 0, 6),
	(24, 'Layout Printer', 'fas fa-print', 'settingprinter', 14, NULL, 1, 0, 7),
	(26, 'Layout Kartu', 'fas fa-address-card', 'layoutkartu', 11, NULL, 1, 0, 4),
	(27, 'Daftar Nama', 'fas fa-users', 'daftarnama', 9, NULL, 1, 0, 2),
	(28, 'Cetak Kartu', 'fas fa-print', 'cetakkartu', 13, NULL, 1, 0, 8),
	(29, 'Upload Excel', 'fas fa-file-upload', 'uploadexcel', 27, NULL, 1, 0, 9),
	(30, 'Download Excel', 'fas fa-file-download', 'downloadexcel', 26, NULL, 1, 0, 10),
	(31, 'Setting Registrasi', 'fas fa-user-plus', 'setting-registrasi', 31, 8, 1, 0, 6);

-- Dumping structure for table idcard_kartu.menu_role
CREATE TABLE IF NOT EXISTS `menu_role` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `id_menu` smallint(5) unsigned NOT NULL,
  `id_role` smallint(5) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `module_role_module` (`id_menu`),
  KEY `module_role_role` (`id_role`),
  CONSTRAINT `menu_role_menu` FOREIGN KEY (`id_menu`) REFERENCES `menu` (`id_menu`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `menu_role_role` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT COMMENT='Tabel hak akses dari menu aplikasi';

-- Dumping data for table idcard_kartu.menu_role: ~26 rows (approximately)
INSERT INTO `menu_role` (`id`, `id_menu`, `id_role`) VALUES
	(1, 5, 1),
	(6, 2, 1),
	(7, 3, 1),
	(8, 4, 1),
	(9, 6, 1),
	(19, 1, 1),
	(20, 1, 2),
	(23, 8, 1),
	(25, 7, 1),
	(29, 17, 1),
	(30, 18, 1),
	(32, 20, 1),
	(33, 21, 1),
	(35, 22, 1),
	(37, 23, 1),
	(39, 24, 1),
	(46, 26, 1),
	(49, 27, 1),
	(50, 27, 2),
	(52, 28, 1),
	(53, 28, 2),
	(55, 29, 1),
	(56, 30, 1),
	(58, 8, 2),
	(60, 20, 2),
	(61, 31, 1);

-- Dumping structure for table idcard_kartu.module
CREATE TABLE IF NOT EXISTS `module` (
  `id_module` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `nama_module` varchar(50) DEFAULT NULL,
  `judul_module` varchar(50) DEFAULT NULL,
  `id_module_status` tinyint(1) DEFAULT NULL,
  `login` enum('Y','N','R') DEFAULT NULL,
  `deskripsi` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_module`),
  UNIQUE KEY `module_nama` (`nama_module`),
  KEY `module_module_status` (`id_module_status`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC COMMENT='Tabel modul aplikasi';

-- Dumping data for table idcard_kartu.module: ~24 rows (approximately)
INSERT INTO `module` (`id_module`, `nama_module`, `judul_module`, `id_module_status`, `login`, `deskripsi`) VALUES
	(1, 'menu', 'Menu Manager', 1, 'Y', 'Administrasi Menu'),
	(2, 'module', 'Module Manager', 1, 'Y', 'Pengaturan Module'),
	(3, 'module-role', 'Assign Role ke Module', 1, 'Y', 'Assign Role ke Module'),
	(4, 'role', 'Role Manager', 1, 'Y', 'Pengaturan Role'),
	(5, 'user', 'User Manager', 1, 'Y', 'Pengaturan user'),
	(6, 'login', 'Login', 1, 'R', 'Login ke akun Anda'),
	(7, 'user-role', 'Assign Role ke User', 1, 'Y', 'Assign role ke user'),
	(8, 'menu-role', 'Menu - Role', 1, 'Y', 'Assign role ke menu'),
	(9, 'daftarnama', 'Daftar Mahasiswa', 1, 'Y', 'Nama Mahasiswa'),
	(10, 'universitas', 'Universitas', 1, 'Y', 'Universitas'),
	(11, 'layoutkartu', 'Layout Kartu', 1, 'Y', 'Layput kartu identitas, mahasiswa maupun dosen'),
	(12, 'tandatangan', 'Tanda Tangan', 1, 'Y', 'Penandatangan kartu'),
	(13, 'cetakkartu', 'Cetak Kartu', 1, 'Y', 'Cetak Kartu'),
	(14, 'settingprinter', 'Setting Printer', 1, 'Y', 'Setting printer'),
	(15, 'setting', 'Web Setting', 1, 'Y', 'Web Setting'),
	(16, 'setting-web', 'Setting Web', 1, 'Y', 'Pengaturan website seperti nama web, logo, dll'),
	(17, 'setting-qrcode', 'Setting QRCode', 1, 'Y', 'Setting QRCode'),
	(25, 'home', 'Home', 1, 'Y', 'Home'),
	(26, 'downloadexcel', 'Download Excel', 1, 'Y', 'Download Excel'),
	(27, 'uploadexcel', 'Upload Excel', 1, 'Y', 'Upload Excel'),
	(28, 'register', 'Register Akun Baru', 1, 'R', 'Register Akun Baru'),
	(29, 'recovery', 'Lupa Password', 1, 'R', 'Lupa Password'),
	(30, 'resendlink', 'Kirim Ulang Link Aktivasi', 1, 'R', 'Kirim Ulang Link Aktivasi'),
	(31, 'setting-registrasi', 'Pengaturan Registrasi', 1, 'Y', 'Pengaturan registrasi user baru');

-- Dumping structure for table idcard_kartu.module_role
CREATE TABLE IF NOT EXISTS `module_role` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `id_module` smallint(5) unsigned NOT NULL,
  `id_role` smallint(5) unsigned NOT NULL,
  `read_data` varchar(255) NOT NULL DEFAULT '',
  `create_data` varchar(255) NOT NULL DEFAULT '',
  `update_data` varchar(255) NOT NULL DEFAULT '',
  `delete_data` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `module_role_module` (`id_module`),
  KEY `module_role_role` (`id_role`),
  CONSTRAINT `module_role_module` FOREIGN KEY (`id_module`) REFERENCES `module` (`id_module`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `module_role_role` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC COMMENT='Tabel hak akses module aplikasi, module aplikasi boleh diakses oleh user yang mempunyai role apa saja';

-- Dumping data for table idcard_kartu.module_role: ~25 rows (approximately)
INSERT INTO `module_role` (`id`, `id_module`, `id_role`, `read_data`, `create_data`, `update_data`, `delete_data`) VALUES
	(1, 3, 1, 'all', 'yes', 'all', 'all'),
	(2, 8, 1, 'all', 'yes', 'all', 'all'),
	(3, 4, 1, 'all', 'yes', 'all', 'all'),
	(5, 2, 1, 'all', 'yes', 'all', 'all'),
	(6, 1, 1, 'all', 'yes', 'all', 'all'),
	(7, 7, 1, 'all', 'yes', 'all', 'all'),
	(10, 11, 1, 'all', 'yes', 'all', 'all'),
	(11, 12, 1, 'all', 'yes', 'all', 'all'),
	(13, 14, 1, 'all', 'yes', 'all', 'all'),
	(14, 10, 1, 'all', 'yes', 'all', 'all'),
	(24, 5, 1, 'all', 'yes', 'all', 'all'),
	(25, 5, 2, 'own', 'no', 'own', 'no'),
	(26, 15, 1, 'all', 'yes', 'all', 'all'),
	(27, 15, 2, 'own', 'no', 'own', 'own'),
	(29, 17, 1, 'all', 'yes', 'all', 'all'),
	(38, 25, 1, 'all', 'yes', 'all', 'all'),
	(39, 25, 2, 'all', 'yes', 'all', 'all'),
	(41, 26, 1, 'all', 'yes', 'all', 'all'),
	(42, 27, 1, 'all', 'yes', 'all', 'all'),
	(45, 9, 1, 'all', 'yes', 'all', 'all'),
	(46, 9, 2, 'own', 'yes', 'own', 'own'),
	(47, 16, 1, 'all', 'yes', 'all', 'all'),
	(49, 13, 1, 'all', 'yes', 'all', 'all'),
	(50, 13, 2, 'own', 'yes', 'no', 'no'),
	(51, 31, 1, 'all', 'yes', 'all', 'all');

-- Dumping structure for table idcard_kartu.module_status
CREATE TABLE IF NOT EXISTS `module_status` (
  `id_module_status` tinyint(1) NOT NULL AUTO_INCREMENT,
  `nama_status` varchar(50) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_module_status`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC COMMENT='Tabel status modul, seperti: aktif, non aktif, dalam perbaikan';

-- Dumping data for table idcard_kartu.module_status: ~3 rows (approximately)
INSERT INTO `module_status` (`id_module_status`, `nama_status`, `keterangan`) VALUES
	(1, 'Aktif', NULL),
	(2, 'Dalam Perbaikan', 'Hanya role developer yang dapat mengakses module dengan status ini'),
	(3, 'Non Aktif', NULL);

-- Dumping structure for table idcard_kartu.role
CREATE TABLE IF NOT EXISTS `role` (
  `id_role` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `nama_role` varchar(50) NOT NULL,
  `judul_role` varchar(50) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `id_module` smallint(5) unsigned NOT NULL DEFAULT 0,
  PRIMARY KEY (`id_role`),
  UNIQUE KEY `role_nama` (`nama_role`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC COMMENT='Tabel yang berisi daftar role, role ini mengatur bagaimana user mengakses module, role ini nantinya diassign ke user';

-- Dumping data for table idcard_kartu.role: ~3 rows (approximately)
INSERT INTO `role` (`id_role`, `nama_role`, `judul_role`, `keterangan`, `id_module`) VALUES
	(1, 'admin', 'Administrator', 'Administrator', 5),
	(2, 'user', 'User', 'Pengguna umum', 25),
	(3, 'webdev', 'Web Developer', 'Pengembang aplikasi', 5);

-- Dumping structure for table idcard_kartu.role_detail
CREATE TABLE IF NOT EXISTS `role_detail` (
  `id_role_detail` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `nama_role_detail` varchar(255) DEFAULT NULL,
  `judul_role_detail` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_role_detail`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table idcard_kartu.role_detail: ~3 rows (approximately)
INSERT INTO `role_detail` (`id_role_detail`, `nama_role_detail`, `judul_role_detail`) VALUES
	(1, 'all', 'Boleh Akses Semua Data'),
	(2, 'no', 'Tidak Boleh Akses Semua Data'),
	(3, 'own', 'Hanya Data Miliknya Sendiri');

-- Dumping structure for table idcard_kartu.setting_app_tampilan
CREATE TABLE IF NOT EXISTS `setting_app_tampilan` (
  `param` varchar(255) NOT NULL,
  `value` text NOT NULL,
  PRIMARY KEY (`param`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table idcard_kartu.setting_app_tampilan: 5 rows
/*!40000 ALTER TABLE `setting_app_tampilan` DISABLE KEYS */;
INSERT INTO `setting_app_tampilan` (`param`, `value`) VALUES
	('color_scheme', 'purple'),
	('sidebar_color', 'dark'),
	('logo_background_color', 'default'),
	('font_family', 'open-sans'),
	('font_size', '14');
/*!40000 ALTER TABLE `setting_app_tampilan` ENABLE KEYS */;

-- Dumping structure for table idcard_kartu.setting_app_user
CREATE TABLE IF NOT EXISTS `setting_app_user` (
  `id_user` int(11) unsigned NOT NULL,
  `param` varchar(255) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table idcard_kartu.setting_app_user: 1 rows
/*!40000 ALTER TABLE `setting_app_user` DISABLE KEYS */;
INSERT INTO `setting_app_user` (`id_user`, `param`) VALUES
	(2, '{"color_scheme":"grey","sidebar_color":"dark","logo_background_color":"default","font_family":"open-sans","font_size":"16"}');
/*!40000 ALTER TABLE `setting_app_user` ENABLE KEYS */;

-- Dumping structure for table idcard_kartu.setting_printer
CREATE TABLE IF NOT EXISTS `setting_printer` (
  `id_setting_printer` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `dpi` smallint(5) unsigned DEFAULT NULL,
  `margin_kiri` decimal(10,2) unsigned DEFAULT NULL,
  `margin_atas` decimal(10,2) unsigned DEFAULT NULL,
  `margin_kartu_kanan` decimal(10,2) unsigned DEFAULT NULL COMMENT 'Margin kanan antar kartu, jika cetak lebih dari satu',
  `margin_kartu_bawah` decimal(10,2) unsigned DEFAULT NULL COMMENT 'Margin bawah antar kartu dalam hal kartu dicetak lebih dari satu',
  `margin_kartu_depan_belakang` decimal(10,2) unsigned DEFAULT NULL COMMENT 'Margin antara kartu depan dan belakang, kartu depan dan belakang dicetak atas bawah',
  `gunakan` tinyint(3) unsigned DEFAULT NULL,
  PRIMARY KEY (`id_setting_printer`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table idcard_kartu.setting_printer: ~2 rows (approximately)
INSERT INTO `setting_printer` (`id_setting_printer`, `dpi`, `margin_kiri`, `margin_atas`, `margin_kartu_kanan`, `margin_kartu_bawah`, `margin_kartu_depan_belakang`, `gunakan`) VALUES
	(4, 100, 2.00, 2.00, 2.00, 2.00, 2.00, 0),
	(5, 100, 1.00, 1.00, 1.00, 1.00, 1.00, 1);

-- Dumping structure for table idcard_kartu.setting_qrcode
CREATE TABLE IF NOT EXISTS `setting_qrcode` (
  `id_setting_qrcode` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `version` tinyint(4) NOT NULL,
  `ecc` enum('L','M','Q','H') NOT NULL DEFAULT 'L',
  `size_module` decimal(10,1) NOT NULL DEFAULT 0.0,
  `padding` varchar(50) NOT NULL,
  `content_jenis` enum('field_database','global_text') NOT NULL,
  `content_field_database` varchar(255) NOT NULL,
  `content_global_text` mediumtext NOT NULL,
  `posisi_kartu` varchar(255) NOT NULL,
  `posisi_top` smallint(6) NOT NULL,
  `posisi_left` smallint(6) NOT NULL,
  PRIMARY KEY (`id_setting_qrcode`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table idcard_kartu.setting_qrcode: ~1 rows (approximately)
INSERT INTO `setting_qrcode` (`id_setting_qrcode`, `version`, `ecc`, `size_module`, `padding`, `content_jenis`, `content_field_database`, `content_global_text`, `posisi_kartu`, `posisi_top`, `posisi_left`) VALUES
	(1, 4, 'L', 1.5, '4px', 'field_database', 'npm', 'url: <a href="https://jagowebdev.com">Jagowebdev.com</a>', 'background_belakang', 125, 249);

-- Dumping structure for table idcard_kartu.setting_register
CREATE TABLE IF NOT EXISTS `setting_register` (
  `param` varchar(255) NOT NULL,
  `value` tinytext DEFAULT NULL,
  PRIMARY KEY (`param`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- Dumping data for table idcard_kartu.setting_register: ~3 rows (approximately)
INSERT INTO `setting_register` (`param`, `value`) VALUES
	('enable', 'Y'),
	('id_role', '2'),
	('metode_aktivasi', 'email');

-- Dumping structure for table idcard_kartu.setting_web
CREATE TABLE IF NOT EXISTS `setting_web` (
  `param` varchar(255) NOT NULL,
  `value` tinytext DEFAULT NULL,
  PRIMARY KEY (`param`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- Dumping data for table idcard_kartu.setting_web: ~10 rows (approximately)
INSERT INTO `setting_web` (`param`, `value`) VALUES
	('background_logo', 'transparent'),
	('btn_login', 'btn-danger'),
	('deskripsi_web', 'Template administrasi lengkap dengan fitur penting dalam pengembangan aplikasi seperti pengatuan web, layout, dll'),
	('favicon', 'favicon.png'),
	('footer_app', 'Â© {{YEAR}} <a href="https://jagowebdev.com" target="_blank">www.Jagowebdev.com</a>'),
	('footer_login', 'Â© {{YEAR}} <a href="https://jagowebdev.com" target="_blank">Jagowebdev.com</a>'),
	('judul_web', 'Admin Template Jagowebdev'),
	('logo_app', 'logo_aplikasi.png'),
	('logo_login', 'logo_login.png'),
	('logo_register', 'logo_register.png');

-- Dumping structure for table idcard_kartu.tandatangan
CREATE TABLE IF NOT EXISTS `tandatangan` (
  `id_tandatangan` tinyint(4) unsigned NOT NULL AUTO_INCREMENT,
  `kota_tandatangan` varchar(255) DEFAULT NULL,
  `nama_tandatangan` varchar(255) DEFAULT NULL,
  `nip_tandatangan` varchar(255) DEFAULT NULL,
  `jabatan` varchar(255) DEFAULT NULL,
  `tgl_tandatangan` date DEFAULT NULL,
  `file_tandatangan` varchar(50) DEFAULT NULL,
  `file_cap_tandatangan` varchar(50) DEFAULT NULL,
  `gunakan` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id_tandatangan`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- Dumping data for table idcard_kartu.tandatangan: ~0 rows (approximately)
INSERT INTO `tandatangan` (`id_tandatangan`, `kota_tandatangan`, `nama_tandatangan`, `nip_tandatangan`, `jabatan`, `tgl_tandatangan`, `file_tandatangan`, `file_cap_tandatangan`, `gunakan`) VALUES
	(12, 'Surakarta', 'Agus Prawoto Hadi, S.S.T, M.T', '19880620 200012 1 001', 'Rektor', '2020-03-24', 'tanda_tangan_kartu.png', 'stempel.png', 1);

-- Dumping structure for table idcard_kartu.universitas
CREATE TABLE IF NOT EXISTS `universitas` (
  `id_universitas` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `nama_universitas` varchar(255) NOT NULL DEFAULT '0',
  `alamat` varchar(255) NOT NULL DEFAULT '0',
  `tlp_fax` varchar(255) NOT NULL DEFAULT '0',
  `website` varchar(255) NOT NULL DEFAULT '0',
  `nama_kementerian` varchar(255) NOT NULL DEFAULT '0',
  `logo` varchar(255) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_universitas`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table idcard_kartu.universitas: ~0 rows (approximately)
INSERT INTO `universitas` (`id_universitas`, `nama_universitas`, `alamat`, `tlp_fax`, `website`, `nama_kementerian`, `logo`) VALUES
	(1, 'Jagowebdev College', 'Jl. Jend. Sudirman No. 24 Solo', '(0271) 666667', 'www.jagowebdev.com', 'TECHNOLOGY DEPARTMENT', 'Logo Jagowebdev.png');

-- Dumping structure for table idcard_kartu.user
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `verified` tinyint(4) NOT NULL,
  `status` tinyint(1) unsigned NOT NULL DEFAULT 1,
  `created` datetime NOT NULL,
  `id_role` smallint(6) unsigned NOT NULL DEFAULT 0,
  `avatar` varchar(255) NOT NULL DEFAULT '0',
  `id_user_input` int(10) unsigned NOT NULL,
  `tgl_input` date NOT NULL DEFAULT current_timestamp(),
  `id_user_update` int(10) unsigned NOT NULL,
  `tgl_update` date NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id_user`),
  KEY `user_role` (`id_role`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT COMMENT='Tabel user untuk login';

-- Dumping data for table idcard_kartu.user: ~3 rows (approximately)
INSERT INTO `user` (`id_user`, `email`, `username`, `nama`, `password`, `verified`, `status`, `created`, `id_role`, `avatar`, `id_user_input`, `tgl_input`, `id_user_update`, `tgl_update`) VALUES
	(1, 'prawoto.hadi@gmail.com', 'admin', 'Agus Prawoto Hadi', '$2y$10$Fp.lQ.iVCZ5uW3xzKUYBguhGNqKTRfSmsSqYjYCAfCX3DoS8ZQg02', 1, 1, '2020-09-20 16:04:35', 1, '0', 1, '2021-01-29', 1, '2021-01-29'),
	(2, 'maxitech7@gmail.com', 'user', 'User Administrasi', '$2y$10$qpsrjc/TTqvDB09RtSuPZ.dn9Rf/VS5JttXB.5b2pL7apwAjct2/e', 1, 1, '2020-09-20 16:04:35', 2, 'administrator.png', 2, '2021-01-29', 2, '2021-01-29'),
	(3, 'superuser@gmail.com', 'superuser', 'Super USer', '$2y$10$yovZybHzPkY0e9Xakd2i4eMzjcGpOvXS4/B1YwMGg2XA/XqaGnlwm', 1, 1, '2020-09-20 16:04:35', 1, '0', 4, '2021-01-29', 4, '2021-01-29');

-- Dumping structure for table idcard_kartu.user_cookie
CREATE TABLE IF NOT EXISTS `user_cookie` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_user` int(10) unsigned NOT NULL DEFAULT 0,
  `selector` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `expires` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cookie_auth` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT COMMENT='Tabel cookie untuk fitur remember me';

-- Dumping data for table idcard_kartu.user_cookie: ~0 rows (approximately)

-- Dumping structure for table idcard_kartu.user_role
CREATE TABLE IF NOT EXISTS `user_role` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `id_user` smallint(5) unsigned NOT NULL,
  `id_role` smallint(5) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `module_role_module` (`id_user`),
  KEY `module_role_role` (`id_role`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT COMMENT='Tabel yang berisi role yang dimili oleh masing masing user';

-- Dumping data for table idcard_kartu.user_role: ~3 rows (approximately)
INSERT INTO `user_role` (`id`, `id_user`, `id_role`) VALUES
	(1, 1, 1),
	(11, 2, 2),
	(15, 4, 1);

-- Dumping structure for table idcard_kartu.user_token
CREATE TABLE IF NOT EXISTS `user_token` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `selector` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `action` enum('register','remember','recovery','activation') NOT NULL,
  `id_user` int(10) unsigned NOT NULL DEFAULT 0,
  `created` datetime NOT NULL,
  `expires` datetime NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table idcard_kartu.user_token: ~0 rows (approximately)

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
