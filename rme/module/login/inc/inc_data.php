<?php

include FOLDER_CONFIG.'conf_conn_localhost.php';
include FOLDER_CLASS.'cls_login.php';

$login = new Login($conn_localhost);
$data = $login->all();
?>
<h1>Login</h1>
<a href="index.php?module=<?= $module ?>&menu=form&action=tambah"><button>Tambah</button></a>
<table>
    <tr>
        <th>id</th>
        <th>username</th>
        <th>password</th>
        <th></th>
    </tr>
    <?php foreach($data as $row) { ?>
    <tr>
        <td><?= $row->id ?></td>
        <td><?= $row->username ?></td>
        <td><?= $row->password ?></td>
        <td>
            <button>Hapus</button>
        </td>
    </tr>
    <?php } ?>
</table>
<script src="<?= $mod_js_location ?>js_data.js"></script>