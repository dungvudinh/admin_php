<div class= "overlay__layout"></div>
<?php
    include("../configuration/connection.php");
    if(isset($_POST['user_id']))
    {
        $userId = $_POST['user_id'];
        $sql = "SELECT * FROM users WHERE account_id = ".$userId."";
        $rsult = $connection->query($sql);
        $data = mysqli_fetch_row($rsult);
       
       echo "
    <div class ='overlay__content'>
        <button class='exit_btn'>X</button>
        <div class='brief__infor'>
            <div class= 'brief__infor_image'>
                <img src='../avatar_users/".$data[1]."' alt=''>
            </div>
            <p class ='brief__infor_name'>".$data[2]."</p>
        </div>
        <div class ='form__edit_user'>
            <h3 class ='form__title'>Chỉnh sửa thông tin</h3>
            <form class ='form__content' method='POST'>
                <div class = 'form__group multiple__field'>

                    <div class='form__field_name'>
                        <label for='name'>Họ Và Tên</label>
                        <input name ='full_name' type='text' placeholder='' value= '".$data[2]."'  disabled>
                    </div>
            
                    <div class='field__address'>
                        <label for='address'>Địa Chỉ</label>
                        <input name ='address' type='text' placeholder='address..' value= '".$data[9]."' disabled>
                    </div>
            
                </div>
                <div class = 'form__group multiple__field'>

                    <div class='field__phone_number'>
                        <label for='phoneNumber'>Phone Number</label>
                        <input name ='phoneNumber' type='number' placeholder='phone number...' value='".$data[11]."' disabled>
                    </div>

                    <div class ='field__khoa'>
                        <label for='khoa'>Khoa</label>
                        <select class='khoa__option' disabled>  

                            <option value='1'"; 
                            if($data[10]  ==1) echo  "selected";
                             echo ">Công Nghệ Thông Tin</option>
                            <option value='2' ";
                            if($data[10]  ==2) echo  "selected";
                            echo ">Kĩ Thuật Phần Mềm</option>
                            <option value='3'";
                            if($data[10]  ==3) echo  "selected";
                            echo ">Khoa Học Máy Tính</option>
                        </select>
                    </div>
    
                </div>
                <div class = 'form__group  multiple__field'>

                    <div class='field__email'>
                        <label for='email'>Email</label>    
                        <input name ='email' type='text' placeholder='email...' value='".$data[6]."' disabled>
                    </div>

                    <div class='field__active_status'>
                        <label for='activeStatus'>Trạng Thái</label>
                        <select class='active__option' name='status_option'>
                            <option value='1'";  
                            if($data[5] ==1) echo  "selected";
                            echo ">Đang hoạt động</option>
                            <option value='0'"; 
                            if($data[5] ==0) echo  "selected";
                            echo ">Đã rời</option>
                        </select>
                    </div>

                </div>
                <div class = 'form__group multiple__field'>

                    <div class='field__ban'>
                            <label for='ban'>Ban</label>
                            <select class='ban__option' name='ban_option'>
                                <option value='1'";
                                if( $data[8] ==1)  echo  "selected";
                                echo ">Ban Sự Kiện</option>
                                <option value='2'"; 
                                if( $data[8] ==2)  echo  "selected";
                                echo ">Ban Truyền Thông</option>
                                <option value='3'";
                                if( $data[8] ==3)  echo  "selected";
                                echo ">Ban Kĩ Thuật</option>
                            </select>
                    </div>
            
                    <div class='field__permission'>
                        <label for='permission'>Chức Vụ</label>
                        <select class='permission__option' name='permission_option'>
                            <option value='1'";  
                            if($data[4] == 1) echo "selected";
                            echo ">Admin</option>
                            <option value='2'";  
                            if($data[4] == 2) echo "selected";
                            echo ">Thành Viên</option>
                            <option value='4'";  
                            if($data[4] == 4) echo "selected";
                            echo  ">Thủ Quỹ</option>
                            <option value='5'"; 
                            if($data[4] == 5) echo "selected";
                            echo">CTV</option>
                        </select>
                    </div>
                </div>
                <input  type='text' name='user_id'  value='".$userId."'  class='user__id_input'/>
                <button type='submit' class='submit__btn' name='edit_user'>Save profile</button>
           </form>
       </div>
   </div>
       ";
    }
 ?>
 <?php

  ?>
<script>
    

    document.querySelector('.exit_btn').onclick = function()
    {
        overlay.classList.remove('active');
    }
</script>








