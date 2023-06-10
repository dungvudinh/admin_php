<?php
include("../configuration/connection.php");
if(isset($_POST['app-form_id']))
    $sql = "UPDATE app_form_client SET isReceived = 1 WHERE id = ".$_POST['app-form_id']."";
if(isset($_POST['execute-status']) && isset($_POST['app-form_id']))
    $sql = "UPDATE app_form_client SET isAccept = ".$_POST['execute-status']." WHERE id = ".$_POST['app-form_id']."";
if(isset($_POST['load-more']))
{
    if($_POST['load-more'] == 'event')
    {
        $sql = "SELECT * FROM su_kien";
    } 
    if($_POST['load-more'] == 'app-form_client')
    {
        $sql = "SELECT * FROM app_form_client";
    }
    if($_POST['load-more'] == 'repair_form')
    {
        $sql = "SELECT * FROM repair_form";
    }
}
if(isset($_POST['repair-status']))
{
    echo $_POST['repair-status'];   
    echo $_POST['form-repair_id'];
    $sql = "UPDATE repair_form SET repair_status = ". $_POST['repair-status']." WHERE id  = ".$_POST['form-repair_id']."";
    echo $sql;
}
if ($_FILES['file']['error'] === UPLOAD_ERR_OK) {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $start_time =$_POST['start_time'];
    $end_time = $_POST['end_time'];
    $filename = $_FILES['file']['name'];
    $tempFile = $_FILES['file']['tmp_name'];
    // $uploadDir = 'uploads/';
    // $targetFile = $uploadDir . $_FILES['file']['name'];
   echo  $filename;
  }
// $connection->query($sql);
?>  
