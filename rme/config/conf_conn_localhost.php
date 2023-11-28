<?php
$servername = "localhost";
$username = "root";
$password = "";

try {
  $conn_localhost = new PDO("mysql:host=$servername;dbname=information_schema", $username, $password);
  // set the PDO error mode to exception
  $conn_localhost->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Connected successfully";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}