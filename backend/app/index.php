<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv=”Content-Type” content=”text/html; charset=UTF-8″ />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
        <link rel="stylesheet" href="css/style.css" />
        <title>Grupo CIP - Sistema</title>
    </head>
    <body>
        <?php
            session_start();
            if( !@$_SESSION["cart"] ){
                $_SESSION["cart"] = array();
            }
            if(isset($_GET['c'])){
                $filename = "controller/{$_GET['c']}.php";
                if(file_exists($filename)){
                    include_once $filename;
                }else{
                    include 'view/error.php';
                }
            }else{
                include "controller/home.php";
            }
        ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    </body>
</html>