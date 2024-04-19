<?php
  $servername = "localhost";
  $username = "Alexs";
  $password = "root";

  try {
    $db = new PDO("mysql:host=$servername;dbname=cinema", $username, $password);
  } catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
  }
?>
