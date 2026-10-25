<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
header('Content-Type: application/json; charset=utf-8');

// Kode PHP kamu berikutnya (query database, json_encode, dll.)

$host = "db"; #akan disesuaikan dengan nama service database di docker-compose.yml
$user = "root";
$pass = "secretpassword";
$db_name = "db_berita";


try {
    $conn = new PDO("mysql:host=$host;dbname=$db_name", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    #mengambil data dari tabel berita   
    $stmt = $conn->prepare("SELECT * FROM tb_berita");
    $stmt->execute();
    $berita = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode([
        "status" => "success",
        "code" => 200,
        "data" => $berita,
        "message" => "Data Berita Berhasil Diambil"
    ], JSON_PRETTY_PRINT);
} catch (PDOException $e) {
    echo json_encode([
        "status" => "error",
        "code" => 500,
        "message" => "Koneksi Gagal: " . $e->getMessage()
    ], JSON_PRETTY_PRINT);
}
