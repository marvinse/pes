<?php
    include "model/Product.php";
    $products = new Product();
    $entries = $products->select();

    include 'view/edit.php';
?>