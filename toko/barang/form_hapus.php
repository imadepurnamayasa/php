<?php
require_once __DIR__.'/../db.php';
require_once __DIR__.'/query/query_barang.php';
$id = isset($_GET['id']) ? $_GET['id'] : 0;
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
<a href="index.php"><button>Kembali</button></a>
<form name="form_barang">
    <table>
        <tr>
            <td>Apakah Anda akan menghapus data dengan nama barang <?= $nama_barang ?>?</td>
        </tr>
        <tr>
            <td>
                <button type="submit" name="submit" value="ya">Ya</button>
                <button type="button">Tidak</button>
            </td>
        </tr>
    </table>   
</form>
<div id="data"></div>
<script type="text/javascript" src="js/js_form_hapus.js"></script>