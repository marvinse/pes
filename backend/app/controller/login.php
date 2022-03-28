<?php
    if( @$_GET['action'] == "logout" ){
        unset($_SESSION);
        session_destroy();
        header('Location: /tienda');
    }
    if($_POST){
        include "model/User.php";
        $user = new User($_POST['username'],md5($_POST['password']) );
        $userFound = $user->login();
        if( $userFound ){
            $_SESSION["username"]=$userFound[0]->user;
            $_SESSION["uid"]=$userFound[0]->getId();
            header("location: /dashboard");  exit;
            exit;
        }else{
            $msg = "No se encontró el usuario";
        }
    }
    include 'view/login.php';
?>