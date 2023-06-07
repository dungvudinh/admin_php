<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="./management.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <div class="layout">
        <?php include("../../components/sidebar.php")?>
        <div class="content__wrapper">
            <div class ="content">
            <header>
                <div class="title">
                    <h2 class= "title__name">Users</h2>
                    <p class = "title__detail">Management</p>
                </div> 
                <div class ="action">
                    <button class ="import__btn">
                        <a href ="#">
                            <p>Import</p>
                        </a>
                    </button>
                    <button class = "new__btn">
                        <a href ="#">
                            <p>New User</p>
                        </a>
                    </button>
                </div>
            </header>
            <div class="searching__user">
                <i class='bx bx-search-alt-2 icon_search'></i>
                <input type="text" placeholder="Search user ...">
            </div>
            <container>
                <ul class ="list__filter">
                    <li >Admin</li>
                    <li>Member</li>
                </ul>
            </container>
            </div>
           
        </div>
    </div>
    <?php
     ?>
</body>
</html>