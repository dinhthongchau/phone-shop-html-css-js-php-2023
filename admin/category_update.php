<?php

include "header.php";
include "slider.php";
include "class/category_class.php";


$category = new category;

$category_id = $_GET['category_id'];

$get_category = $category->get_category($category_id);

if($get_category) {
        $result = $get_category->fetch_assoc();
}


// UPDATE
if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $category_name = $_POST['category_name'];
    $update_category = $category->update_category($category_name, $category_id);
}



?>

<div class="admin-content-right">
    <div class="admin-content-right-category_create">
        <h1>SỬA danh mục</h1>
        <form action="" method="POST">
            <input required name="category_name" type="text" placeholder="Nhập tên danh mục"
            value="<?php echo isset($result['category_name']) ? $result['category_name'] : ''; ?>"
            >
            <button type="submit">Sửa DANH MỤC</button>
        </form>
    </div>

  
</div>

</section>
</body>
</html>
