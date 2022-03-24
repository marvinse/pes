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
            $_SESSION["username"]=$userFound[0]->username;
            $_SESSION["uid"]=$userFound[0]->getId();
            header('Location: /tienda');
        }else{
            $msg = "No se encontro el usuario";
            $messageType = "danger";
        }
    }
    include 'view/login.php';
?>