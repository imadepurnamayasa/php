<?php

class pdoku
{
    private $koneksi;

    function buka($host = 'localhost', $username = 'root', $password = '', $dbname = 'information_schema')
    {
        try {
            $this->koneksi = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
            $this->koneksi->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            $this->koneksi = [
                'status' => false,
                'pesan' => $e->getMessage()
            ];
        }
        return $this->koneksi;
    }

    function tutup()
    {
        $this->koneksi = null;
    }
}