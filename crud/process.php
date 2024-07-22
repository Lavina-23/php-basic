<?php
include '../connection.php';

$action = $_GET['action'];
$nama = $_POST['nama'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$alamat = $_POST['alamat'];
$no_telp = $_POST['no_telp'];

if ($action == 'add') {
  $query = "INSERT INTO anggota (nama, jenis_kelamin, alamat, no_telp) VALUES ('$nama', '$jenis_kelamin', '$alamat', '$no_telp')";
  if (mysqli_query($conn, $query)) {
    header('Location: index.php');
    exit();
  } else {
    echo 'Failed to add data: ' . mysqli_error($conn);
  }
} else if ($action == 'edit') {
  if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $query = "UPDATE anggota SET nama='$nama', jenis_kelamin='$jenis_kelamin', alamat='$alamat', no_telp='$no_telp' WHERE id = '$id'";

    if (mysqli_query($conn, $query)) {
      header("Location: index.php");
      exit();
    } else {
      echo "Update failed: " . mysqli_error($conn);
    }
  } else {
    echo "Unvalid ID";
  }
} else if ($action == 'delete') {
  if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "DELETE FROM anggota WHERE id=$id";

    if (mysqli_query($conn, $query)) {
      header("Location: index.php");
      exit();
    } else {
      echo "Delete Failed:" . mysqli_error($conn);
    }
  } else {
    echo "Unvalid ID";
  }
}

mysqli_close($conn);
