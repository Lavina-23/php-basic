$(document).ready(function () {
  $('#multi-form-ajax').submit(function (e) {
    e.preventDefault();

    var formData = new FormData(this);

    $.ajax({
      type: 'POST',
      url: 'multi_upload_ajax.php',
      data: formData,
      cache: false,
      contentType: false,
      processData: false,
      success: function (response) {
        $('#multi-status').html(response);
      },
      error: function () {
        $('#multi-status').html('Terjadi kesalahan saat mengunggah file.');
      },
    });
  });
});
