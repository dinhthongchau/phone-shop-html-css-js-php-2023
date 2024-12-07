<?php $page_title = "Xác nhận đơn hàng"; ?>
<?php

use PHPMailer\PHPMailer\PHPMailer; // thêm use statement cho PHPMailer
include "admin/database.php";
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/SMTP.php';
include 'header.php';

$db = new Database();

function generateOrderID() {
    $current_date = date('dmy');
    $random_number = mt_rand(100, 999);
    // tạo mã đơn hàng dựa trên đd/mm/yy và 3 số cuối random
    $order_id = $current_date . $random_number;
    return $order_id;
}



session_start();
// print_r($_SESSION['customer_info']);
// print_r($_SESSION['cart']);

$address = $_SESSION['customer_info']['address'];
$city = $_SESSION['customer_info']['city'];
$district = $_SESSION['customer_info']['district'];
$ward = $_SESSION['customer_info']['ward'];


if (isset($_POST['dat_hang'])){

   
    
     $full_name = $_SESSION['customer_info']['full_name'];
     $phone_number = $_SESSION['customer_info']['phone_number'];
     $address = $_SESSION['customer_info']['address'];
     $city = $_SESSION['customer_info']['city'];
     $district = $_SESSION['customer_info']['district'];
     $ward = $_SESSION['customer_info']['ward'];

  
    $insert_customer_query = "INSERT INTO tbl_customer (customer_full_name, customer_phone_number, customer_address, customer_ward, customer_district, customer_city)
    VALUES ('$full_name', '$phone_number', '$address', '$ward', '$district', '$city')";
    $insert_customer_result = $db->insert($insert_customer_query);
     

    if ($insert_customer_result) {
   
        $order_id = generateOrderID();
      
        $customer_id = $db->link->insert_id;

    

         $values = array();

         
       
        foreach ($_SESSION['cart'] as $item) {
            $product_name = $item['product_name'];
            $product_price = $item['product_price'];
            $quantity = $item['quantity'];
           
            $values[] = "('$customer_id', '$product_name', '$quantity', '$product_price', '$order_id')";
        }

      
        $insert_ordered_query = "INSERT INTO tbl_ordered (customer_id, ordered_name, ordered_quantity, ordered_price, ordered_id)
                                VALUES " . implode(", ", $values); //đoạn này được sử dụng để nối các giá trị trong mảng $values thành một chuỗi dài, mỗi giá trị được phân tách bằng dấu phẩy ,
        $insert_ordered_result = $db->insert($insert_ordered_query);

        

  
         if ($insert_ordered_result) {
            // Gửi email thông báo 
            $mail = new PHPMailer(true);
            $email_admin='thong2024mail@gmail.com';
            $email_admin_password = 'pbpm tite zepl wtpz';
            try {
                // Thiết lập thông tin máy chủ SMTP
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com'; // Địa chỉ máy chủ SMTP
                $mail->SMTPAuth = true;
                $mail->Username = $email_admin; // Tên đăng nhập SMTP 
                $mail->Password = $email_admin_password; // Mật khẩu SMTP ( phần mật khẩu ứng dụng trong GG account)
                $mail->SMTPSecure = 'tls';
                $mail->Port = 587;
                
                // thiết lập thông tin người gửi và người nhận
                $mail->setFrom($email_admin, 'T-IPHONE ORDER');
                $mail_khach = ($_SESSION['customer_info']['email_khach']);
              
                $mail->addAddress($mail_khach, 'GUEST'); // địa chỉ email của khách
                $mail->addCC($email_admin, 'ADMIN'); // bản sao địa chỉ email của khách cho admin
               
               
                
        
        
                $mail->Subject = 'New Order T-Iphone';
                $total = 0;
                 // nội dụng mail
                 $email_body = "\n\nMã đơn hàng: $order_id\n\nTHÔNG TIN KHÁCH HÀNG:\n\nHọ tên: $full_name\nSố điện thoại: $phone_number\nEMAIL: $mail_khach \nĐịa chỉ: $address, $ward, $district, $city\n\nSẢN PHẨM:\n";
                 foreach ($_SESSION['cart'] as $item) {
                     $product_name = $item['product_name'];
                     $quantity = $item['quantity'];
                     $product_price = $item['product_price'];
                     $subtotal = $quantity * $product_price;
                     $email_body .= "\n- $product_name (Số lượng: $quantity, Giá: " . number_format($product_price, 0, ',', '.') . "đ, Tổng giá: " . number_format($subtotal, 0, ',', '.') . "đ)";
                     $total += $subtotal ;
                 }
                 
                 $email_body .= "\n\nTổng tiền: " . number_format($total, 0, ',', '.') . "đ";
                 $mail->Body = $email_body;

                // Gửi email
                $mail->send();
               
                // // Thông báo và xóa session cũ
                unset($_SESSION['customer_info']);
                unset($_SESSION['cart']);
                echo '<script>alert("Đặt hàng thành công. Mã đơn hàng là: ' . $order_id . '");';
                echo 'window.location.href = "category.php";</script>';
            } catch (Exception $e) {
                echo "Gửi email thông báo thất bại: {$mail->ErrorInfo}";
            }
        } else {
            echo "Lỗi khi đặt hàng: " . $db->error;
        }
    } else {
        echo "Lỗi khi thêm khách hàng: " . $db->error;

    }
}
     






