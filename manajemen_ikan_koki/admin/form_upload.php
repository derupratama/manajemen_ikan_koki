<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Koneksi SQLite

include '../function/koneksi.php';

$pesan = '';
$gambar = null;

if (isset($_FILES['gambar'])) {
    $result = uploadGambar($_FILES['gambar'], $db);

    if ($result['status']) {
        $gambar = $result['file'];
        $pesan = "Upload berhasil! Nama file: " . $gambar;
    } else {
        $pesan = "Error: " . $result['msg'];
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Form Upload Gambar</title>
</head>
<body>
    <h2>Form Upload Gambar</h2>

    <?php if ($pesan != ''): ?>
        <p><?php echo $pesan; ?></p>
    <?php endif; ?>

    <form method="post" enctype="multipart/form-data">
        Pilih gambar: <input type="file" name="gambar" required>
        <button type="submit">Upload</button>
    </form>

    <?php if ($gambar != null): ?>
        <h3>Preview:</h3>
        <img src="../assets/img/ikan/<?php echo $gambar; ?>" style="max-width:300px;">
    <?php endif; ?>
</body>
</html>
