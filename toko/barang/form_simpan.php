<?php
require_once __DIR__.'/../db.php';
$nama_barang = isset($_POST['nama_barang']) ? $_POST['nama_barang'] : '';
$nama_dagang = isset($_POST['nama_dagang']) ? $_POST['nama_dagang'] : '';
$penjual_id = isset($_POST['penjual_id']) ? $_POST['penjual_id'] : '';
$kategori_id = isset($_POST['kategori_id']) ? $_POST['kategori_id'] : '';
$merek_id = isset($_POST['merek_id']) ? $_POST['merek_id'] : '';
$satuan_id = isset($_POST['satuan_id']) ? $_POST['satuan_id'] : '';
$margin_penjualan = isset($_POST['margin_penjualan']) ? $_POST['margin_penjualan'] : '';
$query = 
"
INSERT
INTO barang
(
    NAMA_BARANG,
    NAMA_DAGANG,
    PENJUAL_ID,
    KATEGORI_ID,
    MEREK_ID,
    SATUAN_ID,
    MARGIN_PENJUALAN
)
VALUES
(
    :NAMA_BARANG,
    :NAMA_DAGANG,
    :PENJUAL_ID,
    :KATEGORI_ID,
    :MEREK_ID,
    :SATUAN_ID,
    :MARGIN_PENJUALAN
)
";
$stmt = $conn->prepare($query);
$stmt->bindParam(':NAMA_BARANG', $nama_barang);
$stmt->bindParam(':NAMA_DAGANG', $nama_dagang);
$stmt->bindParam(':PENJUAL_ID', $penjual_id);
$stmt->bindParam(':KATEGORI_ID', $kategori_id);
$stmt->bindParam(':MEREK_ID', $merek_id);
$stmt->bindParam(':SATUAN_ID', $satuan_id);
$stmt->bindParam(':MARGIN_PENJUALAN', $margin_penjualan);
$stmt->execute();

header('location: index.php');