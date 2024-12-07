<?php
include "header.php";
include "slider.php";

$connection = new mysqli("localhost", "root", "", "web_iphone_new");

if ($connection->connect_error) {
    die("Kết nối không thành công: " . $connection->connect_error);
}

$query = "SELECT o.ordered_id, o.ordered_name, o.ordered_quantity, o.ordered_price, o.customer_id, c.customer_full_name, c.customer_phone_number, c.customer_address, c.customer_ward, c.customer_district, c.customer_city
          FROM tbl_ordered AS o
          INNER JOIN tbl_customer AS c ON o.customer_id = c.customer_id ORDER BY o.customer_id DESC ";

$result1 = $connection->query($query);
?>

<style>
    table {
        width: 100%;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);
        border-collapse: collapse;
     
    }

    th {
        background-color: #CBD5C0;
        color: black;
        padding: 10px;
        text-align: left;
    }

    tr, td {
        padding: 10px;
    }

    .total-price {
        font-weight: bold;
        font-size: 18px;
        margin-top: 20px;
    }
</style>

<div class="admin-content-right">
    <div class="admin-content-right-category_read">
        <h1>Danh sách đơn hàng</h1>
        <?php
        if ($result1-> num_rows > 0) { 
            $prevOrderedId = null; // biến để lưu trữ order ID đơn hàng trước đó

            while ($row = $result1->fetch_assoc()) { 
                $orderedId = $row['ordered_id']; // lấy order ID đơn hàng hiện tại

                if ($orderedId != $prevOrderedId) { // kiem tra don hang hien tai khac voi truoc do

                    if ($prevOrderedId !== null) { // neu da qua it nhat 1 don hang, hien thi tong gia tien cua don hang truoc do 
                        echo "<tr><td colspan='5' class='total-price'>Tổng giá tiền: " . number_format($totalPrice, 0, ',', '.') . " đồng</td></tr>";
                        echo "</table>";
                    }

                    echo "<table>"; 
                    echo "<tr><th>ID Đơn hàng</th><th>Tên khách hàng</th><th>Số điện thoại</th><th>Địa chỉ</th><th>Tùy biến</th></tr>";
                    echo "<tr><td><strong>" . $row['ordered_id'] . "</strong></td><td>" . $row['customer_full_name'] . "</td><td>" . $row['customer_phone_number'] . "</td><td>" . $row['customer_address'] . ", " . $row['customer_ward'] . ", " . $row['customer_district'] . ", " . $row['customer_city'] . "</td><td><a href='ordered_delete.php?ordered_id=" . $row['ordered_id'] . "' style='color:red;'>Xóa đơn hàng</a></td></tr>";
                    echo "<tr><th colspan='3'>Tên sản phẩm</th><th>Số lượng</th><th>Giá</th></tr>";
                    $totalPrice = 0; 
                }
                
                echo "<tr><td colspan='3'>" . $row['ordered_name'] . "</td><td>" . $row['ordered_quantity'] . "</td><td>" . number_format($row['ordered_price'], 0, ',', '.') . "</td></tr>"; // Hiển thị thông tin về sản phẩm trong đơn hàng
                $totalPrice += $row['ordered_price'] * $row['ordered_quantity']; // tính tổng giá tiền của đơn hàng
                $prevOrderedId = $orderedId; // cập nhật ID đơn hàng trước đó
            }
            echo "<tr><td colspan='5' class='total-price'>Tổng giá tiền đơn hàng cuối: " . number_format($totalPrice, 0, ',', '.') . " đồng</td></tr>"; // tong gia tien don hang cuoi cung
            echo "</table>"; 
        } else {
            echo "<p>Không có dữ liệu để hiển thị.</p>"; 
        }
        ?>
    </div>
</div>


