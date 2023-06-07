<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form id="myForm" method= "POST"  action="process.php">
  <select name="mySelect" id="mySelect" onchange="submitForm()">
    <option value="1">HCM</option>
    <option value="2">HN</option>
  </select>
  <button type="submit">Submit</button>
</form>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  function submitForm()
  {

    function submitForm() {
    var formData = $('#myForm').serialize(); // Serialize the form data

    $.ajax({
      type: 'POST', // Use the appropriate HTTP method (POST/GET)
      url: $('#myForm').attr('action'), // Use the form's action URL
      data: formData,
      success: function(response) {
        // Handle the response from the server
        console.log(response); // For testing/debugging
        // You can update the page or perform any other actions here
      },
      error: function(xhr, status, error) {
        // Handle errors here
        console.log(error); // For testing/debugging
      }
    });
  }
  }
</script>



</body>
</html>