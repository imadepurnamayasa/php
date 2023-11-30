<?php

require_once FOLDER_CONFIG.'conf_conn_localhost.php';
require_once FOLDER_CLASS.'cls_request.php';
require_once FOLDER_CLASS.'cls_login.php';

$request = new Request();
$login = new Login($conn_localhost, $request, $response);

$id = $request->get('id');
$data = $login->read($id);
printR($data);
?>
<h1>Form Login</h1>
<a href="index.php?module=login"><button type="button">kembali</button></a>
<form action="index.php?module=<?= $module ?>&menu=action&action=<?= $mod_action ?>&id=<?= $id ?>" method="post">
    <table>
        <tr>
            <td>Id</td>
            <td></td>
            <td><input type="text" name="id" value="<?= dataObj($data, 'id') ?>"></td>
        </tr>
        <tr>
            <td>Username</td>
            <td></td>
            <td><input type="text" name="username" value="<?= dataObj($data, 'username') ?>"></td>
        </tr>
        <tr>
            <td>Password</td>
            <td></td>
            <td><input type="text" name="password" value="<?= dataObj($data, 'password') ?>"></td>
        </tr>
    </table>
    <button type="submit"><?= $mod_action ?></button>
</form>
<script src="<?= $mod_js_location ?>js_form.js"></script>