<?php
include 'auth.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="<?= $_SESSION['csrf_token'] ?>">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
  <title>Member Data</title>
</head>

<body>
  <nav class="navbar navbar-dark bg-primary">
    <a href="index.php" class="navbar-brand" style="color: #fff;">
      CRUD with Ajax
    </a>
  </nav>

  <div class="container">
    <h2 style="text-align: center; margin: 30px;">Member Data</h2>

    <form id="form-data" method="post" class="form-data">
      <div class="row">
        <div class="col-sm-9">
          <div class="form-group">
            <label>Name</label>
            <input type="hidden" name="id" id="id">
            <input type="text" name="nama" id="nama" required="true" class="form-control">
            <p class="text-danger" id="err_nama"></p>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="form-group">
            <label>Gender</label>
            <br>
            <input type="radio" name="jenis_kelamin" id="jenkel1" value="L" required>Laki-laki
            <input type="radio" name="jenis_kelamin" id="jenkel2" value="P">Perempuan
            <p class="text-danger" id="err_jenis_kelamin"></p>
          </div>
        </div>
      </div>

      <div class="form-group">
        <label>Address</label>
        <textarea name="alamat" id="alamat" class="form-control" required="true"></textarea>
        <p class="text-danger" id="err_alamat"></p>
      </div>

      <div class="form-group">
        <label>Phone Number</label>
        <input type="number" name="no_telp" id="no_telp" class="form-control" required="true">
        <p class="text-danger" id="err_no_telp"></p>
      </div>

      <div class="form-group">
        <button class="btn btn-primary" type="button" name="simpan" id="simpan">
          <i class="fa fa-save"></i> Save
        </button>
      </div>
    </form>
    <hr>

    <div class="data"></div>
  </div>

  <!-- JQuery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <!-- DataTables -->
  <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

  <script type="text/javascript">
    $(document).ready(function() {
      $.ajaxSetup({
        headers: {
          'Csrf-Token': $('meta[name="csrf-token"]').attr('content')
        }
      });
      $('.data').load("data.php");
      $("#simpan").click(function() {
        var data = $('.form-data').serialize();
        var nama = document.getElementById("nama").value;
        var jenkel1 = document.getElementById("jenkel1").checked;
        var jenkel2 = document.getElementById("jenkel2").checked;
        var alamat = document.getElementById("alamat").value;
        var no_telp = document.getElementById("no_telp").value;

        console.log(jenkel1);

        if (nama == "") {
          document.getElementById("err_nama").innerHTML = "Name is required !";
        } else {
          document.getElementById("err_nama").innerHTML = "";
        }

        if (alamat == "") {
          document.getElementById("err_alamat").innerHTML = "Address is required !";
        } else {
          document.getElementById("err_alamat").innerHTML = "";
        }

        if (!jenkel1 && !jenkel2) {
          document.getElementById("err_jenis_kelamin").innerHTML = "Gender must be selected";
        } else {
          document.getElementById("err_jenis_kelamin").innerHTML = "";
        }

        if (no_telp == "") {
          document.getElementById("err_no_telp").innerHTML = "Phone number is required !";
        } else {
          document.getElementById("err_no_telp").innerHTML = "";
        }

        if (nama != "" && (jenkel1 || jenkel2) && alamat != "" && no_telp != "") {
          $.ajax({
            type: 'POST',
            url: "form_action.php",
            data: data,
            success: function() {
              $('.data').load("data.php");
              document.getElementById("id").value = "";
              document.getElementById("form-data").reset();
            },
            error: function(response) {
              console.log(response.responseText);
            }
          })
        }

      })
    })
  </script>
</body>

</html>