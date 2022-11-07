<?php

  $host = 'localhost';
  $database = 'db_mahasiswa';
  $username = 'root';
  $password = '';

  $mysqli = mysqli_connect($host, $username, $password, $database); 

  if (!$mysqli){
      echo "koneksi gagal di lakukan";
  }
  $db = mysqli_select_db($mysqli ,$database);
  
  if (!$db){
      echo "Database gagal dipilih";
  }

?>
