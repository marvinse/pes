<?php
    if(@$_SESSION["username"]){
        include "model/Client.php";
        $resulsPerPage = 100;
        $currentPage = @$_GET['page'] ? $_GET['page'] : 1;

        switch (@$_GET['action']) {
            case 'search':
                $clients = Client::search( $_POST['search'] );
                include 'view/dashboard.php';
                break;
            case 'advancedsearch':
                if($_POST){ //a search is coming
                    $query="";
                    
                    if( $_POST['type'] ){
                        $query .= "c.type = '".$_POST['type']."'";
                    }
                    if( $_POST['entity'] ){
                        $query .= ($query == "" ? "" : " and ")."c.entity_name like '%".$_POST['entity']."%'";
                    }
                    if( $_POST['contactname'] ){
                        $query .= ($query == "" ? "" : " and ")."c.name like '%".$_POST['contactname']."%'";
                    }
                    if( $_POST['email'] ){
                        $query .= ($query == "" ? "" : " and ")."c.email like '%".$_POST['email']."%'";
                    }
                    if( $_POST['date'] ){
                        $query .= ($query == "" ? "" : " and ")."c.date = '".$_POST['date']."'";
                    }
                    if( $_POST['activity_date'] ){
                        $query .= ($query == "" ? "" : " and ")."c.activitydate = '".$_POST['activitydate']."'";
                    }
                    if( $_POST['topic'] ){
                        $query .= ($query == "" ? "" : " and ")."c.topic like '%".$_POST['topic']."%'";
                    }
                    if( $_POST['status'] ){
                        $query .= ($query == "" ? "" : " and ")."c.status = '".$_POST['status']."'";
                    }
                    if( $_POST['responsible'] ){
                        $query .= ($query == "" ? "" : "and")."c.responsible_id = '".$_POST['responsible']."'";
                    }
                    $clients = Client::advancedsearch( $query );
                    include 'view/dashboard.php';
                }else{
                    include "model/User.php";
                    $users = User::selectAll();
                    include 'view/advanced-search.php';    
                }
                break;
            case 'edit':
                include "model/User.php";
                $client = Client::select($_GET['id']);
                $users = User::selectAll();
                include 'view/edit-client.php';
                break;
            case 'update':
                $pdfData;
                if($_FILES["pdf"]["size"] > 0){//pdf is being updated
                    
                    $pdfData = Client::addPDF($_FILES);
                }
                Client::update( $_POST['id'], $_POST['type'], $_POST['entity'], $_POST['contactname'], $_POST['telephone'],
                $_POST['email'], $_POST['direction'], $_POST['date'], $_POST['activitydate'], $_POST['topic'],
                $_POST['money'], $_POST['notes'], date("Y-m-d"), $_POST['status'], $_POST['responsible'] );
                if( $pdfData['path'] ){
                    include "model/Pdf.php";
                    Pdf::update($pdfData['name'], $pdfData['path'], $_POST['id']);
                }

                header('Location: /app?c=dashboard');
                break;
            case 'delete':
                include "model/Pdf.php";
                Client::delete( $_GET['id'] );
                Pdf::delete( $_GET['id'] );
                header('Location: /app?c=dashboard');
                break;
            case 'add':
                if($_POST){ //new client is being added
                    $pdfData;
                    if($_FILES["pdf"]["size"] > 0){//pdf is being added
                        $pdfData = Client::addPDF($_FILES);
                    }

                    $lastClientId = Client::add( $_POST['type'], $_POST['entity'], $_POST['contactname'], $_POST['telephone'],
                    $_POST['email'], $_POST['direction'], $_POST['date'], $_POST['activitydate'], $_POST['topic'],
                    $_POST['money'], $_POST['notes'], date("Y-m-d"), $_POST['status'], $_POST['responsible']);
                    
                    if( $pdfData['path'] ){
                        include "model/Pdf.php";
                        Pdf::add($pdfData['name'], $pdfData['path'], $lastClientId);
                    }

                    header('Location: /app?c=dashboard');
                }else{
                    include "model/User.php";
                    $users = User::selectAll();
                    include 'view/add-client.php';
                }
                break;
            default:
                $totalClients = Client::getTotalClients();
                $clients = Client::selectAll($resulsPerPage, $currentPage);
                include 'view/dashboard.php';
        }
    }else{
        header('Location: /app');
    }
?>