<?php

function query_semua_barang($conn) {
    $query = 
    "
    SELECT 
    ID,
    PENJUAL_ID,
    NAMA_BARANG,
    NAMA_DAGANG,
    KATEGORI_ID,
    MEREK_ID,
    SATUAN_ID,
    MARGIN_PENJUALAN 
    FROM 
    barang
    ";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_OBJ);
    return $stmt->fetchAll();
}

function query_barang($conn, $id) {
    $query = 
    "
    SELECT 
    ID,
    PENJUAL_ID,
    NAMA_BARANG,
    NAMA_DAGANG,
    KATEGORI_ID,
    MEREK_ID,
    SATUAN_ID,
    MARGIN_PENJUALAN 
    FROM 
    barang
    WHERE
    ID = :ID
    ";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':ID', $id);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_OBJ);
    return $stmt->fetch();
}

function query_total_barang($conn, $id)
{
    $query =
    "
    SELECT
    COUNT(ID)
    FROM 
    barang
    WHERE
    ID = :ID
    ";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':ID', $id);
    $stmt->execute();
    return $stmt->fetchColumn(); 
}