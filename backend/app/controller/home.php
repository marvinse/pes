<?php
    include "model/Product.php";
    $products = new Product();
    
    if($_POST){
        $filter = $_POST['search'];
        $entries = $products->select(null, $filter);
    }else{
        $entries = $products->select();
    }
    include 'view/home.php';
?>