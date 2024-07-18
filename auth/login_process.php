<?php

include "../connection.php";

$username = $_POST['username'];
$password = md5($_POST['password']);

$query = "SELECT * FROM user WHERE username='$username' AND password='$password'";
$result = mysqli_query($conn, $query);
$check = mysqli_num_rows($result);

if ($check) {
  echo "Anda berhasil login, silakan menuju "; ?>
  <a href="home_admin.html">Halaman HOME</a>
<?php
} else {
  echo "Anda gagal login. Silakan "; ?>
  <a href="loginForm.html">Login Kembali</a>
<?php
  echo mysqli_errno($conn);
}
