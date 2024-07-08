<?php

if (isset($_POST["submit"])) {
  $targetDirectory = "uploads/";
  $targetFile = $targetDirectory . basename($_FILES['fileToUpload']['name']); // misal, hasilnya nanti jadi: uploads/example.jpg
  $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
  // strtolower() menjadikan string jadi lower case
  // pathinfo() untuk mengakses semua informasi dari file yang diupload

  $allowedExtensions = array("jpg", "jpeg", "png", "gif");
  $maxFileSize = 5 * 1024 * 1024;

  if (in_array($fileType, $allowedExtensions) && $_FILES["fileToUpload"]["size"] <= $maxFileSize) {
    if (move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $targetFile)) {
      // move dari temporary directory yang ada di server ke lokasi direktori kita
      // jadi ['tmp_name'] itu mengakses lokasi temp dir di server lalu dipindah ke $targetFile

      echo "File berhasil diunggah.";
    } else {
      echo "Gagal mengunggah file.";
    }
  } else {
    echo "File tidak valid atau melebihi ukuran maksimum yang diizinkan.";
  }
}

// $_FILES['nama_input'] = [
//     'name' => 'nama_file.ext',      // Nama file asli
//     'type' => 'mime/type',          // Tipe MIME file
//     'tmp_name' => 'path/to/tmp',    // Lokasi sementara file yang diunggah di server
//     'error' => 0,                   // Kode kesalahan yang menunjukkan apakah ada masalah dengan unggahan
//     'size' => 12345                 // Ukuran file dalam byte
// ];

// pathinfo() isinya =
// Directory: uploads
// Basename: example.txt
// Extension: txt
// Filename: example
