<?php

$umur;
if (isset($umur) && $umur >= 18) {
  echo "Anda sudah dewasa";
} else {
  echo "Anda belum dewasa atau variabel 'umur' tidak ditemukan";
}

$data = array("nama" => "Jane", "usia" => 25);
if (isset($data["nama"])) {
  echo nl2br("\nNama: " . $data["nama"]);
} else {
  echo "Variabel 'nama' tidak ditemukan dalam array.";
}

// isset() untuk mengecek apakah value yang dicari sudah diisi/diset
// bedanya dengan empty() adalah dengan method empty() value 0 berarti true karena kosong
// pada method empty() yang dianggap kosong yaitu: 0, 0.0, "0", "", NULL, FALSE, array()
// sedangkan dengan isset() value 0 tetap dianggap sudah diisi, yaitu isinya ya angka 0