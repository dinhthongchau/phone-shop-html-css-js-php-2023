<?php $page_title = "Trang chủ"; ?>

<!----------------slider-------------->
<section id="Slider">
    <div class="img-container">
        
        <img src="image/slider2.png">
        <img src="image/slider4.png">
        <img src="image/slider3.png">
        <img src="image/slider1.png">
    </div>
    <div class="dot-container">
        <div class="dot active"></div>
        <div class="dot"></div>
        <div class="dot"></div>
        <div class="dot"></div>
    </div>

</section>

<body>

    <?php include 'header.php'; ?>

    <?php 
    include 'admin/database.php';
    $db = new Database();


    
    $query = "SELECT * FROM tbl_product";
    $products = $db->select($query);


    if(isset($_GET['search']) && isset($_GET['sort'])) {
        $search = $_GET['search'];
        $sort = $_GET['sort'];
    
        switch ($sort) {
            case 'asc':
                $query = "SELECT * FROM tbl_product WHERE product_name LIKE '%$search%' ORDER BY CAST(product_price AS UNSIGNED) ASC";
                break;
            case 'desc':
                $query = "SELECT * FROM tbl_product WHERE product_name LIKE '%$search%' ORDER BY CAST(product_price AS UNSIGNED) DESC";
                break;
            default:
                $query = "SELECT * FROM tbl_product WHERE product_name LIKE '%$search%'";
        }
    
        $products = $db->select($query);
    } elseif (isset($_GET['search'])) {
        $search = $_GET['search'];
        $query = "SELECT * FROM tbl_product WHERE product_name LIKE '%$search%'";
        $products = $db->select($query);
    }
    
    


    
    if(isset($_GET['search'])) {
     
        $searchTerm = $_GET['search'];
    }
    ?> 
    <!---------------------------category ------------------------->

    <section class="category">
        <div class="container">
            
        </div>

        <div class="container">
            <div class="row">
                <div class="category-left">
                    <ul>
                        <li class="category-left-li"><a href="category.php?search=iphone">DANH MỤC IPHONE</a></li>

                        <li class="category-left-li"><a href="#"><span onclick="event.preventDefault(); alert('Sản phẩm này sắp ra mắt!');">DANH MỤC IPAD </span></a>
                       </li>
                        
                       <li class="category-left-li"><a href="#"><span onclick="event.preventDefault(); alert('Sản phẩm này sắp ra mắt!');">DANH MỤC MACBOOK </span></a>
                       </li>
                       <li class="category-left-li"><a href="#"><span onclick="event.preventDefault(); alert('Sản phẩm này sắp ra mắt!');">DANH MỤC APPLE WATCH </span></a>
                       </li>
                       <li class="category-left-li"><a href="#"><span onclick="event.preventDefault(); alert('Sản phẩm này sắp ra mắt!');">DANH MỤC AIRPOD </span></a>
                       </li>
                    </ul>
                </div>

                <div class="category-right row">
                    <div class="category-right-top-item">
                        <p ><i class="fa-solid fa-list"></i> DANH MỤC IPHONE:</p>
                    </div>

                    <div class="category-right-top-item">
                        <select id="searchSelect" onchange="searchByModel()" >
                        <option value="category" >Tất cả Series</option>
                            <option value="iphone">Tất cả Iphone </option>
                            <option value="iphone 11">IPhone 11 Series</option>
                            <option value="iphone 12">IPhone 12 Series</option>
                            <option value="iphone 13">IPhone 13 Series</option>
                            <option value="iphone 14">IPhone 14 Series</option>
                            <option value="iphone 15">IPhone 15 Series</option>
                            
                        </select>
                    </div>

                    <div class="category-right-top-item" >
                        <select name="sort" id="sortSelect" onchange="sortProducts()">
                            <option value="">Sắp xếp giá </option>
                            <option value="desc">Giá cao đến thấp</option>
                            <option value="asc">Giá thấp đến cao</option>
                        </select>
                    </div>

                   
                    <div class="category-right">
                        <?php
                     


                        if ($products ) {
                            while ($row = $products->fetch_assoc()) {
                              
                               echo "</div><div class='product-row'>"; // tao dong` moi
        
                                echo "<div class='category-right-content-item ' >";
                                echo "<img src='image/" . $row["product_img"] . "' alt='" . $row["product_name"] . "'>";
                                // chuyen sang  PRODUCT.php co ID tuong ung = JS
                                echo "<a href='#' onclick='redirectToProductDetail(" . $row["product_id"] . "); return false;'><h1>" . $row["product_name"] . "</h1></a>"; 
                                echo "<p>Giá: " . number_format($row["product_price_new"], 0, ',', '.') . "đ</p>"; // Thay đổi ở đây
                                echo "</div>";  
                        
                               
                            }
                        } else {
                            echo "Không có sản phẩm nào.";
                        }


                        echo "</div>";
                        ?>

                    </div>

                </div>

    </section>

    <?php 
    include 'footer.php'; ?>

</body>

</html>