<?php $page_title = "Sản phẩm"; ?>
<?php
include 'admin/database.php';

$db = new Database();


session_start();
$productId = isset($_GET['product_id']) ? $_GET['product_id'] : null;


$query = "SELECT * FROM tbl_product WHERE product_id = $productId";
$product = $db->select($query)->fetch_assoc();


if (!$product) {
    echo "Không tìm thấy sản phẩm.";
    exit;
}

// lay danh sach mo ta
$query = "SELECT product_img_desc FROM tbl_product_img_desc WHERE product_id = $productId";
$imgDescriptions = $db->select($query);









if (!isset($_SESSION['cart'])) {
   $_SESSION['cart'] = array();
}
//xoa session
// unset($_SESSION['cart'][$index]);
// print_r($_SESSION['cart']);





if ( isset($_POST['add_to_cart'])   ) {
   
   $quantity = 1; 


   if (isset($_SESSION['cart'][$productId])) {
       
       $_SESSION['cart'][$productId]['quantity'] += $quantity;
       echo "Đã thêm 1 sp";
       
   } else 
   {
      
       $_SESSION['cart'][$productId] = array(
           'product_id' => $product['product_id'],
           'product_name' => $product['product_name'],
           'product_price' => $product['product_price_new'],
           'product_img' => $product['product_img'],
           'quantity' => $quantity
          
       );
       
      

   }
   header("Location: cart.php");
}
?>


<!DOCTYPE html>
<html lang="en">
<body>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $page_title; ?></title>
    
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="fontawesome-free-6.5.1-web/css/all.min.css">
 
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Reem+Kufi+Fun:wght@400..700&family=Tinos:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
</head>


    <header  style="border-bottom: 1px solid grey" >
        <div class="logo">
            <a href="index.php"><img src="image/logo.png"></a>
        </div>

        <div class="menu">

            <li><a href="category.php"><i class="fa-solid fa-list"></i> LIST IPHONE</a>
                <ul class="sub-menu">
                    <li><a href="category.php?search=iphone+15">IPhone 15 Series</a></li>
                    <li><a href="category.php?search=iphone+14">IPhone 14 Series</a></li>
                    <li><a href="category.php?search=iphone+13">IPhone 13 Series</a></li>
                    <li><a href="category.php?search=iphone+12">IPhone 12 Series</a></li>
                    <li><a href="category.php?search=iphone+12">IPhone 11 Series</a></li>
                </ul>
            </li>
            <li><a href="cart.php"><span ><i class="fa-solid fa-cart-shopping"></i></span>GIỎ HÀNG </a> </li>

            

        </div>
        <div class="others row">
            <div class="others row">
                <div class="search-input">
                
                    <form id="searchForm" action="category.php" method="get">
                        <input id="searchInput" name="search" placeholder="Tìm kiếm sản phẩm">
                        <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                        
                    </form>
                    
                </div>
            </div>

        </div>

    </header>

<body>




   <!-------------------PRODUCT---------------------------->
   <section class="product">
      <div class="container">
         
         
            <div class="product-content ">
               <!-- anh to-->
               <div class="product-content-left row">
                  <div class="product-content-left-big-img">
                     <img src="image/<?php echo $product['product_img']; ?>" >
                  </div>
                  <!-- anh nho-->
                  <div class="product-content-left-small-img">
                     <img src="image/<?php echo $product['product_img']; ?>"  >

                     <div>

                        <?php if ($imgDescriptions): ?>
                        <?php while ($row = $imgDescriptions->fetch_assoc()): ?>
                        <img src="image/<?php echo $row['product_img_desc']; ?>">
                        <?php endwhile; ?>
                        <?php else: ?>
                        <p>Không có ảnh mô tả.</p>
                        <?php endif; ?>
                     </div>
                  </div>
               </div>

               <!-- chu~ -->
               <div class="product-content-right ">
                  <div class="product-content-right-product-name">

                     <form method="post">

                        <h1><?php echo $product['product_name']; ?> </h1>
                        <p>Mã sp:<?php echo $product['product_id']; ?></p>
                  </div>
                  <div class="product-content-right-product-price">
                     <p><b>Giá: <?php echo number_format($product['product_price_new'], 0, ',', '.'); ?>đ</b></p>
                     <del><p style="font-weight: normal; font-size: 15px; padding-top: 10px;">Giá gốc: <?php echo number_format($product['product_price'], 0, ',', '.'); ?>đ</p>     </del>
                  </div>

                  <div class="product-content-right-product-button">

                     <button type="submit" name="add_to_cart"><i class="fa-solid fa-cart-shopping"></i>MUA NGAY</button>
                     <button> LIKE NEW 99% </button>

                  </div>
                  </form>
                 
                  <div class="product-content-right-product-p">
                     <p> <i class="fa-solid fa-phone"></i> Hotline: <a href="tel:0559607124">0559.607.124</a></p>
                  </div>
                  <div class="product-content-right-product-p">
                     <p><i class="fa-solid fa-envelope"></i> Email:<a href="mailto:thongPhone@gmail.com">
                           thongPhone@gmail.com</a></p>
                  </div>
                  <div class="product-content-right-product-p">
                     <p><i class="fa-solid fa-box"></i> Bộ sản phẩm gồm: Hộp, Sách hướng dẫn, Cây lấy sim, Cáp Lightning
                        - Type C</p>
                  </div>
                  <div class="product-content-right-product-p">
                     <p> <i class="fa-solid fa-rotate"></i> Hư gì đổi nấy 12 tháng tại shop </p>
                  </div>
                  <div class="product-content-right-product-p">
                     <p> <i class="fa-solid fa-user-shield"></i> Bảo hành từ shop 1 năm</p>
                  </div>
                  <div class="product-content-right-product-p">
                     <p> <i class="fa-solid fa-truck-fast"></i> Giao hàng nhanh toàn quốc</p>
                  </div>

                  <div class="product-content-right-bottom">

                     <div class="product-content-right-bottom-content-big">
                        <div class="product-content-right-bottom-content-title" style="text-align: center;">
                           <div class="product-content-right-bottom-item chitiet">
                              <p style=" font-size: 20px; font-weight: bold;
                                 ">Thông tin về sản phẩm</p>
                           </div>

                        </div>
                        <div class="product-content-right-bottom-content ">
                           <div class="product-content-right-bottom-content-chitiet">
                              <p><?php echo $product['product_desc']; ?></p>
                           </div>

                        </div>
                     </div>
                  </div>
               </div>
            </div>
         <div class="product_turnback">
            <h1> Giới thiệu về máy đổi trả tại T-IPHONE Shop</h1> 
            <p> <b>Máy đổi trả</b> là những Điện thoại , Máy tính bảng, Laptop... được bán ra tại T-IPHONE Shop, miễn phí đổi sản phẩm tương đương trong 30 ngày đầu tiên nếu sản phẩm có lỗi nhà sản xuất.</p>

            <p><b>T-IPHONE Shop</b> chỉ thu lại những sản phẩm được bán ra tại T-IPHONE Shop, không thu mua lại các sản phẩm nơi khác. Vì vậy, các sản phẩm đều là hàng chính hãng và có chất lượng tốt nhất.</p>

            <p>Tham khảo chi tiết chính sách máy đổi trả qua kênh mạng xã hội chúng tôi. </p> 
            <div>
      </div>
      </div>

   </section>

</body>



</html>
<script type="text/javascript" src="script.js"></script>

<?php include 'footer.php'; ?>