<?php $page_title = "Giỏ hàng"; ?>
<?php
include 'admin/database.php';
include 'header.php';

$db = new Database();


session_start();

// print_r($_SESSION['cart']);


if (isset($_GET['action']) == 'remove') {
    $productId = $_GET['product_id'];
    foreach ($_SESSION['cart'] as $key => $item) {
        if ($item['product_id'] == $productId) {
            unset($_SESSION['cart'][$key]);
            break;
        }
    }

    header("Location:  cart.php");
}



?>
<script>
    console.log('DB_HOST: <?php echo getenv('DB_HOST'); ?>');
    console.log('DB_USER: <?php echo getenv('DB_USER'); ?>');
    console.log('DB_PASS: <?php echo getenv('DB_PASS'); ?>');
</script>

<body>

    <!-------------------------cart------------------->
    <section class="cart">
        <div class="container">
            <div class="cart-top-wrap">
                <div class="cart-top">
                    
                    <div class="cart-top-cart cart-top-item">
                        <i class="fa-solid fa-cart-shopping "></i>
                    </div>
                    <div class="cart-top-address cart-top-item">
                        <i class="fa-solid fa-location-dot "></i>
                    </div>
                    <div class="cart-top-confirm_cart cart-top-item">
                        <i class="fa-solid fa-check"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="cart-content row">
                <div class="cart-content-left">
                    <table>
                        <tr>
                            <th>Sản phẩm</th>
                            <th>Tên sản phẩm</th>

                            <th>Số lượng</th>
                            <th> Thành tiền </th>
                            <th>Xóa</th>
                        </tr>

                        <?php 
                        
                        //kiem tra sp co trong gio hang chua 
                        if(isset($_SESSION['cart']) && !empty($_SESSION['cart'])){
                            $total = 0;
                            foreach($_SESSION['cart'] as $item){
                                $subtotal = $item['product_price'] * $item['quantity'];
                                $total += $subtotal;
                                echo '<tr>';
                                echo '<td><img src="image/' . $item['product_img'] . '" ></td>';
                                echo '<td>' . $item['product_name'] . '</td>';
                                echo '<td>' . $item['quantity'] .'</td>';
                                echo '<td>' . number_format($subtotal, 0, ',', '.') . 'đ</td>';
                                echo '<td><a href="?action=remove&product_id=' . $item['product_id'] . '"><i class="fa fa-trash" ></i></a></td>';
                                echo '</tr>';
                                
                            }
                        } else {
                            echo '<tr><td colspan="7">Giỏ hàng trống</td></tr>';

                        }
                        ?>

                    </table>
                </div>
                <div class="cart-content-right">
                    <table>
                        <tr>
                            <th colspan="2"> TỔNG TIỀN GIỎ HÀNG</th>
                        </tr>
                        <tr>
                            <td> TỔNG SẢN PHẨM </td>
                            <td> <?php echo isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0; ?></td>
                        </tr>
                        <tr>
                            <td> TỔNG TIỀN HÀNG </td>
                            <td> <?php echo isset($total) ? number_format($total, 0, ',', '.') . 'đ' : '0đ'; ?></td>
                        </tr>
                        <tr>
                            <td style="color: black; font-weight:bold"> TẠM TÍNH </td>
                            <td>
                                <p style="color: black; font-weight:bold">
                                    <?php echo isset($total) ? number_format($total, 0, ',', '.') . 'đ' : '0đ'; ?></p>
                            </td>
                        </tr>
                    </table>
                    <div class="confirm_cart-content-left-method-info_customer_cart">
                        <p style=" ">Phương thức giao hàng</p>
                        <div class="confirm_cart-content-left-method-confirm_cart-item" >
                            <input name="method-confirm_cart" type="radio" checked>
                            <label > Thanh toán tiền mặt </label>

                        </div>
                        <div>
                            <div class="cart-content-right-button">
                                <button> <a href="info_customer_cart.php"> THANH TOÁN </a></button>
                                <button> <a href="category.php"> MUA THÊM </a></button>
                            </div>

                        </div>
                    </div>
                </div>
                
    </section>

    