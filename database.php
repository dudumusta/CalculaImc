<?php

$servername = "localhost";
$username = "username";
$password = "password";

try {
  $conn = new PDO("sqlite:". __DIR__ ."/database.db");
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  //echo "Conectado ao banco de dados";
} catch(PDOException $e) {
  echo "Falha ao conectar: " . $e->getMessage();
}