?>

<body>
    <div class="container">

        <section class="info_customer_cart">
            <div class="container">
                <div class="confirm_cart-top-wrap">
                    <div class="confirm_cart-top">
                        <!-- CSS CHUNG confirm_cart-top-item-->
                        <div class="confirm_cart-top-cart confirm_cart-top-item">
                            <i class="fa-solid fa-cart-shopping "></i>
                        </div>
                        <div class="confirm_cart-top-address confirm_cart-top-item">
                            <i class="fa-solid fa-location-dot "></i>
                        </div>
                        <div class="confirm_cart-top-confirm_cart confirm_cart-top-item">
                            <i class="fa-solid fa-check"></i>
                        </div>
                    </div>
                </div>

            </div>

            <div class="container">
                <div class="info_customer_cart-content row">
                    <div class="info_customer_cart-content-left">

                        <p>Vui lòng xác nhận thông tin trước khi đặt hàng:</p>
                        <div class="info_customer_cart-content-left-input-top row">
                            <!-- form -->
                            <form method="POST">

                                <div class="confirm_cart-content-left-input-top-item">
                                    <label for="ho_ten"> Họ tên:
                                        <b><?php echo isset($_SESSION['customer_info']['full_name']) ? $_SESSION['customer_info']['full_name'] : ''; ?></b>
                                    </label>
                                    
                                </div>
                                <div class="confirm_cart-content-left-input-top-item">
                                    <label for="so_dien_thoai"> Điện thoại:
                                        <b><?php echo isset($_SESSION['customer_info']['phone_number']) ? $_SESSION['customer_info']['phone_number'] : ''; ?></b>
                                    </label>
                                
                                </div>
                                <div class="confirm_cart-content-left-input-top-item">
                                    <label for="email_khach"> Email:
                                       <b> <?php echo isset($_SESSION['customer_info']['email_khach']) ? $_SESSION['customer_info']['email_khach'] : ''; ?></b>
                                    </label>
                                  
                                </div>
                                <div>

                                </div>

                                <div class="confirm_cart-content-left-input-top-item">
                                    <label for="dia_chi"> Địa chỉ:
                                        <b><?php echo $address . ', ' . $ward . ', ' . $district . ', ' . $city; ?></b>
                                    </label>

                                </div>

                                <div class="confirm_cart-content-left-button row ">
                                    <a href="info_customer_cart.php">
                                        <p style="font-size: 15px;"> <span>&#10502</span> Quay lại địa chỉ </p>
                                    </a>

                                    <form method="post">
                                        <button type="submit" name="dat_hang">Đặt hàng</button>
                                    </form>
                                </div>

                            </form>

                        </div>

                    </div>

                    <div class="info_customer_cart-content-right">
                        <table>
                            <tr>
                                <th>Tên sản phẩm</th>
                                <th>Số lượng</th>
                                <th>Thành tiền</th>

                            </tr>
                            <?php
                   
                    if(isset($_SESSION['cart']) && !empty($_SESSION['cart'])){
                        $total =0;
                        foreach($_SESSION['cart'] as $item){
                            $subtotal = $item['product_price'] * $item['quantity'] ;
                            $total+=$subtotal;
                            echo'<tr>';
                            echo'<td>'.$item['product_name'].'</td>';
                            echo'<td>'.$item['quantity'].'</td>';
                            echo '<td>' . number_format($subtotal, 0, ',', '.') . 'đ</td>';
                            echo'</tr>';
                        }
                    }
                    else {
                        echo'<tr>';
                        echo'<td colspan="3">Giỏ hàng của bạn chưa có sản phẩm nào</td>';
                    }
                    
                  
                    
                    
                    echo '<tr>';
                    echo '<td style="font-weight: bold;" colspan="3">Tổng tiền hàng</td>';
                    echo '<td style="font-weight: bold;">';
                    echo isset($total) ? number_format($total, 0, ',', '.') . 'đ' : '0đ';
                    echo '</td>';
                    echo '</tr>';
                    ?>

                        </table>
                    </div>
                </div>
            </div>

        </section>

</body>
<script type="text/javascript" src="script.js"></script>

</html>