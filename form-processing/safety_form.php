<!DOCTYPE html>
<html>

<head>
  <title>Form Input PHP</title>
</head>

<body>
  <h2>Form Input PHP</h2>
  <?php
  $namaErr = "";
  $nama = "";
  $email = "";

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["nama"])) {
      $namaErr = "Nama harus diisi!";
    } else {
      $nama = $_POST['nama'];
      $nama = htmlspecialchars($nama, ENT_QUOTES, 'UTF-8');
      // inputan untuk nama, akan dijadikan text html

      echo "Data berhasil disimpan";
    }

    $email = $_POST['email'];
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
      // ya untuk memastikan inputannya berupa email

      $email = htmlspecialchars($email);
      echo "<br>" . $email;
    } else {
      echo "Bukan email !";
    }
  }

  ?>
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <label for="nama">Nama: </label>
    <input type="text" name="nama" id="nama" value="<?php echo $nama; ?>"><br><br>
    <span class="error"><?php echo $namaErr; ?></span><br><br>
    <input type="email" name="email" id="email" value="<?php echo $email; ?>"><br><br>

    <input type="submit" name="submit" value="Submit">
  </form>
</body>

</html>