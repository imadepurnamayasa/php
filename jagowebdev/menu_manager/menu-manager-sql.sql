-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.19-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table menumanager.menu
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
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT COMMENT='Tabel menu aplikasi';

-- Dumping data for table menumanager.menu: ~14 rows (approximately)
/*!40000 ALTER TABLE `menu` DISABLE KEYS */;
INSERT INTO `menu` (`id_menu`, `nama_menu`, `class`, `url`, `id_module`, `id_parent`, `aktif`, `new`, `urut`) VALUES
	(1, 'User', 'fas fa-users', 'user', 5, 7, 1, 0, 1),
	(2, 'Assign Role', 'fas fa-link', '#', 0, 7, 1, 0, 5),
	(4, 'Module', 'fas fa-network-wired', 'module', 2, 7, 1, 0, 2),
	(5, 'Module Role', 'fas fa-desktop', 'module-role', 3, 2, 1, 0, 1),
	(6, 'Menu', 'fas fa-clone', 'menu', 1, 7, 1, 0, 4),
	(7, 'Website', 'fas fa-globe', '#', 1, 0, 1, 0, 1),
	(8, 'Role', 'fas fa-briefcase', 'role', 4, 7, 1, 0, 3),
	(9, 'Setting Website', 'fas fa-cog', 'setting-web', 16, 7, 1, 0, 6),
	(10, 'Layout Setting', 'fas fa-brush', 'setting', 15, 7, 1, 0, 7),
	(11, 'Menu Frontend', 'fas fa-clipboard-list', 'menu-frontend', 12, NULL, 1, 0, 2),
	(12, 'User Role', 'far fa-user', 'user-role', 7, 2, 1, 0, 2),
	(13, 'Menu Role', 'far fa-user-circle', 'menu-role', 8, 2, 1, 0, 3),
	(14, 'Demo Website', 'fas fa-desktop', 'https://jagowebdev.com/demo/menumanager/', 0, NULL, 1, 0, 3),
	(15, 'Demo Admin', 'fas fa-dice-d6', 'https://jagowebdev.com/demo/menumanager/adminpanel', 0, NULL, 1, 0, 4);
/*!40000 ALTER TABLE `menu` ENABLE KEYS */;

