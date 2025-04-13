<?php
session_start();
if (!isset($_SESSION['username'])) {
  header("Location: login.php");
  exit;
}

echo "Halo, " . $_SESSION['username'] . "<br>";
echo "Role kamu: " . $_SESSION['role'] . "<br>";

if ($_SESSION['role'] == 'admin') {
  echo "<a href='admin-page.php'>Masuk ke halaman admin</a>";
} else {
  echo "<a href='user-page.php'>Masuk ke halaman user</a><br><br>";
}

echo "<a href='logout.php'>Logout</a>";
?>