<?php
include("../configuration/connection.php");
session_start();
date_default_timezone_set('Asia/Ho_Chi_Minh');
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

if(isset($_FILES['file']))
{
    if ($_FILES['file']['error'] === UPLOAD_ERR_OK) {
        $title = $_POST['title'];
        $content = $_POST['content'];
        $start_time =$_POST['start_time'];
        $end_time = $_POST['end_time'];
        $filename = $_FILES['file']['name'];
        $tempFile = $_FILES['file']['tmp_name'];
        $imageFileType = strtolower(pathinfo($filename,PATHINFO_EXTENSION));
        $datetime = date("YmdHms");
        $createAt = date("y-m-d H:m:s");
        $imageUrl = $datetime.".".$imageFileType;
        $folder = "../app_form_images/".$imageUrl;  
        $sql = "INSERT INTO app_form_server(title, content, image_url, start_time,  end_time, create_at) VALUES('".$title."', '".$content."', '".$imageUrl."', '".$start_time."', '".$end_time."', '".$createAt."')";
        move_uploaded_file($tempFile , $folder);
      }
}

if(isset($_POST['price']))
{
    $prices = $_POST['price'];
   $expenditures = $_POST['expenditure'];
   $title = $_POST['payment-form_content'];
   $payment =$_POST['sum'];
   $content = "";
   echo  $title;
   for($i =0;  $i< count($prices); $i++)
        $content=$content.$expenditures[$i].":".number_format($prices[$i], 0, ',', ',')."đ.";
   $sql = "INSERT INTO expenditure(title, content, payment, unread)  VALUES('".$title."', '".$content."', ".$payment.", 1)";
   $data =  $connection->query("SELECT * FROM budget");
   $budget =  mysqli_fetch_row($data)[0];
    $budget -= $payment;
   $connection->query("UPDATE budget SET budget_left =  ".$budget."");
   echo $sql;
    
}
if(isset($_POST['isPay']))
{
    $isPay = $_POST['isPay'];
    echo $isPay;
    $account_id = $_POST['account_id'];
    $sql = "UPDATE users SET isPay = ".$isPay." WHERE account_id = ".$account_id."";
    $sql2 = "SELECT * FROM budget"; 
    $data =  $connection->query($sql2);
    $row = mysqli_fetch_row($data);
    if($isPay == 1)
        $newBudget = $row[0] + 100000;
    else  $newBudget = $row[0] -100000;
    echo $newBudget;
    $connection->query("UPDATE budget SET budget_left  = ".$newBudget."");
}
if(isset($_FILES['image-input']))
{
    $fullname= $_POST['name-input'];
    $email = $_POST['email-input'];
    $address= $_POST['address-input'];
    $sdt = $_POST['sdt-input'];
    $age = $_POST['age-input'];
    $khoa = $_POST['khoa-select'];
    if ($_FILES['image-input']['error'] === UPLOAD_ERR_OK) {
       
        $filename = $_FILES['image-input']['name'];
        $tempFile = $_FILES['image-input']['tmp_name'];
        $imageFileType = strtolower(pathinfo($filename,PATHINFO_EXTENSION));
        $datetime = date("YmdHms");
        $createAt = date("y-m-d H:m:s");
        $imageUrl = $datetime.".".$imageFileType;
        $folder = "../avatar_users/".$imageUrl;  
        echo $tempFile;
        $fileImage = ", avatar = '".$imageUrl."'";
        $result = $connection->query("SELECT avatar FROM users WHERE account_id = ".$_SESSION['user_id']."");
        $data = mysqli_fetch_row($result);
        if (file_exists("../avatar_users/".$data[0]."")) {
            if (unlink("../avatar_users/".$data[0]."")) {
                echo '<script>console.log(Image deleted successfully.);</script>';
            } else {
                echo '<script>console.log(Failed to delete the image.);</script>';
            }
        } else {
            echo 'Image not found.';
        }
        move_uploaded_file($tempFile , $folder);
      }
      else $fileImage = "";
      $sql = "UPDATE users SET full_name = '".$fullname."', email = '".$email."', address= '".$address."' , phone_number = '".$sdt."', age = ".$age." , MaKhoa = ".$khoa." ".$fileImage." WHERE account_id = ".$_SESSION['user_id']."" ;
      echo $sql;
}
if(isset($_POST['form-repair_id']))
{
    echo $_POST['form-repair_id'];
}
$connection->query($sql);
?>  
