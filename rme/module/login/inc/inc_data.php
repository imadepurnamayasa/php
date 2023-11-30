<?php

require_once FOLDER_CONFIG.'conf_conn_localhost.php';
require_once FOLDER_CLASS.'cls_request.php';
require_once FOLDER_CLASS.'cls_login.php';

$request = new Request();

$login = new Login($conn_localhost, $request, $response);
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
            <a href="index.php?module=<?= $module ?>&menu=form&action=ubah&id=<?= $row->id ?>"><button>Ubah</button></a>
            <a href="index.php?module=<?= $module ?>&menu=form&action=hapus&id=<?= $row->id ?>"><button>Hapus</button></a>
        </td>
    </tr>
    <?php } ?>
</table>
<script src="<?= $mod_js_location ?>js_data.js"></script>