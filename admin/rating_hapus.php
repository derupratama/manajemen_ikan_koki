<?php
require_once "../function/koneksi.php";
header("Content-Type: application/json");

$id = $_POST['id'] ?? '';

if (!$id) {
    echo json_encode([
        "success" => false,
        "msg" => "ID rating tidak ditemukan."
    ]);
    exit;
}

// Ambil nama file foto sebelum hapus
$q = $db->query("SELECT foto FROM rating WHERE idRating = '$id'");
$row = $q ? $q->fetchArray(SQLITE3_ASSOC) : null;
$foto = $row['foto'] ?? '';

// Hapus data dari database
$hapus = $db->exec("DELETE FROM rating WHERE idRating = '$id'");

if (!$hapus) {
    echo json_encode([
        "success" => false,
        "msg" => "Gagal menghapus rating: " . $db->lastErrorMsg()
    ]);
    exit;
}

// Hapus file foto jika ada
if ($foto) {
    $path = "../assets/img/rating/" . $foto;
    if (file_exists($path)) {
        unlink($path);
    }
}

echo json_encode([
    "success" => true
]);