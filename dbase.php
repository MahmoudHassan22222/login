<?php
  try {
    $connect = new PDO("mysql:host=localhost;dbname=login", 'root', '');
  } catch (PDOException $e) {
    echo $e->getMessage();
  }

?>
