<?php



include "header.php";
include "slider.php";
include "class/brand_class.php";



?>

<?php

    $brand = new brand;
    $show_brand = $brand -> show_brand();
    
    
?>

<div class="admin-content-right">
<div class="admin-content-right-category_read">
                <h1>Danh sách Loại sản phẩm </h1>
                <table class="admin-content-right-table">
                    <tr>
                        <th>STT</th>
                        <th>ID </th>
                        <th>Tên danh mục </th>
                        <th>Danh mục </th>
                        <th>Tùy biến </th>
                    </tr>
                    <?php
            if ($show_brand) {
                        $i = 0;
                        while ($result = $show_brand->fetch_assoc()) {
                            $i++;
                          ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $result['brand_id']; ?></td>
                                <td><?php echo $result['category_name']; ?></td>
                                <td><?php echo $result['brand_name']; ?></td>
                                <td>

                
                            <a href="brand_update.php?brand_id=
                            <?php echo $result['brand_id'] ?>">Sửa</a> |
                            <a href="brand_delete.php?brand_id=
                            <?php echo $result['brand_id'] ?>">Xóa</a>
                                            </td>
                                        </tr>
                                <?php
                            } //dong vong lap
            }

            ?>
        </table>
    </div>
</div>