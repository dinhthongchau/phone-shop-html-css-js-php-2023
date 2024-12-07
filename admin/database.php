<?php 
    include "config.php";

?>




<?php 
class Database{
    // Thông tin kết nối database
    public $host = DB_HOST;
    public $user = DB_USER;
    public $pass = DB_PASS;
    public $dbname = DB_NAME;
    public $link;
    public $error;

    // Hàm khởi tạo, thực hiện kết nối database khi được gọi
    public function __construct(){
        $this->connectDB();
    }

    // Phương thức kết nối database
    private function connectDB(){
        $this->link = mysqli_connect($this->host, $this->user, $this->pass, $this->dbname);
        if(!$this->link){
            $this->error = "Connection failed".$this->link->connect_error;
            return false;
        }
    }

    // Phương thức truy vấn SELECT
    public function select($query){
        $result = $this->link->query($query)
        or die($this->link->error.__LINE__);

        if($result->num_rows > 0)
        
        { 
            return $result;
        }
        else {
            return false;
        }
    }

    // Phương thức truy vấn INSERT
    public function insert($query){
        $insert_row = $this->link->query($query) or 
        die($this->link->error.__LINE__);
        
        if($insert_row){
            return $insert_row;
        }
        else {
            return false;
        }
    }

    // Phương thức truy vấn UPDATE
    public function update($query){
        $update_row = $this->link->query($query) or die($this->link->error.__LINE__);
        if($update_row){
            
            return $update_row;
        }
        else {
            return false;
        }
    }

    // Phương thức truy vấn DELETE
    public function delete($query){
        $delete_row = $this->link->query($query) or die($this->link->error.__LINE__);
        if($delete_row){
            return $delete_row;
        }
        else {
            return false;
        }
    }
}
?>
