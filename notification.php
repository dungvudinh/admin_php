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
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../css/notification.css">
   
</head>
<body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <div class='layout'>
        <?php include("./components/sidebar.php")?>
        <div class='content__wrapper'>
            <div class='content'>
                <header>
                    <h2 class= "title__name">Thông Báo  <i class='bx bxs-bell-ring'></i></h2>
                </header>
                <section class="section-50">
                    <ul class ='filter__noti'>
                        <?php
                            if(isset($_SESSION['user_id']))
                            {
                                $user_id = $_SESSION['user_id'];
                                $sql2 ="SELECT avatar, full_name, TenBan, MaCV   FROM users INNER  JOIN  ban ON users.MaBan  = ban.MaBan WHERE account_id  = '".$user_id."'";
                                $data = $connection->query($sql2);
                                $user= mysqli_fetch_row($data);
                                if($user[3] ==1)
                                {
                                    echo 
                                    "
                                    <form  class ='noti_item'  method='POST'>
                                    <input type='text' name='noti_input' value='event' style='display:none;'>
                                    <button type='submit' value='Submit'>Sự Kiện Mới</button>
                                </form>
                                <form class ='noti_item'  method='POST'>
                                    <input type='text' name='noti_input'  value='afc' style='display:none;' >
                                    <button type='submit' value='Submit'>Đơn Ứng Tuyển Mới</button>
                                </form>
        
                           
        
                                <form  class ='noti_item'  method='POST'>
                                    <input type='text' name='noti_input'  value='created' style='display:none;' >
                                    <button type='submit' value='Submit' >Đơn Đã Tạo</button>
                                </form>
                                    ";
                                }
                                else 
                                {
                                    echo 
                                    "
                                    <form  class ='noti_item'  method='POST'>
                                    <input type='text' name='noti_input' value='event' style='display:none;'>
                                    <button type='submit' value='Submit'>Sự Kiện Mới</button>
                                    </form>
                                    ";
                                }
                            } 
                        ?>
                      
                    </ul>
                    <div class ='filter__line'></div>
                <div class="container" >
                    <div class='notification-ui_dd-content'>
                        <?php
                           if(!isset($_POST['noti_input']))
                           {
                            $sql = "SELECT * FROM su_kien";
                            $rsult = $connection->query($sql);
                            $currentDate = date('Y-m-d');   
                            echo "<input name='category' value = 'event' style='display:none;'/>";
                            while($data = mysqli_fetch_all($rsult, MYSQLI_ASSOC))
                            {
                                for($i = 0; $i< count($data); $i++)
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
                                        <div class='notification-list_img'>
                                            <img src='../event_images/144202.jpg' alt='Feature image' class='event_image'>
                                        </div>
                                        <div class='notification-list_detail'>
                                            <div class='title'>
                                                <i class='bx bx-calendar-event'></i>
                                                <p><b>".$data[$i]['title']."</b></p>
                                            </div>
                                            <p class='text-muted'>".$data[$i]['content']."</p>
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