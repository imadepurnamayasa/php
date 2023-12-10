<?php
require_once __DIR__ . '/../db.php';
$id = isset($_GET['id']) ? $_GET['id'] : '';
$penjual_id = isset($_POST['penjual_id']) ? $_POST['penjual_id'] : '';
$nama_barang = isset($_POST['nama_barang']) ? $_POST['nama_barang'] : '';
$nama_dagang = isset($_POST['nama_dagang']) ? $_POST['nama_dagang'] : '';
$kategori_id = isset($_POST['kategori_id']) ? $_POST['kategori_id'] : '';
$merek_id = isset($_POST['merek_id']) ? $_POST['merek_id'] : '';
$satuan_id = isset($_POST['satuan_id']) ? $_POST['satuan_id'] : '';
$margin_penjualan = isset($_POST['margin_penjualan']) ? $_POST['margin_penjualan'] : '';
$submit = isset($_POST['submit']) ? $_POST['submit'] : '';

if ($submit === 'simpan') {
    $query_cek =
        "
        SELECT
        COUNT(ID)
        FROM
        barang
        WHERE
        ID = :ID
        ";
    $stmt = $conn->prepare($query_cek);
    $stmt->bindParam(':ID', $id);
    $stmt->execute();
    $total = $stmt->fetchColumn(); 
    if ($total === 0) {
        $query =
            "
            INSERT INTO 
            barang
            (
            PENJUAL_ID,
            NAMA_BARANG,
            NAMA_DAGANG,
            KATEGORI_ID,
            MEREK_ID,
            SATUAN_ID,
            MARGIN_PENJUALAN
            )
            VALUES
            (
            :PENJUAL_ID,
            :NAMA_BARANG,
            :NAMA_DAGANG,
            :KATEGORI_ID,
            :MEREK_ID,
            :SATUAN_ID,
            :MARGIN_PENJUALAN
            )
            ";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':PENJUAL_ID', $penjual_id);
        $stmt->bindParam(':NAMA_BARANG', $nama_barang);
        $stmt->bindParam(':NAMA_DAGANG', $nama_dagang);
        $stmt->bindParam(':KATEGORI_ID', $kategori_id);
        $stmt->bindParam(':MEREK_ID', $merek_id);
        $stmt->bindParam(':SATUAN_ID', $satuan_id);
        $stmt->bindParam(':MARGIN_PENJUALAN', $margin_penjualan);
        $stmt->execute();
    } else {
        $query =
            "
            UPDATE 
            barang
            SET
            NAMA_BARANG = :NAMA_BARANG,
            NAMA_DAGANG = :NAMA_DAGANG,
            PENJUAL_ID = :PENJUAL_ID,
            KATEGORI_ID = :KATEGORI_ID,
            MEREK_ID = :MEREK_ID,
            SATUAN_ID = :SATUAN_ID,
            MARGIN_PENJUALAN = :MARGIN_PENJUALAN
            WHERE
            ID = :ID
            ";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':NAMA_BARANG', $nama_barang);
        $stmt->bindParam(':NAMA_DAGANG', $nama_dagang);
        $stmt->bindParam(':PENJUAL_ID', $penjual_id);
        $stmt->bindParam(':KATEGORI_ID', $kategori_id);
        $stmt->bindParam(':MEREK_ID', $merek_id);
        $stmt->bindParam(':SATUAN_ID', $satuan_id);
        $stmt->bindParam(':MARGIN_PENJUALAN', $margin_penjualan);
        $stmt->bindParam(':ID', $id);
        $stmt->execute();
    }
    header('location: index.php');
}
