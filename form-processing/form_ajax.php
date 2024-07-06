<!DOCTYPE html>
<html lang="en">

<head>
  <title>Contoh Form dengan PHP</title>
  <!-- CDN JQuery -->
  <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</head>

<body>
  <h2>Form Contoh</h2>
  <form id="myForm" action="advance_process.php" method="POST">
    <label for="buah">Pilih Buah</label>
    <select name="buah" id="buah">
      <option value="apel">Apel</option>
      <option value="pisang">Pisang</option>
      <option value="mangga">Mangga</option>
      <option value="jeruk">Jeruk</option>
    </select>

    <br>

    <label>Pilih Warna Favorit:</label><br>
    <input type="checkbox" name="warna[]" value="merah"> Merah<br>
    <input type="checkbox" name="warna[]" value="biru"> Biru<br>
    <input type="checkbox" name="warna[]" value="hijau"> Hijau<br>

    <br>

    <label>Jenis Kelamin:</label><br>
    <input type="radio" name="jenis_kelamin" value="laki-laki"> Laki-laki<br>
    <input type="radio" name="jenis_kelamin" value="perempuan"> Perempuan<br>

    <br>

    <input type="submit" value="Submit">
  </form>

  <div id="hasil">

  </div>

  <script>
    // JQuery
    // Agar saat form disubmit tidak perlu refresh page saat menampilkan formnya

    $(document).ready(function() {
      $("#myForm").submit(function(e) {
        e.preventDefault();

        var formData = $("#myForm").serialize();

        $.ajax({
          url: "advance_process.php",
          type: "POST",
          data: formData,
          success: function(response) {
            $("#hasil").html(response);
          }
        })
      })
    })
  </script>
</body>

</html>

<!-- 
$(document).ready(function() {...});
Fungsi ini memastikan bahwa kode di dalamnya hanya akan dijalankan setelah seluruh dokumen HTML telah dimuat sepenuhnya. Ini adalah cara standar untuk memastikan bahwa manipulasi DOM dilakukan hanya setelah dokumen siap.

$("#myForm").submit(function(e) {...});
Ini menambahkan event handler untuk event submit dari formulir dengan id myForm. Ketika formulir ini dikirim, fungsi yang disediakan akan dijalankan.

e.preventDefault();
e adalah event object yang diteruskan ke event handler. Memanggil preventDefault() pada event ini akan mencegah tindakan default dari event tersebut, yang dalam kasus ini adalah pengiriman formulir secara standar (yang akan memuat ulang halaman).

var formData = $("#myForm").serialize();
$("#myForm").serialize() mengumpulkan semua input dalam formulir dengan id myForm dan mengubahnya menjadi string yang sesuai untuk dikirimkan sebagai data dalam permintaan HTTP. Ini mengubah data formulir menjadi format URL encoded string, misalnya: nama=John&email=john%40example.com.

$.ajax({...});
Fungsi ini mengirimkan permintaan Ajax. Ini adalah inti dari pengiriman formulir tanpa memuat ulang halaman. Parameter yang diteruskan ke $.ajax adalah objek yang berisi konfigurasi permintaan Ajax tersebut.

url: "advance_process.php"
URL tujuan di mana data formulir akan dikirim. Dalam kasus ini, advance_process.php akan memproses data formulir.

type: "POST"
Metode HTTP yang digunakan untuk mengirim data. Di sini, metode POST digunakan karena biasanya digunakan untuk mengirim data yang akan diproses di server.

data: formData
Data yang akan dikirim dengan permintaan. formData adalah string yang dihasilkan oleh serialize().

success: function(response) {...}
Fungsi callback yang akan dijalankan jika permintaan berhasil. Parameter response adalah data yang dikembalikan oleh advance_process.php.

$("#hasil").html(response);
Dalam fungsi callback success, elemen dengan id hasil di halaman HTML akan diisi dengan respons dari server. Ini biasanya digunakan untuk menampilkan hasil pemrosesan formulir tanpa memuat ulang halaman. -->