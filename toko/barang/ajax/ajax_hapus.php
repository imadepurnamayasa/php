<?php
require_once __DIR__.'/../../db.php';
require_once __DIR__.'/../query/query_barang.php';
$id = isset($_POST['id']) ? $_POST['id'] : 0;
$submit = isset($_POST['submit']) ? $_POST['submit'] : '';
if ($submit === 'hapus') {
    $total = query_total_barang($conn, $id); 
    if ($total > 0) {
        $query =
            "
            DELETE FROM 
            barang
            WHERE
            ID = :ID
            ";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':ID', $id);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            echo 'Data berhasil di hapus.';
        } else {
            echo 'Data gagal di hapus.';
        }
    } else {
        echo 'Data gagal di hapus.';
    }
}