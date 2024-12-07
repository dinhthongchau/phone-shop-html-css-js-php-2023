<?php

include "header.php";
include "slider.php";
include "class/product_class.php";

$product = new product();

    $product_id = $_GET['product_id'];
    $get_product = $product->getProductById($product_id);
   if($get_product) {
    $result_P = $get_product->fetch_assoc();
  }



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $product_name = isset($_POST['product_name']) ? $_POST['product_name'] : '';
    $category_id = isset($_POST['category_id']) ? $_POST['category_id'] : '';
    $brand_id = isset($_POST['brand_id']) ? $_POST['brand_id'] : '';
    $product_price = $_POST['product_price'];
    $product_price_new = $_POST['product_price_new'];
    $product_desc = $_POST['product_desc'];
    $product_img = isset($_FILES['product_img']['name']) ? $_FILES['product_img']['name'] : '';
    $product_img_desc=isset($_FILES['product_img_desc']['name']) ? $_FILES['product_img_desc']['name'] :'';
    // print_r($product_img_desc);
   
    
    $update_product = $product->update_product($product_id, $product_name, $category_id, $brand_id, $product_price, $product_price_new, $product_desc, $product_img,$product_img_desc );
    
    if ($update_product) {
        echo "<script>alert('Cập nhật sản phẩm thành công')</script>";
    } else {
        echo "<script>alert('Cập nhật sản phẩm thất bại')</script>";
    }
}



?>

<style>
  select {
    width: 200px;
    height: 30px;
  }
</style>
<body>
    <section>
        <div class="admin-content-right">
            <div class="admin-content-right-product_edit">
                <h1>Chỉnh sửa sản phẩm</h1>
                <form action="" method="POST" enctype="multipart/form-data">
                    <label for="">Nhập tên sản phẩm<span style="color: red">"</span></label>
                    <input name="product_name" required type="text" placeholder="Nhập"
                        value="<?php echo $result_P['product_name'] ?>">
                    <label for="">Chọn danh mục<span style="color: red">"</span></label>
                    <select name="category_id" id="category_id">
                        <option value="#">---Chọn--- </option>
                        <?php
                        $show_category = $product->show_category();
                        if($show_category) {
                            while ($result = $show_category->fetch_assoc()) {
                                ?>
                                <option <?php if($result_P['category_id'] == $result['category_id']) { echo "selected"; } ?>
                                    value="<?php echo $result['category_id'] ?>">
                                    <?php echo $result['category_name'] ?>
                                </option>
                                <?php
                            }
                        }
                        ?>
                    </select>
                    <!--AJAX-->
                    <label for="">Chọn loại sản phẩm<span style="color: red">"</span></label>
                    <select name="brand_id" id="brand_id">
                        <option value="#">---Chọn--- </option>


                        <?php
                        $show_brand = $product->show_brand_ajax($result_P['category_id']);
                        if($show_brand) {
                            while ($result = $show_brand->fetch_assoc()) {
                                ?>
                                <option <?php if($result_P['brand_id'] == $result['brand_id']) { echo "selected"; } ?>
                                    value="<?php echo $result['brand_id'] ?>">
                                    <?php echo $result['brand_name'] ?>
                                </option>
                                <?php
                            }
                        }
                        ?>
                    </select>
                    <label required for="">Giá sản phẩm<span style="color: red">"</span></label>
                    <input name="product_price" type="text" placeholder="Giá sản phẩm"
                        value="<?php echo $result_P['product_price'] ?>">
                    <label for="">Giá khuyến mãi<span style="color: red">"</span></label>
                    <input name="product_price_new" type="text" placeholder="Giá khuyến mãi"
                        value="<?php echo $result_P['product_price_new'] ?>">
                    <label for="">Mô tả sản phẩm<span style="color: red">"</span></label>
                    <textarea name="product_desc" id="ckeditor" cols="30" rows="10"
                        placeholder="Mô tả sản phẩm"><?php echo $result_P['product_desc'] ?></textarea>
                    <label for="">Ảnh sản phẩm<span style="color: red">"</span></label>
                    <input name="product_img" type="file">
                    <img src="uploads/<?php echo $result_P['product_img'] ?>" alt="" width="100">
                    <br>
                    <label for="">Ảnh mô tả hiện tại:<span style="color: red">"</span></label>
                        <?php
                        $product_imgs_desc = $product->get_product_img_desc($product_id);
                        if ($product_imgs_desc) {
                            while ($img = $product_imgs_desc->fetch_assoc()) {
                                ?>
                                <img src="uploads/<?php echo $img['product_img_desc'] ?>" alt="" width="100">
                                <?php
                            }
                        }
                        else {
                            echo " ( Không có ảnh nào)";
                        }
                        ?>
                    <label ><br>Ảnh mô tả mới<span style="color: red">"</span></label>
                    <input name="product_img_desc[]" multiple type="file">
                    <button type="submit">Cập nhật</button>
                </form>
            </div>
        </div>
    </section>
</body>



<script src="https://cdn.ckeditor.com/ckeditor5/41.3.0/classic/ckeditor.js">

</script>
<script>
    ClassicEditor
        .create(document.querySelector('#ckeditor'))
        .catch(error => {
            console.error(error);
        });
</script>

</body>


<style>
.admin-content-right-product_edit textarea {
    border: 1px solid black;
    
}
.admin-content-right-product_edit input{
    margin: 10px;
}

.admin-content-right-product_edit button{
    display:block;
    margin-top: 10px;
    height: 30px;
    width: 100px;
    cursor: pointer;
    border: none;
    color: white;
    background-color: red;
    }
    
.admin-content-right-product_edit button:hover{
    background-color: transparent;
    color: red;
    border: 1px solid red;
 }


 .admin-content-right-product_edit h1{
    margin-bottom: 20px;
 }

.admin-content-right-product_edit input,select {
    width: 200px;
    height: 30px;
    display: block;
    margin: 6px 0 12px;
    padding-left: 12px;
}
.admin-content-right-product_edit textarea{
    width: 500px;
    height:200px;
    display: block;
    margin-bottom: 12px;
    padding-left: 12px;
}

    </style>
</html>