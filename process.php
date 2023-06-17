<?php
include("./configuration/connection.php");
if(isset($_POST['user_id']))
{
  $status_option = $_POST['status_option'];
  $ban_option = $_POST['ban_option'];
  $permission_option =  $_POST['permission_option'];
  echo  $permission_option;
  $user_id = $_POST['user_id'];
  $sql =  "UPDATE users SET MaCV  = ". $permission_option.",  status=".$status_option.", MaBan = ".$ban_option." WHERE  account_id = ".$user_id."";
  mysqli_query($connection, $sql);
}

?>
