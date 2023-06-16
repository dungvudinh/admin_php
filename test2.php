<!DOCTYPE html>
<html>
  <head>
    <title>Image Upload</title>
    <style>
      #image-preview {
        max-width: 200px;
        max-height: 200px;
        margin-top: 10px;
        cursor: pointer;
      }
      #image-input {
        display: none;
      }
    </style>
  </head>
  <body>
    <label for="image-input">
      <img id="image-preview" src="#" alt="Image Preview" onclick="openFileInput()" />
    </label>
    <input type="file" id="image-input" accept="image/*" onchange="previewImage(event)" />
    
    <script>
      function previewImage(event) {
        var reader = new FileReader();
        reader.onload = function() {
          var imagePreview = document.getElementById('image-preview');
          imagePreview.src = reader.result;
        }
        reader.readAsDataURL(event.target.files[0]);
      }
      
      function openFileInput() {
        var fileInput = document.getElementById('image-input');
        fileInput.click();
      }
    </script>
  </body>
</html>
