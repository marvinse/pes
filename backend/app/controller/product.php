<?php
    include "model/Product.php";
    switch (@$_GET['action']) {
        case 'add': 
            if($_POST ){
                $new_product = new Product($_POST['name'],$_POST['price'],$_POST['image'],$_POST['description']);
                if($new_product->insert()){
                    $entries = $new_product->select();
                    header('Location: ?c=home');
                }else{
                    $msg = "Eror al guardar, intente de nuevo";
                }
            }
            include 'view/add.php';
            break;
        case 'delete': 
            Product::delete($_GET['id']);
            header('Location: ?c=home');
            break;
        case 'update': 
            $new_product = new Product();
        
            if($_POST){
                Product::update($_POST['id'], $_POST['name'], $_POST['price'], $_POST['image'], $_POST['description']);
                header('Location: ?c=home');
            }else{
                $product = $new_product->select($_GET['id'])[0];
                include 'view/update.php';
            }
            break;
        default:
            $product = new Product();
            $product = $product->select($_GET['id'])[0];
            include 'view/productdetails.php';
    }


?>