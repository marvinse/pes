<?php
date_default_timezone_set("America/Costa_Rica");

//SELECT CURDATE() AS Today

//stored function to get current date
/*DELIMITER $$  
CREATE FUNCTION today()  
RETURNS DATE  
BEGIN  
RETURN CURDATE();  
END$$  
DELIMITER ; */

//SELECT * FROM `clients` WHERE STATUS = 'pending' and activity_date = (SELECT today() + interval 7 day AS NextWeek)

include_once "./model/Connection.php";
$pdo  = new Connection();
$pdo = $pdo->open();

$sendEmail=false;
$message=
"<div style=\"background-color:#CCC; width:95%; margin:0 auto; font-family:Arial, Helvetica, sans-serif; padding:20px 0 20px 0;\">
	<div style=\"background-color:#FFF;  width:90%; margin:0 auto; padding:10px;\">
		<h2 style=\"color:#c00\">Estas oportunidades se vencen en una semana. No las dejes ir</h2>
		<table width=\"90%\" cellpadding=\"5\" border=\"1\">
			<tr align=\"center\" style=\"font-weight:bold\">
				<td width=\"25%\">Cliente</td>
				<td width=\"25%\">Empresa</td>
				<td width=\"25%\">Monto</td>
				<td>Telefono</td>
				<td>Email</td>
			</tr>";
			$query="select * from clients where status=\"pending\" and activity_date = (SELECT today() + interval 7 day AS NextWeek)";
			$results = $pdo->query($query);
			foreach($results->fetchAll() as $row){
				$sendEmail=true;
				$message=$message.
				"<tr align=\"center\">
					<td>".$row['name']."</td>
					<td>".$row['entity_name']."</td>
					<td>¢".$row['price']."</td>
					<td>".$row['phone']."</td>
					<td>".$row['email']."</td>
				</tr>";	
			}				
		$message=$message.
		"</table>
		<p><strong>Correo automático del Sistema de registro del Grupo CIP, no responda este email</strong></p>
	</div>
</div>";	
if($sendEmail==true){
	$query = "select email from users"; //send email to everyone
	$results = $pdo->query($query);
	foreach($results->fetchAll() as $row){
		echo $row['email'];
		mail("".$row['email']."", "Oportunidades que vencen en una semana", "".$message."", "From: Sistema de Registro <info@grupocip.org>"."\r\n"."Content-type: text/html; charset=iso-8859-1"."\r\n");
	}	
}
?>