<?php
if(@$_SESSION["username"]){
    //include "model/Client.php";
    $types = array("Empresa", "Iglesia", "Colegio", "Escuela", "Comunidad");
    $status = array("approved", "pending", "rejected", "unknow");
    for ($i = 101; $i <= 115; $i++) {
        $randomType = $types[rand(0, 4)];//random number between 0 and 4
        $randomStatus = $status[rand(0, 3)];

        $entityName = "Entidad".$i;
        $contactName = "Contacto".$i;
        $phone = "88888888";
        $email = "test".$i."@gmail.com";
        $direction = "San Jose";
        $date = "2022-04-02";
        $activity_date = "2022-04-30";
        $topic = "tema X ".$i;
        $money = "560000";
        $notes = "nota X ".$i;
        
        Client::add( $randomType, $entityName, $contactName, $phone,
                    $email, $direction, $date, $activity_date, $topic,
                    $money, $notes, date("Y-m-d"), $randomStatus, 1);
    }
    
}
?>