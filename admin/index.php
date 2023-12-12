<?php require_once __DIR__.'/pengaturan/database.php'; ?>
<?php require_once __DIR__.'/sistem/perpustakaan/fungsi/fungsi_sistem.php'; ?>
<?php require_once __DIR__.'/sistem/perpustakaan/database/pdoku.php'; ?>
<?php
$pdoku = new pdoku();
$koneksi = $pdoku->buka($pengaturan_database['host'], $pengaturan_database['username'], $pengaturan_database['password'], $pengaturan_database['dbname']);
if (is_array($koneksi) && isset($koneksi['status']) && $koneksi['status'] === false) {
    die($koneksi['pesan']);
}
?>
<?php include_once __DIR__.'/header.php'; ?>
<?php 
$modul = modul($koneksi, permintan_get('modul'));
if (file_exists(__DIR__.$modul)) {
    include_once __DIR__.$modul; 
}
?>
<?php include_once __DIR__.'/footer.php'; ?>