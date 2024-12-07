<?php


include "header.php";
include "slider.php";
include "class/product_class.php";



?>

<?php

    $product = new product;
    $show_product = $product -> show_product();
    
    
    
    
?>


<div class="admin-content-right">
    <div class="admin-content-right-category_read">
        <h1>Danh sách Loại sản phẩm </h1>
        <table  class="admin-content-right-table">
            <tr>
                 <th>Tùy biến </th>
                <th>STT</th>
                <th>ID Sản phẩm</th>
                <th>Tên Sản phẩm</th>
                <th>Danh mục ID </th>
                <th>Loại sản phẩm ID </th>
                <th>Giá sản phẩm</th>
                <th>Giá khuyến mãi</th>
                <th>Mô tả sản phẩm</th>
                <th>Ảnh sản phẩm</th>
                <th>Ảnh mô tả</th>
                
            </tr>
            <?php
                    
            if ($show_product) {
                        $i = 0;
                        while ($result = $show_product->fetch_assoc()) {
                            $i++;
                    ?>
            <tr>
            <td>
                    <a href="product_update.php?product_id=
                        <?php echo $result['product_id'] ?>">Sửa</a> |
                    <a href="product_delete.php?product_id=
                        <?php echo $result['product_id'] ?>" style="color: red;">Xóa</a>
                </td>
                <td><?php echo $i; ?></td>
                <td><?php echo $result['product_id']; ?></td>
                <td><?php echo $result['product_name']; ?></td>
                <td><?php echo $result['category_name']; ?></td>
                <td><?php echo $result['brand_name']; ?></td> 
                <td><?php echo number_format($result['product_price'],0,'.','.') ."đ"; ?></td>
                <td><?php echo number_format($result['product_price_new'],0,'.','.') ."đ"; ?></td>
                <td ><?php echo $result['product_desc']; ?></td>
                <td>
                    <?php
    if (!empty($result['product_img'])) {
        echo '<img src="uploads/' . $result['product_img'] . '" alt="" width="50">';
    } else {
        echo 'No Image';
    }
    ?>
                </td>

                <td>
                    <?php
        // Lấy danh sách hình ảnh mô tả của sản phẩm
        $product_img_desc = $product->get_product_img_desc($result['product_id']);
        
        // Hiển thị các hình ảnh mô tả
        if ($product_img_desc) {
            while ($row = $product_img_desc->fetch_assoc()) {
                echo '<img src="uploads/' . $row['product_img_desc'] . '" alt="" width="50">';
                    }
                }
                ?>
                </td>
                
            </tr>
            <?php
                        } // dong vong lap
 }

            ?>
        </table>
    </div>
</div>