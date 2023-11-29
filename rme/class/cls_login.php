<?php

class Login
{
    private $conn;

    function __construct($conn)
    {
        $this->conn = $conn;
    }

    function all()
    {
        $stmt = $this->conn->prepare("SELECT * FROM rme.m_login");
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $data = $stmt->fetchAll();

        return $data;
    }
}