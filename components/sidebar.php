<body>
<div class='sidebar <?php 
if(isset($_SESSION['isCloseSidebar']))
{
}
?>'>
    <?php 
      $user_id = $_SESSION['user_id'];
      $sql2 ="SELECT avatar, full_name, TenCV, email, address, phone_number, age, MaKhoa  FROM users INNER  JOIN  chuc_vu ON users.MaCV  = chuc_vu.MaCV WHERE account_id  = '".$user_id."'";
      $data = $connection->query($sql2);
      $user= mysqli_fetch_row($data);
      echo 
      "
      <form class='profile' enctype='multipart/form-data' method='POST'>
      <button class='back-btn'>
          <i class='bx bx-arrow-back'></i>
      </button>
      <p class='title-profile'>My profile</p>
      <div class='header-profile'>
          <div class='header-profiler_avatar'>
                <img src='../avatar_users/".$user[0]."' alt='' class='user-img'>
                <input type='file' style='display:none;' id='image-input' name='image-input' accept='image/*'>
          </div>
          <div class='header-profile_name'>
              <p class='profile-name'>".$user[1]."</p>
              <input type='text' value='".$user[1]."' id='name-input' name='name-input'>
              <p>".$user[2]."</p>
          </div>
          <button class='header-profile_edit'>
              <i class='bx bx-edit-alt'></i>
          </button>
      </div>
      <div class='center-profile'>
          <div class='profile-group'>
              <label for='email'>Email</label>
              <input type='text' name='email-input' id='email-input' value='".$user[3]."'>
          </div>
          <div class='profile-group'>
              <label for='address'>Địa Chỉ</label>
              <input type='text' name='address-input' id='address-input'value='".$user[4]."'>
          </div>
          <div class='profile-group multiple-elm'>
              <div classs='profile-group_child'>
                  <label for='sdt'>SĐT</label>
                  <input type='number' name='sdt-input' id='sdt-input' value='".$user[5]."'>
              </div>
              <div classs='profile-group_child'>
                  <label for='age'>Tuổi</label>
                  <input type='number' name='age-input' id = 'age-input' value='".$user[6]."'>
              </div>
          </div>
          <div class='profile-group'>
              <label for='khoa'>Khoa</label>
              <select name='khoa-select' id='khoa-select'>
                  <option value='1'"; 
                  if($user[7] == 1) echo "selected";
                  echo ">Công Nghệ Thông Tin</option>
                  <option value='2' ";
                  if($user[7] == 2) echo "selected";
                  echo ">Khoa Học Máy Tính</option>
                  <option value='3' ";
                  if($user[7] == 3) echo "selected";
                  echo ">Kĩ Thuật Phần Mềm</option>
              </select>
          </div>
      </div>
      <button type='submit' class='save-profile'>Lưu</button>
  </form>
      ";
    ?>
    
    <header>
        <button class="button_toggle">
            <i class="bx bx-chevrons-left button_toggle__icon"></i>
        </button>
        <button class="header_infor">
                    <?php
                     if(isset($_SESSION['user_id']))
                     {
                        $user_id = $_SESSION['user_id'];
                        $sql2 ="SELECT avatar, full_name, TenBan   FROM users INNER  JOIN  ban ON users.MaBan  = ban.MaBan WHERE account_id  = '".$user_id."'";
                        $data = $connection->query($sql2);
                        $user= mysqli_fetch_row($data);
                           
                            $ban = "";
                            echo 
                            "
                            <div class='header_infor__image'>
                                <img alt ='' src='./avatar_users/".$user[0]."' />
                            </div>
                            ";
                            echo "
                            <div class='header_text'>
                            <span class=header_text__name '>
                            ".$user[1]."
                            </span>";
                            
                            echo " <span class='profession'>".$user[2]."</span>";
                            echo "</div>";
                     }
                    ?>
        </button>
    </header>
    <div class="menu_bar">
        <ul class='menu'>
            <li class= 'search_box'>
                <i class='bx bx-search-alt-2'></i>
                <input type="text" name="search" class="input_search" placeholder="Search...">
            </li>
            
            <li class= ' nav_link'>
                <a href ='../notification.php'>
                    <i class="bx bx-bell"></i>
                    <span class="nav_text text">Thông báo</span>
                </a>
            </li>
            <li class= 'nav_link'>
                <a href ='../management.php?permission=0&ban=0&status=0'>
                    <i class="bx bx-group"></i>
                    <span class="nav_text text">Thành viên</span>
                </a>
            </li>
            <?php 
              if(isset($_SESSION['user_id']))
              {
                $user_id = $_SESSION['user_id'];
                $sql2 ="SELECT users.MaBan FROM users INNER  JOIN  ban ON users.MaBan  = ban.MaBan WHERE account_id  = '".$user_id."'";
                $data = $connection->query($sql2);
                $user= mysqli_fetch_row($data);
                if($user[0] ==3)
                echo 
                "
                   <li class= 'nav_link'>
                   <a href ='../repair.php'>
                   <i class='bx bx-wrench'></i>
                       <span class='nav_text text'>Sửa chữa</span>
                   </a>
               </li>
                ";
              }
                 
            ?>
           
            <li class= 'nav_link'>
                <a href ='../budget.php'>
                <i class='bx bxs-bank'></i>
                    <span class="nav_text text">Ngân sách</span>
                </a>
            </li>
           
          
        </ul>
        <div class="bottom_content">
            <li class= "logout">
                <?php
                        if(isset($_SESSION['user_id'])) 
                            echo " 
                            <a href='../logout.php'>
                                <i class='bx bx-log-out' ></i>
                                <span class ='logout_text text'>Logout</span>
                            </a>
                           ";
                        else 
                            echo "
                            <a href='../login.php'>
                                <i class='bx bx-log-out' ></i>
                                <span class ='logout_text text'>Login</span>
                            </a>
                            ";
                    ?>
            </li>
        </div> 
    </div>
