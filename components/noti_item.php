<body>
<?php
    include("../configuration/connection.php");
    session_start();
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
        else if($noti_input== 'payment')
        {
            echo "
                <div class='payment-form'>
                    <h3 class='payment-form_title'>Phiếu Chi tiêu</h3>
                    <form class='payment-form_container' method='POST'>
                        <div class='form-group'>
                            <label for='content'>Nội dung</label>
                            <input name='payment-form_content'/>
                        </div>
                        <div class='form-group expenditure-form'>
                            <div class='form-group_item'>
                                
                                <div class='form-group_child'>
                                    <label for='content'>Khoản chi</label>
                                    <input name='expenditure'/>
                                </div>

                                <div class='form-group_child'>
                                    <label for='price'>Thành Tiền</label>
                                    <input name='price' id='price'  type='number'/>
                                </div>

                            </div>
                            <div class='form-group_item'>
                                <div class='form-group_child'>
                                    <label for='content'>Khoản chi</label>
                                    <input name='expenditure'/>
                                </div>
                                <div class='form-group_child'>
                                    <label for='price'>Thành Tiền</label>
                                    <input name='price'  type='number' id='price'/>
                                </div>
                            </div>
                        </div>
                        <button type='button'  class='new-input'><i class='bx bx-plus'></i>Thêm mới</button>
                        <div class='form-group'>
                            <label for='sum'>Tổng tiền</label>
                            <input name='sum'  id='sum'/>
                            <button type='button' id='calc'>Tính</button>
                        </div>
                        <button type='submit' id='submit' name='create-expediture' value='submit'>Tạo</button>
                    </form>
                   
                </div>
            ";
        }
        else if($noti_input == 'new-payment')
        {
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
        }
        else if($noti_input == 'list-pay')
        {
            echo "
                <div class='list-pay'>
                    <h3 class='list-pay_title'>Danh sách đóng tiền</h3>
                    <table class='table'>
                        <thead>
                            <tr>
                            <th scope='col'>#</th>
                            <th scope='col'>Họ Tên</th>
                            <th scope='col'>Số Điện Thoại</th>
                            <th scope='col'>Trạng Thái</th>
                            </tr>
                        </thead>
                        <tbody>";
                        $sql ="SELECT account_id, full_name,phone_number, isPay FROM users ORDER BY full_name ASC";
                        $data = $connection->query($sql);
                        while($matrix = mysqli_fetch_all($data, MYSQLI_ASSOC))
                        {
                            for($i=0; $i< count($matrix); $i++)
                            {
                                echo  
                                "
                                    <tr>
                                    <th scope='row'>1</th>
                                    <td>".$matrix[$i]['full_name']."</td>
                                    <td>".$matrix[$i]['phone_number']."</td>
                                    <td>
                                        <form class='pay-submit' method='POST'>
                                            <input type='checkbox' ";
                                            if($matrix[$i]['isPay'] ==1) echo 'checked';
                                            echo " class='check-input' value='".$matrix[$i]['account_id']."'";
                                                $user_id = $_SESSION['user_id'];
                                                $sql2 ="SELECT MaCV FROM users INNER  JOIN  ban ON users.MaBan  = ban.MaBan WHERE account_id  = '".$user_id."'";
                                                $data = $connection->query($sql2);
                                                $user= mysqli_fetch_row($data); 
                                                if($user[0] !=3) echo "disabled";
                                            echo "/>
                                        </form>
                                    </td>
                                    </tr>
                                ";
                            }
                        }
                        echo "</tbody>
                        </table>
                </div>
            ";
        }
    }
    if(isset($_POST['search']))
{
     $search = $_POST['search']; 
     if($search == "")
     {
        $sql = "SELECT  account_id,avatar, full_name, TenCV, TenBan, date_of_joining, status,email, address, phone_number FROM users INNER JOIN ban  ON  users.MaBan = ban.MaBan INNER  JOIN chuc_vu ON   users.MaCV = chuc_vu.MaCV";
     }
     else 
     {
        $sql = "SELECT  account_id,avatar, full_name, TenCV, TenBan, date_of_joining, status,email, address, phone_number FROM users INNER JOIN ban  ON  users.MaBan = ban.MaBan INNER  JOIN chuc_vu ON   users.MaCV = chuc_vu.MaCV WHERE full_name LIKE '%". $search."%'";
     }
     $result = $connection->query($sql);
     if(mysqli_num_rows($result) > 0)
     {
        while($matrix_array = mysqli_fetch_all($result, MYSQLI_ASSOC))
        {
            for($i = 0; $i< count($matrix_array);  $i++)
            {
                echo " <li class ='user__item ";
                                     echo $matrix_array[$i]['status'] ==0 ? 'disable' :'';
                                     echo "'>
                                     <div class ='user__infor'>
                                         <span class ='user__avatar'> ";
                                     if($matrix_array[$i]["avatar"])
                                         echo "  <img src='./avatar_users/".$matrix_array[$i]["avatar"]."' alt=''>"; 
                                     else echo "<img src='../../assets/images/no_image.png' alt=''>";     
                                          echo "
                                         </span>
                                         <span class ='user__infor_detail'>
                                             <p class ='user__full-name'>".$matrix_array[$i]["full_name"]."</p>
                                             <p class ='user__permission'>
                                                ".$matrix_array[$i]['TenCV']."
                                            </p>
                                             </span>
                                         </div>
                                         <div class= 'ban'>
                                             <p>
                                                ".$matrix_array[$i]['TenBan']."
                                            </p>
                                         </div>
                                         <div class ='date_of_joing'>
                                             <p>".$matrix_array[$i]['date_of_joining']."</p>
                                         </div>
                                         <div class ='status'>
                                             <p>";
                                                echo $matrix_array[$i]['status'] ==1 ? 'Đang hoạt động' : "Đã rời";
                                             echo "</p>
                                         </div>
                                         <div class ='user__email'>
                                             <p>".$matrix_array[$i]['email']."</p>
                                         </div>
                                         <div class ='user__address'>
                                             <p>".$matrix_array[$i]['address']."</p>
                                         </div>
                                         <div class ='user__sdt'>
                                            <p>".$matrix_array[$i]['phone_number']."</p>
                                        </div>
                                         ";
                                         $user_id = $_SESSION['user_id'];
                                         $sql2 ="SELECT avatar, full_name, TenBan, MaCV   FROM users INNER  JOIN  ban ON users.MaBan  = ban.MaBan WHERE account_id  = '".$user_id."'";
                                         $data = $connection->query($sql2);
                                         $user= mysqli_fetch_row($data);
                                         if($user[3] ==1)
                                            echo "<div class ='user__action'>
                                                <form class='my-form'>
                                                <input type='text' value='".$matrix_array[$i]['account_id']."' name='user_id'>
                                                <button type='submit' id= 'submit'>Sửa</button>
                                            </form>
                                            </div>
                                     </li>";
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
        console.log(formData);
        $.ajax({
            type: form.attr('method'),
            url: "./components/get_data.php", 
            data: formData,
            success: function(response) {
                console.log(response);
            }
        });
    });
   
    $('.payment-form_container').submit(function(e) {
        e.preventDefault(); 
        var formData = {};

        const  title =document.querySelector('input[name="payment-form_content"]');
        const payment = document.querySelector('input[name="sum"]');
        formData[title.name] = title.value;
        formData[payment.name] = payment.value;
        $("input[name='price']").each(function(index) {
          formData['price[' + index + ']'] = $(this).val();
        });
        $("input[name='expenditure']").each(function(index) {
          formData['expenditure[' + index + ']'] = $(this).val();
        });
        $.ajax({
            url: "./components/get_data.php", 
            method:"POST",
            data: formData,
            success: function(response) {
                console.log(response);
            }
        });
    });
    $('.check-input').change(function(e){
        if ($(this).is(':checked')) {
            // Checkbox is checked
            var formData={};
                formData['isPay']  = 1;
                formData['account_id'] = e.target.value;
                console.log(formData);
                $.ajax({
                url: "./components/get_data.php", 
                method:"POST",
                data: formData,
                success: function(response) {
                    console.log(response);
                }})
            console.log('Checkbox is checked!');
        } else {
            var formData={};
                formData['isPay']  = 0;
                formData['account_id'] = e.target.value;
                console.log(formData);
                $.ajax({
                url: "./components/get_data.php", 
                method:"POST",
                data: formData,
                success: function(response) {
                    console.log(response);
                }})
            // Checkbox is not checked
            console.log('Checkbox is not checked!');
        }
    })
   
})
var prices = document.querySelectorAll('#price');
$(document).ready(function() {
  var counter = 0;

  $('.new-input').click(function() {
    var newForm = ' <div class="form-group_item"><div class="form-group_child"><label for="content">Khoản chi</label><input name="expenditure"/></div><div class="form-group_child"><label for="price">Thành Tiền</label><input name="price" id="price"/></div></div>';
    $('.expenditure-form').append(newForm);
    prices = document.querySelectorAll('#price');
    console.log(prices);
    counter++;
  });
});
var sum  = 0;
$('#calc').click(function(e)
{
    sum =0;
    document.querySelectorAll('#price').forEach(item=>{
        sum+= parseInt(item.value);
    })
    document.querySelector('#sum').value = sum;
})
   

  function createExpenditure() {
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

                             