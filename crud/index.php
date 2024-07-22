<!DOCTYPE html>
<html lang="en">

<head>
  <title>Members Data</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <div class="container">
    <h2>Members Data</h2>
    <a href="create.php" class="btn-tambah">Add Members</a>


    <?php
    include '../connection.php';

    $query = "SELECT * FROM anggota order by id desc";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
      $no = 1;
      echo '<table>';
      echo '<tr><th>No</th>
      <th>Name</th>
      <th>Gender</th>
      <th>Address</th>
      <th>Phone Number</th>
      <th>Action</th></tr>';

      while ($row = mysqli_fetch_array($result)) {
        $gender = ($row["jenis_kelamin"] === 'L' ? 'Laki-laki' : 'Perempuan');
        echo
        '<tr>
            <td>' . $no++ . '</td>
            <td>' . $row["nama"] . '</td>
            <td>' . $gender . '</td>
            <td>' . $row["alamat"] . '</td>
            <td>' . $row["no_telp"] . '</td>
            <td> 
              <a href="edit.php?id=' . $row['id'] . '">Edit</a>
                |
              <a href="#" onclick="konfirmasiHapus(' . $row['id'] . ', \'' . $row['nama'] . '\')">Hapus</a>
            </td>
        </tr>';
      }
      echo '</table>';
    } else {
      echo 'No data!';
    }
    mysqli_close($conn);
    ?>
  </div>

  <script>
    function konfirmasiHapus(id, nama) {
      var konfirmasi = confirm("Are you sure to delete data by name " + nama + "?");
      if (konfirmasi) {
        window.location.href = "process.php?action=delete&id=" + id;
      }
    }
  </script>
</body>

</html>