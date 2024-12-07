<?php

    include "database.php";
   
?>

<?php

class category{
    private $db;

    public function __construct(){
        $this->db = new Database(); //goi class 

    }

    public function insert_category($category_name){
        $query = "INSERT INTO tbl_category(category_name) VALUES ('$category_name')";
        $result = $this->db->insert($query); 
        // xu li xong ve list 
        header('location:category_read.php ');
        
}
    public function show_category(){
        $query = "SELECT * FROM tbl_category ORDER BY category_id ";
        $result = $this->db->select($query); 
        return $result; 
    }
    
    public function get_category($category_id){
        $query = "SELECT * FROM tbl_category WHERE category_id = '$category_id'";
        $result = $this->db->select($query); 
        return $result; 
    }

    public function update_category( $category_name, $category_id){
        $query = "UPDATE tbl_category SET category_name = '$category_name' WHERE category_id = '$category_id' "  ;
        $result = $this->db->update($query);
        // // xu li xong ve list 
        header('location:category_read.php ');
        return $result;   
    }

    public function delete_category( $category_id){
        $query = "DELETE FROM tbl_category  WHERE category_id = '$category_id' "  ;
        $result = $this->db->update($query);
        // xu li xong ve list 
        header('location:category_read.php ');
        return $result;   
    }





}
?>