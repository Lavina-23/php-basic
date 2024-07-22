<!DOCTYPE html>
<html lang="en">

<head>
  <title>Edit Member Data</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <?php
  include("../connection.php");

  $id = $_GET['id'];
  $query = "SELECT *FROM anggota WHERE id = $id";
  $result = mysqli_query($conn, $query);
  $row = mysqli_fetch_assoc($result);
  mysqli_close($conn);
  ?>
  <div class="container">
    <h2>Edit Member Data</h2>
    <form action="process.php?action=edit" method="post">
      <input type="text" name="id" value="<?php echo $row['id']; ?>">
      <label for="nama">Name:</label>
      <input type="text" name="nama" id="nama" value="<?php echo $row['nama']; ?>" required>
      <label for="jenis_kelamin">Gender:</label>
      <div class="radio-group">
        <input type="radio" name="jenis_kelamin" id="laki" value="L" <?php if ($row['jenis_kelamin'] === 'L') echo 'checked'; ?> required>
        <label for="laki">Laki-laki</label>
        <input type="radio" name="jenis_kelamin" id="perempuan" value="P" <?php if ($row['jenis_kelamin'] === 'P') echo 'checked'; ?> required>
        <label for="perempuan">Perempuan</label>
      </div>
      <label for="alamat">Address:</label>
      <input type="text" name="alamat" id="alamat" value="<?php echo $row['alamat']; ?>" required>
      <label for="no_telp">Phone Number</label>
      <input type="text" name="no_telp" id="no_telp" value="<?php echo $row['no_telp']; ?>" required>
      <button type="submit">Save Change</button> <a href="index.php" class="btn-kembali">Back</a>
    </form>
  </div>
</body>

</html>