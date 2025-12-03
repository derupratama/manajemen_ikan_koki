<?php
require_once "../function/koneksi.php";
header("Content-Type: application/json");

$komentar    = $_POST['komentar'] ?? '';
$lokasi      = $_POST['lokasi'] ?? '';
$nama_orang  = $_POST['nama_orang'] ?? 'Anonim';



// Upload foto
$fotoNama = 'user.png';
if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
    $ext = strtolower(pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION));
    $allowed = ['jpg','jpeg','png','gif'];
    if (in_array($ext, $allowed)) {
        $fotoNama = uniqid('rating_', true) . '.' . $ext;
        $folder = '../assets/img/rating/';
        if (!is_dir($folder)) mkdir($folder, 0755, true);
        move_uploaded_file($_FILES['foto']['tmp_name'], $folder . $fotoNama);
    }
}

// Simpan ke tabel rating
$q = "
    INSERT INTO rating ( lokasi, namaOrang, isiRating, foto, tanggal)
    VALUES ('$lokasi', '$nama_orang', '$komentar', '$fotoNama', DATE('now'))
";

$run = $db->exec($q);

if (!$run) {
    echo json_encode([
        "success" => false,
        "msg" => $db->lastErrorMsg()
    ]);
    exit;
}

$idBaru = $db->querySingle("SELECT last_insert_rowid()");

echo json_encode([
    "success"     => true,
    "id"          => $idBaru,
    "nama_orang"  => $nama_orang,
    "komentar"    => $komentar,
    "lokasi"      => $lokasi,
    "tanggal"     => date("Y-m-d"),
    "foto"        => $fotoNama
]);