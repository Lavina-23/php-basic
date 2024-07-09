<?php

if (isset($_FILES['files'])) {
  $errors = array();
  $extensions = array("jpg", "jpeg", "png", "gif");
  $totalFile = count($_FILES['files']['name']);

  for ($i = 0; $i < $totalFile; $i++) {
    $fileName = $_FILES['files']['name'][$i];
    $file_tmp = $_FILES['files']['tmp_name'][$i];
    $file_size = $_FILES['files']['size'][$i];
    $targetFile = "uploads/" . $fileName;
    $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    if (in_array($fileType, $extensions) === false) {
      $errors[] = "Ekstensi file yang diizinkan adalah JPG, JPEG, PNG atau GIF.";
    }

    if ($file_size > 2097152) {
      $errors[] = "Ukuran file tidak boleh lebih dari 2MB";
    }

    if (empty($errors) == true) {
      if (move_uploaded_file($file_tmp, $targetFile)) {
        echo "File $fileName berhasil diunggah.<br>";
      }
    } else {
      echo implode(" ", $errors);
    }
  }
}
