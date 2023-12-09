<?php
require_once __DIR__.'/../db.php';
$stmt = $conn->prepare("SELECT * FROM barang");
$stmt->execute();
$stmt->setFetchMode(PDO::FETCH_OBJ);
$data = $stmt->fetchAll();
?>
<h1>BARANG</h1>
<form action="">
    <table>
        <tr>
            <td>NAMA BARANG</td>
            <td>:</td>
            <td><input type="text"></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td><button>Cari</button></td>
        </tr>
    </table>
</form>
<a href="form.php"><button>Tambah</button></a>
<table>
    <tr>
        <th>ID</th>
        <th>NAMA BARANG</th>
        <th>AKSI</th>
    </tr>
    <?php foreach($data as $row) { ?>
    <tr>
        <td><?= $row->ID ?></td>
        <td><?= $row->NAMA_BARANG ?></td>
        <td>
            <select name="" id="" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                <option value="">- PILIH -</option>
                <option value="form.php?id=">Ubah</option>
                <option value="form_hapus.php?id=">Hapus</option>
            </select>
        </td>  
    </tr>
    <?php } ?>
</table>