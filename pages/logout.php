<?php
    session_start();
    session_destroy();
    setcookie('status-login', 0, null, "/");
    header("Location:../pages/index/index.php");
?>