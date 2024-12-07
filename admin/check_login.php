<?php


if (!isset($_SESSION['username'])) {
    
    echo "Vui lòng đăng nhập để tiếp tục. <a href='login.php'>Đăng nhập</a>";
    exit; 
}




if(isset($_SESSION['username'])) {
    echo "Bạn đã đăng nhập: " . $_SESSION['username'];
} else {
    echo "Vui lòng đăng nhập";
} ?>