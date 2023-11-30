<?php

require_once FOLDER_CONFIG.'conf_conn_localhost.php';
require_once FOLDER_CLASS.'cls_request.php';
require_once FOLDER_CLASS.'cls_response.php';
require_once FOLDER_CLASS.'cls_login.php';

$request = new Request();
$response = new Response();

$login = new Login($conn_localhost, $request, $response);

$id = isset($request->get['id']) ? $request->get['id'] : null;

if ($mod_action == 'tambah') {
    $result = $login->create();
    $response->redirect('index.php?module=login');
}


if ($mod_action == 'ubah') {
    $result = $login->update($id);
    $response->redirect('index.php?module=login');
}


if ($mod_action == 'hapus') {
    $result = $login->delete($id);
    $response->redirect('index.php?module=login');
}


