<?php
require_once __DIR__.'/../db.php';
$id = isset($_GET['id']) ? $_GET['id'] : '';
$query_cek =
    "
    SELECT
    PENJUAL_ID,
    NAMA_BARANG,
    NAMA_DAGANG,
    KATEGORI_ID,
    MEREK_ID,
    SATUAN_ID,
    MARGIN_PENJUALAN
    FROM
    barang
    WHERE
    ID = :ID
    ";
$stmt = $conn->prepare($query_cek);
$stmt->bindParam(':ID', $id);
$stmt->execute();
$stmt->setFetchMode(PDO::FETCH_OBJ);
$data = $stmt->fetch();
$penjual_id = isset($data->PENJUAL_ID) ? $data->PENJUAL_ID : '';
$nama_barang = isset($data->NAMA_BARANG) ? $data->NAMA_BARANG : '';
$nama_dagang = isset($data->NAMA_DAGANG) ? $data->NAMA_DAGANG : '';
$kategori_id = isset($data->KATEGORI_ID) ? $data->KATEGORI_ID : '';
$merek_id = isset($data->MEREK_ID) ? $data->MEREK_ID : '';
$satuan_id = isset($data->SATUAN_ID) ? $data->SATUAN_ID : '';
$margin_penjualan = isset($data->MARGIN_PENJUALAN) ? $data->MARGIN_PENJUALAN : '';
?>
<h1>FORM BARANG</h1>
<form action="form_simpan.php?id=<?= $id ?>" method="post">
    <table>
        <tr>
            <td>PENJUAL</td>
            <td>:</td>
            <td>
                <select name="" id="">
                    <option value="">- PILIH-</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>NAMA BARANG</td>
            <td>:</td>
            <td><input type="text" name="nama_barang" value="<?= $nama_barang ?>"></td>
        </tr>
        <tr>
            <td>NAMA DAGANG</td>
            <td>:</td>
            <td><input type="text" name="nama_dagang" value="<?= $nama_dagang ?>"></td>
        </tr>
        <tr>
            <td>KATEGORI</td>
            <td>:</td>
            <td>
                <select name="" id="">
                    <option value="">- PILIH-</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>MEREK</td>
            <td>:</td>
            <td>
                <select name="" id="">
                    <option value="">- PILIH-</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>SATUAN</td>
            <td>:</td>
            <td>
                <select name="" id="">
                    <option value="">- PILIH-</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>MARGIN PENJUALAN</td>
            <td>:</td>
            <td><input type="text" name="margin_penjualan" value=""></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td><button type="submit" name="submit" value="simpan">Simpan</button></td>
        </tr>
    </table>
</form>
<a href="index.php"><button>Kembali</button></a>