<?php
    if(@$_SESSION["username"] && @$_SESSION["isAdmin"]==1){
        include "model/User.php";
        $users = User::selectAll();

        switch (@$_GET['action']) {
            case 'add':
                if($_POST){ //new user is being added
                    User::add( $_POST['username'], $_POST['email'], md5($_POST['password']), $_POST['isAdmin'] );
                    header('Location: /app?c=user');
                }else{
                    include 'view/add-user.php';
                }
                break;
            case 'edit':
                $user = User::select($_GET['id']);
                include 'view/edit-user.php';
                break;
            case 'update':
                User::update( $_POST['id'], $_POST['username'], $_POST['email'], $_POST['isAdmin'] );
                header('Location: /app?c=user');
                break;
            case 'delete':
                User::delete( $_GET['id'] );
                header('Location: /app?c=user');
                break;
            default:
                include 'view/manage-users.php';
        }
    }else{
        header('Location: /app');
    }
?>