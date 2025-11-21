<?php
require '../function/koneksi.php';
// Ambil semua nama tabel di database
$tables = [];
$result = $db->query("SELECT name FROM sqlite_master WHERE type='table' AND name NOT LIKE 'sqlite_%'");

while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
    $tables[] = $row['name'];
}

echo "<h1>Daftar Tabel & Isi Data</h1>";
echo "<hr>";

foreach ($tables as $table) {
    echo "<h2>Tabel: <b>$table</b></h2>";

    // ============================
    // Tampilkan struktur tabel
    // ============================
    echo "<h3>Struktur Field</h3>";
    $pragma = $db->query("PRAGMA table_info($table)");

    echo "<table border='1' cellpadding='6' cellspacing='0'>";
    echo "<tr>
            <th>cid</th>
            <th>Nama Field</th>
            <th>Tipe</th>
            <th>Not Null</th>
            <th>Default</th>
            <th>Primary Key</th>
          </tr>";

    while ($col = $pragma->fetchArray(SQLITE3_ASSOC)) {
        echo "<tr>";
        echo "<td>".$col['cid']."</td>";
        echo "<td>".$col['name']."</td>";
        echo "<td>".$col['type']."</td>";
        echo "<td>".($col['notnull'] ? "YES" : "NO")."</td>";
        echo "<td>".$col['dflt_value']."</td>";
        echo "<td>".($col['pk'] ? "YES" : "NO")."</td>";
        echo "</tr>";
    }
    echo "</table>";

    // ============================
    // Tampilkan isi data tabel
    // ============================
    echo "<h3>Isi Data</h3>";

    $rows = $db->query("SELECT * FROM $table");
    $firstRow = $rows->fetchArray(SQLITE3_ASSOC);

    if (!$firstRow) {
        echo "<p><i>Tidak ada data.</i></p>";
    } else {
        // Header tabel
        echo "<table border='1' cellpadding='6' cellspacing='0'><tr>";
        foreach ($firstRow as $colName => $value) {
            echo "<th>$colName</th>";
        }
        echo "</tr>";

        // Tampilkan first row
        echo "<tr>";
        foreach ($firstRow as $value) {
            echo "<td>".htmlspecialchars($value)."</td>";
        }
        echo "</tr>";

        // Tampilkan row selanjutnya
        while ($row = $rows->fetchArray(SQLITE3_ASSOC)) {
            echo "<tr>";
            foreach ($row as $value) {
                echo "<td>".htmlspecialchars($value)."</td>";
            }
            echo "</tr>";
        }

        echo "</table>";
    }

    echo "<hr>";
}
?>
