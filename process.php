<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $inputs = $_POST['myInput'];

  foreach ($inputs as $input) {
    echo $input . "<br>";
  }
}
?>
