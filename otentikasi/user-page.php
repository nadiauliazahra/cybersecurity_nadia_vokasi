<?php
session_start();

// Cek apakah user sudah login dan role-nya ada
if (!isset($_SESSION['username']) || !isset($_SESSION['role'])) {
  header("Location: login.php");
  exit;
}

// Cek apakah role-nya benar "user"
if ($_SESSION['role'] !== 'user') {
  echo "Akses ditolak. Halaman ini hanya untuk user biasa.";
  exit;
}

// Tampilkan isi halaman untuk user
echo "Halo, " . $_SESSION['username'] . "<br>";
echo "Role kamu: " . $_SESSION['role'] . "<br><br>";

echo "<hr><br>";

echo "<p>Ini adalah halaman khusus user biasa.</p><br>";

echo "<a href='logout.php'>Logout</a>";
?>
