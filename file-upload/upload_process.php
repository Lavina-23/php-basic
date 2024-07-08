<?php

$targetDirectory = "documents/";

if (!file_exists($targetDirectory)) {
  mkdir($targetDirectory, 0777, true);
}

if ($_FILES['files']['name'][0]) {
  $totalFile = count($_FILES['files']['name']);

  for ($i = 0; $i < $totalFile; $i++) {
    $fileName = $_FILES['files']['name'][$i];
    $targetFile = $targetDirectory . $fileName;

    if (move_uploaded_file($_FILES['files']['tmp_name'][$i], $targetFile)) {
      echo "File $fileName berhasil diunggah.<br>";
    } else {
      echo "Gagal mengunggah file $fileName.<br>";
    }
  }
} else {
  echo "Tidak ada file yang diunggah";
}


// Izin `0777` terdiri dari tiga digit, masing-masing digit mewakili izin untuk pengguna (owner), grup, dan lainnya (others):
// - Owner (Pemilik): Izin pertama (7) mewakili izin untuk pemilik file atau direktori.
// - Group (Grup): Izin kedua (7) mewakili izin untuk grup yang terkait dengan file atau direktori.
// - Others (Lainnya): Izin ketiga (7) mewakili izin untuk semua pengguna lainnya.

### Izin Angka
// Setiap digit dalam izin terdiri dari kombinasi dari tiga jenis izin:
// - 4 (r): Read (baca)
// - 2 (w): Write (tulis)
// - 1 (x): Execute (eksekusi)

// Kombinasi dari izin tersebut dapat menghasilkan angka:
// - 7: Read (4) + Write (2) + Execute (1) = 4 + 2 + 1 = 7 (izin penuh)
// - 6: Read (4) + Write (2) = 4 + 2 = 6
// - 5: Read (4) + Execute (1) = 4 + 1 = 5
// - 4: Read (4) = 4
// - 3: Write (2) + Execute (1) = 2 + 1 = 3
// - 2: Write (2) = 2
// - 1: Execute (1) = 1
// - 0: Tidak ada izin

### Izin `0777`
// Dengan izin `0777`, berikut ini adalah rincian izinnya:
// - Owner (Pemilik): 7 (izin penuh: read, write, execute)
// - Group (Grup): 7 (izin penuh: read, write, execute)
// - Others (Lainnya): 7 (izin penuh: read, write, execute)
