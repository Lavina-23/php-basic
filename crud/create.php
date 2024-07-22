<!DOCTYPE html>
<html lang="en">

<head>
  <title>Add New Member</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <div class="container">
    <h2>Add Member Data</h2>
    <form action="process.php?action=add" method="post">
      <label for="nama">Name:</label>
      <input type="text" name="nama" id="nama" required>
      <label for="jenis_kelamin">Gender:</label>
      <div class="radio-group">
        <input type="radio" name="jenis_kelamin" value="L" id="laki" required><label for="laki">Laki-laki</label>
        <input type="radio" name="jenis_kelamin" value="P" id="perempuan" required><label for="perempuan">Perempuan</label>
      </div>
      <label for="alamat">Address:</label>
      <input type="text" name="alamat" id="alamat" required>
      <label for="no_telp">Phone Number:</label>
      <input type="text" name="no_telp" id="no_telp" required>
      <button type="submit">Save Data</button>
      <a href="index.php" class="btn-kembali">Back</a>
    </form>
  </div>
</body>

</html>