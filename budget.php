<?php 
session_start();
include("./configuration/connection.php");
if(!isset($_COOKIE['phone_number']))  header("Location:./login.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../css/notification.css">
   <link rel="stylesheet" href="../css/budget.css">
   
</head>
<body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <div class='layout'>
        <?php include("./components/sidebar.php")?>
        <div class='content__wrapper'>
            <div class='content'>
                <header>
                    <div class='header-left'>
                        <h2 class= "title__name">Ngân Sách<i class='bx bxs-wallet'></i></h2>
                        <?php
                        $sql = "SELECT * FROM budget"; 
                        $data =  $connection->query($sql);
                        $row = mysqli_fetch_row($data);
                        $formatted_amount = number_format($row[0], 0, ',', ',');
                        echo "<p>Tổng ngân sách: ".$formatted_amount."đ</p>"
                        ?>
                    </div>
                   <div class='header-right'>
                        <img src="../assets/images/ck.jpg" alt="" class="ck">
                   </div>
                </header>
               
                <section class="section-50">
                    <ul class ='filter__noti'>
                        <form  class ='noti_item'  method="POST">
                            <input type="text" name="noti_input" value="new-payment" style="display:none;">
                            <button type="submit" value="Submit">Chi Tiêu Mới</button>
                        </form>
                        <form class ='noti_item'  method="POST">
                            <input type="text" name="noti_input"  value="list-pay" style="display:none;" >
                            <button type="submit" value="Submit">Danh sách đóng tiền</button>
                        </form>
                        <?php
                           if(isset($_SESSION['user_id']))
                           {
                               
                               $user_id = $_SESSION['user_id'];
                               $sql2 ="SELECT MaCV FROM users INNER  JOIN  ban ON users.MaBan  = ban.MaBan WHERE account_id  = '".$user_id."'";
                               $data = $connection->query($sql2);
                               $user= mysqli_fetch_row($data); 
                               if($user[0] == 3)
                               {
                                  echo 
                                  "
                                      <form  class ='noti_item'  method='POST'>
                                      <input type='text' name='noti_input'  value='payment' style='display:none;' >
                                      <button type='submit' value='Submit'>Tạo Phiếu Mới</button>
                                  </form>
                                  ";
                               }
                        }
                        ?>
                       

                        <!-- <form  class ='noti_item'  method="POST">
                            <input type="text" name="noti_input"  value="created" style="display:none;" >
                            <button type="submit" value="Submit" >Đơn Đã Tạo</button>
                        </form> -->
                    </ul>
                    <div class ='filter__line'></div>
                <div class="content-container">
                    <div class='notification-ui_dd-content'>
                        <?php
                              $sql = "SELECT * FROM expenditure";
                              $currentDate = date('Y-m-d');   
                              $rsult = $connection->query($sql);
                          
                           
                          while($data= $data = mysqli_fetch_all($rsult, MYSQLI_ASSOC))
                          {
                              for($i =0; $i<count($data); $i++)
                              {
                                  $difference = strtotime($currentDate) - strtotime(date("Y-m-d", strtotime($data[$i]['create_at'])));
                                  $days = abs($difference/(60*60)/24);
                                  $month =  floor($days/30);
                                  $years = floor($month/12);
                                  echo "
                                  <div class='notification-list";
                                  if($data[$i]['unread']  ==1) echo " notification-list--unread";
                                      echo "'>
                                  <div class='notification-list_content'>
                                     
                                      <div class='notification-list_detail'>
                                          <div class='title'>
                                              <p><b>".$data[$i]['title']."</b></p>
                                          </div>
                                          <div class='more-infor'>
                                              <p>";
                                              $string = $data[$i]['content'];

                                              $lines = explode(".", $string);
                                              for($j =0; $j< count($lines) -1; $j++)
                                              {
                                                echo "- ".trim($lines[$j])."<br>";
                                              }
                                             
                                              echo"</p>
                                              <p style='font-weight:500'>Tổng chi tiêu: ".number_format($data[$i]['payment'], 0, ',', ',')."đ<p>
                                          </div>
                                         
                                      </div>
                                  </div>
                                  <div class='notification-list_creation-time'>
                                      <p class='creation-time'><small>";
                                      if($days ==0) echo "Hôm nay";
                                      else if($days <=30) echo $days." ngày trước";
                                      else if($days <=365) echo $month." tháng trước";
                                      else echo $years." năm trước";
                                      echo  "</small></p>   
                                   
                                  </div>
                                  
                              </div>
                          ";
                              }
                          }
                        ?>
                        </div>
                  
                </div>
            </section>
            </div>
        </div>
        <div class="overlay-wrapper">
            <div class="overlay"></div>
           <?php  include("./components/new_record.php");?>
        </div>
    </div>
</body>
<script src='./logic/notiItemShow.js'></script>
<script>

    const  notiCates = document.querySelectorAll('.filter__noti  form');
    const  filterLine   = document.querySelector('.filter__line');
   for(const index in notiCates)
   {
         notiCates[index].onclick = function(){
            filterLine.style.transform = `translateX(${notiCates[index].offsetLeft - 55 }px)`;
            filterLine.style.width = `${notiCates[index].offsetWidth}px`;   
        }
   }
$(document).ready(function() {
    $('.noti_item').submit(function(e) {
        $('.notification-ui_dd-content').empty();
        e.preventDefault(); 
        var form = $(this);
        var formData = form.serialize(); 
        $.ajax({
            type: form.attr('method'),
            url: "./components/noti_item.php", 
            data: formData,
            success: function(response) {
                $('.notification-ui_dd-content').html(response);
                $('.noti_item')[0].reset();
            }
        });
    });
})
$(document).ready(function() {
    $('.load-more_form').submit(function(e) {
        e.preventDefault(); 
        var form = $(this);
        var formData = form.serialize(); 
        $.ajax({
            type: form.attr('method'),
            url: "./components/get_data.php", 
            data: formData,
            success: function(response) {
                // console.log(response);
            }
        });
    });
})
</script>
</html>