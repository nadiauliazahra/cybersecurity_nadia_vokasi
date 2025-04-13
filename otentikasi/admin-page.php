<?php
session_start();

// Cek apakah user sudah login dan punya role
if (!isset($_SESSION['username']) || !isset($_SESSION['role'])) {
  header("Location: login.php");
  exit;
}

// Cek apakah role-nya "admin"
if ($_SESSION['role'] !== 'admin') {
  echo "Akses ditolak. Halaman ini hanya untuk admin.";
  exit;
}

// Tampilkan isi halaman untuk admin
echo "Halo, " . $_SESSION['username'] . "<br>";
echo "Role kamu: " . $_SESSION['role'] . "<br><br>";

echo "<hr><br>";

echo "<p>Ini adalah halaman khusus admin. Di sini kamu bisa kelola semua data.</p><br>";

echo "<a href='logout.php'>Logout</a>";
?>
