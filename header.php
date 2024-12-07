<!DOCTYPE html>
<html lang="en">
<body>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $page_title; ?></title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="fontawesome-free-6.5.1-web/css/all.min.css">
    <script src="script.js"></script>
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
                    <li><a href="category.php?search=iphone+11">IPhone 11 Series</a></li>
                </ul>
            </li>
            <li><a href="cart.php"><span ><i class="fa-solid fa-cart-shopping"></i></span> GIỎ HÀNG </a> </li>

            

        </div>
        <div class="others row">
            <div class="others row">

                <div class="search-input">
                
                    <form id="searchForm" action="category.php" method="get">

                        <input id="searchInput" name="action" placeholder="Tìm kiếm sản phẩm">

                        <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                        
                    </form>
                    
                </div>
            </div>

        </div>

    </header>
