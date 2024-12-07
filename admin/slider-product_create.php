
<Style>
    * {
    margin: 0 ;
    padding: 0;
    box-sizing: border-box;
    color: black;
    outline:none;
    font-family: 'Tinos', serif;
}

a {
    text-decoration: none;
}

ul {
    list-style: none;
}



.admin-content {
    padding-top: 50px;
    display: flex;
    margin-left: 20px;
}

.admin-content-left-1 {
   
    width: 20%;
    
    padding: 30px 0 0 12px;
    border-radius: 10px;
     
}


.admin-content-left-1 > ul > li >a{ /* the truc tiep, rut ngan selector */
    font-weight: bold;
    font-size: 23px;

     
}
.admin-content-left-1 ul{
    padding-top: 10px;
}


.admin-content-left-1 ul li {
    margin: 6px 0;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);
    text-align: center;
   
   
  
    border-radius:8px;
  
    
   

}

.admin-content-left-1 ul li ul{
    padding-bottom: 10px;
    margin-bottom: 20px;
}




.admin-content-left-1 ul li ul li {
    
   
    border-radius: 10px;
    padding : 10px;
    width: 200px;
    text-align: center;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);
    cursor: pointer;
    background-color: #FFFFFF;

}

.admin-content-left-1 ul li ul li:hover {
    cursor: pointer;
   color: white;
   background: green;

}



.admin-content-left-1 ul ul {
    margin-left: 20px;
}
</style>
<section class="admin-content">
        <div class="admin-content-left-1">
            <ul>
           
                <li> <a  href="">Danh mục </a> 
                    <ul>
                        <li> <a  href="category_create.php"><i class="fa-solid fa-plus"></i>Thêm danh mục </a> </li>
                        <li> <a  href="category_read.php"><i class="fa-solid fa-list"></i>Danh sách danh mục </a> </li>
                    </ul>
                </li>
                <li> <a href="">Loại sản phẩm </a>
                    <ul>
                        <li> <a  href="brand_create.php"><i class="fa-solid fa-plus"></i>Thêm loại sản phẩm  </a> </li>
                        <li> <a  href="brand_read.php"><i class="fa-solid fa-list"></i>Danh sách sản phẩm </a> </li>
                    </ul>
                
                </li>

                <li> <a href="">Sản phẩm  </a>
                    <ul>
                        <li> <a  href="product_create.php"><i class="fa-solid fa-plus"></i>Thêm sản phẩm </a> </li>
                        <li> <a  href="product_read.php"><i class="fa-solid fa-list"></i>Danh sách sản phẩm </a> </li>
                    </ul>
                </li>
                <li> <a href="">Đơn hàng  </a>
                <ul>
                        
                        <li> <a  href="ordered_read.php"><i class="fa-solid fa-list"></i>Danh sách đơn hàng </a> </li>
                    </ul>
                </li>
               
        
            </ul>
        </div>
