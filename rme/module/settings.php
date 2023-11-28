<?php

include FOLDER_CONFIG.'conf_conn_localhost.php';

$stmt = $conn_localhost->prepare("SELECT * FROM rme.m_konfigurasi");
$stmt->execute();
$stmt->setFetchMode(PDO::FETCH_ASSOC);
$data = $stmt->fetchAll();

printR($data);