<div class='sidebar <?php 
if(isset($_SESSION['isCloseSidebar']))
{
    echo "<script>console.log(".$_SESSION['isCloseSidebar'].")</script>";
    if($_SESSION['isCloseSidebar'] == true) echo "close";
    else echo "";
}
?>'>
    <header>
        <button class="button_toggle">
            <i class="bx bx-chevrons-left button_toggle__icon"></i>
        </button>
        <div class="header_infor">
            <div class="header_infor__image">
                <h4>Logo</h4>
            </div>
            <div class="header_text">
                <span class="header_text__name ">Dungg</span>
                <span class="profession">Web developer</span>
            </div>
        </div>
    </header>
    <div class="menu_bar">
        <ul class='menu'>
            <li class= 'search_box'>
                <i class='bx bx-search-alt-2'></i>
                <input type="text" name="search" class="input_search" placeholder="Search...">
            </li>
            <li class= 'nav_link'>
                <a href ='../../pages/index/index.php'>
                    <i class="bx bx-home"></i>
                    <span class="nav_text text">Dashboard</span>
                </a>
            </li>
            <li class= ' nav_link'>
                <a href ='../../pages/news/news.php'>
                    <i class="bx bx-bell"></i>
                    <span class="nav_text text">Notification</span>
                </a>
            </li>
            <li class= 'nav_link'>
                <a href ='../../pages/management/management.php'>
                    <i class="bx bx-group"></i>
                    <span class="nav_text text">Management</span>
                </a>
            </li>
        </ul>
        <div class="bottom_content">
            <li class= "logout">
                <?php
                    if(isset($_COOKIE['status-login']))
                    {
                        if($_COOKIE['status-login'] ==1) 
                            echo " 
                            <a href='../../pages/logout.php'>
                                <i class='bx bx-log-out' ></i>
                                <span class ='logout_text text'>Logout</span>
                            </a>
                           ";
                        else 
                            echo "
                            <a href='../../pages/login/login.php'>
                                <i class='bx bx-log-out' ></i>
                                <span class ='logout_text text'>Login</span>
                            </a>
                            ";
                    }   
                    ?>
               
                   
                   
                
            </li>
            <li class= "mode">
                <div class ="mode_status">
                    <i class='bx bx-sun' ></i>
                    <i class='bx bx-moon' ></i>
                </div>
                <span class ="mode_text text"> Dark Mode</span>
                <div class ="toggle_switch">
                    <div class="switch"></div>
                </div>
            </li>
        </div> 
    </div>
</div>   
<script>
     const $ = document.querySelector.bind(document);
        const body = $('body');
        const searchButton  = $('.search_box');
        const modeSwitch = $('.mode_switch');
        const modeText = $('mode_text');
        const toggleButton = $('.button_toggle');
        const sidebar = $('.sidebar');
        const content = $('.content');
        console.log(content);
        toggleButton.addEventListener('click',  ()=> {
            sidebar.classList.toggle('close');  
            if(sidebar.classList.contains('close'))
            {
                <?php $_SESSION['isCloseSidebar'] = true;?>
            }
            else 
            {
                <?php  $_SESSION['isCloseSidebar'] = false;?>
            }
           
        })
</script>


