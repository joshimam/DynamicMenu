<?php
$servername = "localhost";
$username = "root";
$password = "";
global $conn;
try {
  $conn = new PDO("mysql:host=$servername;dbname=mamta", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Connected";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}



?>