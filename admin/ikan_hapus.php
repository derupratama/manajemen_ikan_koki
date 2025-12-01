<?php

if (!isset($_GET['id'])) {
    echo "<script>alert('ID tidak ditemukan!'); window.location.href='?page=ikan_daftar';</script>";
    exit;
}

$id = $_GET['id']; 

$stmt = $db->prepare("DELETE FROM ikan WHERE idIkan = :id");
$stmt->bindValue(':id', $id, SQLITE3_INTEGER);

$execute = $stmt->execute();

if ($execute) {
    echo "<script>
        alert('Data berhasil dihapus!');
        window.location.href='?page=ikan_daftar';
    </script>";
} else {
    echo "<script>
        alert('Gagal menghapus data!');
        window.location.href='?page=ikan_daftar';
    </script>";
}