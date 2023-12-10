<?php
require_once __DIR__.'/../db.php';
require_once __DIR__.'/query/query_barang.php';
$id = isset($_GET['id']) ? $_GET['id'] : 0;
$aksi = isset($_GET['aksi']) ? $_GET['aksi'] : '';
if ($aksi === '' && $aksi === 'ubah') {
    $form_action = "form_simpan.php?id=$id";
    $button_submit = "Simpan";
} else if ($aksi === 'hapus') {
    $form_action = "form_hapus.php?id=$id";
    $button_submit = "Hapus";
} else {
    $form_action = "form_simpan.php?id=$id";
    $button_submit = "Simpan";
}
$data = query_barang($conn, $id);
$penjual_id = isset($data->PENJUAL_ID) ? $data->PENJUAL_ID : '';
$nama_barang = isset($data->NAMA_BARANG) ? $data->NAMA_BARANG : '';
$nama_dagang = isset($data->NAMA_DAGANG) ? $data->NAMA_DAGANG : '';
$kategori_id = isset($data->KATEGORI_ID) ? $data->KATEGORI_ID : '';
$merek_id = isset($data->MEREK_ID) ? $data->MEREK_ID : '';
$satuan_id = isset($data->SATUAN_ID) ? $data->SATUAN_ID : '';
$margin_penjualan = isset($data->MARGIN_PENJUALAN) ? $data->MARGIN_PENJUALAN : '';
?>
<h1>FORM BARANG</h1>
<form name="form_barang">
    <table>
        <tr>
            <td>PENJUAL</td>
            <td>:</td>
            <td>
                <select name="penjual_id">
                    <option value="">- PILIH-</option>
                    <option value="1">Penjual 1</option>
                </select>
                <span id="pesan_penjual_id"></span>
            </td>
        </tr>
        <tr>
            <td>NAMA BARANG</td>
            <td>:</td>
            <td>
                <?php if ($aksi === 'hapus') { ?>
                    <?= $nama_barang ?>
                <?php } else { ?>
                    <input type="text" name="nama_barang" value="<?= $nama_barang ?>">
                    <span id="pesan_nama_barang"></span>
                <?php } ?>
            </td>
        </tr>
        <tr>
            <td>NAMA DAGANG</td>
            <td>:</td>
            <td>
                <?php if ($aksi === 'hapus') { ?>
                    <?= $nama_dagang ?>
                <?php } else { ?>
                    <input type="text" name="nama_dagang" value="<?= $nama_dagang ?>">
                    <span id="pesan_nama_dagang"></span>
                <?php } ?>
            </td>
        </tr>
        <tr>
            <td>KATEGORI</td>
            <td>:</td>
            <td>
                <select name="kategori_id">
                    <option value="">- PILIH-</option>
                    <option value="1">kategori 1</option>
                </select>
                <span id="pesan_kategori_id"></span>
            </td>
        </tr>
        <tr>
            <td>MEREK</td>
            <td>:</td>
            <td>
                <select name="merek_id">
                    <option value="">- PILIH-</option>
                    <option value="1">Merek 1</option>
                </select>
                <span id="pesan_merek_id"></span>
            </td>
        </tr>
        <tr>
            <td>SATUAN</td>
            <td>:</td>
            <td>
                <select name="satuan_id">
                    <option value="">- PILIH-</option>
                    <option value="1">Satuan 1</option>
                </select>
                <span id="pesan_satuan_id"></span>
            </td>
        </tr>
        <tr>
            <td>MARGIN PENJUALAN</td>
            <td>:</td>
            <td>
                <input type="text" name="margin_penjualan" value="">
                <span id="pesan_margin_penjualan"></span>
            </td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td><button type="submit" name="submit" value="<?= $button_submit ?>"><?= $button_submit ?></button></td>
        </tr>
    </table>
</form>
<div id="data"></div>
<a href="index.php"><button>Kembali</button></a>
<script type="text/javascript" src="js/js_form.js"></script>