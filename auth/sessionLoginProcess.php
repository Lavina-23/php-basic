<?php
include "../connection.php";

$username = $_POST['username'];
$password = md5($_POST['password']);


$sql = "SELECT * FROM user WHERE username='$username' and password='$password'";
$result = mysqli_query($conn, $sql);
$check = mysqli_num_rows($result);

if ($check > 0) {
  session_start();
  $_SESSION['username'] = $username;
  $_SESSION['status'] = 'login';
?>
  Anda berhasil login, silakan menuju
  <a href="homeSession.php">Halaman Home</a>
<?php
} else {
?>
  Gagal login, silakan login lagi
  <a href="sessionLoginForm.html">Halaman Login</a>
<?php
  echo mysqli_error($conn);
}
?>