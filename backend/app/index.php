<?php
ob_start();
session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv=”Content-Type” content=”text/html; charset=UTF-8″ />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="app/css/font-awesome.min.css">
        <link rel="stylesheet" href="app/css/style.css" />
        <title>Grupo CIP - Sistema</title>
    </head>
    <body>
        <?php
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
                include "controller/login.php";
            }
        ?>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="app/scripts/main.js"></script>
        <script>
            // Example starter JavaScript for disabling form submissions if there are invalid fields
            (function() {
            'use strict';
            window.addEventListener('load', function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
                });
            }, false);
            })();

            $('.viewMore').click( function(){
                $(this).hide();
                $(this).parent().find('.moreText').show();
            })

            $( ".notes .initialText" ).each(function( index ) {
                var text = $(this).text();
                if( text.length > 85 ){
                    $(this).parent().find('.viewMore').show();
                    $(this).parent().find('.moreText').text(text.slice(85));
                    $(this).parent().find('.initialText').text(text.slice(0,85));
                }
            });
        </script>
    </body>
</html>