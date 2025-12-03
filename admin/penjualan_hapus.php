<?php


$idPenjualan = intval($_GET['id']);

// 1. ambil sub penjualan dulu
$sub = query("SELECT idIkan, jumlahPembelian FROM subPenjualan WHERE idPenjualan = $idPenjualan");

// 2. kembalikan stok ikan berdasarkan sub penjualan
foreach ($sub as $item) {
    $idIkan     = $item['idIkan'];
    $jumlahJual = $item['jumlahPembelian'];

    // ambil stok lama
    $q = query("SELECT stokIkan FROM ikan WHERE idIkan = $idIkan")[0]['stokIkan'];
    $stok = $q->fetchArray(SQLITE3_ASSOC)['stokIkan'];
    $stokBaru = $stok + $jumlahJual;

    // update stok
    $stmt = $db->prepare("UPDATE ikan SET stokIkan = :stok WHERE idIkan = :id");
    $stmt->bindValue(':stok', $stokBaru, SQLITE3_INTEGER);
    $stmt->bindValue(':id', $idIkan, SQLITE3_INTEGER);
    $stmt->execute();
}

// 3. hapus sub_penjualan
$stmt = $db->prepare("DELETE FROM subPenjualan WHERE idPenjualan = :id");
$stmt->bindValue(':id', $idPenjualan, SQLITE3_INTEGER);
$stmt->execute();

// 4. hapus penjualan
$stmt = $db->prepare("DELETE FROM penjualan WHERE idPenjualan = :id");
$stmt->bindValue(':id', $idPenjualan, SQLITE3_INTEGER);
$stmt->execute();

// 5. redirect balik
echo "<script>
        alert('Penjualan berhasil dihapus dan stok telah dikembalikan.');
        window.location.href='?page=penjualan_daftar';
      </script>";
?>
