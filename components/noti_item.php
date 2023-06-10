<body>
<?php
    include("../configuration/connection.php");

    date_default_timezone_set("Asia/Ho_Chi_Minh");
    if(isset($_POST['noti_input']))
    {
        $noti_input = $_POST['noti_input'];

        $currentDate = date('Y-m-d');   
        if($noti_input == 'event')
        {
            $sql = "SELECT * FROM su_kien ";
            $rsult = $connection->query($sql);
            echo "<input name='category' value = 'event' style='display:none;'/>";
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
        else if($noti_input == 'afc')
        {
            $sql = "SELECT * FROM app_form_client INNER JOIN khoa ON app_form_client.MaKhoa = khoa.MaKhoa INNER JOIN ban ON app_form_client.MaBan = ban.MaBan";
            $result = $connection->query($sql);
            echo "<input name='category' value = 'app-form_client' style='display:none;'/>";
            while($data= $data = mysqli_fetch_all($result, MYSQLI_ASSOC))
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
                                <i class='bx bx-envelope'></i>
                                <p><b>".$data[$i]['full_name']."</b></p>
                            </div>
                            <div class='more-infor'>
                                <p>SDT:  ".$data[$i]['sdt']."</p>
                                <p>Email:  ".$data[$i]['email']."</p>
                                <p>Ban Mong Muốn: ".$data[$i]['TenBan']."</p>
                            </div>
                            <p class='text-muted'>Note: ".$data[$i]['note']."</p>
                            
                        </div>
                    </div>
                    <div class='notification-list_creation-time'>
                        <p class='creation-time'><small>";
                        if($days ==0) echo "Hôm nay";
                        else if($days <=30) echo $days." ngày trước";
                        else if($days <=365) echo $month." tháng trước";
                        else echo $years." năm trước";
                        echo  "</small></p>
                            <form METHOD= 'POST' class='app-form_submit' >
                                <input name='app-form_id'  value='".$data[$i]['id']."' style='display:none;'/>
                                <button class='receive-btn";
                                if($data[$i]['isReceived'] == 1) echo " hidden";
                                echo "'>Tiếp Nhận</button>
                            </form>
                            <div class='execute-status";
                            if($data[$i]['isReceived'] == 1) echo " show";
                            echo "'>";
                            if($data[$i]['isAccept'] == NULL)
                                echo 
                                    "<form METHOD= 'POST' class='app-form_submit' > 
                                        <input name='app-form_id'  value='".$data[$i]['id']."' style='display:none;'/>
                                        <input name='execute-status' value='1' style='display:none;'/>
                                        <button class='accept' >Ứng tuyển thành công</button>
                                    </form>
                                    <form METHOD= 'POST' class='app-form_submit' > 
                                        <input name='app-form_id'  value='".$data[$i]['id']."' style='display:none;'/>
                                        <input name='execute-status' value='0' style='display:none;'/>
                                        <button class='deny'>Ứng tuyển thất bại</button>
                                    </form>";
                            else if($data[$i]['isAccept'] ==1)
                                echo "
                                    <button class='accept' >Ứng tuyển thành công</button>
                                ";
                            else 
                                echo "
                                    <button class='deny'>Ứng tuyển thất bại</button>
                                ";
                               echo " </div>
                        ";
                    echo "</div>
                </div>
            ";
                }
            }
        }
        else if($noti_input == 'naf')
        {
            $sql = "SELECT * FROM repair_form";
            $rsult = $connection->query($sql);
            echo "<input name='category' value = 'repair_form' style='display:none;'/>";
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
                            <i class='bx bx-wrench'></i>
                            <p><b>".$data[$i]['full_name']."</b></p>
                        </div>
                        <div class='more-infor'>
                            <p>SDT: ".$data[$i]['sdt']."</p>
                            <p>Tình trạng:  ".$data[$i]['tinh_trang']."</p>
                        </div>
                        <p class='text-muted'>Mô tả: ".$data[$i]['mo_ta']."</p>
                    </div>
                </div>
                <div class='notification-list_creation-time'>
                    <p class='creation-time'><small>";
                    if($days ==0) echo "Hôm nay";
                    else if($days <=30) echo $days." ngày trước";
                    else if($days <=365) echo $month." tháng trước";
                    else echo $years." năm trước";
                    echo  "</small></p>   
                    <form class='form-repair_status' METHOD='POST'>
                        <input name ='form-repair_id' value='".$data[$i]['id']."'style='display: none;'/>
                        <select name='repair-status' onchange ='submitForm()'>
                            <option value = '1'";
                            if($data[$i]['repair_status'] ==1) echo 'selected';
                            echo ">Chưa tiếp nhận</option>
                            <option value = '2'";
                            if($data[$i]['repair_status'] ==2) echo 'selected';
                            echo ">Đang sửa chữa</option>
                            <option value = '3'";
                            if($data[$i]['repair_status'] ==3) echo 'selected';
                            echo ">Hoàn thành</option>
                        </select>
                    </form> 
                </div>
                
            </div>
        ";
            }
        }
        }
        else if($noti_input == "created")
        {

            $sql = "SELECT * FROM app_form_server";
            $rsult = $connection->query($sql);
            echo 
            "
                <button class='new-record'>
                    <i class='bx bx-plus'></i>
                    Tạo mới
                </button>
            ";
        while($data= $data = mysqli_fetch_all($rsult, MYSQLI_ASSOC))
        {
            for($i =0; $i<count($data); $i++)
            {
                $difference = strtotime($currentDate) - strtotime(date("Y-m-d", strtotime($data[$i]['create_at'])));
                $days = abs($difference/(60*60)/24);
                $month =  floor($days/30);
                $years = floor($month/12);
                echo "
                <div class='notification-list'>
                <div class='notification-list_content'>
                    <div class='notification-list_img'>
                        <img src='../app_form_images/".$data[$i]['image_url']."' alt='Feature image' class='event_image'>
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
    }
?>
<script src='./logic/notiItemShow.js'></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
   

  // jQuery code to handle the button click event
  $(document).ready(function() {
    $('.app-form_submit').submit(function(e) {
        e.preventDefault(); 
        var form = $(this);
        var formData = form.serialize(); 
        $.ajax({
            type: form.attr('method'),
            url: "./components/get_data.php", 
            data: formData,
            success: function(response) {
                console.log(response);
            }
        });
    });
})
function submitForm() {
    var formData = $('.form-repair_status').serialize(); // Serialize the form data

    $.ajax({
      type: 'POST', // Use the appropriate HTTP method (POST/GET)
      url: './components/get_data.php', // Use the form's action URL
      data: formData,
      success: function(response) {
        // Handle the response from the server
        console.log(response); // For testing/debugging
        // You can update the page or perform any other actions here
      },
      error: function(xhr, status, error) {
        // Handle errors here
        console.log(error); // For testing/debugging
      }
    });
  }

</script>
</body>
