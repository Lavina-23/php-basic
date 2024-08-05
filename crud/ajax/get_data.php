<?php
session_start();
include './connection.php';
include './csrf.php';

$id = $_POST['id'];
$query = "SELECT * FROM anggota WHERE id=? ORDER BY id DESC";
$sql = $connAjax->prepare($query);
$sql->bind_param('i', $id);
$sql->execute();
$resl = $sql->get_result();
while ($row = $resl->fetch_assoc()) {
  $h['id'] = $row["id"];
  $h['nama'] = $row["nama"];
  $h['jenis_kelamin'] = $row["jenis_kelamin"];
  $h['alamat'] = $row["alamat"];
  $h['no_telp'] = $row["no_telp"];
}

echo json_encode($h);

$connAjax->close();
