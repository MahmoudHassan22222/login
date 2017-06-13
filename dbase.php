<?php
  try {
    $connect = new PDO("mysql:host=localhost;dbname=login", 'root', '');
  } catch (Exception $e) {
    echo $e->getMessage();
  }

?>
