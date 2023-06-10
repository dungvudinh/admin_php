<?php
if ($_FILES['file']['error'] === UPLOAD_ERR_OK) {
  $tempFile = $_FILES['file']['name'];
  $uploadDir = 'app_form_images/';
  $targetFile = $uploadDir . $_FILES['file']['name'];
  echo $tempFile;
//   if (move_uploaded_file($tempFile, $targetFile)) {
//     echo 'File uploaded successfully.';
//   } else {
//     echo 'Error uploading file.';
//   }
}
// } else {
//   echo 'Error: ' . $_FILES['file']['error'];
// }
?>
