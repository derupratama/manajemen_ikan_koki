<?php
// ================================
// KONEKSI DATABASE
// ================================
session_start();
chdir(__DIR__);
$db = new SQLite3(__DIR__ . 'ikankoki.sqlite');
$db->exec("PRAGMA foreign_keys = ON;");


// ================================
// TABEL ADMIN
// ================================
$db->exec("
    CREATE TABLE IF NOT EXISTS admin (
        idAdmin INTEGER PRIMARY KEY AUTOINCREMENT,
        username TEXT NOT NULL UNIQUE,
        name TEXT NOT NULL,
        password TEXT NOT NULL
    )
");

// ================================
// TABEL JENIS IKAN
// ================================
$db->exec("
    CREATE TABLE IF NOT EXISTS jenisIkan (
        idJenisIkan INTEGER PRIMARY KEY AUTOINCREMENT,
        jenisIkan TEXT NOT NULL
    )
");

// ================================
// TABEL IKAN
// ================================
$db->exec("
    CREATE TABLE IF NOT EXISTS ikan (
        idIkan INTEGER PRIMARY KEY AUTOINCREMENT,
        idJenisIkan INTEGER NOT NULL,
        ukuran TEXT,
        gender TEXT,
        stokIkan INTEGER,
        harga INTEGER,
        deskripsi TEXT,
        gambarIkan TEXT,
        FOREIGN KEY(idJenisIkan) REFERENCES JenisIkan(idJenisIkan)
    )
");

// ================================
// TABEL PENJUALAN
// ================================
$db->exec("
    CREATE TABLE IF NOT EXISTS penjualan (
        idPenjualan INTEGER PRIMARY KEY AUTOINCREMENT,
        tanggalPenjualan TEXT NOT NULL,
        totalHarga INTEGER,
        statusPenjualan TEXT,
        idAdmin INTEGER NOT NULL,
        FOREIGN KEY(idAdmin) REFERENCES Admin(idAdmin)
    )
");

// // ================================
// // TABEL SUB PENJUALAN
// // ================================
// $db->exec("
//     CREATE TABLE IF NOT EXISTS subPenjualan (
//         idSubPenjualan INTEGER PRIMARY KEY AUTOINCREMENT,
//         idPenjualan INTEGER NOT NULL,
//         idIkan INTEGER NOT NULL,
//         jumlahPembelian INTEGER NOT NULL,
//         FOREIGN KEY(idPenjualan) REFERENCES Penjualan(idPenjualan),
//         FOREIGN KEY(idIkan) REFERENCES Ikan(idIkan)
//     )
// ");

// // INSERT Admin
// $db->exec("
//     INSERT INTO Admin (username, name, password) VALUES
//     ('admin1', 'Nova Arundyna', 'admin123'),
//     ('admin2', 'Akmal Saputra', 'kucingmanis')
// ");

// // INSERT Jenis Ikan
// $db->exec("
//     INSERT INTO JenisIkan (jenisIkan) VALUES
//     ('Oranda'), ('Ryukin'), ('Ranchu'),
//     ('Koki Mata Balon'), ('Koki Black Moor')
// ");

// // INSERT Ikan
// $db->exec("
//     INSERT INTO Ikan (idJenisIkan, ukuran, gender,stokIkan, harga, deskripsi, gambarIkan) VALUES
//     (1, '10 cm', 'Male', 5, 150000, 'Oranda merah sehat', 'oranda1.jpg'),
//     (1, '12 cm', 'Female', 7, 180000, 'Oranda premium', 'oranda2.jpg'),
//     (2, '9 cm', 'Male', 9, 120000, 'Ryukin bungkuk', 'ryukin1.jpg'),
//     (2, '11 cm', 'Female', 140000, 8, 'Ryukin merah putih', 'ryukin2.jpg'),
//     (3, '8 cm', 'Male', 12, 100000, 'Ranchu ekor pendek', 'ranchu1.jpg'),
//     (3, '10 cm', 'Female', 10, 130000, 'Ranchu impor', 'ranchu2.jpg'),
//     (4, '7 cm', 'Male', 12, 90000, 'Mata balon kuning', 'balon1.jpg'),
//     (4, '8 cm', 'Female', 13, 110000, 'Mata balon premium', 'balon2.jpg'),
//     (5, '9 cm', 'Male', 9, 125000, 'Black Moor hitam pekat', 'moore1.jpg'),
//     (5, '11 cm', 'Female', 8, 150000, 'Black Moor kontes', 'moore2.jpg')
// ");

// // INSERT Penjualan
// $db->exec("
//     INSERT INTO Penjualan (tanggalPenjualan, totalHarga, statusPenjualan, idAdmin) VALUES
//     ('2025-11-20', 300000, 'Selesai', 1),
//     ('2025-11-21', 450000, 'Diproses', 1),
//     ('2025-11-22', 250000, 'Selesai', 2)
// ");

// // INSERT SubPenjualan
// $db->exec("
//     INSERT INTO SubPenjualan (idPenjualan, idIkan, jumlahPembelian) VALUES
//     (1, 1, 1),
//     (1, 3, 1),
//     (1, 7, 1),
//     (2, 2, 1),
//     (2, 6, 1),
//     (2, 10, 1),
//     (3, 5, 1),
//     (3, 8, 1)
// ");

function query($sql) {
    global $db;

    if (stripos($sql, 'select') === 0) {
        $result = $db->query($sql);
        $rows = [];

        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
            $rows[] = $row;
        }

        return $rows; 
    } else {
        return $db->exec($sql);
    }
}
// $hash = password_hash("admin", PASSWORD_DEFAULT);
// $db->exec("
//     INSERT INTO admin (username, name, password)
//     VALUES ('admin', 'Administrator', '$hash')
// ");
