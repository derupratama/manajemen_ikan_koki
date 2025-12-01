<?php
require_once "../function/koneksi.php";
header("Content-Type: application/json");

$id_ikan     = $_POST['id_ikan'] ?? '';
$komentar    = $_POST['komentar'] ?? '';
$lokasi      = $_POST['lokasi'] ?? '';
$nama_orang  = $_POST['nama_orang'] ?? 'Anonim';

// Ambil jenis ikan dari relasi
$qJenis = $db->query("
    SELECT ji.jenisIkan, ji.idJenisIkan
    FROM ikan i
    JOIN jenisIkan ji ON ji.idJenisIkan = i.idJenisIkan
    WHERE i.idIkan = '$id_ikan'
");
$rowJenis     = $qJenis->fetchArray(SQLITE3_ASSOC);
$namaJenis    = $rowJenis['jenisIkan'] ?? '';
$idJenisIkan  = $rowJenis['idJenisIkan'] ?? '';

// Upload foto
$fotoNama = '';
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
    INSERT INTO rating (idJenisIkan, jenisIkan, lokasi, namaOrang, isiRating, foto, tanggal)
    VALUES ('$idJenisIkan', '$namaJenis', '$lokasi', '$nama_orang', '$komentar', '$fotoNama', DATE('now'))
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
    "nama_ikan"   => $namaJenis,
    "komentar"    => $komentar,
    "lokasi"      => $lokasi,
    "tanggal"     => date("Y-m-d"),
    "foto"        => $fotoNama
]);