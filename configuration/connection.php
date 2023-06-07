<?php
    $sever_name = "localhost"; 
    $user_name ="root";
    $password = "";
    $database_name = "accounts";
    $connection = new mysqli($sever_name, $user_name, $password, $database_name);   
    if($connection -> connect_error)
        die("Connection fail" .$connection->connect_error);
    else echo "<script>console.log('connection sucessfully');</script>";
?>