<?php

include "../connection.php";

$username = $_POST['username'];
$password = md5($_POST['password']);

$query = "SELECT * FROM user WHERE username='$username' AND password='$password'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

if ($row['level'] == 1) {
  echo "Anda berhasil login, silakan menuju "; ?>
  <a href="home_admin.html">Halaman HOME</a>
<?php
} else if ($row['level'] == 2) {
  echo "Anda berhasil login, silakan menuju "; ?>
  <a href="home_guest.html">Halaman HOME</a>
<?php
} else {
  echo "Anda gagal login. Silakan "; ?>
  <a href="loginForm.html">Login Kembali</a>
<?php
  echo mysqli_errno($conn);
}
