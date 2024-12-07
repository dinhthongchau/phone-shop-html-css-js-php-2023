<?php

include "class/product_class.php";

$product = new product;


    $product_id = $_GET['product_id'];
    //delete from category
    $delete_product = $product -> delete_product($product_id);







?>