<!DOCTYPE html>
<html lang="en">

<head>
  <title>Document</title>
  <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</head>

<body>
  <h1>Form Input dengan</h1>
  <form id="myForm" action="validation_process.php" method="post">
    <label for="nama">Nama:</label>
    <input type="text" name="nama" id="nama">
    <span id="nama-error" style="color: red;"></span>
    <br>

    <label for="email">Email:</label>
    <input type="text" name="email" id="email">
    <span id="email-error" style="color: red;"></span>
    <br>

    <label for="password">Password:</label>
    <input type="password" name="password" id="password">
    <span id="password-error" style="color: red;"></span>
    <br>

    <input type="submit" value="Submit">
  </form>

  <div id="hasil"></div>

  <script>
    $(document).ready(function() {
      $("#myForm").submit(function(event) {
        var nama = $("#nama").val();
        var email = $("#email").val();
        var password = $("#password").val();
        var valid = true;

        var formData = {
          nama: nama,
          email: email,
          password: password
        };

        // var formData = $("#myForm").serialize();
        // Line 34 - 37 bisa disingkat menjadi -> var formData = $("#myForm").serialize();

        if (nama === "") {
          $("#nama-error").text("Nama harus diisi.");
          valid = false;
        } else {
          $("#nama-error").text("");
        }

        if (email === "") {
          $("#email-error").text("Email harus diisi.");
          valid = false;
        } else {
          $("#email-error").text("");
        }

        if (password === "") {
          $("#password-error").text("Password harus diisi.");
          valid = false;
        } else if (password.length < 8) {
          $("#password-error").text("Password harus 8 karakter.");
          valid = false;
        } else {
          $("#email-error").text("");
        }

        if (!valid) {
          event.preventDefault();
          return;
        }

        $.ajax({
          url: "advance_process.php",
          type: "POST",
          data: formData,
          success: function(response) {
            $("#hasil").html(response);
          },
          error: function(xhr, status, error) {
            $("#hasil").html("Terjadi error: " + error);
          }
        })
      })
    })
  </script>
</body>

</html>