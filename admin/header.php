<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Reem+Kufi+Fun:wght@400..700&family=Tinos:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../fontawesome-free-6.5.1-web/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <title>Danh mục sản phẩm</title>
    <link rel="stylesheet" href="styleAdmin.css">
    
     <!-- thay the file style css mot vai phan khong nhung vao duoc -->
   
</head>
<?php
    session_start();
    ob_start(); //fix lỗi header ở class không nhảy
?>
<style>
    header {
    
    
    border-bottom: 2px solid #dddd;
    justify-content: space-between; /*khoaang cach 3div */
    padding: 0 50px;
    /* text-align: center; */
}
    .container-header{
        flex: 3;
        display: flex;
        height: 55px;
        background-color: #dddddd;
        border-bottom: 1px solid black;
        font-weight: 10px;
       
        
    }
    
    </style>
<body>
    <header class="container-header">
        <div class="container-header-admin">
            <h1>
                <?php 
            include"check_login.php"; 
            ?> 
            </h1>
        </div>
        
        <div class="container-header-trang-chu">
            <h1><a href="../index.php"><u><i class="fa-solid fa-house"></i> Trang chủ FrontEnd</u></a></h1>
        </div>
        <div class="container-header-dang-xuat">
            <h1><a href="logout.php"><u><i class="fa-solid fa-sign-out"></i> Đăng xuất</u></a></h1>
        </div>

    </header>
</body>