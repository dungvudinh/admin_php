<?php include("./configuration/connection.php")?>
<?php 
session_start();
if(!isset($_COOKIE['phone_number']))  header("Location:./login.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME</title>
    <link rel="stylesheet" href="../../css/style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <div class="layout">
        <?php include("./components/sidebar.php")?>
        <div class="content__wrapper">
            <h1>ENTER CONTENT HERE</h1>
        </div>
    </div>
</body>
</html>