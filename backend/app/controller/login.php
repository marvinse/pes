<?php
    if( @$_GET['action'] == "logout" ){
        unset($_SESSION);
        session_destroy();
        header('Location: /app');
    }
    if($_POST){
        include "model/User.php";
        $user = new User($_POST['username'],md5($_POST['password']) );
        $userFound = $user->login();
        if( $userFound ){
            $_SESSION["username"]=$userFound[0]->username;
            $_SESSION["isAdmin"]=$userFound[0]->getIsAdmin();
            $_SESSION["uid"]=$userFound[0]->getId();
            header("location: ?c=dashboard");
            exit;
        }else{
            $msg = "No se encontró el usuario";
        }
    }
    include 'view/login.php';
?>