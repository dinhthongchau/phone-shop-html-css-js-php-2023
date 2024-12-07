<html>
<?php 

include "header.php";
include "slider-product_create.php";
include "class/product_class.php";



?>

<?php 
$product = new Product();

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    // // var_dump($_POST, $_FILES);
    // echo '<pre>';
    // echo print_r($_FILES['product_img_desc']['name']); //lay duoc du lieu anh
    // echo '</pre>';
    $insert_product = $product ->insert_product($_POST, $_FILES);
    // $insert_product = $product ->insert_product($_POST, $_FILES);
    if($insert_product){
        echo "<script>alert('Thêm sản phẩm thành công')</script>";
      }else{
        echo "<script>alert('Thêm sản phẩm thất bại')</script>";
      }

}


?>

<body>



<div class="admin-content-right">
            <div class="admin-content-right-product_add">
                <h1>Thêm sản phẩm</h1>
                <form action="" method="POST" enctype="multipart/form-data"> <!-- chỉ định cách dữ liệu trong mẫu form sẽ được mã hóa khi gửi đến máy chủ khi form được gửi đi.-->
                    <label for="">Nhập tên sản phẩm<span style="color: red">"</span></label>
                    <input name="product_name"required type="text" placeholder="Nhập">
                    <label for="">Chọn danh mục<span style="color: red">"</span></label>
                    <select name="category_id" id="category_id">


                        <option value="#">---Chọn danh mục--- </option>
                       
                         <!-- vong lap php-->
                        <?php
                        $show_category = $product->show_category();
                        if($show_category) {
                            
                            while ($result = $show_category->fetch_assoc()) {
                            ?>    
                                <option value="
                                <?php echo $result['category_id'] ?>">
                                <?php echo $result['category_name'] ?>
                                
                                </option> 
                                    <!-- dong vong lap php-->       
                                <?php
                            }
                        }

                        ?>


            
                    </select>
                    <!-- AJAX -->
                    <label for="">Chọn loại sản phẩm<span style="color: red">"</span></label>
                    
                    <select name="brand_id" id="brand_id">
                        
                        <option value="#">---Chọn--- </option>
                       
            
                       
                    </select>
                    <label required for="">Giá sản phẩm<span style="color: red">"</span></label>
                   <input name="product_price" type="text" placeholder="Giá sản phẩm" >
                   <label for="">Giá khuyến mãi<span style="color: red">"</span></label>
                   <input name="product_price_new" type="text" placeholder="Giá khuyến mãi" >
                   <label for="">Mô tả sản phẩm<span style="color: red">"</span></label>
                   <textarea name="product_desc" id="ckeditor" cols="30" rows="10" placeholder="Mô tả sản phẩm" ></textarea>
                   <label for="">Ảnh sản phẩm<span style="color: red">"</span></label>
                   <input name="product_img" required type="file">
                   <label for="">Ảnh mô tả<span style="color: red">"</span></label>
                   <!--  nhieu file anh  -->
                   <input name="product_img_desc[]" required multiple type="file">
                    <button type="submit">Thêm</button>

                </form>
            </div>

            
        </div>
                        


        
</body>





<script src="https://cdn.ckeditor.com/ckeditor5/41.3.0/classic/ckeditor.js">

</script>

<script>
    ClassicEditor
       .create( document.querySelector( '#ckeditor' ) )
       .catch( error => {
            console.error( error );
        } );
        
</script>


<script>
    
$(document).ready(function() {
    //khi du lieu category duoc tai
    $("#category_id").change(function(){
        //khi xay ra change o category
        var x = $(this).val();
        $.get("product_create_ajax.php",{category_id:x},function(data){
            //thuc hien yeu cau ajax file ajax voi id duoc truyen
            $("#brand_id").html(data); //noi dung brand tuong ung voi category
        })
    })
});









</script>


</html>

