<?php

include "header.php";
include "slider.php";
include "class/brand_class.php";



?>

<?php

    $brand = new brand;
    $brand_id = $_GET['brand_id'];
    $get_brand = $brand-> get_brand($brand_id);
    if($get_brand) {
        $result_B = $get_brand->fetch_assoc();
    }

    // UPDATE
    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        $category_id = $_POST['category_id'];
        $brand_name = $_POST['brand_name'];
        $update_brand = $brand->update_brand($category_id, $brand_name, $brand_id );
    }
    
?>
<style>
    select{
        width: 200px;
        height: 30px;
    }


    </style>


<div class="admin-content-right">
            <div class="admin-content-right-category_create">
                <h1>Thêm loại sản phẩm</h1>
                <form action="" method="POST">
                    <select name="category_id" id="" > 
                        <option value="#">--Chọn danh mục</option>

                        <?php
                        $show_category = $brand->show_category();
                        if($show_category) {
                            while ($result = $show_category->fetch_assoc()) {
                        
                            ?>
                            <!-- Khong hien thi lai danh muc khi EDIT -->
                            
                            <option <?php
                            if($result_B['category_id'] == $result['category_id']) {
                                echo "selected";
                            }
                            ?>
                            value="<?php echo $result['category_id'] ?> "> 
                            <?php echo $result['category_name'] ?>
                             </option>
                        
                            <?php
                            }
                        }
                        ?>
                         </select> <br>



                         
                  <input required name="brand_name" type="text" placeholder="Nhập tên loại sản phẩm" 
                  value="<?php echo $result_B['brand_name'] ?>">

                    <button type="submit">Sửa</button>
                </form>
            </div>
        </div>
    </section>
</body>
</html>




