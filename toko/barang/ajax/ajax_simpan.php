<?php
require_once __DIR__ . '/../../db.php';
require_once __DIR__.'/../query/query_barang.php';
$id = isset($_GET['id']) ? $_GET['id'] : 0;
$penjual_id = isset($_POST['penjual_id']) ? $_POST['penjual_id'] : '';
$nama_barang = isset($_POST['nama_barang']) ? $_POST['nama_barang'] : '';
$nama_dagang = isset($_POST['nama_dagang']) ? $_POST['nama_dagang'] : '';
$kategori_id = isset($_POST['kategori_id']) ? $_POST['kategori_id'] : '';
$merek_id = isset($_POST['merek_id']) ? $_POST['merek_id'] : '';
$satuan_id = isset($_POST['satuan_id']) ? $_POST['satuan_id'] : '';
$margin_penjualan = isset($_POST['margin_penjualan']) ? $_POST['margin_penjualan'] : '';
$submit = isset($_POST['submit']) ? $_POST['submit'] : '';
if (strtolower($submit) === 'simpan') {
    if (empty($penjual_id)) {
        echo 'Penjual belum di pilih.';
        exit;
    } else if (empty($nama_barang)) {
        echo 'Nama barang belum di isi.';
        exit;
    } else if (empty($nama_dagang)) {
        echo 'Nama dagang belum di isi.';
        exit;
    } else if (empty($kategori_id)) {
        echo 'Kategori belum di pilih.';
        exit;
    } else if (empty($merek_id)) {
        echo 'Merek belum di pilih.';
        exit;
    } else if (empty($satuan_id)) {
        echo 'Satuan belum di pilih.';
        exit;
    } else if (empty($margin_penjualan)) {
        echo 'Margin penjualan belum di isi.';
        exit;
    }
    $total = query_total_barang($conn, $id); 
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
        if ($stmt->rowCount() > 0) {
            echo 'Data berhasil di simpan.';
        } else {
            echo 'Data gagal di simpan.';
        }
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
        if ($stmt->rowCount() > 0) {
            echo 'Data berhasil di simpan.';
        } else {
            echo 'Data gagal di simpan.';
        }
    }
}