-- Dumping structure for table menumanager.menu_frontend
CREATE TABLE IF NOT EXISTS `menu_frontend` (
  `id_menu` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `nama_menu` varchar(50) NOT NULL,
  `nama_group` varchar(255) DEFAULT NULL,
  `class` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `id_parent` smallint(5) unsigned DEFAULT NULL,
  `aktif` enum('Y','N') DEFAULT NULL,
  `urut` tinyint(3) unsigned DEFAULT NULL,
  PRIMARY KEY (`id_menu`) USING BTREE,
  KEY `menu_frontend_menu_frontend_group` (`nama_group`),
  CONSTRAINT `menu_frontend_menu_frontend_group` FOREIGN KEY (`nama_group`) REFERENCES `menu_frontend_group` (`nama_group`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT COMMENT='Tabel menu aplikasi';

-- Dumping data for table menumanager.menu_frontend: ~41 rows (approximately)
/*!40000 ALTER TABLE `menu_frontend` DISABLE KEYS */;
INSERT INTO `menu_frontend` (`id_menu`, `nama_menu`, `nama_group`, `class`, `url`, `id_parent`, `aktif`, `urut`) VALUES
	(1, 'Floara dan Fauna', 'Header', 'fas fa-paw', '#', 2, 'Y', 2),
	(2, 'Gallery', 'Header', 'far fa-images', '{{BASE_URL}}gallery', NULL, 'Y', 2),
	(3, 'About', NULL, 'far fa-address-card', 'about', NULL, 'Y', 1),
	(4, 'Home', 'Footer', NULL, '{{BASE_URL}}', NULL, 'Y', 2),
	(5, 'Term of Use', 'Footer', NULL, 'tremofuser', NULL, 'Y', 1),
	(6, 'Flora dan Fauna', NULL, 'fas fa-paw', 'florafauna', NULL, 'Y', 2),
	(7, 'Home', 'Header', 'fas fa-home', '{{BASE_URL}}', NULL, 'Y', 1),
	(8, 'Lanscape', 'Header', 'far fa-image', '#', 2, 'Y', 3),
	(9, 'Demo Admin', 'Header', 'fas fa-external-link-alt', '{{BASE_URL}}adminpanel/', NULL, 'Y', 3),
	(11, 'Backend', 'Header', 'fas fa-sign-in-alt', '{{BASE_URL}}admin', NULL, 'Y', 4),
	(12, 'Beautifull City', 'Header', 'fas fa-city', '#', 2, 'Y', 1),
	(13, 'Fresh Fruits', 'Header', 'fas fa-apple-alt', '#', 2, 'Y', 4),
	(15, 'Website', 'Left Menu', 'fas fa-globe', '#', NULL, 'Y', 1),
	(16, 'Menu Manager', 'Left Menu', 'far fa-clone', '#', NULL, 'Y', 2),
	(17, 'Form Builder', 'Left Menu', 'fas fa-list', '#', NULL, 'Y', 3),
	(18, 'Sampel Form', 'Left Menu', 'far fa-list-alt', '#', NULL, 'Y', 4),
	(19, 'Layout Setting', 'Left Menu', 'fas fa-paint-roller', '#', NULL, 'Y', 5),
	(20, 'Download', 'Left Menu', 'fas fa-cloud-download-alt', '#', NULL, 'Y', 6),
	(21, 'Expor data', 'Left Menu', 'fas fa-file-export', '#', NULL, 'Y', 7),
	(22, 'Data Tables', 'Left Menu', 'fas fa-table', '#', 44, 'Y', 1),
	(23, 'Checkbox', 'Left Menu', 'far fa-check-circle', '#', 18, 'Y', 1),
	(24, 'Dropdown', 'Left Menu', 'far fa-caret-square-down', '#', 18, 'Y', 2),
	(25, 'Ekpor PDF', 'Left Menu', 'far fa-file-pdf', '#', 21, 'Y', 1),
	(26, 'Ekspor Excel', 'Left Menu', 'far fa-file-excel', '#', 21, 'Y', 2),
	(27, 'Right Menu 1', 'Right Menu', 'far fa-calendar-alt', '#', NULL, 'Y', 1),
	(28, 'Right Menu 2', 'Right Menu', 'fas fa-chair', '#', NULL, 'Y', 2),
	(29, 'Right Menu 3', 'Right Menu', 'far fa-clock', '#', NULL, 'Y', 3),
	(30, 'Right Menu 4', 'Right Menu', 'fab fa-confluence', '#', NULL, 'Y', 4),
	(31, 'Right Menu 5', 'Right Menu', 'fas fa-cloud-upload-alt', '#', NULL, 'Y', 5),
	(32, 'Right Menu 6', 'Right Menu', 'fas fa-coffee', '#', NULL, 'Y', 6),
	(33, 'Right Menu 7', 'Right Menu', 'fab fa-connectdevelop', '#', NULL, 'Y', 7),
	(34, 'Sub Menu 4 - 1', 'Right Menu', 'fas fa-compact-disc', '#', 30, 'Y', 1),
	(35, 'Sub Menu 4 - 2', 'Right Menu', 'fab fa-creative-commons-nd', '#', 30, 'Y', 2),
	(36, 'Sub Menu 4 - 3', 'Right Menu', 'far fa-envelope', '#', 30, 'Y', 3),
	(37, 'Sub Menu 7 - 1', 'Right Menu', 'far fa-folder', '#', 33, 'Y', 1),
	(38, 'Sub Menu 7 - 2', 'Right Menu', 'fas fa-globe', '#', 33, 'Y', 2),
	(39, 'Demo Website', 'Header Admin', 'fas fa-external-link-alt', '{{BASE_URL}}', NULL, 'Y', NULL),
	(40, 'Backend', 'Header Admin', 'fas fa-sign-in-alt', '{{BASE_URL}}admin/', NULL, 'Y', NULL),
	(41, 'Pantai', 'Header', 'fas fa-umbrella-beach', '#', 8, 'Y', 1),
	(42, 'Pegunungan', 'Header', 'fas fa-mountain', '#', 8, 'Y', 2),
	(43, 'Danau', 'Header', 'fas fa-water', '#', 8, 'Y', 3),
	(44, 'Tables', 'Left Menu', 'fas fa-table', '#', 18, 'Y', 3),
	(45, 'Table Normal', 'Left Menu', 'far fa-list-alt', '#', 44, 'Y', 3);
/*!40000 ALTER TABLE `menu_frontend` ENABLE KEYS */;

-- Dumping structure for table menumanager.menu_frontend_group
CREATE TABLE IF NOT EXISTS `menu_frontend_group` (
  `nama_group` varchar(255) CHARACTER SET latin1 NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`nama_group`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table menumanager.menu_frontend_group: ~5 rows (approximately)
/*!40000 ALTER TABLE `menu_frontend_group` DISABLE KEYS */;
INSERT INTO `menu_frontend_group` (`nama_group`, `timestamp`) VALUES
	('Footer', '2021-06-05 11:48:31'),
	('Header', '2021-06-05 11:48:30'),
	('Header Admin', '2021-06-15 06:33:26'),
	('Left Menu', '2021-06-06 05:56:30'),
	('Right Menu', '2021-06-06 05:56:56');
/*!40000 ALTER TABLE `menu_frontend_group` ENABLE KEYS */;

-- Dumping structure for table menumanager.menu_role
CREATE TABLE IF NOT EXISTS `menu_role` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `id_menu` smallint(5) unsigned NOT NULL,
  `id_role` smallint(5) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `module_role_module` (`id_menu`),
  KEY `module_role_role` (`id_role`),
  CONSTRAINT `menu_role_menu` FOREIGN KEY (`id_menu`) REFERENCES `menu` (`id_menu`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `menu_role_role` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT COMMENT='Tabel hak akses dari menu aplikasi';

-- Dumping data for table menumanager.menu_role: ~17 rows (approximately)
/*!40000 ALTER TABLE `menu_role` DISABLE KEYS */;
INSERT INTO `menu_role` (`id`, `id_menu`, `id_role`) VALUES
	(1, 5, 1),
	(2, 2, 1),
	(3, 4, 1),
	(4, 6, 1),
	(5, 1, 1),
	(6, 1, 2),
	(7, 7, 1),
	(8, 8, 1),
	(9, 9, 1),
	(10, 10, 1),
	(11, 7, 2),
	(12, 10, 2),
	(13, 11, 1),
	(14, 13, 1),
	(15, 12, 1),
	(16, 14, 1),
	(17, 15, 1);
/*!40000 ALTER TABLE `menu_role` ENABLE KEYS */;

-- Dumping structure for table menumanager.module
CREATE TABLE IF NOT EXISTS `module` (
  `id_module` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `nama_module` varchar(50) DEFAULT NULL,
  `judul_module` varchar(50) DEFAULT NULL,
  `id_module_status` tinyint(1) DEFAULT NULL,
  `login` enum('Y','N','R') NOT NULL DEFAULT 'Y',
  `deskripsi` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_module`),
  UNIQUE KEY `module_nama` (`nama_module`),
  KEY `module_module_status` (`id_module_status`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC COMMENT='Tabel modul aplikasi';

-- Dumping data for table menumanager.module: ~12 rows (approximately)
/*!40000 ALTER TABLE `module` DISABLE KEYS */;
INSERT INTO `module` (`id_module`, `nama_module`, `judul_module`, `id_module_status`, `login`, `deskripsi`) VALUES
	(1, 'menu', 'Menu Manager', 1, 'Y', 'Administrasi Menu'),
	(2, 'module', 'Module Manager', 1, 'Y', 'Pengaturan Module'),
	(3, 'module-role', 'Assign Role ke Module', 1, 'Y', 'Assign Role ke Module'),
	(4, 'role', 'Role Manager', 1, 'Y', 'Pengaturan Role'),
	(5, 'user', 'User Manager', 1, 'Y', 'Pengaturan user'),
	(6, 'login', 'Login', 1, 'R', 'Login ke akun Anda'),
	(7, 'user-role', 'Assign Role ke User', 1, 'Y', 'Assign role ke user'),
	(8, 'menu-role', 'Menu - Role', 1, 'Y', 'Assign role ke menu'),
	(9, 'setting', 'Web Setting', 1, 'Y', 'Web Setting'),
	(10, 'setting-web', 'Setting Web', 1, 'Y', 'Pengaturan website seperti nama web, logo, dll'),
	(11, 'home', 'Home', 1, 'Y', 'Home'),
	(12, 'menu-frontend', 'Menu Frontend', 1, 'Y', 'Menu Frontend');
/*!40000 ALTER TABLE `module` ENABLE KEYS */;

-- Dumping structure for table menumanager.module_role
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
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC COMMENT='Tabel hak akses module aplikasi, module aplikasi boleh diakses oleh user yang mempunyai role apa saja';

-- Dumping data for table menumanager.module_role: ~14 rows (approximately)
/*!40000 ALTER TABLE `module_role` DISABLE KEYS */;
INSERT INTO `module_role` (`id`, `id_module`, `id_role`, `read_data`, `create_data`, `update_data`, `delete_data`) VALUES
	(1, 3, 1, 'all', 'yes', 'all', 'all'),
	(2, 8, 1, 'all', 'yes', 'all', 'all'),
	(3, 4, 1, 'all', 'yes', 'all', 'all'),
	(4, 2, 1, 'all', 'yes', 'all', 'all'),
	(5, 1, 1, 'all', 'yes', 'all', 'all'),
	(6, 7, 1, 'all', 'yes', 'all', 'all'),
	(7, 5, 1, 'all', 'yes', 'all', 'all'),
	(8, 5, 2, 'own', 'no', 'own', 'no'),
	(9, 9, 1, 'all', 'yes', 'all', 'all'),
	(10, 9, 2, 'own', 'no', 'own', 'own'),
	(11, 10, 1, 'all', 'yes', 'all', 'all'),
	(12, 11, 1, 'all', 'yes', 'all', 'all'),
	(13, 11, 2, 'all', 'yes', 'all', 'all'),
	(14, 12, 1, 'all', 'yes', 'all', 'all');
/*!40000 ALTER TABLE `module_role` ENABLE KEYS */;

-- Dumping structure for table menumanager.module_status
CREATE TABLE IF NOT EXISTS `module_status` (
  `id_module_status` tinyint(1) NOT NULL AUTO_INCREMENT,
  `nama_status` varchar(50) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_module_status`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC COMMENT='Tabel status modul, seperti: aktif, non aktif, dalam perbaikan';

-- Dumping data for table menumanager.module_status: ~3 rows (approximately)
/*!40000 ALTER TABLE `module_status` DISABLE KEYS */;
INSERT INTO `module_status` (`id_module_status`, `nama_status`, `keterangan`) VALUES
	(1, 'Aktif', NULL),
	(2, 'Dalam Perbaikan', 'Hanya role developer yang dapat mengakses module dengan status ini'),
	(3, 'Non Aktif', NULL);
/*!40000 ALTER TABLE `module_status` ENABLE KEYS */;

-- Dumping structure for table menumanager.role
CREATE TABLE IF NOT EXISTS `role` (
  `id_role` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `nama_role` varchar(50) NOT NULL,
  `judul_role` varchar(50) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `id_module` smallint(5) unsigned NOT NULL DEFAULT 0,
  PRIMARY KEY (`id_role`),
  UNIQUE KEY `role_nama` (`nama_role`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC COMMENT='Tabel yang berisi daftar role, role ini mengatur bagaimana user mengakses module, role ini nantinya diassign ke user';

-- Dumping data for table menumanager.role: ~3 rows (approximately)
/*!40000 ALTER TABLE `role` DISABLE KEYS */;
INSERT INTO `role` (`id_role`, `nama_role`, `judul_role`, `keterangan`, `id_module`) VALUES
	(1, 'admin', 'Administrator', 'Administrator', 5),
	(2, 'user', 'User', 'Pengguna umum', 11),
	(3, 'guest', 'Guest', 'Guest', 5);
/*!40000 ALTER TABLE `role` ENABLE KEYS */;

-- Dumping structure for table menumanager.role_detail
CREATE TABLE IF NOT EXISTS `role_detail` (
  `id_role_detail` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `nama_role_detail` varchar(255) DEFAULT NULL,
  `judul_role_detail` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_role_detail`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table menumanager.role_detail: ~3 rows (approximately)
/*!40000 ALTER TABLE `role_detail` DISABLE KEYS */;
INSERT INTO `role_detail` (`id_role_detail`, `nama_role_detail`, `judul_role_detail`) VALUES
	(1, 'all', 'Boleh Akses Semua Data'),
	(2, 'no', 'Tidak Boleh Akses Semua Data'),
	(3, 'own', 'Hanya Data Miliknya Sendiri');
/*!40000 ALTER TABLE `role_detail` ENABLE KEYS */;

-- Dumping structure for table menumanager.setting_app_tampilan
CREATE TABLE IF NOT EXISTS `setting_app_tampilan` (
  `param` varchar(255) NOT NULL,
  `value` text NOT NULL,
  PRIMARY KEY (`param`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table menumanager.setting_app_tampilan: 5 rows
/*!40000 ALTER TABLE `setting_app_tampilan` DISABLE KEYS */;
INSERT INTO `setting_app_tampilan` (`param`, `value`) VALUES
	('color_scheme', 'purple'),
	('sidebar_color', 'dark'),
	('logo_background_color', 'default'),
	('font_family', 'poppins'),
	('font_size', '16');
/*!40000 ALTER TABLE `setting_app_tampilan` ENABLE KEYS */;

-- Dumping structure for table menumanager.setting_app_user
CREATE TABLE IF NOT EXISTS `setting_app_user` (
  `id_user` int(11) unsigned NOT NULL,
  `param` varchar(255) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table menumanager.setting_app_user: 1 rows
/*!40000 ALTER TABLE `setting_app_user` DISABLE KEYS */;
INSERT INTO `setting_app_user` (`id_user`, `param`) VALUES
	(2, '{"color_scheme":"green","sidebar_color":"dark","logo_background_color":"default","font_family":"open-sans","font_size":"14"}');
/*!40000 ALTER TABLE `setting_app_user` ENABLE KEYS */;

-- Dumping structure for table menumanager.setting_web
CREATE TABLE IF NOT EXISTS `setting_web` (
  `param` varchar(255) NOT NULL,
  `value` tinytext DEFAULT NULL,
  PRIMARY KEY (`param`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table menumanager.setting_web: ~9 rows (approximately)
/*!40000 ALTER TABLE `setting_web` DISABLE KEYS */;
INSERT INTO `setting_web` (`param`, `value`) VALUES
	('background_logo', 'transparent'),
	('btn_login', 'btn-danger'),
	('description', 'Aplikasi yang akan memudahkan Anda untuk mengelola menu pada aplikasi atau website'),
	('favicon', 'favicon.png'),
	('footer_app', '© {{YEAR}} <a href="https://jagowebdev.com" target="_blank">www.Jagowebdev.com</a>'),
	('footer_login', '© {{YEAR}} <a href="https://jagowebdev.com" target="_blank">Jagowebdev.com</a>'),
	('logo_app', 'logo_aplikasi.png'),
	('logo_login', 'logo_login.png'),
	('title', 'Menu Manager');
/*!40000 ALTER TABLE `setting_web` ENABLE KEYS */;

-- Dumping structure for table menumanager.user
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `verified` tinyint(4) NOT NULL,
  `status` tinyint(1) unsigned NOT NULL,
  `created` datetime NOT NULL,
  `id_role` smallint(6) unsigned NOT NULL,
  `avatar` varchar(255) NOT NULL,
  PRIMARY KEY (`id_user`),
  KEY `user_role` (`id_role`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT COMMENT='Tabel user untuk login';

-- Dumping data for table menumanager.user: ~3 rows (approximately)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id_user`, `email`, `username`, `nama`, `password`, `verified`, `status`, `created`, `id_role`, `avatar`) VALUES
	(1, 'prawoto.hadi@gmail.com', 'admin', 'Agus Prawoto Hadi', '$2y$10$WKtoNg.3RKbMYCM4ypYQx.5/5/W60faz8T2Kxc/XDE1h.bIL/Icg2', 1, 1, '2021-01-01 08:09:30', 1, ''),
	(2, 'user.administrasi@gmail.com', 'user', 'User Administrasi', '$2y$10$mULSmqshWmi/SpxVvoEwPe8/ZxJRKyQLVJusxiAYneFycNYJDhjKe', 1, 1, '2021-01-01 08:10:11', 2, 'administrator.png'),
	(3, 'superuser@gmail.com', 'superuser', 'Super User', '$2y$10$WKtoNg.3RKbMYCM4ypYQx.5/5/W60faz8T2Kxc/XDE1h.bIL/Icg2', 1, 1, '2021-01-01 08:11:15', 1, '');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

-- Dumping structure for table menumanager.user_role
CREATE TABLE IF NOT EXISTS `user_role` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `id_user` smallint(5) unsigned NOT NULL,
  `id_role` smallint(5) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `module_role_module` (`id_user`),
  KEY `module_role_role` (`id_role`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT COMMENT='Tabel yang berisi role yang dimili oleh masing masing user';

-- Dumping data for table menumanager.user_role: ~3 rows (approximately)
/*!40000 ALTER TABLE `user_role` DISABLE KEYS */;
INSERT INTO `user_role` (`id`, `id_user`, `id_role`) VALUES
	(1, 1, 1),
	(2, 2, 2),
	(3, 3, 1);
/*!40000 ALTER TABLE `user_role` ENABLE KEYS */;

-- Dumping structure for table menumanager.user_token
CREATE TABLE IF NOT EXISTS `user_token` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `selector` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `action` enum('register','remember','recovery','activation') NOT NULL,
  `id_user` int(10) unsigned NOT NULL DEFAULT 0,
  `created` datetime NOT NULL,
  `expires` datetime NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table menumanager.user_token: ~1 rows (approximately)
/*!40000 ALTER TABLE `user_token` DISABLE KEYS */;
INSERT INTO `user_token` (`id`, `selector`, `token`, `action`, `id_user`, `created`, `expires`) VALUES
	(2, 'f77226342486c623e3', 'de08dff1f97e15b203ad14d67c3de93854b864793cabe33f3c0d5f7d1c09e75b', 'remember', 1, '2021-06-18 05:55:40', '2021-06-25 05:55:40');
/*!40000 ALTER TABLE `user_token` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
