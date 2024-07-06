<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // $_SERVER adalah variabel superglobal, mirip dictionary(?) karena berisi key dan value
  // "REQUEST_METHOD" adalah key dan "POST" adalah value

  $nama = $_POST["nama"];
  $email = $_POST["email"];

  echo "Nama: " . $nama . "<br>";
  echo "Email: " . $email;
}
