<?php
    include "database.php";
    
?>

<?php

class product{
    private $db;

    public function __construct(){
        $this->db = new Database(); //goi class 

    }
    
    
    public function show_category(){
        $query = "SELECT * FROM tbl_category ORDER BY category_id DESC";
        $result = $this->db->select($query); 
        return $result; 
    }

    public function show_brand(){
        $query = "SELECT tbl_brand.*, tbl_category.category_name 
        FROM tbl_brand INNER JOIN tbl_category ON tbl_brand.category_id = tbl_category.category_id
        ORDER BY tbl_brand.brand_id DESC";
        $result = $this->db->select($query); 
        return $result; 
    }

    public function insert_product( ){
        $product_name = $_POST['product_name'];
        $category_id = $_POST['category_id'];
        $brand_id = $_POST['brand_id'];
        $product_price = $_POST['product_price'];
        $product_price_new = $_POST['product_price_new'];
        $product_desc = $_POST['product_desc'];
        $product_img = $_FILES['product_img']['name'];
        
        // <!-- Tao anh khi post  vao folder tao cho database -->
        move_uploaded_file($_FILES['product_img']['tmp_name'] ,"uploads/".$_FILES['product_img']['name']);
       

        $query = "INSERT INTO tbl_product(
            product_name,
            category_id,
            brand_id,
            product_price,
            product_price_new,
            product_desc,
            product_img
            ) 
            VALUES (
            '$product_name',
            '$category_id',
            '$brand_id',
            '$product_price',
            '$product_price_new',
             '$product_desc',
             '$product_img')   "   ;

        $result = $this->db->insert($query); 

       //img_desc
       if($result){

        $query = "SELECT * FROM tbl_product ORDER BY product_id DESC LIMIT 1 "; 
        $result = $this->db->select($query)->fetch_assoc();

        $product_id = $result['product_id'];
        $filename = $_FILES['product_img_desc']['name']; // Lấy tất cả các tên tập tin đã tải lê
        $filetmp = $_FILES['product_img_desc']['tmp_name']; 
    

        
        foreach($filename as $key => $value) { //chi so -> gia tri
           
            move_uploaded_file($filetmp[$key],  "uploads/" .$value ); // Di chuyển tập tin vào thư mục uploads phù hợp

            // Chèn từng tên hình ảnh vào bảng tbl_product_img_desc
            $query = "INSERT INTO tbl_product_img_desc (product_id, product_img_desc) VALUES ('$product_id', '$value')";
            $result = $this->db->insert($query);
        }
    }

        // xu li xong ve list 
        // header('location:product_read.php ');
        return $result; 
    }




    public function show_product(){
        // $query = "SELECT * FROM tbl_product";
        // $result = $this->db->select($query);
        // return $result;

        $query=" SELECT p.*,c.category_name, b.brand_name from tbl_product as p 
        INNER JOIN tbl_category as c ON p.category_id = c.category_id
        INNER JOIN tbl_brand as b ON p.brand_id = b.brand_id";
        $result=$this->db->select($query);
        return $result;    
        }


    
    public function get_brand($brand_id){
        $query = "SELECT * FROM tbl_brand WHERE brand_id = '$brand_id'";
        $result = $this->db->select($query); 
        return $result; 
    }

    



    public function show_brand_ajax($category_id){
        $query = "SELECT * FROM tbl_brand WHERE category_id = '$category_id'";
        $result = $this->db->select($query); 
        return $result; 
    }


    public function getProductById($product_id)
{
    $query = "SELECT * FROM tbl_product WHERE product_id = '$product_id'";
    $result = $this->db->select($query);
    return $result;
}




public function update_product($product_id, $product_name, $category_id, $brand_id, $product_price, $product_price_new, $product_desc, $product_img,$product_img_desc)
{
    $old_product_img = $this->db->select("SELECT product_img FROM tbl_product WHERE product_id = '$product_id'")->fetch_assoc()['product_img'];
    
    // kiểm tra xem có ảnh mới được tải lên không
    if (!empty($_FILES['product_img']['name'])) {
     
        move_uploaded_file($_FILES['product_img']['tmp_name'], "uploads/" . $_FILES['product_img']['name']);
        $product_img = $_FILES['product_img']['name'];

       
        $query = "UPDATE tbl_product SET 
                    product_name = '$product_name',
                    category_id = '$category_id',
                    brand_id = '$brand_id',
                    product_price = '$product_price',
                    product_price_new = '$product_price_new',
                    product_desc = '$product_desc',
                    product_img = '$product_img'
                WHERE product_id = '$product_id'";
    } else {
        // Giữ nguyên ảnh cũ
        $product_img = $old_product_img;

     
        $query = "UPDATE tbl_product SET 
                    product_name = '$product_name',
                    category_id = '$category_id',
                    brand_id = '$brand_id',
                    product_price = '$product_price',
                    product_price_new = '$product_price_new',
                    product_desc = '$product_desc'
                WHERE product_id = '$product_id'";
    }
     // nếu mảng không rổng thì cập nhật mới , ngược lại giữ   nguyên 
    if( !empty($product_img_desc[0]) ){
    if(isset($product_img_desc)) {
        
        $filenames = $_FILES['product_img_desc']['name'];
        $filetmps = $_FILES['product_img_desc']['tmp_name'];

        $delete_query = "DELETE FROM tbl_product_img_desc WHERE product_id = '$product_id'";
        $this->db->delete($delete_query);

        // lặp qua từng ảnh mô tả mới
        foreach ($filenames as $key => $value) {
            $new_img_desc = $value;
            move_uploaded_file($filetmps[$key], "uploads/" . $new_img_desc);

            $insert_query = "INSERT INTO tbl_product_img_desc (product_id, product_img_desc) VALUES ('$product_id', '$new_img_desc')";
            $this->db->insert($insert_query);
        }
    }
}


    $result = $this->db->update($query);

    


   
    header('location:product_read.php');

    return $result;
}
    
  




    


public function delete_product($product_id)
{
   
    $query_get_img = "SELECT product_img FROM tbl_product WHERE product_id = '$product_id'";
    $result_get_img = $this->db->select($query_get_img);
    $product_img = $result_get_img->fetch_assoc()['product_img'];

    
    $query_delete_product = "DELETE FROM tbl_product WHERE product_id = '$product_id'";
    $result_delete_product = $this->db->delete($query_delete_product);

    if ($result_delete_product) {
        $upload_dir = "uploads/";
        $file_path = $upload_dir . $product_img;
        if (file_exists($file_path)) {
            unlink($file_path); 
        }
    }

    header('location:product_read.php');

    return $result_delete_product;
}


   


public function get_product_img_desc($product_id) {
    $query = "SELECT * FROM tbl_product_img_desc WHERE product_id = '$product_id'";
    $result = $this->db->select($query);
    return $result;
}



}


?>