</div>   
<script>
    const body = document.querySelector('body');
    const searchButton  = document.querySelector('.search_box');
    const modeSwitch = document.querySelector('.mode_switch');
    const modeText = document.querySelector('mode_text');
    const toggleButton = document.querySelector('.button_toggle');
    const sidebar = document.querySelector('.sidebar');
    const content = $('.content');
    toggleButton.addEventListener('click',  ()=> {
        sidebar.classList.toggle('close');  
        if(sidebar.classList.contains('close'))
            <?php $_SESSION['isCloseSidebar'] = true;?>;
        else 
            <?php  $_SESSION['isCloseSidebar'] = false;?>;
    
    })
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
     const profile =document.querySelector('.profile');
    $('.header_infor').click(function(e){
       
        profile.style.transform = 'translateX(0)';
    })
    $('.back-btn').click(function(e){
        profile.style.transform = 'translateX(-300px)';
    })
    $('.header-profile_edit').click(function(e){
        document.querySelector('#name-input').style.display='block';
    })
    $('#name-input').blur(function(e){
        document.querySelector(".profile-name").innerHTML = e.target.value;
        e.target.style.display='none';
    })
    $('.user-img').click(function(e){
        var fileInput = document.querySelector('#image-input');
        fileInput.click();
    })
    $('#image-input').change(function(e){
        var reader = new FileReader();
        console.log(reader);
        reader.onload = function() {
          var imagePreview = document.querySelector('.user-img');
          imagePreview.src = reader.result;
         
        }
        reader.readAsDataURL(event.target.files[0]);
    })
    $(document).ready(function() {
    $('.profile').submit(function(e) {
        e.preventDefault(); 

        var form = $(this);
        var formData = new FormData(this); 
        console.log(formData);
        // const nameInput= document.querySelector('#name-input');
        // const emailInput= document.querySelector('#email-input');
        // const addressInput= document.querySelector('#address-input');
        // const sdtInput= document.querySelector('#sdt-input');
        // const age= document.querySelector('#age-input');
        // const khoaSelect= document.querySelector('#khoa-select');
        // const inputFile =document.querySelector('input[type="file"]');
        // formData[nameInput.name] = nameInput.value;
        // formData[emailInput.name] = emailInput.value;
        // formData[addressInput.name] =addressInput.value;
        // formData[sdtInput.name] = sdtInput.value;
        // formData[age.name] = age.value;
        // formData[khoaSelect.name] =khoaSelect.value;
        // if(inputFile.files[0] !=null) formData['file-path'] = inputFile.files[0].name;
        $.ajax({
            type: form.attr('method'),
            url: "./components/get_data.php", 
            data: formData, 
            processData: false,
            contentType: false,
            success: function(response) {
                console.log(response);
            }
        });
    });
})
    
</script>
</body>
