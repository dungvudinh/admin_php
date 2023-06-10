<?php
    $sever_name = "localhost"; 
    $user_name ="root";
    $password = "";
    $database_name = "it-supporter";
    $connection = new mysqli($sever_name, $user_name, $password, $database_name);   
    mysqli_set_charset($connection, 'UTF8');
    if($connection -> connect_error)
        die("Connection fail" .$connection->connect_error);
    
?>