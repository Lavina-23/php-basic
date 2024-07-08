<!DOCTYPE html>
<html lang="en">

<head>
  <title>Unggah File Dokumen</title>
  <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</head>

<body>
  <form id="form-ajax" action="upload_ajax.php" method="post" enctype="multipart/form-data">
    <input type="file" name="file" id="file">
    <input type="submit" name="submit" value="Unggah">
  </form>
  <div id="status"></div>

  <script src="upload.js"></script>
</body>

</html>