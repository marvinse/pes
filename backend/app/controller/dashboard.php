<?php
    if(@$_SESSION["username"]){
        include "model/Client.php";

        switch (@$_GET['action']) {
            case 'search':
                $clients = Client::search( $_POST['search'] );
                include 'view/dashboard.php';
                break;
            default:
                $clients = Client::selectAll();
                include 'view/dashboard.php';
        }
    }else{
        header('Location: /app');
    }
?>