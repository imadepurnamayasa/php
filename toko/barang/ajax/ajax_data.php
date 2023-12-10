<?php
require_once __DIR__.'/../../db.php';
require_once __DIR__.'/../query/query_barang.php';
$data = query_semua_barang($conn);
?>
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
                <option value="form.php?id=<?= $row->ID ?>&aksi=ubah">Ubah</option>
                <option value="form.php?id=<?= $row->ID ?>&aksi=hapus">Hapus</option>
            </select>
        </td>  
    </tr>
    <?php } ?>
</table>