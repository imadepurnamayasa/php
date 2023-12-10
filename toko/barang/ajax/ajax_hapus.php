<?php
require_once __DIR__.'/../../db.php';
require_once __DIR__.'/../query/query_barang.php';
$id = isset($_GET['id']) ? $_GET['id'] : 0;
$submit = isset($_POST['submit']) ? $_POST['submit'] : '';
if ($submit === 'hapus') {
    $total = query_total_barang($conn, $id); 
    if ($total > 0) {

    } else {
        
    }
}