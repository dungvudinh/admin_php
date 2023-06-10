<body>
<div class='sidebar <?php 
if(isset($_SESSION['isCloseSidebar']))
{
}
?>'>
    <header>
        <button class="button_toggle">
            <i class="bx bx-chevrons-left button_toggle__icon"></i>
        </button>
        <div class="header_infor">
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
        </div>
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
                    <span class="nav_text text">thành viên</span>
                </a>
            </li>
            <li class= 'nav_link'>
                <a href ='../management.php'>
                <i class='bx bx-wrench'></i>
                    <span class="nav_text text">Sửa chữa</span>
                </a>
            </li>
            <li class= 'nav_link'>
                <a href ='../management.php'>
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
</body>
