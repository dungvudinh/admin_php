<?php
session_start();
include("../../configuration/connection.php");
// if(!isset($_COOKIE['status-login'])) setcookie('status-login', 0);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="./login.css">
</head>
<body>
<div class="main">

<form action="" method="POST" class="form" id="form-1">
  <h3 class="heading">Đăng Nhập</h3>
  <!-- <p class="desc">Cùng nhau học lập trình miễn phí tại F8 ❤️</p> -->

  <div class="spacer"></div>

  <!-- <div class="form-group">
    <label for="fullname" class="form-label">Tên đầy đủ</label>
    <input id="fullname" name="fullname" type="text" placeholder="VD: Sơn Đặng" class="form-control">
    <span class="form-message"></span>
  </div> -->

  <div class="form-group">
    <label for="email" class="form-label">Email</label>
    <input id="email" name="email" type="text" placeholder="VD: email@domain.com" class="form-control">
    <span class="form-message"></span>
  </div>

  <div class="form-group">
    <label for="password" class="form-label">Mật khẩu</label>
    <input id="password" name="password" type="password" placeholder="Nhập mật khẩu" class="form-control">
    <span class="form-message"></span>
  </div>

  <!-- <div class="form-group">
    <label for="password_confirmation" class="form-label">Nhập lại mật khẩu</label>
    <input id="password_confirmation" name="password_confirmation" placeholder="Nhập lại mật khẩu" type="password" class="form-control">
    <span class="form-message"></span>
  </div> -->

  <button class="form-submit">Đăng Nhập</button>
</form>
</div>
<?php
  if($_SERVER['REQUEST_METHOD'] == "POST")
  {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $sql = "SELECT avatar_url, permission FROM users WHERE email = '".$email."' AND password = '".$password."'";
    $data = $connection->query($sql);
    if(mysqli_num_rows($data) > 0)
    {
      $row = mysqli_fetch_array($data); 
      $avatar_url =  $row['avatar_url'];
      $permission =  $row['permission'];
      $_SESSION['email'] = $email;
      $_SESSION['avatar_url'] = $avatar_url; 
      $_SESSION['permission']= $permission;
      setcookie('status-login', 1, time() + 300, "/") ;
       header('Location:../index/index.php');

    }
    echo "<script>
    console.log('$email');
    console.log('$password');
    </script>";
  }
?>
</body>
</html>
