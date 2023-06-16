<?php
session_start();
include("./configuration/connection.php");
// if(!isset($_COOKIE['status-login'])) setcookie('status-login', 0);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="../../css/login.css">
</head>
<body>
<div class="main">

<form action="" method="POST" class="form" id="form-1">
  <h3 class="heading">Đăng Nhập</h3>
  <div class="spacer "><h3>Tài khoản hoặc Mật khẩu không chính xác</h3></div>
    <div class="form-group">
    <label for="email" class="form-label">Số điện thoại</label>
    <input id="email" name="phoneNumber" type="text" placeholder="nhập số điện thoại..." class="form-control" value ="<?php echo isset($_COOKIE['phone_number']) ?  $_COOKIE['phone_number'] : ''?>">
    <span class="form-message"></span>
  </div>

  <div class="form-group">
    <label for="password" class="form-label">Mật khẩu</label>
    <input id="password" name="password" type="password" placeholder="Nhập mật khẩu" class="form-control" value ="<?php echo isset($_COOKIE['pass']) ? $_COOKIE['pass'] :''?>">  
    <span class="form-message"></span>
  </div>
  <div class="form-group form__checkbox">
    <input id="remember" name="remember" type="checkbox"  class="form-control" checked>
    <label for="remember" class="form-label">Ghi nhớ đăng nhập</label>
  </div>
  

  <button class="form-submit">Đăng Nhập</button>
</form>
</div>
<?php
  if($_SERVER['REQUEST_METHOD'] == "POST")
  {
    $phoneNumber = $_POST['phoneNumber'];
    $password = $_POST['password'];
    
    $sql = "SELECT * FROM accounts WHERE account_name = '".$phoneNumber."' AND password = '".$password."'";
    $data = $connection->query($sql);
    if(mysqli_num_rows($data) == 0)
      echo "<script>document.querySelector('.spacer').classList.add('show__error')</script>";
    if(mysqli_num_rows($data) ==1)
    {
       $row = mysqli_fetch_row($data); 
       $account_id = $row[0];
      
       
       $_SESSION['user_id'] = $account_id;
       if($_POST['remember'])
       {
        setcookie("phone_number", $phoneNumber, time() + (86400 * 30));
        setcookie("pass", $password,  time() + (86400 * 30));
       }
        header('Location:./notification.php');
    }
  }
?>
</body>
</html>
