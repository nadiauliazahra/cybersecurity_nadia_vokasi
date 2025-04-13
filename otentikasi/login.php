<?php
session_start();
include 'koneksi.php'; // file koneksi ke MySQL

if (isset($_POST['login'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];

  $query = mysqli_query($conn, "SELECT * FROM users WHERE username='$username'");
  $user = mysqli_fetch_assoc($query);

  $input_role = $_POST['role'];

if ($user && password_verify($password, $user['password'])) {
  if ($user['role'] == $input_role) {
    $_SESSION['username'] = $user['username'];
    $_SESSION['role'] = $user['role'];
    header("Location: dashboard.php");
  } else {
    echo "Role tidak sesuai dengan akun ini.";
  }
} else {
  echo "Login gagal. Username atau password salah.";
}

}
?>

<form method="POST">
  <input type="text" name="username" placeholder="Username" required><br>
  <input type="password" name="password" placeholder="Password" required><br>

  <select name="role" required>
    <option value="">-- Pilih Role --</option>
    <option value="admin">Admin</option>
    <option value="user">User</option>
  </select><br>

  <button type="submit" name="login">Login</button>
</form>


