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

-- Dumping structure for table registrasi.file_download
CREATE TABLE IF NOT EXISTS `file_download` (
  `id_file_download` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `judul_file` varchar(255) DEFAULT NULL,
  `deskripsi_file` text DEFAULT NULL,
  `id_file_picker` int(10) unsigned DEFAULT NULL,
  `tgl_input` datetime DEFAULT NULL,
  `id_user_input` int(10) unsigned DEFAULT NULL,
  `tgl_update` datetime DEFAULT NULL,
  `id_user_update` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id_file_download`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- Dumping data for table registrasi.file_download: ~4 rows (approximately)
/*!40000 ALTER TABLE `file_download` DISABLE KEYS */;
INSERT INTO `file_download` (`id_file_download`, `judul_file`, `deskripsi_file`, `id_file_picker`, `tgl_input`, `id_user_input`, `tgl_update`, `id_user_update`) VALUES
	(1, 'User Manual Admin Template PHP', 'Dokumen yang berisi user manual Admin Template PHP Native', 54, NULL, 1, NULL, NULL),
	(2, 'Mendesain Form Login', 'Source code dari tutorial mendesain form login dengan CSS 3 dan HTML 5. Tutorial dapat dibaca di: https://jagowebdev.com/mendesain-form-login-dengan-css/', 55, NULL, 1, NULL, NULL),
	(3, 'Cheat Sheet PHP', 'Contoh Cheat Sheet PHP diambil dari kumpulan Cheat Sheet PHP di: https://jagowebdev.com/cheat-sheet-php-bahasa-indonesia/download-cheat-sheet-php-7-bahasa-indonesia/', 56, NULL, 1, NULL, NULL),
	(4, 'Mendesain Social Media Button Dengan CSS', 'Source code tutorial cara membuat social media icon dengan berbagai efek menarik', 57, NULL, 1, NULL, NULL);
/*!40000 ALTER TABLE `file_download` ENABLE KEYS */;

-- Dumping structure for table registrasi.file_download_log
CREATE TABLE IF NOT EXISTS `file_download_log` (
  `id_file_download_log` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_user` int(10) unsigned NOT NULL,
  `id_file_download` int(10) unsigned NOT NULL,
  `judul_file` varchar(255) NOT NULL,
  `id_file_picker` int(10) unsigned NOT NULL,
  `filename` varchar(255) NOT NULL,
  `tgl_download` datetime NOT NULL,
  PRIMARY KEY (`id_file_download_log`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- Dumping data for table registrasi.file_download_log: ~2 rows (approximately)
/*!40000 ALTER TABLE `file_download_log` DISABLE KEYS */;
INSERT INTO `file_download_log` (`id_file_download_log`, `id_user`, `id_file_download`, `judul_file`, `id_file_picker`, `filename`, `tgl_download`) VALUES
	(1, 1, 1, 'User Manual Admin Template PHP', 54, 'User Manual Admin Template PHP - Jagowebdev.pdf', '2021-06-29 21:50:39'),
	(2, 1, 2, 'Mendesain Form Login', 55, 'Mendesain Form Login.zip', '2021-06-29 21:58:46');
/*!40000 ALTER TABLE `file_download_log` ENABLE KEYS */;

-- Dumping structure for table registrasi.file_picker
CREATE TABLE IF NOT EXISTS `file_picker` (
  `id_file_picker` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `caption` text NOT NULL,
  `description` text NOT NULL,
  `alt_text` varchar(255) DEFAULT NULL,
  `nama_file` varchar(255) NOT NULL,
  `mime_type` varchar(255) NOT NULL,
  `size` int(10) unsigned NOT NULL,
  `tgl_upload` datetime NOT NULL DEFAULT current_timestamp(),
  `id_user_upload` int(10) unsigned NOT NULL,
  `meta_file` text NOT NULL,
  PRIMARY KEY (`id_file_picker`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- Dumping data for table registrasi.file_picker: ~67 rows (approximately)
/*!40000 ALTER TABLE `file_picker` DISABLE KEYS */;
INSERT INTO `file_picker` (`id_file_picker`, `title`, `caption`, `description`, `alt_text`, `nama_file`, `mime_type`, `size`, `tgl_upload`, `id_user_upload`, `meta_file`) VALUES
	(1, 'Lebah dan Lalat Kebun', 'Lebah dan Lalat kebun berada di suatu taman bunga', 'Lebah dan Lalat kebun berada di suatu taman bunga', 'Lebah dan Lalat Kebun', 'Lebah Kebun.jpg', 'image/jpeg', 119535, '2021-05-23 15:10:15', 1, '{"default":{"width":1280,"height":805,"size":119535},"thumbnail":{"small":{"filename":"Lebah Kebun_small.jpg","width":250,"height":157,"size":21703},"medium":{"filename":"Lebah Kebun_medium.jpg","width":450,"height":283,"size":52877}}}'),
	(2, 'Sepasang Kupu Kupu Taman', 'Sepasang Kupu Kupu Taman dengan warna yang indah dan serasi', 'Sepasang Kupu Kupu Taman dengan warna yang indah dan serasi', 'Sepasang Kupu Kupu Taman', 'Sepasang Kupu Kupu Taman.jpg', 'image/jpeg', 132133, '2021-05-23 17:28:37', 1, '{"default":{"width":1280,"height":853,"size":132133},"thumbnail":{"small":{"filename":"Sepasang Kupu Kupu Taman_small.jpg","width":250,"height":167,"size":19055},"medium":{"filename":"Sepasang Kupu Kupu Taman_medium.jpg","width":450,"height":300,"size":49119}}}'),
	(3, 'Merpati Putih', 'Merpati bersih putih sedang mencari tempat untuk hinggap', 'Merpati bersih putih sedang mencari tempat untuk hinggap', 'Merpati Putih', 'Merpati Putih.jpg', 'image/jpeg', 110547, '2021-05-23 17:33:29', 1, '{"default":{"width":1280,"height":710,"size":110547},"thumbnail":{"small":{"filename":"Merpati Putih_small.jpg","width":250,"height":139,"size":15328},"medium":{"filename":"Merpati Putih_medium.jpg","width":450,"height":250,"size":40676}}}'),
	(4, 'Harimau Hutan', 'Harimau hutan sedang mencari mangsa', 'Harimau hutan sedang mencari mangsa', 'Harimau Hutan', 'Harimau Liar.jpg', 'image/jpeg', 379324, '2021-05-23 18:16:38', 1, '{"default":{"width":1280,"height":853,"size":379324},"thumbnail":{"small":{"filename":"Harimau Liar_small.jpg","width":250,"height":167,"size":36106},"medium":{"filename":"Harimau Liar_medium.jpg","width":450,"height":300,"size":109105}}}'),
	(5, 'Kuda Putih', 'Kuda putih bersih sedang sendirian menderu kencang di pasir putih', 'Kuda putih bersih sedang sendirian menderu kencang di pasir putih', 'Kuda Putih', 'Kuda Putih.jpg', 'image/jpeg', 149024, '2021-05-23 18:19:14', 1, '{"default":{"width":1280,"height":895,"size":149024},"thumbnail":{"small":{"filename":"Kuda Putih_small.jpg","width":250,"height":175,"size":17671},"medium":{"filename":"Kuda Putih_medium.jpg","width":450,"height":315,"size":51700}}}'),
	(6, 'Lumba Lumba', 'Lumba lumba bersiap mengarungi samudera biru nan indah', 'Lumba lumba bersiap mengarungi samudera biru nan indah', 'Lumba Lumba', 'Lumba Lumba.jpg', 'image/jpeg', 212383, '2021-05-23 18:22:17', 1, '{"default":{"width":1280,"height":853,"size":212383},"thumbnail":{"small":{"filename":"Lumba Lumba_small.jpg","width":250,"height":167,"size":22136},"medium":{"filename":"Lumba Lumba_medium.jpg","width":450,"height":300,"size":66956}}}'),
	(7, 'Burung Merak', 'Burung merak sedang memekarkan sayap sayapnya yang indah', 'Burung merak sedang memekarkan sayap sayapnya yang indah', 'Burung Merak', 'Merak.jpg', 'image/jpeg', 466549, '2021-05-23 18:25:57', 1, '{"default":{"width":1280,"height":720,"size":466549},"thumbnail":{"small":{"filename":"Merak_small.jpg","width":250,"height":141,"size":36382},"medium":{"filename":"Merak_medium.jpg","width":450,"height":253,"size":114705}}}'),
	(8, 'Ikan DIscus', 'Ikan Discus merupakan ikan air tawar dari sungai Amazon, Amerika Setalan sering menghiasa akuarium air tawar', 'Ikan Discus merupakan ikan air tawar dari sungai Amazon, Amerika Setalan sering menghiasa akuarium air tawar', 'Ikan Discus', 'Ikan Discus.jpg', 'image/jpeg', 149589, '2021-05-23 20:01:52', 1, '{"default":{"width":1280,"height":853,"size":149589},"thumbnail":{"small":{"filename":"Ikan Discus_small.jpg","width":250,"height":167,"size":24084},"medium":{"filename":"Ikan Discus_medium.jpg","width":450,"height":300,"size":61634}}}'),
	(9, 'Bintang Laut', 'Bintang laut merupakan invertebrata yang bergerah merayap di dasar laut menggunakan kaki tabung', 'Bintang laut merupakan invertebrata yang bergerah merayap di dasar laut menggunakan kaki tabung', 'Bintang Laut', 'Bintang Laut.jpg', 'image/jpeg', 397533, '2021-05-23 20:07:27', 1, '{"default":{"width":1280,"height":847,"size":397533},"thumbnail":{"small":{"filename":"Bintang Laut_small.jpg","width":250,"height":165,"size":49116},"medium":{"filename":"Bintang Laut_medium.jpg","width":450,"height":298,"size":142111}}}'),
	(10, 'Angsa Greylag', 'Angsa Greylag merupakan spesies angsa yang memiliki tubuh cukup besar dengan sayap yang pendek', 'Angsa Greylag merupakan spesies angsa yang memiliki tubuh cukup besar dengan sayap yang pendek', 'Angsa Greylag', 'Angsa Greylag.jpg', 'image/jpeg', 206606, '2021-05-23 20:11:33', 1, '{"default":{"width":1280,"height":850,"size":206606},"thumbnail":{"small":{"filename":"Angsa Greylag_small.jpg","width":250,"height":166,"size":27273},"medium":{"filename":"Angsa Greylag_medium.jpg","width":450,"height":299,"size":74968}}}'),
	(11, 'Zebra Couple', 'Sepasang zebra ditengah rerumputan  ', 'Zebra merupakan hewan yang berasal dari Afrika. Zebra masih satu family dengan kuda dan keledai', 'Zebra', 'zebras-1883654_1280.jpg', 'image/jpeg', 195983, '2021-05-23 20:16:05', 1, '{"default":{"width":1280,"height":765,"size":195983},"thumbnail":{"small":{"filename":"zebras-1883654_1280_small.jpg","width":250,"height":149,"size":30291},"medium":{"filename":"zebras-1883654_1280_medium.jpg","width":450,"height":269,"size":76834}}}'),
	(12, 'Room Hotel Superior', 'Room Hotel Superior Double Bed', 'Contoh tampilan room hotel kelas Superior dengan double bed', 'Room Hotel Superior', 'Room Hotel Superior Double.jpg', 'image/jpeg', 199691, '2021-05-23 20:22:20', 1, '{"default":{"width":1280,"height":853,"size":199691},"thumbnail":{"small":{"filename":"Room Hotel Superior Double_small.jpg","width":250,"height":167,"size":21387},"medium":{"filename":"Room Hotel Superior Double_medium.jpg","width":450,"height":300,"size":59918}}}'),
	(13, 'Room Hotel Vaganza', 'Room Hotel Kelas Vaganza', 'Contoh tampilan room hotel kelas vaganza dengan dua tempat tidur', 'Room Hotel Vaganza', 'Bedroom Hotel.jpg', 'image/jpeg', 165186, '2021-05-23 20:23:52', 1, '{"default":{"width":1280,"height":853,"size":165186},"thumbnail":{"small":{"filename":"Bedroom Hotel_small.jpg","width":250,"height":167,"size":21774},"medium":{"filename":"Bedroom Hotel_medium.jpg","width":450,"height":300,"size":57359}}}'),
	(14, 'Kolam Renang Hotel', 'Kolam Renang Hotel Indoor', 'Fasilitas kolam renang yang disediakan hotel yang ada di dalam ruangan', 'Kolam Renang Hotel', 'Kolam Renang Hotel Indoor.jpg', 'image/jpeg', 229516, '2021-05-23 20:24:53', 1, '{"default":{"width":1280,"height":848,"size":229516},"thumbnail":{"small":{"filename":"Kolam Renang Hotel Indoor_small.jpg","width":250,"height":166,"size":24191},"medium":{"filename":"Kolam Renang Hotel Indoor_medium.jpg","width":450,"height":298,"size":69659}}}'),
	(15, 'Kamar Mandi Hotel Kelas Premium', 'Kamar Mandi Hotel Kelas Premium', 'Kamar mandi room hotel untuk kelas premium. Tampilan kamar mandi bisa berbeda untuk kelas yang sama', 'Kamar Mandi Hotel', 'Bathroom Hotel Premium.jpg', 'image/jpeg', 345005, '2021-05-23 20:26:07', 1, '{"default":{"width":1280,"height":960,"size":345005},"thumbnail":{"small":{"filename":"Bathroom Hotel Premium_small.jpg","width":250,"height":188,"size":30391},"medium":{"filename":"Bathroom Hotel Premium_medium.jpg","width":450,"height":338,"size":89688}}}'),
	(16, 'Kamar Mandi Hotel Vaganza', 'Kamar Mandi Hotel Kelas Vaganza', 'Kamar mandi room hotel untuk kelas room Vaganza. Tampilan kamar mandi bisa berbeda untuk kelas yang sama', 'Kamar Mandi Hotel Vaganza', 'Kamar Mandi Hotel Vaganza.jpg', 'image/jpeg', 104435, '2021-05-23 20:28:01', 1, '{"default":{"width":948,"height":1280,"size":104435},"thumbnail":{"small":{"filename":"Kamar Mandi Hotel Vaganza_small.jpg","width":185,"height":250,"size":15934},"medium":{"filename":"Kamar Mandi Hotel Vaganza_medium.jpg","width":333,"height":450,"size":41862}}}'),
	(17, 'Lobi Hotel', 'Penatan Ruangan Lobi hotel', 'Penatan ruangan lobi hotel disesuaikan dengan tema hotel yang bergaya modern klasik  ', 'Lobi Hotel', 'Lobi Hotel.jpg', 'image/jpeg', 277077, '2021-05-23 20:32:06', 1, '{"default":{"width":1280,"height":853,"size":277077},"thumbnail":{"small":{"filename":"Lobi Hotel_small.jpg","width":250,"height":167,"size":31260},"medium":{"filename":"Lobi Hotel_medium.jpg","width":450,"height":300,"size":86955}}}'),
	(18, 'Kolam Renang Hotel Outdoor', 'Kolam Renang Hotel Outdoor', 'Fasilitas hotel berupa kolam renang outdoor lengkap dengan gazebo unuk tempat bersantai', 'Kolam Renang Hotel Outdoor', 'Kolam Renang Hotel Outdoor.jpg', 'image/jpeg', 196295, '2021-05-23 20:35:24', 1, '{"default":{"width":1280,"height":719,"size":196295},"thumbnail":{"small":{"filename":"Kolam Renang Hotel Outdoor_small.jpg","width":250,"height":140,"size":19059},"medium":{"filename":"Kolam Renang Hotel Outdoor_medium.jpg","width":450,"height":253,"size":56598}}}'),
	(19, 'Taman Sekitar Hotel', 'Taman Disekitar Halaman Hotel', 'Taman hijau disekitaran halaman hotel membuat suasana menjadi tampak sejuk dan nyaman', 'Taman Sekitar Hotel', 'Taman Sekitar Hotel.jpg', 'image/jpeg', 390531, '2021-05-23 20:37:27', 1, '{"default":{"width":1280,"height":720,"size":390531},"thumbnail":{"small":{"filename":"Taman Sekitar Hotel_small.jpg","width":250,"height":141,"size":33129},"medium":{"filename":"Taman Sekitar Hotel_medium.jpg","width":450,"height":253,"size":101998}}}'),
	(20, 'Hotel Saat Senja', 'Hotel Saat Senja Tiba', 'Suasana dilingkungan sekitar hotel saat langit mulai senja', 'Hotel Saat Senja', 'Hotel Saat Senja.jpg', 'image/jpeg', 203385, '2021-05-23 20:39:02', 1, '{"default":{"width":1280,"height":853,"size":203385},"thumbnail":{"small":{"filename":"Hotel Saat Senja_small.jpg","width":250,"height":167,"size":25715},"medium":{"filename":"Hotel Saat Senja_medium.jpg","width":450,"height":300,"size":70959}}}'),
	(21, 'Ruang Makan Hotel', 'Lauout Ruang Makan Hotel', 'Layout ruang makan yang disediakan oleh hotel', 'Ruang Makan Hotel', 'Ruang Makan Hotel.jpg', 'image/jpeg', 259090, '2021-05-23 20:41:24', 1, '{"default":{"width":1280,"height":887,"size":259090},"thumbnail":{"small":{"filename":"Ruang Makan Hotel_small.jpg","width":250,"height":173,"size":28353},"medium":{"filename":"Ruang Makan Hotel_medium.jpg","width":450,"height":312,"size":79907}}}'),
	(22, 'Room Hotel Deluxe', 'Room Hotel Kelas Deluxe', 'Room hotel kelas Deluxe dengan double bed dan view langsung ke tepi pantai', 'Room Hotel Deluxe', 'Room Hotel Deluxe.jpg', 'image/jpeg', 168992, '2021-05-23 20:42:48', 1, '{"default":{"width":1280,"height":751,"size":168992},"thumbnail":{"small":{"filename":"Room Hotel Deluxe_small.jpg","width":250,"height":147,"size":21162},"medium":{"filename":"Room Hotel Deluxe_medium.jpg","width":450,"height":264,"size":55508}}}'),
	(23, 'Buah Strawberry Slice', 'Buah Strawberry Slice', 'Buah strawberry kaya akan vitamin C yang bermanfaat untuk kekebalan tubuh dan melawan sel kanker', 'Buah Strawberry Slice', 'Buah Strawberry Slice.jpg', 'image/jpeg', 279409, '2021-05-23 20:45:27', 1, '{"default":{"width":1280,"height":853,"size":279409},"thumbnail":{"small":{"filename":"Buah Strawberry Slice_small.jpg","width":250,"height":167,"size":39769},"medium":{"filename":"Buah Strawberry Slice_medium.jpg","width":450,"height":300,"size":109759}}}'),
	(24, 'Buah Cherry', 'Buah Cherry Segar', 'Buah cherry selain digunakan untuk dekorasi kue, juga dapat bermanfaat untuk kesehatan diantaranya melindungi tubuh dari radikal bebas', 'Buah Cherry', 'Buah Cherry.jpg', 'image/jpeg', 114984, '2021-05-23 20:48:04', 1, '{"default":{"width":1280,"height":853,"size":114984},"thumbnail":{"small":{"filename":"Buah Cherry_small.jpg","width":250,"height":167,"size":17653},"medium":{"filename":"Buah Cherry_medium.jpg","width":450,"height":300,"size":44729}}}'),
	(25, 'Buah Anggur', 'Buah Anggur Merah', 'Buah anggur kaya akan antioksidan yang dapat melawan radikal bebas sehingga dapat membantu melawan sel kanker', 'Buah Anggur', 'Buah Anggur.jpg', 'image/jpeg', 135558, '2021-05-23 20:50:36', 1, '{"default":{"width":1280,"height":853,"size":135558},"thumbnail":{"small":{"filename":"Buah Anggur_small.jpg","width":250,"height":167,"size":21758},"medium":{"filename":"Buah Anggur_medium.jpg","width":450,"height":300,"size":54483}}}'),
	(26, 'Buah Limun', 'Buah Limun', 'Buah limun yang kaya akan viatmin c bermanfaat untuk meningkatkan daya tahan tubuh, mengurangi kerutan kulit, dll', 'Buah Limun', 'Buah Limun.jpg', 'image/jpeg', 229867, '2021-05-23 20:52:21', 1, '{"default":{"width":1280,"height":757,"size":229867},"thumbnail":{"small":{"filename":"Buah Limun_small.jpg","width":250,"height":148,"size":29880},"medium":{"filename":"Buah Limun_medium.jpg","width":450,"height":266,"size":84326}}}'),
	(27, 'Buah Buahan Segar', 'Buah Buahan Segar', 'Buah buahan segar mengandung banyak vitamin dan gizi sehingga dapat memperlancar metabolisme tubuh', 'Buah Buahan Segar', 'Aneka Bah Segar Slice.jpg', 'image/jpeg', 343630, '2021-05-23 20:54:47', 1, '{"default":{"width":1280,"height":719,"size":343630},"thumbnail":{"small":{"filename":"Aneka Bah Segar Slice_small.jpg","width":250,"height":140,"size":34100},"medium":{"filename":"Aneka Bah Segar Slice_medium.jpg","width":450,"height":253,"size":98333}}}'),
	(28, 'Buah Jambu', 'Buah Jambu Segar', 'Buah jambu bermanfaat untuk menjaga kekebalan tubuh dan dapat membantu menyehatkan jantung', 'Buah Jambu', 'Buah Jambu.jpg', 'image/jpeg', 125064, '2021-05-23 20:59:28', 1, '{"default":{"width":1280,"height":825,"size":125064},"thumbnail":{"small":{"filename":"Buah Jambu_small.jpg","width":250,"height":161,"size":18996},"medium":{"filename":"Buah Jambu_medium.jpg","width":450,"height":290,"size":48556}}}'),
	(29, 'Buah Pepaya', 'Buah Pepaya', 'Buh pepaya dikenal memiliki khasiat untuk menyehatkan saluran cerna, disamping itu juga bermanfaat untuk melindungi kerusakan kulit', 'Buah Pepaya', 'Buah Pepaya.jpg', 'image/jpeg', 221866, '2021-05-23 21:03:09', 1, '{"default":{"width":1280,"height":853,"size":221866},"thumbnail":{"small":{"filename":"Buah Pepaya_small.jpg","width":250,"height":167,"size":24681},"medium":{"filename":"Buah Pepaya_medium.jpg","width":450,"height":300,"size":73096}}}'),
	(30, 'Kebun Bunga', 'Kebun Bunga Gunung Meadaw', 'Kebun bunga nan indah yang terletak di pegunungan Meadow yang terletak di Washington, Utah', 'Kebun Bunga', 'Kebun Bunga.jpg', 'image/jpeg', 361160, '2021-05-23 21:06:35', 1, '{"default":{"width":1280,"height":853,"size":361160},"thumbnail":{"small":{"filename":"Kebun Bunga_small.jpg","width":250,"height":167,"size":36237},"medium":{"filename":"Kebun Bunga_medium.jpg","width":450,"height":300,"size":107455}}}'),
	(31, 'Bunga Pegunungan Salju Meadow', 'Bunga di Pegunungan Salju Meadow', 'Kebun bunga merah nan indah pada saat musim salju di pegunungan Meadow, Washington, Utah', 'Bunga Pegunungan Salju Meadow', 'Bunga Pegunungan Salju Meadow.jpg', 'image/jpeg', 391452, '2021-05-23 21:10:42', 1, '{"default":{"width":1280,"height":834,"size":391452},"thumbnail":{"small":{"filename":"Bunga Pegunungan Salju Meadow_small.jpg","width":250,"height":163,"size":33252},"medium":{"filename":"Bunga Pegunungan Salju Meadow_medium.jpg","width":450,"height":293,"size":101337}}}'),
	(32, 'Sunrise di Tepi Danau', 'Sunrise di Tepi Danau', 'Sunrise nan indah ditepi sebuah danau', 'Sunrise di Tepi Danau', 'Sunrise di Tepi Danau.jpg', 'image/jpeg', 183242, '2021-05-23 21:17:08', 1, '{"default":{"width":1280,"height":852,"size":183242},"thumbnail":{"small":{"filename":"Sunrise di Tepi Danau_small.jpg","width":250,"height":166,"size":21168},"medium":{"filename":"Sunrise di Tepi Danau_medium.jpg","width":450,"height":300,"size":58675}}}'),
	(33, 'Pulau di French Polynesia', 'Pulau di French Polynesia', 'Sebuah pulau kecil dikelilingi laut nan indah di sutu tempat di Frech Polyneisa, sebelah selatan Samudera Pasifik', 'Pulau di French Polynesia', 'French Polynesia.jpg', 'image/jpeg', 311890, '2021-05-23 21:19:40', 1, '{"default":{"width":1280,"height":849,"size":311890},"thumbnail":{"small":{"filename":"French Polynesia_small.jpg","width":250,"height":166,"size":26787},"medium":{"filename":"French Polynesia_medium.jpg","width":450,"height":298,"size":83192}}}'),
	(34, 'Pulau Bora Bora', 'Pulau Bora Bora', 'Suatu tempat yang sungguh menawan yang terletak di Bora Bora, sebuah pulau di Polinesia Prancis, Samudera Pasifik', 'Pulau Bora Bora', 'Pulau Bora Bora.jpg', 'image/jpeg', 348711, '2021-05-23 21:22:02', 1, '{"default":{"width":1280,"height":854,"size":348711},"thumbnail":{"small":{"filename":"Pulau Bora Bora_small.jpg","width":250,"height":167,"size":29948},"medium":{"filename":"Pulau Bora Bora_medium.jpg","width":450,"height":300,"size":89553}}}'),
	(35, 'Sungai Mckenzie Oregon', 'Sungai Mckenzie Oregon', 'Aliran sungai Mackenzie nan indah yang terletak di Oregon, Amerika Serikat', 'Sungai Mckenzie Oregon', 'Sungai Mckenzie Oregon.jpg', 'image/jpeg', 397652, '2021-05-23 21:29:12', 1, '{"default":{"width":1280,"height":853,"size":397652},"thumbnail":{"small":{"filename":"Sungai Mckenzie Oregon_small.jpg","width":250,"height":167,"size":33104},"medium":{"filename":"Sungai Mckenzie Oregon_medium.jpg","width":450,"height":300,"size":102942}}}'),
	(36, 'Danau di Pegunungan Alpine', 'Danau di Pegunungan Alpine', 'Sebuah danau dengan view yang mengagumkan yang tersembunyi dideretan pegunungan Alpine', 'Danau di Pegunungan Alpine', 'Danau di Pegunungan Alpine.jpg', 'image/jpeg', 327179, '2021-05-23 21:34:23', 1, '{"default":{"width":1280,"height":822,"size":327179},"thumbnail":{"small":{"filename":"Danau di Pegunungan Alpine_small.jpg","width":250,"height":161,"size":31951},"medium":{"filename":"Danau di Pegunungan Alpine_medium.jpg","width":450,"height":289,"size":92421}}}'),
	(37, 'Desa Hallstatt Austria', 'Desa Hallstatt Austria', 'Desa Hallstatt terletak di tepi danau Hallstatter Austria dengan view yang begitu indah ', 'Desa Hallstatt Austria', 'Desa Hallstatt Austria.jpg', 'image/jpeg', 279383, '2021-05-23 21:37:53', 1, '{"default":{"width":1280,"height":732,"size":279383},"thumbnail":{"small":{"filename":"Desa Hallstatt Austria_small.jpg","width":250,"height":143,"size":26143},"medium":{"filename":"Desa Hallstatt Austria_medium.jpg","width":450,"height":257,"size":76873}}}'),
	(38, 'Pegunungan Alps Dengan Salju', 'Pegunungan Alps Dengan Salju', 'Salah satu view kecil dari pegunungan Alps yang sedang mengalami musim salju', 'Pegunungan Alps Dengan Salju', 'Pegunungan Alps.jpg', 'image/jpeg', 175042, '2021-05-23 21:42:23', 1, '{"default":{"width":1280,"height":696,"size":175042},"thumbnail":{"small":{"filename":"Pegunungan Alps_small.jpg","width":250,"height":136,"size":22456},"medium":{"filename":"Pegunungan Alps_medium.jpg","width":450,"height":245,"size":61032}}}'),
	(39, 'Seljalandsfoss Islandia', 'Seljalandsfoss Islandia', 'Seljalandsfoss merupakan salah satu air terjun yang terletak di Islandia dengan pemandangan yang sangat Indah', 'Seljalandsfoss Islandia', 'Seljalandsfoss Islandia.jpg', 'image/jpeg', 286627, '2021-05-23 21:47:57', 1, '{"default":{"width":1280,"height":774,"size":286627},"thumbnail":{"small":{"filename":"Seljalandsfoss Islandia_small.jpg","width":250,"height":151,"size":27726},"medium":{"filename":"Seljalandsfoss Islandia_medium.jpg","width":450,"height":272,"size":80991}}}'),
	(40, 'Danau Banff Alberta Canada', 'Danau Banff Alberta Canada', 'Danau Banff dengan pemandangan yang mengagumkan ini terletak di provinsi Alberta negara Kanada', 'Danau Banff Alberta Canada', 'Danau Banff Alberta Canada.jpg', 'image/jpeg', 250205, '2021-05-23 21:59:54', 1, '{"default":{"width":1280,"height":862,"size":250205},"thumbnail":{"small":{"filename":"Danau Banff Alberta Canada_small.jpg","width":250,"height":168,"size":27383},"medium":{"filename":"Danau Banff Alberta Canada_medium.jpg","width":450,"height":303,"size":76690}}}'),
	(41, 'Sungai di Lereng Gunung', 'Sungai di Lereng Gunung', 'Sungai dengan view yang indah dan mengagumkan ini diperkirakan terletak di negara Jerman', 'Sungai di Lereng Gunung', 'Sungai Jerman.jpg', 'image/jpeg', 323709, '2021-05-23 22:03:24', 1, '{"default":{"width":1280,"height":854,"size":323709},"thumbnail":{"small":{"filename":"Sungai Jerman_small.jpg","width":250,"height":167,"size":30652},"medium":{"filename":"Sungai Jerman_medium.jpg","width":450,"height":300,"size":90352}}}'),
	(42, 'Pedesaan Lereng Gunung Alpen', 'Pedesaan Lereng Gunung Alpen', 'Pedesaan kecil nan indah dan asri yang terletak di salah satu lereng pegunungan Alpen', 'Pedesaan Lereng Gunung Alpen', 'Pedesaan Alps.jpg', 'image/jpeg', 385485, '2021-05-23 22:07:59', 1, '{"default":{"width":1280,"height":853,"size":385485},"thumbnail":{"small":{"filename":"Pedesaan Alps_small.jpg","width":250,"height":167,"size":33944},"medium":{"filename":"Pedesaan Alps_medium.jpg","width":450,"height":300,"size":101944}}}'),
	(43, 'Hongkong Night City', 'Hongkong Night City', 'Pemandangan salah satu sudut kota hongkong dimalam hari dengan lalulintas yang ramai', 'Hongkong Night City', 'Hongkong Night City.jpg', 'image/jpeg', 296734, '2021-05-23 22:10:41', 1, '{"default":{"width":1280,"height":720,"size":296734},"thumbnail":{"small":{"filename":"Hongkong Night City_small.jpg","width":250,"height":141,"size":30602},"medium":{"filename":"Hongkong Night City_medium.jpg","width":450,"height":253,"size":86859}}}'),
	(44, 'Kota Kuala Lumpur Saat Senja', 'Kota Kuala Lumpur Saat Senja', 'Pemandangan kota Kuala Lumpur, Malaysia di saat senja dimana lampu lampu kota mulai gemerlap', 'Kota Kuala Lumpur Saat Senja', 'Kuala Lumpur.jpg', 'image/jpeg', 303606, '2021-05-23 22:12:26', 1, '{"default":{"width":1280,"height":739,"size":303606},"thumbnail":{"small":{"filename":"Kuala Lumpur_small.jpg","width":250,"height":144,"size":25646},"medium":{"filename":"Kuala Lumpur_medium.jpg","width":450,"height":260,"size":80630}}}'),
	(45, 'Prague Castle Republik Ceko', 'Prague Castle Republik Ceko', 'Pemandangan Prague Castle (Kastil Praga) di Republik Ceko. Tempat tersebut dulu digunakan sebagai tempat raja Romawi  dan sekarang sebagai kantor Presiden Ceko', 'Prague Castle Republik Ceko', 'Prague Castle.jpg', 'image/jpeg', 290161, '2021-05-23 22:14:28', 1, '{"default":{"width":1280,"height":761,"size":290161},"thumbnail":{"small":{"filename":"Prague Castle_small.jpg","width":250,"height":149,"size":27959},"medium":{"filename":"Prague Castle_medium.jpg","width":450,"height":268,"size":81683}}}'),
	(46, 'Venice Canal Italy', 'Venice Canal Italy', 'Grand Canal Venice atau Kanal besar venesia merupakan salah satu koridor lalu lintas air utama di Venesia, Italy', 'Venice Canal Italy', 'Venice Canal Italy.jpg', 'image/jpeg', 268608, '2021-05-23 22:19:27', 1, '{"default":{"width":1280,"height":853,"size":268608},"thumbnail":{"small":{"filename":"Venice Canal Italy_small.jpg","width":250,"height":167,"size":31872},"medium":{"filename":"Venice Canal Italy_medium.jpg","width":450,"height":300,"size":89061}}}'),
	(47, 'Kota Shanghai China', 'Kota Shanghai China', 'Pemandangan kota Shanghai China di malam hari', 'Kota Shanghai China', 'Kota Shanghai China.jpg', 'image/jpeg', 347330, '2021-05-23 22:23:47', 1, '{"default":{"width":1280,"height":853,"size":347330},"thumbnail":{"small":{"filename":"Kota Shanghai China_small.jpg","width":250,"height":167,"size":32169},"medium":{"filename":"Kota Shanghai China_medium.jpg","width":450,"height":300,"size":95212}}}'),
	(48, 'Ain Dubai Kincir Ria', 'Ain Dubai Kincir Ria', 'Ain yang terletak di Dubai yang memiliki tinggi 210 meter menjadikannya kincir ria tertinggi di dunia', 'Ain Dubai Kincir Ria', 'Ain Dubai Ferris Wheel.jpg', 'image/jpeg', 223116, '2021-05-23 22:25:49', 1, '{"default":{"width":1280,"height":853,"size":223116},"thumbnail":{"small":{"filename":"Ain Dubai Ferris Wheel_small.jpg","width":250,"height":167,"size":21239},"medium":{"filename":"Ain Dubai Ferris Wheel_medium.jpg","width":450,"height":300,"size":64075}}}'),
	(49, 'Amsterdam River City', 'Amsterdam River City', 'Salah satu sungai yang membelah kota Amsterdam, Belanda', 'Amsterdam River City', 'Amsterdam River City.jpg', 'image/jpeg', 244960, '2021-05-23 22:33:50', 1, '{"default":{"width":1280,"height":827,"size":244960},"thumbnail":{"small":{"filename":"Amsterdam River City_small.jpg","width":250,"height":162,"size":30431},"medium":{"filename":"Amsterdam River City_medium.jpg","width":450,"height":291,"size":83235}}}'),
	(50, 'Kota Toronto Waktu Malam', 'Kota Toronto Waktu Malam', 'Kota toronto merupakan kota terbesar di Canada dan merupakan ibukota Propinsi Ontario', 'Kota Toronto Waktu Malam', 'Kota Toronto.jpg', 'image/jpeg', 147257, '2021-05-23 22:46:52', 1, '{"default":{"width":1280,"height":960,"size":147257},"thumbnail":{"small":{"filename":"Kota Toronto_small.jpg","width":250,"height":188,"size":18458},"medium":{"filename":"Kota Toronto_medium.jpg","width":450,"height":338,"size":52484}}}'),
	(51, 'Greece Village Karpathos Hill', 'Greece Village Karpathos Hill', 'Salah satu perkampungan nan indah di bukit Karpathos di negara Yunani', 'Greece Village Karpathos Hill', 'Greece Village Karpathos Hill.jpg', 'image/jpeg', 397115, '2021-05-23 22:50:23', 1, '{"default":{"width":1280,"height":853,"size":397115},"thumbnail":{"small":{"filename":"Greece Village Karpathos Hill_small.jpg","width":250,"height":167,"size":39056},"medium":{"filename":"Greece Village Karpathos Hill_medium.jpg","width":450,"height":300,"size":116316}}}'),
	(52, 'Tower Bridge London', 'Tower Bridge London', 'Jembatan yang terletak di London, Inggris ini menggabungkan dua desain jembatan yaitu angkat dan gantung. Jembatan akan terbuka ketika akan dilewati kapal', 'Tower Bridge London', 'Tower Bridge London.jpg', 'image/jpeg', 215409, '2021-05-23 22:57:49', 1, '{"default":{"width":1280,"height":720,"size":215409},"thumbnail":{"small":{"filename":"Tower Bridge London_small.jpg","width":250,"height":141,"size":22831},"medium":{"filename":"Tower Bridge London_medium.jpg","width":450,"height":253,"size":65749}}}'),
	(53, 'HemisfÃƒÆ’Ã‚Â¨ric Calavatra Valencia', 'HemisfÃƒÆ’Ã‚Â¨ric Calavatra Valencia', 'HemisfÃƒÆ’Ã‚Â¨ric merupakan salah satu bangunan yang terletak di Valensia, Spanyol yang merupakan mahakarya dari  arsitek internasional bernama Santiago Calatrava Valls', 'Calavatra Valencia', 'Calavatra Valencia.jpg', 'image/jpeg', 188361, '2021-05-23 23:02:21', 1, '{"default":{"width":1280,"height":853,"size":188361},"thumbnail":{"small":{"filename":"Calavatra Valencia_small.jpg","width":250,"height":167,"size":22943},"medium":{"filename":"Calavatra Valencia_medium.jpg","width":450,"height":300,"size":64084}}}'),
	(54, 'User Manual Admin Template PHP', 'User Manual Admin Template PHP', 'Dokumen yang berisi cara penggunaan aplikasi Admin Template PHP', NULL, 'User Manual Admin Template PHP - Jagowebdev.pdf', 'application/pdf', 2259784, '2021-05-24 20:15:53', 1, '[]'),
	(55, 'Mendesain Form Login Dengan CSS', 'Mendesain Form Login Dengan CSS 3 dan HTML 5', 'Mendesain Form Login Dengan CSS 3 dan HTML 5', NULL, 'Mendesain Form Login.zip', 'application/zip', 731776, '2021-05-25 06:51:29', 1, '[]'),
	(56, '', '', '', NULL, 'Cheat Sheet PHP - Kompilasi.7z', 'application/x-7z-compressed', 454586, '2021-05-25 07:26:28', 1, '[]'),
	(57, 'Mendesain Social Media Button Dengan CSS', 'Mendesain Social Media Button Dengan CSS', 'Mendesain Social Media Button Dengan CSS', NULL, 'Mendesain Social Media Button Dengan CSS.rar', 'application/x-rar', 65578, '2021-05-25 20:32:01', 1, '[]'),
	(58, 'Hagia Shopia', 'Tempat ibadah Hagia Shopia terletak di Istanbul Turki', 'Hagia Shopia yang terletak di Turki merupakan salah satu tempat ibadah bersejarah . Dibangun tahun 537M s.d 1453M, saat ini bangunan ini difungsikan sebagai masjid ', 'Hagia Shopia', 'Hagia Sophia-2.jpg', 'image/jpeg', 311209, '2021-06-20 14:22:48', 1, '{"default":{"width":1280,"height":842,"size":311209},"thumbnail":{"small":{"filename":"Hagia Sophia-2_small.jpg","width":250,"height":164,"size":26316},"medium":{"filename":"Hagia Sophia-2_medium.jpg","width":450,"height":296,"size":74779}}}'),
	(59, 'Galata', 'Menara Galata Istanbul Turki', 'Menara Galata merupakan bangunan bersejarah yang dibangun tahun 1348. Kawasan ini berseberangan dengan Konstatinopel', 'Galata', 'Galata.jpg', 'image/jpeg', 367685, '2021-06-20 14:30:45', 1, '{"default":{"width":1280,"height":853,"size":367685},"thumbnail":{"small":{"filename":"Galata_small.jpg","width":250,"height":167,"size":27593},"medium":{"filename":"Galata_medium.jpg","width":450,"height":300,"size":81611}}}'),
	(60, 'Kota Dinant Belgia', 'Pemandangan Kota Dinant yang terletak di Belgia', 'Dinan merupakan sebuah kota dan munisipalitas yang terletak di Belgia. Kota ini terkenal dengan gerejanya Notre Dame de Dinant serta benteng Dinant yang terletak diatas bukit', 'Dinant Belgia', 'Dinant Belgia.jpg', 'image/jpeg', 449266, '2021-06-20 14:33:33', 1, '{"default":{"width":1280,"height":855,"size":449266},"thumbnail":{"small":{"filename":"Dinant Belgia_small.jpg","width":250,"height":167,"size":32246},"medium":{"filename":"Dinant Belgia_medium.jpg","width":450,"height":301,"size":95692}}}'),
	(61, 'Burj Al-Arab Dubai', 'Hotel Burj Al-Arab di Dubai UEA', 'Burj Al-Arab merupakan hotel mewah yang terletak di Dubai Uni Emirat Arab. Bagunan ini terletak di pulau buatan yang berada 280 m lepas pantai di Teluk Persia', 'Burj Al-Arab', 'Burj Al-Arab Dubai.jpg', 'image/jpeg', 127841, '2021-06-20 14:38:12', 1, '{"default":{"width":1280,"height":853,"size":127841},"thumbnail":{"small":{"filename":"Burj Al-Arab Dubai_small.jpg","width":250,"height":167,"size":17151},"medium":{"filename":"Burj Al-Arab Dubai_medium.jpg","width":450,"height":300,"size":47579}}}'),
	(62, 'Kota Dubai Uni Emirat Arab', 'Kota Dubai yang terletak di Uni Emirat Arab', 'Kota Dubai yang terletak di Uni Emirat Arab merupakan kota termewah di Timur Tengah', 'Kota Dubai', 'Kota Dubai UEA.jpg', 'image/jpeg', 266333, '2021-06-20 14:44:58', 1, '{"default":{"width":1280,"height":723,"size":266333},"thumbnail":{"small":{"filename":"Kota Dubai UEA_small.jpg","width":250,"height":141,"size":19252},"medium":{"filename":"Kota Dubai UEA_medium.jpg","width":450,"height":254,"size":56551}}}'),
	(63, 'Jembatan Rantai Szechenyi', 'Jembatan Rantai Szechenyi Hongaria', 'Jembatan Rantai Szechenyi yang terletak di Hongaria merupakan salah satu jembatan terbesar didunia. Jembatan ini dibangun tahun 1839 atas inisiatif Istvan Szechenyi', 'Jembatan Rantai Szechenyi', 'Jembatan Rantai Szechenyi.jpg', 'image/jpeg', 392693, '2021-06-20 14:48:00', 1, '{"default":{"width":1280,"height":1024,"size":392693},"thumbnail":{"small":{"filename":"Jembatan Rantai Szechenyi_small.jpg","width":250,"height":200,"size":40775},"medium":{"filename":"Jembatan Rantai Szechenyi_medium.jpg","width":450,"height":360,"size":121946}}}'),
	(64, 'Kanal di Amsterdam', 'Salah satu kanal di Amsterdam', 'Salah satu kanal yang membelah kota Amsterdam, Belanda', 'Kanal di Amsterdam', 'Kanal Amsterdam.jpg', 'image/jpeg', 311588, '2021-06-20 14:56:12', 1, '{"default":{"width":1280,"height":854,"size":311588},"thumbnail":{"small":{"filename":"Kanal Amsterdam_small.jpg","width":250,"height":167,"size":29539},"medium":{"filename":"Kanal Amsterdam_medium.jpg","width":450,"height":300,"size":88286}}}'),
	(65, 'Dubai Festival City', 'Festival City di kota Dubai Uni Emirat Arab', 'Festival City merupakan area bisnis dan hiburan modern yang terletak di Dubai Uni Emirat Arab', 'Dubai Festival City', 'Dubai Festival City.jpg', 'image/jpeg', 180796, '2021-06-20 15:01:49', 1, '{"default":{"width":1280,"height":854,"size":180796},"thumbnail":{"small":{"filename":"Dubai Festival City_small.jpg","width":250,"height":167,"size":22569},"medium":{"filename":"Dubai Festival City_medium.jpg","width":450,"height":300,"size":61968}}}'),
	(66, 'Osaka Jepang', 'Pemandangan kota Osaka Jepang di waktu malam', 'Pemandangan kota Osaka Jepang di waktu malam yang dihiasi dengan lampu berwarna warni', 'Osaka Jepang', 'Osaka Jepang.jpg', 'image/jpeg', 283643, '2021-06-20 18:10:26', 1, '{"default":{"width":853,"height":1280,"size":283643},"thumbnail":{"small":{"filename":"Osaka Jepang_small.jpg","width":167,"height":250,"size":29414},"medium":{"filename":"Osaka Jepang_medium.jpg","width":300,"height":450,"size":84878}}}'),
	(67, 'Kota Miami Amerika Serikat', 'Kota Miami Amerika Serikat', 'Pemandangan panorama kota Miami Amerika Serikat di sore hari', 'Kota Miami Amerika Serikat', 'Miami Amerika Serikat.jpg', 'image/jpeg', 106435, '2021-06-20 18:12:47', 1, '{"default":{"width":1280,"height":474,"size":106435},"thumbnail":{"small":{"filename":"Miami Amerika Serikat_small.jpg","width":250,"height":93,"size":13047},"medium":{"filename":"Miami Amerika Serikat_medium.jpg","width":450,"height":167,"size":35518}}}');
/*!40000 ALTER TABLE `file_picker` ENABLE KEYS */;

-- Dumping structure for table registrasi.gallery
CREATE TABLE IF NOT EXISTS `gallery` (
  `id_gallery` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `id_gallery_kategori` smallint(5) unsigned DEFAULT NULL,
  `id_file_picker` int(10) unsigned DEFAULT NULL,
  `urut` smallint(5) unsigned DEFAULT NULL,
  `id_user_input` int(10) unsigned DEFAULT NULL,
  `tgl_input` datetime DEFAULT current_timestamp(),
  `id_user_update` int(10) unsigned DEFAULT NULL,
  `tgl_update` datetime DEFAULT NULL,
  PRIMARY KEY (`id_gallery`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- Dumping data for table registrasi.gallery: ~61 rows (approximately)
/*!40000 ALTER TABLE `gallery` DISABLE KEYS */;
INSERT INTO `gallery` (`id_gallery`, `id_gallery_kategori`, `id_file_picker`, `urut`, `id_user_input`, `tgl_input`, `id_user_update`, `tgl_update`) VALUES
	(1, 1, 3, 3, 1, '2021-05-23 17:35:01', NULL, NULL),
	(2, 1, 7, 11, 1, '2021-05-23 18:27:55', NULL, NULL),
	(3, 1, 5, 10, 1, '2021-05-23 18:27:59', NULL, NULL),
	(4, 1, 4, 9, 1, '2021-05-23 18:28:03', NULL, NULL),
	(5, 1, 2, 7, 1, '2021-05-23 18:28:08', NULL, NULL),
	(6, 1, 6, 8, 1, '2021-05-23 18:28:12', NULL, NULL),
	(7, 1, 1, 6, 1, '2021-05-23 18:28:15', NULL, NULL),
	(8, 1, 11, 1, 1, '2021-05-23 20:17:52', NULL, NULL),
	(9, 1, 10, 5, 1, '2021-05-23 20:17:58', NULL, NULL),
	(10, 1, 8, 2, 1, '2021-05-23 20:18:12', NULL, NULL),
	(11, 1, 9, 4, 1, '2021-05-23 20:18:18', NULL, NULL),
	(12, 2, 12, 11, 1, '2021-05-23 20:29:56', NULL, NULL),
	(13, 2, 13, 10, 1, '2021-05-23 20:30:01', NULL, NULL),
	(14, 2, 14, 9, 1, '2021-05-23 20:30:11', NULL, NULL),
	(15, 2, 15, 8, 1, '2021-05-23 20:30:34', NULL, NULL),
	(16, 2, 16, 7, 1, '2021-05-23 20:30:37', NULL, NULL),
	(17, 2, 17, 6, 1, '2021-05-23 20:34:26', NULL, NULL),
	(18, 2, 18, 5, 1, '2021-05-23 20:36:24', NULL, NULL),
	(19, 2, 20, 4, 1, '2021-05-23 20:40:10', NULL, NULL),
	(20, 2, 19, 3, 1, '2021-05-23 20:40:14', NULL, NULL),
	(21, 2, 21, 2, 1, '2021-05-23 20:42:12', NULL, NULL),
	(22, 2, 22, 1, 1, '2021-05-23 20:43:55', NULL, NULL),
	(23, 3, 23, 7, 1, '2021-05-23 20:50:17', NULL, NULL),
	(24, 3, 24, 6, 1, '2021-05-23 20:50:20', NULL, NULL),
	(25, 3, 25, 5, 1, '2021-05-23 20:52:02', NULL, NULL),
	(26, 3, 26, 4, 1, '2021-05-23 20:53:57', NULL, NULL),
	(27, 3, 27, 1, 1, '2021-05-23 20:55:49', NULL, NULL),
	(28, 3, 29, 3, 1, '2021-05-23 21:04:30', NULL, NULL),
	(29, 3, 28, 2, 1, '2021-05-23 21:04:34', NULL, NULL),
	(30, 4, 33, 12, 1, '2021-05-23 21:20:52', NULL, NULL),
	(31, 4, 32, 11, 1, '2021-05-23 21:20:55', NULL, NULL),
	(32, 4, 31, 9, 1, '2021-05-23 21:20:58', NULL, NULL),
	(33, 4, 30, 8, 1, '2021-05-23 21:21:00', NULL, NULL),
	(35, 4, 34, 1, 1, '2021-05-23 21:30:47', NULL, NULL),
	(36, 4, 35, 7, 1, '2021-05-23 21:30:51', NULL, NULL),
	(37, 4, 36, 6, 1, '2021-05-23 21:36:05', NULL, NULL),
	(38, 4, 37, 5, 1, '2021-05-23 21:39:41', NULL, NULL),
	(39, 4, 38, 4, 1, '2021-05-23 21:43:37', NULL, NULL),
	(40, 4, 39, 2, 1, '2021-05-23 21:48:52', NULL, NULL),
	(41, 4, 41, 10, 1, '2021-05-23 22:04:12', NULL, NULL),
	(42, 4, 40, 3, 1, '2021-05-23 22:04:20', NULL, NULL),
	(44, 5, 44, 20, 1, '2021-05-23 22:13:22', NULL, NULL),
	(45, 5, 45, 19, 1, '2021-05-23 22:16:58', NULL, NULL),
	(46, 5, 46, 18, 1, '2021-05-23 22:20:59', NULL, NULL),
	(47, 5, 47, 17, 1, '2021-05-23 22:24:17', NULL, NULL),
	(48, 5, 48, 16, 1, '2021-05-23 22:27:53', NULL, NULL),
	(49, 5, 49, 15, 1, '2021-05-23 22:34:51', NULL, NULL),
	(50, 5, 50, 14, 1, '2021-05-23 22:47:53', NULL, NULL),
	(51, 5, 51, 1, 1, '2021-05-23 22:51:50', NULL, NULL),
	(52, 5, 52, 12, 1, '2021-05-23 22:59:41', NULL, NULL),
	(53, 5, 53, 11, 1, '2021-05-23 23:05:45', NULL, NULL),
	(54, 5, 58, 10, 1, '2021-06-20 14:58:27', NULL, NULL),
	(55, 5, 59, 9, 1, '2021-06-20 14:58:32', NULL, NULL),
	(56, 5, 60, 8, 1, '2021-06-20 14:58:36', NULL, NULL),
	(57, 5, 61, 7, 1, '2021-06-20 14:58:40', NULL, NULL),
	(58, 5, 62, 5, 1, '2021-06-20 14:58:43', NULL, NULL),
	(59, 5, 63, 4, 1, '2021-06-20 14:58:47', NULL, NULL),
	(60, 5, 64, 6, 1, '2021-06-20 14:58:50', NULL, NULL),
	(61, 5, 65, 3, 1, '2021-06-20 15:03:58', NULL, NULL),
	(62, 5, 66, 2, 1, '2021-06-20 18:11:19', NULL, NULL),
	(63, 5, 67, 13, 1, '2021-06-20 18:13:32', NULL, NULL);
/*!40000 ALTER TABLE `gallery` ENABLE KEYS */;

-- Dumping structure for table registrasi.gallery_kategori
CREATE TABLE IF NOT EXISTS `gallery_kategori` (
  `id_gallery_kategori` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `judul_kategori` varchar(255) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `slug` text DEFAULT NULL,
  `show_title` enum('Y','N') DEFAULT NULL,
  `urut` smallint(5) unsigned DEFAULT NULL,
  `aktif` enum('Y','N') DEFAULT 'Y',
  `layout` enum('grid','masonry') DEFAULT 'grid',
  `id_user_create` int(10) unsigned DEFAULT NULL,
  `tgl_create` datetime DEFAULT current_timestamp(),
  `id_user_update` int(11) DEFAULT NULL,
  `tgl_update` datetime DEFAULT NULL,
  PRIMARY KEY (`id_gallery_kategori`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- Dumping data for table registrasi.gallery_kategori: ~6 rows (approximately)
/*!40000 ALTER TABLE `gallery_kategori` DISABLE KEYS */;
INSERT INTO `gallery_kategori` (`id_gallery_kategori`, `judul_kategori`, `deskripsi`, `slug`, `show_title`, `urut`, `aktif`, `layout`, `id_user_create`, `tgl_create`, `id_user_update`, `tgl_update`) VALUES
	(1, 'Flora dan Fauna', '<p>Beberapa contoh gallery gambar flora dan fauna mulai dari serangga kecil hingga hewan buas.</p>', 'flora-dan-fauna', 'N', 2, 'Y', 'grid', 1, '2021-05-23 16:44:24', 1, '2021-06-20 15:57:25'),
	(2, 'Hotel', '<p>Gallery gambar hotel lengkap dengan gambaran interior, sarana dan prsarana, serta suasana disekitarnya</p>', 'hotel', NULL, 3, 'Y', 'masonry', 1, '2021-05-23 20:21:39', 1, '2021-06-20 15:50:55'),
	(3, 'Buah Buahan', '<p>Berbagai gallery gambar buah buahan pilihan yang membuat suasana menjadi lebih segar</p>', 'buah-segar', NULL, 1, 'Y', 'grid', 1, '2021-05-23 20:44:59', NULL, NULL),
	(4, 'Lanscape', '<p>Berbagai macam pemandangan alam mulai dari pegunungan hingga laut dalam.</p>', 'lanscape', 'N', 4, 'Y', 'masonry', 1, '2021-05-23 21:06:12', 1, '2021-06-20 16:11:07'),
	(5, 'Bautifull City', '<p>Pemandangan indah berbagai kota di berbagai belahan dunia.</p>', 'beautifull-city', 'Y', 5, 'Y', 'masonry', 1, '2021-05-23 22:05:37', 1, '2021-06-20 16:21:08'),
	(6, 'Lain Lain', '<p>Kategori lain lain</p>', 'lain-lain', 'Y', 6, 'N', 'masonry', 1, '2021-06-22 20:04:34', 1, '2021-06-22 20:16:15');
/*!40000 ALTER TABLE `gallery_kategori` ENABLE KEYS */;

-- Dumping structure for table registrasi.menu
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
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT COMMENT='Tabel menu aplikasi';

-- Dumping data for table registrasi.menu: ~18 rows (approximately)
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
	(14, 'Demo Frontend', 'fas fa-desktop', '{{BASE_URL_PARENT}}', 0, NULL, 1, 0, 7),
	(15, 'Demo Admin', 'fas fa-dice-d6', 'https://jagowebdev.com/demo/menumanager/adminpanel', 0, NULL, 0, 0, 9),
	(16, 'Filepicker Manager', 'far fa-copy', 'filepicker', 14, NULL, 1, 0, 5),
	(17, 'Gallery', 'far fa-images', 'gallery', 13, NULL, 1, 0, 6),
	(18, 'Demo Menu', 'fas fa-external-link-alt', '{{BASE_URL_PARENT}}menu/', 0, NULL, 1, 0, 8),
	(19, 'Setting Registrasi', 'fas fa-user-friends', 'setting-registrasi', 15, NULL, 1, 0, 3),
	(20, 'Stream Download', 'fas fa-cloud-download-alt', 'filedownload', 16, NULL, 1, 0, 4);
/*!40000 ALTER TABLE `menu` ENABLE KEYS */;

-- Dumping structure for table registrasi.menu_frontend
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
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT COMMENT='Tabel menu aplikasi';

-- Dumping data for table registrasi.menu_frontend: ~52 rows (approximately)
/*!40000 ALTER TABLE `menu_frontend` DISABLE KEYS */;
INSERT INTO `menu_frontend` (`id_menu`, `nama_menu`, `nama_group`, `class`, `url`, `id_parent`, `aktif`, `urut`) VALUES
	(1, 'Floara dan Fauna (Grid)', 'Header', 'fas fa-paw', '{{BASE_URL}}gallery/kategori/flora-dan-fauna', 2, 'Y', 2),
	(2, 'Gallery', 'Header', 'far fa-images', '{{BASE_URL}}', NULL, 'Y', 2),
	(3, 'About', NULL, 'far fa-address-card', 'about', NULL, 'Y', 1),
	(4, 'Home', 'Footer', NULL, '{{BASE_URL}}', NULL, 'Y', 2),
	(5, 'Term of Use', 'Footer', NULL, 'tremofuser', NULL, 'Y', 1),
	(6, 'Flora dan Fauna', NULL, 'fas fa-paw', 'florafauna', NULL, 'Y', 2),
	(7, 'Home', 'Header', 'fas fa-home', '{{BASE_URL}}', NULL, 'Y', 1),
	(8, 'Lanscape (No Title)', 'Header', 'far fa-image', '{{BASE_URL}}gallery/kategori/lanscape', 2, 'Y', 3),
	(11, 'Backend', 'Header', 'fas fa-sign-in-alt', '{{BASE_URL}}admin', NULL, 'Y', 4),
	(12, 'Beautifull City (Masonry)', 'Header', 'fas fa-city', '{{BASE_URL}}gallery/kategori/beautifull-city', 2, 'Y', 1),
	(13, 'Fresh Fruits', 'Header', 'fas fa-apple-alt', '{{BASE_URL}}gallery/kategori/buah-segar', 2, 'Y', 4),
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
	(39, 'Demo Frontend', 'Header Admin', 'fas fa-external-link-alt', '{{BASE_URL}}', NULL, 'Y', NULL),
	(40, 'Backend', 'Header Admin', 'fas fa-sign-in-alt', '{{BASE_URL}}admin/', NULL, 'Y', NULL),
	(44, 'Tables', 'Left Menu', 'fas fa-table', '#', 18, 'Y', 3),
	(45, 'Table Normal', 'Left Menu', 'far fa-list-alt', '#', 44, 'Y', 3),
	(46, 'Hotel', 'Header', 'fas fa-hotel', '{{BASE_URL}}gallery/kategori/hotel', 2, 'Y', 5),
	(47, 'Demo Menu', 'Header', 'far fa-list-alt', '#', NULL, 'Y', 3),
	(48, 'Menu Frontend', 'Header', 'fas fa-laptop', '{{BASE_URL}}menu/', 47, 'Y', 1),
	(49, 'Menu Admin', 'Header', 'far fa-user', '{{BASE_URL}}adminpanel/', 47, 'Y', 2),
	(50, 'Kategori Gallery', 'Header', 'fas fa-folder', '{{BASE_URL}}gallery/', 2, 'Y', 6),
	(51, 'Register', 'Registrasi', NULL, '{{BASE_URL}}register', NULL, 'Y', NULL),
	(52, 'Login', 'Registrasi', NULL, '{{BASE_URL}}login', NULL, 'Y', NULL),
	(53, 'Reset Password', 'Registrasi', NULL, '{{BASE_URL}}recovery', NULL, 'Y', NULL),
	(54, 'Link Aktivasi', 'Registrasi', NULL, '{{BASE_URL}}activationlink', NULL, 'Y', NULL),
	(55, 'Profile', 'User', NULL, 'user', NULL, 'Y', 1),
	(56, 'Download', 'User', NULL, 'user/download', NULL, 'Y', 3),
	(57, 'Tab Menu', 'Header', 'far fa-list-alt', '{{BASE_URL}}register', 47, 'Y', 3),
	(58, 'Edit Password', 'User', NULL, 'user/edit-password', NULL, 'Y', 2);
/*!40000 ALTER TABLE `menu_frontend` ENABLE KEYS */;

-- Dumping structure for table registrasi.menu_frontend_group
CREATE TABLE IF NOT EXISTS `menu_frontend_group` (
  `nama_group` varchar(255) CHARACTER SET latin1 NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`nama_group`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table registrasi.menu_frontend_group: ~6 rows (approximately)
/*!40000 ALTER TABLE `menu_frontend_group` DISABLE KEYS */;
INSERT INTO `menu_frontend_group` (`nama_group`, `timestamp`) VALUES
	('Footer', '2021-06-05 11:48:31'),
	('Header', '2021-06-05 11:48:30'),
	('Header Admin', '2021-06-15 06:33:26'),
	('Left Menu', '2021-06-06 05:56:30'),
	('Registrasi', '2021-06-24 20:01:49'),
	('Right Menu', '2021-06-06 05:56:56'),
	('User', '2021-06-25 22:38:20');
/*!40000 ALTER TABLE `menu_frontend_group` ENABLE KEYS */;

-- Dumping structure for table registrasi.menu_role
CREATE TABLE IF NOT EXISTS `menu_role` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `id_menu` smallint(5) unsigned NOT NULL,
  `id_role` smallint(5) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `module_role_module` (`id_menu`),
  KEY `module_role_role` (`id_role`),
  CONSTRAINT `menu_role_menu` FOREIGN KEY (`id_menu`) REFERENCES `menu` (`id_menu`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `menu_role_role` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT COMMENT='Tabel hak akses dari menu aplikasi';

-- Dumping data for table registrasi.menu_role: ~21 rows (approximately)
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
	(17, 15, 1),
	(18, 16, 1),
	(19, 17, 1),
	(20, 18, 1),
	(21, 19, 1),
	(22, 20, 1);
/*!40000 ALTER TABLE `menu_role` ENABLE KEYS */;

-- Dumping structure for table registrasi.module
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
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC COMMENT='Tabel modul aplikasi';

-- Dumping data for table registrasi.module: ~16 rows (approximately)
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
	(12, 'menu-frontend', 'Menu Frontend', 1, 'Y', 'Menu Frontend'),
	(13, 'gallery', 'Gallery', 1, 'Y', 'Gallery'),
	(14, 'filepicker', 'File Picker', 1, 'Y', 'File Picker'),
	(15, 'setting-registrasi', 'Setting Registrasi', 1, 'Y', 'Setting Registrasi'),
	(16, 'filedownload', 'Stream Download', 1, 'Y', 'Stream Download');
/*!40000 ALTER TABLE `module` ENABLE KEYS */;

-- Dumping structure for table registrasi.module_role
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
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC COMMENT='Tabel hak akses module aplikasi, module aplikasi boleh diakses oleh user yang mempunyai role apa saja';

-- Dumping data for table registrasi.module_role: ~17 rows (approximately)
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
	(14, 12, 1, 'all', 'yes', 'all', 'all'),
	(15, 13, 1, 'all', 'yes', 'all', 'all'),
	(16, 14, 1, 'all', 'yes', 'all', 'all'),
	(17, 15, 1, 'all', 'yes', 'all', 'all'),
	(18, 16, 1, 'all', 'yes', 'all', 'all');
/*!40000 ALTER TABLE `module_role` ENABLE KEYS */;

-- Dumping structure for table registrasi.module_status
CREATE TABLE IF NOT EXISTS `module_status` (
  `id_module_status` tinyint(1) NOT NULL AUTO_INCREMENT,
  `nama_status` varchar(50) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_module_status`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC COMMENT='Tabel status modul, seperti: aktif, non aktif, dalam perbaikan';

-- Dumping data for table registrasi.module_status: ~3 rows (approximately)
/*!40000 ALTER TABLE `module_status` DISABLE KEYS */;
INSERT INTO `module_status` (`id_module_status`, `nama_status`, `keterangan`) VALUES
	(1, 'Aktif', NULL),
	(2, 'Dalam Perbaikan', 'Hanya role developer yang dapat mengakses module dengan status ini'),
	(3, 'Non Aktif', NULL);
/*!40000 ALTER TABLE `module_status` ENABLE KEYS */;

-- Dumping structure for table registrasi.role
CREATE TABLE IF NOT EXISTS `role` (
  `id_role` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `nama_role` varchar(50) NOT NULL,
  `judul_role` varchar(50) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `id_module` smallint(5) unsigned NOT NULL DEFAULT 0,
  PRIMARY KEY (`id_role`),
  UNIQUE KEY `role_nama` (`nama_role`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC COMMENT='Tabel yang berisi daftar role, role ini mengatur bagaimana user mengakses module, role ini nantinya diassign ke user';

-- Dumping data for table registrasi.role: ~3 rows (approximately)
/*!40000 ALTER TABLE `role` DISABLE KEYS */;
INSERT INTO `role` (`id_role`, `nama_role`, `judul_role`, `keterangan`, `id_module`) VALUES
	(1, 'admin', 'Administrator', 'Administrator', 5),
	(2, 'user', 'User', 'Pengguna umum', 11),
	(3, 'guest', 'Guest', 'Guest', 5);
/*!40000 ALTER TABLE `role` ENABLE KEYS */;

-- Dumping structure for table registrasi.role_detail
CREATE TABLE IF NOT EXISTS `role_detail` (
  `id_role_detail` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `nama_role_detail` varchar(255) DEFAULT NULL,
  `judul_role_detail` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_role_detail`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table registrasi.role_detail: ~3 rows (approximately)
/*!40000 ALTER TABLE `role_detail` DISABLE KEYS */;
INSERT INTO `role_detail` (`id_role_detail`, `nama_role_detail`, `judul_role_detail`) VALUES
	(1, 'all', 'Boleh Akses Semua Data'),
	(2, 'no', 'Tidak Boleh Akses Semua Data'),
	(3, 'own', 'Hanya Data Miliknya Sendiri');
/*!40000 ALTER TABLE `role_detail` ENABLE KEYS */;

-- Dumping structure for table registrasi.setting_app_tampilan
CREATE TABLE IF NOT EXISTS `setting_app_tampilan` (
  `param` varchar(255) NOT NULL,
  `value` text NOT NULL,
  PRIMARY KEY (`param`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table registrasi.setting_app_tampilan: 5 rows
/*!40000 ALTER TABLE `setting_app_tampilan` DISABLE KEYS */;
INSERT INTO `setting_app_tampilan` (`param`, `value`) VALUES
	('color_scheme', 'purple'),
	('sidebar_color', 'dark'),
	('logo_background_color', 'default'),
	('font_family', 'poppins'),
	('font_size', '16');
/*!40000 ALTER TABLE `setting_app_tampilan` ENABLE KEYS */;

-- Dumping structure for table registrasi.setting_app_user
CREATE TABLE IF NOT EXISTS `setting_app_user` (
  `id_user` int(11) unsigned NOT NULL,
  `param` varchar(255) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table registrasi.setting_app_user: 1 rows
/*!40000 ALTER TABLE `setting_app_user` DISABLE KEYS */;
INSERT INTO `setting_app_user` (`id_user`, `param`) VALUES
	(2, '{"color_scheme":"green","sidebar_color":"dark","logo_background_color":"default","font_family":"open-sans","font_size":"14"}');
/*!40000 ALTER TABLE `setting_app_user` ENABLE KEYS */;

-- Dumping structure for table registrasi.setting_register
CREATE TABLE IF NOT EXISTS `setting_register` (
  `param` varchar(255) NOT NULL,
  `value` tinytext DEFAULT NULL,
  PRIMARY KEY (`param`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- Dumping data for table registrasi.setting_register: ~3 rows (approximately)
/*!40000 ALTER TABLE `setting_register` DISABLE KEYS */;
INSERT INTO `setting_register` (`param`, `value`) VALUES
	('enable', 'Y'),
	('id_role', '3'),
	('metode_aktivasi', 'email');
/*!40000 ALTER TABLE `setting_register` ENABLE KEYS */;

-- Dumping structure for table registrasi.setting_web
CREATE TABLE IF NOT EXISTS `setting_web` (
  `param` varchar(255) NOT NULL,
  `value` tinytext DEFAULT NULL,
  PRIMARY KEY (`param`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table registrasi.setting_web: ~9 rows (approximately)
/*!40000 ALTER TABLE `setting_web` DISABLE KEYS */;
INSERT INTO `setting_web` (`param`, `value`) VALUES
	('background_logo', 'transparent'),
	('btn_login', 'btn-danger'),
	('description', 'Sistem login, remember me, dan registrasi dengan email konfirmasi dilengkapi dengan sistem lupa password dan administrasi user'),
	('favicon', 'favicon.png'),
	('footer_app', '© {{YEAR}} <a href="https://jagowebdev.com" target="_blank">www.Jagowebdev.com</a>'),
	('footer_login', '© {{YEAR}} <a href="https://jagowebdev.com" target="_blank">Jagowebdev.com</a>'),
	('logo_app', 'logo_aplikasi.png'),
	('logo_login', 'logo_login.png'),
	('title', 'Sistem Login dan Register');
/*!40000 ALTER TABLE `setting_web` ENABLE KEYS */;

-- Dumping structure for table registrasi.user
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `gender` enum('L','P') DEFAULT NULL,
  `nama` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `verified` tinyint(4) NOT NULL,
  `status` tinyint(1) unsigned NOT NULL,
  `created` datetime NOT NULL,
  `id_role` smallint(6) unsigned NOT NULL,
  `avatar` varchar(255) NOT NULL,
  PRIMARY KEY (`id_user`),
  KEY `user_role` (`id_role`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT COMMENT='Tabel user untuk login';

-- Dumping data for table registrasi.user: ~4 rows (approximately)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id_user`, `email`, `username`, `gender`, `nama`, `password`, `verified`, `status`, `created`, `id_role`, `avatar`) VALUES
	(1, 'prawoto.hadi@gmail.com', 'admin', 'L', 'Agus Prawoto Hadi', '$2y$10$vhmgFD6uaCLnZG/s.DGj9OtbRDz5M0ngAUnR9sIIPz7Ma6Han5c5q', 1, 1, '2021-07-01 08:09:30', 1, 'Agus Prawoto Hadi.jpg'),
	(2, 'user.administrasi@gmail.com', 'user', 'L', 'User Administrasi', '$2y$10$mULSmqshWmi/SpxVvoEwPe8/ZxJRKyQLVJusxiAYneFycNYJDhjKe', 1, 1, '2021-01-01 08:10:11', 2, 'administrator.png'),
	(3, 'superuser@gmail.com', 'superuser', 'L', 'Super User', '$2y$10$WKtoNg.3RKbMYCM4ypYQx.5/5/W60faz8T2Kxc/XDE1h.bIL/Icg2', 1, 1, '2021-01-01 08:11:15', 1, ''),
	(4, 'nw.catur.w@gmail.com', 'nwcatur', 'L', 'NW. Catur', '$2y$10$Z01Px2czyHgeznACutfotu4TL53T.YZBRdV2IUS.pC7ZNHfRt/2UK', 1, 1, '2021-06-26 06:36:31', 2, '');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

-- Dumping structure for table registrasi.user_role
CREATE TABLE IF NOT EXISTS `user_role` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `id_user` int(10) unsigned NOT NULL,
  `id_role` smallint(5) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `module_role_module` (`id_user`),
  KEY `module_role_role` (`id_role`),
  CONSTRAINT `user_role_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT COMMENT='Tabel yang berisi role yang dimili oleh masing masing user';

-- Dumping data for table registrasi.user_role: ~3 rows (approximately)
/*!40000 ALTER TABLE `user_role` DISABLE KEYS */;
INSERT INTO `user_role` (`id`, `id_user`, `id_role`) VALUES
	(1, 1, 1),
	(2, 2, 2),
	(3, 3, 1);
/*!40000 ALTER TABLE `user_role` ENABLE KEYS */;

-- Dumping structure for table registrasi.user_token
CREATE TABLE IF NOT EXISTS `user_token` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `selector` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `action` enum('register','remember','recovery','activation') NOT NULL,
  `id_user` int(10) unsigned NOT NULL DEFAULT 0,
  `created` datetime NOT NULL,
  `expires` datetime NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table registrasi.user_token: ~5 rows (approximately)
/*!40000 ALTER TABLE `user_token` DISABLE KEYS */;
INSERT INTO `user_token` (`id`, `selector`, `token`, `action`, `id_user`, `created`, `expires`) VALUES
	(8, 'd0520f9ba13cee3080', 'c6bbaa5701decf03d226aa52a3cadbb20a6013ae8a36667fb841e342da3696ca', 'register', 37, '2021-06-24 20:35:19', '2021-06-24 21:35:19'),
	(9, '5bb4b3f3f2682fd429', '667fdc0e64afa4971239323b4605f0b6d367f41f6acaef99976e3efcbcd19b8b', 'register', 38, '2021-06-26 06:28:38', '2021-06-26 07:28:38'),
	(10, '4e68469a066bd06074', '85a9253f6111b782f5d1bc195cdf74ab3520391ba8ef72bf1efd3ce6e5f58666', 'register', 39, '2021-06-26 06:33:20', '2021-06-26 07:33:20'),
	(14, '4b0bef1cfff8db67b4', '5b0e9a197649f3ec18132028035539ac7a64c2eedd6a93571b1e78b604ba21b9', 'recovery', 1, '2021-06-26 12:35:06', '2021-06-26 13:35:06'),
	(16, 'be2a23348ff6439b65', '0c797b1c84842bffc2e255fea30ffc8b2dbb7c9ebdb5a7745f457f25262face2', 'register', 41, '2021-06-27 10:55:57', '2021-06-27 11:55:57');
/*!40000 ALTER TABLE `user_token` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
