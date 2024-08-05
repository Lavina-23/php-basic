<?php
session_start();
include './connection.php';
include './csrf.php';

$id = $_POST['id'];

$query = "DELETE FROM anggota WHERE id=?";
$sql = $connAjax->prepare($query);
$sql->bind_param("i", $id);
$sql->execute();

echo json_encode(['success' => 'Sukses']);
$connAjax->close();
