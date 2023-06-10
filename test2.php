<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form id="fileUploadForm" method="post" enctype="multipart/form-data">
  <input type="file" name="file" id="fileInput">
  <input type="submit" value="Upload">
</form>
<div id="uploadStatus"></div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $(document).ready(function() {
  $('#fileUploadForm').on('submit', function(e) {
    e.preventDefault(); // Prevent the default form submission

    var formData = new FormData(this); // Create a new form data object
    $.ajax({
      url: 'process.php', // PHP script to handle the file upload
      type: 'POST',
      data: formData,
      processData: false,
      contentType: false,
      beforeSend: function() {
        $('#uploadStatus').html('Uploading file...'); // Display a loading message
      },
      success: function(response) {
        $('#uploadStatus').html(response); // Display the response from the server
      }
    });
  });
});

</script>
</body>
</html>