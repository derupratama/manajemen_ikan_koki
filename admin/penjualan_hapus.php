<?php


$idPenjualan = intval($_GET['id']);

$sub = query("SELECT idIkan, jumlahPembelian FROM subPenjualan WHERE idPenjualan = $idPenjualan");

foreach ($sub as $item) {
    $idIkan     = $item['idIkan'];
    $jumlahJual = $item['jumlahPembelian'];

    $q = query("SELECT stokIkan FROM ikan WHERE idIkan = $idIkan")[0]['stokIkan'];
    $stokBaru = $q + $jumlahJual;

    $stmt = $db->prepare("UPDATE ikan SET stokIkan = :stok WHERE idIkan = :id");
    $stmt->bindValue(':stok', $stokBaru, SQLITE3_INTEGER);
    $stmt->bindValue(':id', $idIkan, SQLITE3_INTEGER);
    $stmt->execute();
}

$stmt = $db->prepare("DELETE FROM subPenjualan WHERE idPenjualan = :id");
$stmt->bindValue(':id', $idPenjualan, SQLITE3_INTEGER);
$stmt->execute();

$stmt = $db->prepare("DELETE FROM penjualan WHERE idPenjualan = :id");
$stmt->bindValue(':id', $idPenjualan, SQLITE3_INTEGER);
$stmt->execute();

echo "<script>
        alert('Penjualan berhasil dihapus dan stok telah dikembalikan.');
        window.location.href='?page=penjualan_daftar';
      </script>";
?>
