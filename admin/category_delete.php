<?php
include "header.php";
include "slider.php";
include "class/category_class.php";

$category = new category;

$category_id = $_GET['category_id'];
//delete from category
$delete_category = $category -> delete_category($category_id);

?>