<?php
session_start();

// Hapus semua variabel sesi
$_SESSION = array();

// Hancurkan sesi sepenuhnya
session_destroy();

// Redirect kembali ke halaman login
// Sesuaikan path ke file login.php
header("Location: login.php"); 
exit;
?>