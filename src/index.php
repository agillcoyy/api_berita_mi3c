<?php

$host= "db"; #akan disesuaikan dengan nama service database di docker-compose.yml
$user= "root";
$pass="secretpassword";
$db_name="db_berita";


try{
    $conn = new PDO("mysql:host=$host;dbname=$db_name", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Koneksi Berhasil";
}catch(PDOException $e){
    echo "Koneksi Gagal: " . $e->getMessage();
}

?>