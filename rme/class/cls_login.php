<?php

class Login
{
    private $conn;
    private $request;
    private $response;

    function __construct($conn, $request, $response)
    {
        $this->conn = $conn;
        $this->request = $request;
        $this->response = $response;
    }

    function all()
    {
        $stmt = $this->conn->prepare("SELECT * FROM `rme`.`m_login`");
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        return $stmt->fetchAll();
    }

    function create()
    {
        $username = $this->request->post('username');
        $password = $this->request->post('password');
        
        try {
            $stmt = $this->conn->prepare("INSERT INTO `rme`.`m_login` (`username`, `password`) VALUES (:username, :password)");
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':password', $password);
            return [
                'status' => $stmt->execute(),
                'message' => "Success"
            ];
        } catch(PDOException $e) {
            return [
                'status' => false,
                'message' => "Error: " . $e->getMessage()
            ];
        }        
    }
    
    function read($id)
    {
        try {
            $stmt = $this->conn->prepare("SELECT * FROM `rme`.`m_login` WHERE id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_OBJ);
            return $stmt->fetch();
        } catch(PDOException $e) {
            return [
                'status' => false,
                'message' => "Error: " . $e->getMessage()
            ];
        }  
    }

    function update($id)
    {
        $username = $this->request->post('username');
        $password = $this->request->post('password');

        try {
            $stmt = $this->conn->prepare("UPDATE `rme`.`m_login` SET `username` = :username, `password` = :password WHERE id = :id");
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':password', $password);
            $stmt->bindParam(':id', $id);
            return [
                'status' => $stmt->execute(),
                'message' => "Success"
            ];
        } catch(PDOException $e) {
            return [
                'status' => false,
                'message' => "Error: " . $e->getMessage()
            ];
        }  
    }

    function delete($id)
    {
        try {
            $stmt = $this->conn->prepare("DELETE FROM `rme`.`m_login` WHERE id = :id");
            $stmt->bindParam(':id', $id);
            return [
                'status' => $stmt->execute(),
                'message' => "Success"
            ];
        } catch(PDOException $e) {
            return [
                'status' => false,
                'message' => "Error: " . $e->getMessage()
            ];
        }  
    }
}