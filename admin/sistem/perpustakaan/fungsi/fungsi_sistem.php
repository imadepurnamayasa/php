<?php

function permintan_get($get) {
    return isset($_GET[$get]) ? $_GET[$get] : '';
}

function menu($koneksi) {
    $query =
        "
        SELECT 
        ID,
        NAMA,
        M_MENU_ID
        FROM 
        m_menu
        WHERE
        M_MENU_ID IS NULL
        ";
    $stmt = $koneksi->prepare($query);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_OBJ);
    return $stmt->fetchAll();
}

function menu2($koneksi, $menu_id) {
    $query =
        "
        SELECT 
        ID,
        NAMA,
        M_MENU_ID,
        M_MODUL_ID
        FROM 
        m_menu
        WHERE
        M_MENU_ID = $menu_id
        ";
    $stmt = $koneksi->prepare($query);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_OBJ);
    return $stmt->fetchAll();
}

function modul($koneksi, $modul_id) {
    if ($modul_id === '') {
        return '-';
    } else if ($modul_id === 'keluar') {
        return 'sistem/keluar/keluar.php';
    } else {
        $query =
            "
            SELECT 
            LOKASI
            FROM 
            m_modul
            WHERE
            ID = '$modul_id'
            ";
        $stmt = $koneksi->prepare($query);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $data = $stmt->fetch();
        if ($data) {
            return $data->LOKASI;
        } else {
            return '-';
        }
    }
}
