<?php
mysql_query("truncate rb_anggaran_belanja");
mysql_query("truncate rb_data_umum");
mysql_query("truncate rb_detail_realisasi");
mysql_query("truncate rb_detail_target");
mysql_query("truncate rb_jenis_belanja");
mysql_query("truncate rb_jenis_target_realisasi");
mysql_query("truncate rb_page");
mysql_query("truncate rb_pegawai");
mysql_query("truncate rb_sub_jenis_belanja");
mysql_query("truncate rb_user");

mysql_query("INSERT INTO `rb_anggaran_belanja` (`id_anggaran_belanja`, `id_data_umum`, `id_sub_jenis_belanja`, `keterangan_anggaran`, `total_rp`, `bobot`, `vol`, `ket_vol`, `sisa_pagu`, `keterangan_akhir`, `tgl_jam`, `id_user`, `stat`) VALUES
(3, 1, 1, 'Honorarium Panitia Kegiatan', 20000000, '4.00', '1', 'Paket (1 Kali)', 20000000, 'Menunggu Jadwal pelaksanaan kegiatan', '2015-04-22 17:58:06', 1, 'Y'),
(5, 1, 2, 'Honorarium PPTK Kegiatan', 30000000, '5.9976', '12', 'OB', 25000000, '', '2015-04-23 02:10:16', 1, 'Y'),
(6, 1, 2, 'Honorarium Pembantu PPTK', 28800000, '5.7577', '24', 'OB', 24000000, '', '2015-04-23 02:14:02', 0, 'Y'),
(7, 1, 3, 'Honorarium Pegawai Honorer SMP', 21000000, '4.1983', '12', 'OB', 21000000, '(Pensiun)', '2015-04-23 02:20:24', 1, 'Y'),
(8, 1, 3, 'Honorarium Pegawai Honorer SD', 21000000, '4.1983', '12', 'OB', 17500000, '', '2015-04-23 02:22:23', 1, 'Y'),
(9, 1, 4, 'Belanja Alat Tulis Kantor (ATK)', 30000000, '5.9976', '6', 'Kali (1 Tahun)', 21035000, '', '2015-04-23 02:24:12', 1, 'Y'),
(10, 1, 5, 'Pembuatan Spanduk ', 1200000, '0.2399', '1', 'Paket (1 Kali)', 1200000, '', '2015-04-23 02:26:08', 1, 'Y'),
(11, 1, 6, 'Honorarium Tenaga Perkebunan', 45600000, '9.1164', '24', 'OB', 38200000, '', '2015-04-23 02:28:14', 1, 'Y'),
(12, 1, 7, 'Belanja Cetak', 24600000, '4.9180', '5', 'Kali (1 Tahun)', 16905000, '', '2015-04-23 02:29:43', 1, 'Y'),
(13, 1, 7, 'Belanja Penggandaan/Fotocopy/Penjilidan', 30000000, '5.9976', '7', 'Kali (1 Tahun)', 20013800, '', '2015-04-23 02:30:51', 1, 'Y'),
(14, 1, 8, 'Belanja Makanan dan Minuman Rapat', 5000000, '0.9996', '6', 'Kali (1 Tahun)', 2880000, '', '2015-04-23 02:32:06', 1, 'Y'),
(15, 1, 9, 'Belanja Makanan dan Minuman Kegiatan', 50000000, '9.9960', '1', 'Paket (1 Kali)', 50000000, '', '2015-04-23 02:33:59', 1, 'Y'),
(16, 1, 9, 'Honor Pejabat Pengadaan Barang dan Jasa', 1000000, '0.1999', '1', 'Orang', 1000000, '', '2015-04-23 02:35:42', 1, 'Y'),
(17, 1, 9, 'Honor Pejabat Penerima Hasil Pekerjaan Barang dan Jasa', 700000, '0.1399', '1', 'Orang', 700000, '', '2015-04-23 02:36:18', 1, 'Y'),
(18, 1, 11, 'Belanja Perjalanan Dinas Dalam Daerah', 128000000, '25.5898', '56', 'OT (1 Tahun)', 104275000, '', '2015-04-23 02:37:26', 1, 'Y'),
(19, 1, 11, 'Belanja Perjalanan Dinas Luar Daerah', 63300000, '12.6549', '14', 'OT(1 Tahun)', 44585500, '', '2015-04-23 02:38:32', 1, 'Y'),
(29, 1, 10, 'Honorarium Panitia Kegiatan', 20000000, '3.9984', '1', 'Paket (1 Kali)', 20000000, '', '2015-07-24 10:39:29', 1, 'Y')");


mysql_query("INSERT INTO `rb_data_umum` (`id_data_umum`, `laporan_sampai`, `nama_program`, `nama_kegiatan`, `bidang_bagian_seksi`, `kpa`, `pptk`, `pagu_anggaran`, `tahun`, `waktu`, `id_user`) VALUES
(1, 'April 2016', 'Peningkatan Kualitas Perencanaan, Pelaporan Capaian Kinerja', 'Pengembangan Sistem Koordinasi Perencanaan, Monitoring, Evaluasi & Pelaporan', 'Sekretariat / Perencanaan & Program', 13, 15, 500200000, 2016, '2015-04-21 10:03:24', 1)");

mysql_query("INSERT INTO `rb_detail_realisasi` (`id_detail_realisasi`, `id_anggaran_belanja`, `vol_fisik`, `persen_fisik`, `ttb_fisik`, `rp_keuangan`, `persen_keuangan`, `ttb_keuangan`, `waktu_realisasi`, `id_user`) VALUES
(5, 3, '1', '100.00', '4.00', '-', '-', '-', '2015-04-22 17:58:06', 1),
(7, 5, '2', '16.666666666667', '0.9996', '5000000', '16.666666666667', '0.9996', '2015-04-23 02:10:16', 1),
(8, 6, '4', '16.666666666667', '0.95961666666667', '4800000', '16.666666666667', '0.95961666666667', '2015-04-23 02:14:02', 0),
(9, 7, '', '-', '-', '-', '-', '-', '2015-04-23 02:20:24', 1),
(10, 8, '2', '16.666666666667', '0.69971666666667', '3500000', '16.666666666667', '0.69971666666667', '2015-04-23 02:22:23', 1),
(11, 9, '2', '33.333333333333', '1.9992', '8965000', '29.883333333333', '1.7922828', '2015-04-23 02:24:12', 1),
(12, 10, '', '-', '-', '', '-', '-', '2015-04-23 02:26:08', 1),
(13, 11, '4', '16.666666666667', '1.5194', '7400000', '16.228070175439', '1.4794157894737', '2015-04-23 02:28:14', 1),
(14, 12, '2', '40', '1.9672', '7695000', '31.280487804878', '1.5383743902439', '2015-04-23 02:29:43', 1),
(15, 13, '3', '42.857142857143', '2.5704', '9986200', '33.287333333333', '1.996441104', '2015-04-23 02:30:51', 1),
(16, 14, '2', '33.333333333333', '0.3332', '2120000', '42.4', '0.4238304', '2015-04-23 02:32:06', 1),
(17, 15, '', '-', '-', '-', '-', '-', '2015-04-23 02:33:59', 1),
(18, 16, '', '-', '-', '-', '-', '-', '2015-04-23 02:35:42', 1),
(19, 17, '', '-', '-', '-', '-', '-', '2015-04-23 02:36:18', 1),
(20, 18, '16', '28.571428571429', '7.3113714285714', '23725000', '18.53515625', '4.7431094140625', '2015-04-23 02:37:26', 1),
(21, 19, '5', '35.714285714286', '4.5196071428571', '18714500', '29.56477093207', '3.7413921966825', '2015-04-23 02:38:32', 1),
(31, 29, '', '-', '-', '', '-', '-', '2015-07-24 10:39:29', 1)");


mysql_query("INSERT INTO `rb_detail_target` (`id_detail_target`, `id_anggaran_belanja`, `vol_fisik`, `persen_fisik`, `ttb_fisik`, `rp_keuangan`, `persen_keuangan`, `ttb_keuangan`, `waktu_target`, `id_user`) VALUES
(5, 3, '-', '-', '-', '-', '-', '-', '2015-04-22 17:58:06', 1),
(7, 5, '2', '16.666666666667', '0.9996', '5000000', '16.666666666667', '0.9996', '2015-04-23 02:10:16', 1),
(8, 6, '4', '16.666666666667', '0.95961666666667', '4800000', '16.666666666667', '0.95961666666667', '2015-04-23 02:14:02', 1),
(9, 7, '2', '16.666666666667', '0.69971666666667', '3500000', '16.666666666667', '0.69971666666667', '2015-04-23 02:20:24', 1),
(10, 8, '2', '16.666666666667', '0.69971666666667', '3500000', '16.666666666667', '0.69971666666667', '2015-04-23 02:22:23', 1),
(11, 9, '2', '33.333333333333', '1.9992', '10000000', '33.333333333333', '1.9992', '2015-04-23 02:24:12', 1),
(12, 10, '', '-', '-', '', '-', '-', '2015-04-23 02:26:08', 1),
(13, 11, '4', '16.666666666667', '1.5194', '7600000', '16.666666666667', '1.5194', '2015-04-23 02:28:14', 1),
(14, 12, '2', '40', '1.9672', '10000000', '40.650406504065', '1.9991869918699', '2015-04-23 02:29:43', 1),
(15, 13, '3', '42.857142857143', '2.5704', '10000000', '33.333333333333', '1.9992', '2015-04-23 02:30:51', 1),
(16, 14, '2', '33.333333333333', '0.3332', '2500000', '50', '0.4998', '2015-04-23 02:32:06', 1),
(17, 15, '', '-', '-', '-', '-', '-', '2015-04-23 02:33:59', 1),
(18, 16, '', '-', '-', '-', '-', '-', '2015-04-23 02:35:42', 1),
(19, 17, '', '-', '-', '-', '-', '-', '2015-04-23 02:36:18', 1),
(20, 18, '19', '33.928571428571', '8.6822535714286', '44320000', '34.625', '8.86046825', '2015-04-23 02:37:26', 1),
(21, 19, '3', '21.428571428571', '2.7117642857143', '13670000', '21.595576619273', '2.7328986255924', '2015-04-23 02:38:32', 1),
(31, 29, '1', '100', '3.9984', '', '-', '-', '2015-07-24 10:39:29', 1)");

mysql_query("INSERT INTO `rb_jenis_belanja` (`id_jenis_belanja`, `keterangan`, `id_user`) VALUES
(1, 'Belanja Langsung', 1),
(2, 'Belanja Barang dan Jasa', 1)");

mysql_query("INSERT INTO `rb_jenis_target_realisasi` (`id_jenis_target_realisasi`, `keterangan_target_realisasi`) VALUES
(1, 'Fisik'),
(2, 'Keuangan')");

mysql_query("INSERT INTO `rb_page` (`id_page`, `judul`, `isi`) VALUES
(1, 'User Guide - Administrator', 'e-budgeting adalah sebuah sistem pembuatan anggaran di lingkungan pemerintahan kota. Dalam sistem ini untuk membuat\r\nsebuah anggaran, dibutuhkan komponen-komponen penyusun yang mana komponen-komponen penyusun tersebut merupakan hasil dari survey di lapangan.'),
(2, 'User Guide - Operator', 'e-budgeting adalah sebuah sistem pembuatan anggaran di lingkungan pemerintahan kota. Dalam sistem ini untuk membuat\r\nsebuah anggaran, dibutuhkan komponen-komponen penyusun yang mana komponen-komponen penyusun tersebut merupakan hasil dari survey di lapangan.')");

mysql_query("INSERT INTO `rb_pegawai` (`id_pegawai`, `nip`, `nama_lengkap`, `tempat_lahir`, `tgl_lahir`, `gol`, `jabatan`, `agama`, `file_ijazah`, `no_telpon`, `alamat_lengkap`, `keterangan`, `id_user`) VALUES
(17, '464646', 'Maria Lufi Ulfah', 'Kediri', '28 Juni 1987', 'IIa', 'Staf PTT', 'Hindu', '', '43545', 'Keidir', '-', 6),
(15, '23442421', 'Deny Indrayana, S.H', 'jakarta', '30 Desember 1961', 'IIIa', 'Kasub Seksi', 'Protestan', '', '0567456', 'pasuruan', '-', 5),
(13, '6732193021', 'Fatkhruhman, S.E', 'Blitar Timur', '19 Juli 1977', 'IVb', 'Kepala Bidang', 'Hindu', '', '05674561', 'Sudimoro Malang', 'Pensiun', 1)");

mysql_query("INSERT INTO `rb_sub_jenis_belanja` (`id_sub_jenis_belanja`, `id_jenis_belanja`, `keterangan_sub_jenis`, `id_user`) VALUES
(2, 1, 'Honorarium Pengelola Keuangan', 1),
(3, 1, 'Honorarium Non PNS 1 2', 1),
(4, 2, 'Belanja Alat Tulis Kantor', 1),
(5, 2, 'Belanja Jasa Publikasi', 1),
(6, 2, 'Belanja Jasa Tenaga Teknis / Non Teknis', 1),
(7, 2, 'Belanja Cetak dan Penggandaan', 1),
(8, 2, 'Belanja Makanan dan Minuman Rapat', 1),
(9, 2, 'Belanja Makanan dan Minuman Kegiatan / Pelatihan', 1),
(10, 1, 'Honorarium Panitia Pelaksana Kegiatan', 1),
(11, 2, 'Belanja Perjalanan Dinas', 1)");

mysql_query("INSERT INTO `rb_user` (`id_user`, `username`, `password`, `nama_lengkap`, `no_telpon`, `alamat_lengkap`, `keterangan`, `level`) VALUES
(1, 'admin', '0192023a7bbd73250516f069df18b500', 'Robby Prihandaya', '081267771344', 'Jl.Angkasa Puri, Perundam 4, Tunggul Hitam, Padang, Sumatera Barat', '', 'admin'),
(2, 'dewi', 'ed1d859c50262701d92e5cbf39652792', 'Dewi Safitri', '082173054500', 'Jl.Angkasa Puri, Perundam 4, Tunggul Hitam, Padang, Sumatera Barat', 'Operator 1', 'operator'),
(4, 'udin', '6bec9c852847242e384a4d5ac0962ba0', 'Udin Sedunia', '081267771300', 'Lubuk Begalung, Padang, Sumatera Barat', 'Operator 2', 'operator')");

echo "<script>window.alert('Sukses Restore Database!');
				window.location='home.mu'</script>";