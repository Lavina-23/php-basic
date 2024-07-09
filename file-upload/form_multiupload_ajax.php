<!DOCTYPE html>
<html lang="en">

<head>
  <title>Multiupload Dokumen dengan Ajax</title>
  <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</head>

<body>
  <h2>Unggah Dokumen</h2>
  <form id="multi-form-ajax" action="multi_upload_ajax.php" method="post" enctype="multipart/form-data">
    <input type="file" name="files[]" multiple="multiple" accept=".jpg,.jpeg,.png,.gif">
    <input type="submit" value="Unggah">
  </form>
  <div id="multi-status"></div>

  <script src="multi_upload.js"></script>
</body>

</html>